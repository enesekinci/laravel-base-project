<?php

declare(strict_types=1);

namespace App\Services\Crm;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function getAll(): Collection
    {
        return User::orderBy('name')->get();
    }

    public function find(int $id): ?User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(User $user, array $data): bool
    {
        return (bool) $user->update($data);
    }

    public function delete(User $user): bool
    {
        return (bool) $user->delete();
    }
}
