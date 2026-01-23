<?php

declare(strict_types=1);

namespace App\Policies\FocusFlow;

use App\Models\FocusFlow\Goal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GoalPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Goal $goal): bool
    {
        return $user->id === $goal->user_id;
    }

    public function update(User $user, Goal $goal): bool
    {
        return $user->id === $goal->user_id;
    }

    public function delete(User $user, Goal $goal): bool
    {
        return $user->id === $goal->user_id;
    }
}
