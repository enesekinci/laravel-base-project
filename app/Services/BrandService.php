<?php

namespace App\Services;

use App\Models\Brand;
use Illuminate\Pagination\LengthAwarePaginator;

class BrandService
{
    /**
     * Markaları listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Brand::query()->ordered();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('slug', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Marka oluştur
     */
    public function create(array $data): Brand
    {
        return Brand::create($data);
    }

    /**
     * Marka güncelle
     */
    public function update(Brand $brand, array $data): Brand
    {
        $brand->update($data);

        return $brand->fresh();
    }

    /**
     * Marka sil
     */
    public function delete(Brand $brand): bool
    {
        return $brand->delete();
    }
}
