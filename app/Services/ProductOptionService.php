<?php

namespace App\Services;

use App\Models\ProductOption;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductOptionService
{
    /**
     * Ürün seçeneklerini listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = ProductOption::query()
            ->with('values')
            ->orderBy('sort_order')
            ->orderBy('name');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('description', 'like', '%' . $filters['search'] . '%');
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
     * Ürün seçeneği oluştur
     */
    public function create(array $data): ProductOption
    {
        $values = $data['values'] ?? [];
        unset($data['values']);

        $option = ProductOption::create($data);

        if (!empty($values)) {
            foreach ($values as $valueData) {
                $option->values()->create($valueData);
            }
        }

        return $option->load('values');
    }

    /**
     * Ürün seçeneği güncelle
     */
    public function update(ProductOption $option, array $data): ProductOption
    {
        $values = $data['values'] ?? [];
        unset($data['values']);

        $option->update($data);

        // Değerleri güncelle
        if (isset($values)) {
            // Mevcut değerleri sil
            $option->values()->delete();

            // Yeni değerleri ekle
            foreach ($values as $valueData) {
                $option->values()->create($valueData);
            }
        }

        return $option->fresh(['values']);
    }

    /**
     * Ürün seçeneği sil
     */
    public function delete(ProductOption $option): bool
    {
        return $option->delete();
    }

    /**
     * Tüm aktif seçenekleri getir
     */
    public function allActive(): Collection
    {
        return ProductOption::query()
            ->with('values')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();
    }
}
