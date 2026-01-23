<?php

declare(strict_types=1);

namespace App\Policies\FocusFlow;

use App\Models\FocusFlow\Todo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Todo $todo): bool
    {
        return $user->id === $todo->user_id;
    }

    public function update(User $user, Todo $todo): bool
    {
        return $user->id === $todo->user_id;
    }

    public function delete(User $user, Todo $todo): bool
    {
        return $user->id === $todo->user_id;
    }
}
