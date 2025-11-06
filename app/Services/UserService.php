<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    /**
     * Kullanıcıları listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = User::query()
            ->with('groups:id,name');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('email', 'like', '%' . $filters['search'] . '%');
            });
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Kullanıcı oluştur
     */
    public function create(array $data): User
    {
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user = User::create($data);

        if (isset($data['group_ids'])) {
            $user->groups()->sync($data['group_ids']);
        }

        return $user->load('groups');
    }

    /**
     * Kullanıcı güncelle
     */
    public function update(User $user, array $data): User
    {
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        if (isset($data['group_ids'])) {
            $user->groups()->sync($data['group_ids']);
        }

        return $user->fresh()->load('groups');
    }

    /**
     * Kullanıcı sil
     */
    public function delete(User $user): bool
    {
        return $user->delete();
    }
}

