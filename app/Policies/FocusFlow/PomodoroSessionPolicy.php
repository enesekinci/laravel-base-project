<?php

declare(strict_types=1);

namespace App\Policies\FocusFlow;

use App\Models\FocusFlow\PomodoroSession;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PomodoroSessionPolicy
{
    use HandlesAuthorization;

    public function view(User $user, PomodoroSession $session): bool
    {
        return $user->id === $session->user_id;
    }

    public function update(User $user, PomodoroSession $session): bool
    {
        return $user->id === $session->user_id;
    }

    public function delete(User $user, PomodoroSession $session): bool
    {
        return $user->id === $session->user_id;
    }
}
