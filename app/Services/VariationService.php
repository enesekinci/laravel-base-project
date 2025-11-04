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
        $query = Variation::query()->ordered();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('slug', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('sku', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Varyasyon oluştur
     */
    public function create(array $data): Variation
    {
        return Variation::create($data);
    }

    /**
     * Varyasyon güncelle
     */
    public function update(Variation $variation, array $data): Variation
    {
        $variation->update($data);

        return $variation->fresh();
    }

    /**
     * Varyasyon sil
     */
    public function delete(Variation $variation): bool
    {
        return $variation->delete();
    }
}
