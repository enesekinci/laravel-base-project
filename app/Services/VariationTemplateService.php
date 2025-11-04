<?php

namespace App\Services;

use App\Models\VariationTemplate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class VariationTemplateService
{
    /**
     * Varyasyon şablonlarını listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = VariationTemplate::query()
            ->with('values')
            ->orderBy('sort_order')
            ->orderBy('name');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Varyasyon şablonu oluştur
     */
    public function create(array $data): VariationTemplate
    {
        $values = $data['values'] ?? [];
        unset($data['values']);

        $template = VariationTemplate::create($data);

        if (!empty($values)) {
            foreach ($values as $valueData) {
                $template->values()->create($valueData);
            }
        }

        return $template->load('values');
    }

    /**
     * Varyasyon şablonu güncelle
     */
    public function update(VariationTemplate $template, array $data): VariationTemplate
    {
        $values = $data['values'] ?? [];
        unset($data['values']);

        $template->update($data);

        // Değerleri güncelle
        if (isset($values)) {
            // Mevcut değerleri sil
            $template->values()->delete();

            // Yeni değerleri ekle
            foreach ($values as $valueData) {
                $template->values()->create($valueData);
            }
        }

        return $template->fresh(['values']);
    }

    /**
     * Varyasyon şablonu sil
     */
    public function delete(VariationTemplate $template): bool
    {
        return $template->delete();
    }

    /**
     * Tüm aktif şablonları getir
     */
    public function allActive(): Collection
    {
        return VariationTemplate::query()
            ->with('values')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();
    }
}
