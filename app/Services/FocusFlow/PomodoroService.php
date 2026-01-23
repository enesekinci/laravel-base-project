<?php

declare(strict_types=1);

namespace App\Services\FocusFlow;

use App\Models\FocusFlow\PomodoroSession;
use App\Models\FocusFlow\PomodoroSetting;
use App\Models\FocusFlow\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PomodoroService
{
    public function getSessions(User $user, array $filters = []): Collection
    {
        $query = PomodoroSession::where('user_id', $user->id);

        if (isset($filters['date'])) {
            $query->whereDate('start_time', $filters['date']);
        }

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        return $query->with('todo')->orderBy('start_time', 'desc')->get();
    }

    public function startSession(User $user, array $data): PomodoroSession
    {
        return DB::transaction(function () use ($user, $data) {
            $todo = null;
            $taskTitle = null;

            if (isset($data['todo_id'])) {
                $todo = Todo::find($data['todo_id']);
                $taskTitle = $todo?->title;
            } elseif (isset($data['task_title'])) {
                $taskTitle = $data['task_title'];
            }

            return PomodoroSession::create([
                'user_id' => $user->id,
                'todo_id' => $todo?->id,
                'task_title' => $taskTitle,
                'start_time' => now(),
                'duration' => $data['duration'] ?? 25,
                'type' => $data['type'] ?? 'work',
                'completed' => false,
            ]);
        });
    }

    public function completeSession(PomodoroSession $session): bool
    {
        return $session->update([
            'end_time' => now(),
            'completed' => true,
        ]);
    }

    public function getSettings(User $user): PomodoroSetting
    {
        return PomodoroSetting::firstOrCreate(
            ['user_id' => $user->id],
            [
                'work_duration' => 25,
                'short_break_duration' => 5,
                'long_break_duration' => 15,
                'pomodoros_until_long_break' => 4,
                'auto_start_breaks' => false,
                'auto_start_pomodoros' => false,
                'sound_enabled' => true,
                'notification_enabled' => true,
                'sound_volume' => 0.70,
            ]
        );
    }

    public function updateSettings(User $user, array $data): bool
    {
        $settings = $this->getSettings($user);

        return $settings->update($data);
    }

    public function getTodayCount(User $user): int
    {
        return PomodoroSession::where('user_id', $user->id)
            ->whereDate('start_time', today())
            ->where('type', 'work')
            ->where('completed', true)
            ->count();
    }

    public function getTotalFocusTime(User $user, ?\Carbon\Carbon $startDate = null, ?\Carbon\Carbon $endDate = null): int
    {
        $query = PomodoroSession::where('user_id', $user->id)
            ->where('type', 'work')
            ->where('completed', true);

        if ($startDate) {
            $query->where('start_time', '>=', $startDate);
        }

        if ($endDate) {
            $query->where('start_time', '<=', $endDate);
        }

        return (int) $query->sum('duration');
    }
}
