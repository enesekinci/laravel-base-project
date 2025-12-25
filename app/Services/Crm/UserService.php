<?php

declare(strict_types=1);

namespace App\Services\Crm;

use App\Models\Crm\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    /**
     * Get all users.
     */
    public function getAll(): Collection
    {
        return User::orderBy('name')->get();
    }

    /**
     * Get user by ID.
     */
    public function find(int $id): ?User
    {
        return User::find($id);
    }

    /**
     * Create a new user.
     */
    public function create(array $data): User
    {
        return User::create($data);
    }

    /**
     * Update a user.
     */
    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }

    /**
     * Delete a user.
     */
    public function delete(User $user): bool
    {
        return $user->delete();
    }
}
