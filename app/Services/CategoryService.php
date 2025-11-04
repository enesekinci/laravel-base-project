<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    /**
     * Kategorileri listele (tree görünümü için tümünü getir)
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Category::query()
            ->with('parent:id,name')
            ->ordered();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('slug', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['parent_id'])) {
            $query->where('parent_id', $filters['parent_id']);
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        // Tree görünümü için tüm kayıtları getir (pagination olmadan)
        if (!isset($filters['per_page']) || $filters['per_page'] === 'all') {
            $all = $query->get();
            return new LengthAwarePaginator(
                $all,
                $all->count(),
                $all->count(),
                1
            );
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Kategori oluştur
     */
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    /**
     * Kategori güncelle
     */
    public function update(Category $category, array $data): Category
    {
        $category->update($data);

        return $category->fresh();
    }

    /**
     * Kategori sil
     */
    public function delete(Category $category): bool
    {
        return $category->delete();
    }

    /**
     * Tüm kategorileri getir (tree yapısı için - düz liste olarak, tüm kategoriler)
     */
    public function allTree(): Collection
    {
        return Category::query()
            ->with('parent:id,name')
            ->ordered()
            ->get();
    }
}
