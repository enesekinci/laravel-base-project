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
            ->with('values')
            ->orderBy('sort_order')
            ->orderBy('name');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('slug', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
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
        return Attribute::create($data);
    }

    /**
     * Özellik güncelle
     */
    public function update(Attribute $attribute, array $data): Attribute
    {
        $attribute->update($data);

        return $attribute->fresh()->load('values');
    }

    /**
     * Özellik sil
     */
    public function delete(Attribute $attribute): bool
    {
        return $attribute->delete();
    }
}
