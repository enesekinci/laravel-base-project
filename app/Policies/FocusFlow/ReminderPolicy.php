<?php

declare(strict_types=1);

namespace App\Policies\FocusFlow;

use App\Models\FocusFlow\Reminder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReminderPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Reminder $reminder): bool
    {
        return $user->id === $reminder->user_id;
    }

    public function update(User $user, Reminder $reminder): bool
    {
        return $user->id === $reminder->user_id;
    }

    public function delete(User $user, Reminder $reminder): bool
    {
        return $user->id === $reminder->user_id;
    }
}
