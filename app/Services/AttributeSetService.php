<?php

namespace App\Services;

use App\Models\AttributeSet;
use Illuminate\Pagination\LengthAwarePaginator;

class AttributeSetService
{
    /**
     * Özellik setlerini listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = AttributeSet::query()
            ->withCount('attributes')
            ->ordered();

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
     * Özellik seti oluştur
     */
    public function create(array $data): AttributeSet
    {
        return AttributeSet::create($data);
    }

    /**
     * Özellik seti güncelle
     */
    public function update(AttributeSet $attributeSet, array $data): AttributeSet
    {
        $attributeSet->update($data);

        return $attributeSet->fresh();
    }

    /**
     * Özellik seti sil
     */
    public function delete(AttributeSet $attributeSet): bool
    {
        return $attributeSet->delete();
    }
}

