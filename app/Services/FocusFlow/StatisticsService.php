<?php

declare(strict_types=1);

namespace App\Services\FocusFlow;

use App\Models\FocusFlow\PomodoroSession;
use App\Models\FocusFlow\Statistic;
use App\Models\FocusFlow\Todo;
use App\Models\User;
use Carbon\Carbon;

class StatisticsService
{
    public function getOrCreate(User $user, Carbon $date): Statistic
    {
        return Statistic::firstOrCreate(
            [
                'user_id' => $user->id,
                'date' => $date->format('Y-m-d'),
            ],
            [
                'completed_todos_count' => 0,
                'pomodoro_count' => 0,
                'focus_duration_minutes' => 0,
                'streak_days' => 0,
            ]
        );
    }

    public function updateDaily(User $user, Carbon $date): void
    {
        $statistic = $this->getOrCreate($user, $date);

        // Tamamlanan görev sayısı
        $completedTodos = Todo::where('user_id', $user->id)
            ->whereDate('updated_at', $date->format('Y-m-d'))
            ->where('completed', true)
            ->count();

        // Pomodoro sayısı
        $pomodoroCount = PomodoroSession::where('user_id', $user->id)
            ->whereDate('start_time', $date->format('Y-m-d'))
            ->where('type', 'work')
            ->where('completed', true)
            ->count();

        // Toplam odaklanma süresi (dakika)
        $focusDuration = PomodoroSession::where('user_id', $user->id)
            ->whereDate('start_time', $date->format('Y-m-d'))
            ->where('type', 'work')
            ->where('completed', true)
            ->sum('duration');

        // Streak hesaplama
        $streakDays = $this->calculateStreak($user, $date);

        $statistic->update([
            'completed_todos_count' => $completedTodos,
            'pomodoro_count' => $pomodoroCount,
            'focus_duration_minutes' => (int) $focusDuration,
            'streak_days' => $streakDays,
        ]);
    }

    public function calculateStreak(User $user, Carbon $date): int
    {
        $streak = 0;
        $currentDate = $date->copy();

        while (true) {
            $statistic = Statistic::where('user_id', $user->id)
                ->where('date', $currentDate->format('Y-m-d'))
                ->first();

            // Eğer o gün için istatistik yoksa veya hiç görev tamamlanmamışsa streak biter
            if (! $statistic || $statistic->completed_todos_count === 0) {
                break;
            }

            $streak++;
            $currentDate->subDay();
        }

        return $streak;
    }

    public function getWeeklyStats(User $user, Carbon $startDate): array
    {
        $endDate = $startDate->copy()->addDays(6);
        $stats = [];

        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            $statistic = $this->getOrCreate($user, $currentDate);
            $stats[] = [
                'date' => $currentDate->format('Y-m-d'),
                'completed_todos' => $statistic->completed_todos_count,
                'pomodoro_count' => $statistic->pomodoro_count,
                'focus_duration' => $statistic->focus_duration_minutes,
            ];
            $currentDate->addDay();
        }

        return $stats;
    }

    public function getMonthlyStats(User $user, int $year, int $month): array
    {
        $startDate = Carbon::create($year, $month, 1);
        $endDate = $startDate->copy()->endOfMonth();

        $statistics = Statistic::where('user_id', $user->id)
            ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->get();

        return [
            'total_completed_todos' => $statistics->sum('completed_todos_count'),
            'total_pomodoros' => $statistics->sum('pomodoro_count'),
            'total_focus_duration' => $statistics->sum('focus_duration_minutes'),
            'average_daily_todos' => round($statistics->avg('completed_todos_count'), 2),
            'average_daily_pomodoros' => round($statistics->avg('pomodoro_count'), 2),
        ];
    }
}
