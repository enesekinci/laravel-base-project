<?php

namespace App\Listeners;

use App\Events\ProductTranslated;
use App\Models\Language;
use App\Services\TranslationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class TranslateProduct implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct(
        private TranslationService $translationService
    ) {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductTranslated $event): void
    {
        $product = $event->product;

        // Default dil kodunu al
        $defaultLanguage = Language::where('is_default', true)->first();

        if (!$defaultLanguage) {
            Log::warning('Default language not found');
            return;
        }

        $sourceLangCode = $defaultLanguage->code;

        // Çevrilecek dilleri al (default dil hariç)
        $targetLanguages = Language::where('is_active', true)
            ->where('code', '!=', $sourceLangCode)
            ->pluck('code')
            ->toArray();

        if (empty($targetLanguages)) {
            return;
        }

        // Product'ı ilişkileriyle birlikte yükle
        $product->load(['variations', 'options.values']);

        // Model'in translatable property'sinden çevrilecek alanları al
        $fields = $product->getTranslatableFields();

        if (empty($fields)) {
            Log::warning('No translatable fields found for Product');
            return;
        }

        // Çeviriyi başlat
        $this->translationService->translateModel(
            $product,
            $fields,
            $sourceLangCode,
            $targetLanguages
        );
    }
}
