<?php

declare(strict_types=1);

namespace App\Services\FocusFlow;

use App\Models\FocusFlow\Reminder;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ReminderService
{
    public function getAll(User $user, array $filters = []): Collection
    {
        $query = Reminder::where('user_id', $user->id);

        if (isset($filters['completed'])) {
            $query->where('completed', $filters['completed']);
        }

        if (isset($filters['upcoming'])) {
            $query->where('datetime', '>', now())
                ->where('completed', false);
        }

        if (isset($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        return $query->orderBy('datetime')->get();
    }

    public function create(User $user, array $data): Reminder
    {
        return Reminder::create([
            'user_id' => $user->id,
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'datetime' => $data['datetime'],
            'priority' => $data['priority'] ?? 'Orta',
            'category' => $data['category'] ?? 'Kişisel',
            'recurring_config' => $data['recurring_config'] ?? null,
        ]);
    }

    public function update(Reminder $reminder, array $data): bool
    {
        return (bool) $reminder->update($data);
    }

    public function complete(Reminder $reminder): bool
    {
        return (bool) $reminder->update(['completed' => true]);
    }

    public function snooze(Reminder $reminder, int $minutes): bool
    {
        return (bool) $reminder->update([
            'snoozed_until' => now()->addMinutes($minutes),
        ]);
    }

    public function delete(Reminder $reminder): bool
    {
        return (bool) $reminder->delete();
    }

    public function getUpcoming(User $user, int $limit = 10): Collection
    {
        return Reminder::where('user_id', $user->id)
            ->where('datetime', '>', now())
            ->where('completed', false)
            ->where(function ($query) {
                $query->whereNull('snoozed_until')
                    ->orWhere('snoozed_until', '<=', now());
            })
            ->orderBy('datetime')
            ->limit($limit)
            ->get();
    }
}
