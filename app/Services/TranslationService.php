<?php

namespace App\Services;

use App\Models\Language;
use App\Models\ModelTranslation;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TranslationService
{
    /**
     * Google Translate ücretsiz web API'sini kullanarak çeviri yapar
     */
    public function translate(string $text, string $sourceLang, string $targetLang): ?string
    {
        if (empty($text)) {
            return null;
        }

        // Aynı dil ise çeviri yapma
        if ($sourceLang === $targetLang) {
            return $text;
        }

        try {
            // Google Translate web API endpoint
            $url = 'https://translate.googleapis.com/translate_a/single';

            $response = Http::timeout(10)->get($url, [
                'client' => 'gtx',
                'sl' => $sourceLang, // source language
                'tl' => $targetLang, // target language
                'dt' => 't',
                'q' => $text,
            ]);

            if ($response->successful()) {
                $result = $response->json();

                if (isset($result[0]) && is_array($result[0])) {
                    $translated = '';
                    foreach ($result[0] as $item) {
                        if (isset($item[0])) {
                            $translated .= $item[0];
                        }
                    }
                    return $translated ?: $text;
                }
            }

            Log::warning('Translation failed', [
                'text' => substr($text, 0, 100),
                'source' => $sourceLang,
                'target' => $targetLang,
                'response' => $response->body(),
            ]);

            return $text;
        } catch (\Exception $e) {
            Log::error('Translation error', [
                'message' => $e->getMessage(),
                'text' => substr($text, 0, 100),
                'source' => $sourceLang,
                'target' => $targetLang,
            ]);

            return $text;
        }
    }

    /**
     * Model için çevirileri oluşturur
     * 
     * @param \Illuminate\Database\Eloquent\Model $model Çevrilecek model
     * @param array $fields Çevrilecek alanlar ['name', 'description', 'variations.name', ...]
     * @param string $sourceLangCode Kaynak dil kodu (örn: 'tr')
     * @param array $targetLangCodes Hedef dil kodları (örn: ['en', 'ru', 'ar'])
     */
    public function translateModel($model, array $fields, string $sourceLangCode, array $targetLangCodes): void
    {
        // Field'ları ayır: model alanları ve nested ilişkiler
        [$modelFields, $nestedFields] = $this->parseFields($fields);

        // Model'in kendi alanlarını çevir
        if (!empty($modelFields)) {
            $this->translateModelFields($model, $modelFields, $sourceLangCode, $targetLangCodes);
        }

        // Nested ilişkileri çevir
        if (!empty($nestedFields)) {
            $this->translateNestedRelations($model, $nestedFields, $sourceLangCode, $targetLangCodes);
        }
    }

    /**
     * Field'ları model alanları ve nested ilişkilere ayırır
     * 
     * @param array $fields ['name', 'description', 'variations.name', 'options.values.label']
     * @return array [modelFields, nestedFields]
     */
    protected function parseFields(array $fields): array
    {
        $modelFields = [];
        $nestedFields = [];

        foreach ($fields as $field) {
            if (str_contains($field, '.')) {
                // Nested field: 'variations.name' veya 'options.values.label'
                // İlk noktaya kadar olan kısım ilişki adı, geri kalanı nested field
                [$relation, $relationField] = explode('.', $field, 2);

                // Eğer relationField'da hala nokta varsa (örn: 'values.label'), 
                // bu da nested bir ilişki demektir, ama şimdilik sadece ilk seviyeyi ayırıyoruz
                // Alt seviyeler related model'in translatable property'sinde tanımlanmalı
                $nestedFields[$relation][] = $relationField;
            } else {
                // Model field: 'name'
                $modelFields[] = $field;
            }
        }

        return [$modelFields, $nestedFields];
    }

    /**
     * Model'in kendi alanlarını çevirir
     */
    protected function translateModelFields($model, array $fields, string $sourceLangCode, array $targetLangCodes): void
    {
        // Kaynak dildeki verileri al
        $sourceData = [];
        foreach ($fields as $field) {
            if (isset($model->$field)) {
                $sourceData[$field] = $model->$field;
            }
        }

        if (empty($sourceData)) {
            return;
        }

        // Önce İngilizceye çevir (eğer kaynak dil İngilizce değilse)
        $englishData = $sourceData;
        if ($sourceLangCode !== 'en' && in_array('en', $targetLangCodes)) {
            $englishData = $this->translateFields($sourceData, $sourceLangCode, 'en');
            $this->saveTranslation($model, 'en', $englishData);
        }

        // İngilizceden diğer dillere çevir
        $baseLangCode = $sourceLangCode === 'en' ? 'en' : 'en';
        $baseData = $sourceLangCode === 'en' ? $sourceData : $englishData;

        foreach ($targetLangCodes as $targetLangCode) {
            if ($targetLangCode === $sourceLangCode || $targetLangCode === 'en') {
                continue;
            }

            $translatedData = $this->translateFields($baseData, $baseLangCode, $targetLangCode);
            $this->saveTranslation($model, $targetLangCode, $translatedData);
        }
    }

    /**
     * Nested ilişkileri çevirir
     */
    protected function translateNestedRelations($model, array $nestedFields, string $sourceLangCode, array $targetLangCodes): void
    {
        foreach ($nestedFields as $relationName => $fields) {
            // İlişkiyi yükle
            if (!method_exists($model, $relationName)) {
                Log::warning("Relation not found: {$relationName} on " . get_class($model));
                continue;
            }

            $relatedModels = $model->$relationName;

            // HasMany veya BelongsToMany ilişkisi
            if ($relatedModels instanceof \Illuminate\Database\Eloquent\Collection) {
                foreach ($relatedModels as $relatedModel) {
                    // Related model'in translatable property'sini kontrol et
                    if (method_exists($relatedModel, 'getTranslatableFields')) {
                        $relatedFields = $relatedModel->getTranslatableFields();
                        if (!empty($relatedFields)) {
                            $this->translateModel($relatedModel, $relatedFields, $sourceLangCode, $targetLangCodes);
                        }
                    } else {
                        // Manuel olarak belirtilen field'ları çevir
                        $this->translateModelFields($relatedModel, $fields, $sourceLangCode, $targetLangCodes);
                    }
                }
            } elseif ($relatedModel = $relatedModels) {
                // BelongsTo ilişkisi (tek model)
                if (method_exists($relatedModel, 'getTranslatableFields')) {
                    $relatedFields = $relatedModel->getTranslatableFields();
                    if (!empty($relatedFields)) {
                        $this->translateModel($relatedModel, $relatedFields, $sourceLangCode, $targetLangCodes);
                    }
                } else {
                    $this->translateModelFields($relatedModel, $fields, $sourceLangCode, $targetLangCodes);
                }
            }
        }
    }

    /**
     * Alanları çevirir
     */
    protected function translateFields(array $data, string $sourceLang, string $targetLang): array
    {
        $translated = [];

        foreach ($data as $field => $value) {
            if (empty($value)) {
                $translated[$field] = $value;
                continue;
            }

            $translated[$field] = $this->translate($value, $sourceLang, $targetLang) ?? $value;

            // Rate limiting için kısa bir bekleme
            usleep(100000); // 0.1 saniye
        }

        return $translated;
    }

    /**
     * Çeviriyi veritabanına kaydeder
     */
    protected function saveTranslation($model, string $langCode, array $translations): void
    {
        $language = Language::where('code', $langCode)->first();

        if (!$language) {
            Log::warning("Language not found: {$langCode}");
            return;
        }

        ModelTranslation::updateOrCreate(
            [
                'translatable_type' => get_class($model),
                'translatable_id' => $model->id,
                'language_id' => $language->id,
            ],
            [
                'translations' => $translations,
            ]
        );
    }

    /**
     * Model için çeviriyi getirir
     */
    public function getTranslation($model, string $langCode): ?array
    {
        $language = Language::where('code', $langCode)->first();

        if (!$language) {
            return null;
        }

        $translation = ModelTranslation::where('translatable_type', get_class($model))
            ->where('translatable_id', $model->id)
            ->where('language_id', $language->id)
            ->first();

        return $translation?->translations;
    }
}
