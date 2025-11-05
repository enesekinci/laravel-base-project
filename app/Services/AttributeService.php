<?php

namespace App\Services;

use App\Models\Attribute;
use Illuminate\Pagination\LengthAwarePaginator;

class AttributeService
{
    /**
     * Özellikleri listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Attribute::query()
            ->with(['values', 'attributeSet', 'categories'])
            ->orderBy('sort_order')
            ->orderBy('name');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_filterable'])) {
            $query->where('is_filterable', $filters['is_filterable']);
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Özellik oluştur
     */
    public function create(array $data): Attribute
    {
        $values = $data['values'] ?? [];
        $categoryIds = $data['category_ids'] ?? [];
        unset($data['values'], $data['category_ids']);

        $attribute = Attribute::create($data);

        // Kategorileri ekle
        if (!empty($categoryIds)) {
            $attribute->categories()->sync($categoryIds);
        }

        // Değerleri ekle
        if (!empty($values)) {
            foreach ($values as $valueData) {
                $attribute->values()->create($valueData);
            }
        }

        return $attribute->load(['values', 'attributeSet', 'categories']);
    }

    /**
     * Özellik güncelle
     */
    public function update(Attribute $attribute, array $data): Attribute
    {
        $values = $data['values'] ?? [];
        $categoryIds = $data['category_ids'] ?? [];
        unset($data['values'], $data['category_ids']);

        $attribute->update($data);

        // Kategorileri güncelle
        if (isset($categoryIds)) {
            $attribute->categories()->sync($categoryIds);
        }

        // Değerleri güncelle
        if (isset($values)) {
            // Mevcut değerleri sil
            $attribute->values()->delete();

            // Yeni değerleri ekle
            foreach ($values as $valueData) {
                $attribute->values()->create($valueData);
            }
        }

        return $attribute->fresh(['values', 'attributeSet', 'categories']);
    }

    /**
     * Özellik sil
     */
    public function delete(Attribute $attribute): bool
    {
        return $attribute->delete();
    }
}
