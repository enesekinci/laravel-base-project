<?php

namespace App\Services;

use App\Models\Variation;
use Illuminate\Pagination\LengthAwarePaginator;

class VariationService
{
    /**
     * Varyasyonları listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Variation::query()
            ->with('values')
            ->ordered();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Varyasyon oluştur
     */
    public function create(array $data): Variation
    {
        $values = $data['values'] ?? [];
        unset($data['values']);

        $variation = Variation::create($data);

        if (!empty($values)) {
            foreach ($values as $valueData) {
                $variation->values()->create($valueData);
            }
        }

        return $variation->load('values');
    }

    /**
     * Varyasyon güncelle
     */
    public function update(Variation $variation, array $data): Variation
    {
        $values = $data['values'] ?? [];
        unset($data['values']);

        $variation->update($data);

        // Değerleri güncelle
        if (isset($values)) {
            // Mevcut değerleri sil
            $variation->values()->delete();

            // Yeni değerleri ekle
            foreach ($values as $valueData) {
                $variation->values()->create($valueData);
            }
        }

        return $variation->fresh(['values']);
    }

    /**
     * Varyasyon sil
     */
    public function delete(Variation $variation): bool
    {
        return $variation->delete();
    }
}
