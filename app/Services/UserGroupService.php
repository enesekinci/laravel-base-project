<?php

namespace App\Services;

use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserGroupService
{
    /**
     * Kullanıcı gruplarını listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = UserGroup::query()
            ->withCount('users');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('slug', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('name')
            ->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Tüm kullanıcı gruplarını getir
     */
    public function all(): Collection
    {
        return UserGroup::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
    }

    /**
     * Kullanıcı grubu oluştur
     */
    public function create(array $data): UserGroup
    {
        return UserGroup::create($data);
    }

    /**
     * Kullanıcı grubu güncelle
     */
    public function update(UserGroup $userGroup, array $data): UserGroup
    {
        $userGroup->update($data);

        return $userGroup->fresh();
    }

    /**
     * Kullanıcı grubu sil
     */
    public function delete(UserGroup $userGroup): bool
    {
        return $userGroup->delete();
    }
}

