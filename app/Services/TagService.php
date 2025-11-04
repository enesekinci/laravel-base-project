<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

class TagService
{
    /**
     * Etiketleri listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Tag::query()->orderBy('name');

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
     * Etiket oluştur
     */
    public function create(array $data): Tag
    {
        return Tag::create($data);
    }

    /**
     * Etiket güncelle
     */
    public function update(Tag $tag, array $data): Tag
    {
        $tag->update($data);

        return $tag->fresh();
    }

    /**
     * Etiket sil
     */
    public function delete(Tag $tag): bool
    {
        return $tag->delete();
    }
}
