<?php

declare(strict_types=1);

namespace App\Listeners\FocusFlow;

use App\Models\FocusFlow\Achievement;
use App\Models\User;
use App\Services\FocusFlow\StatisticsService;
use Illuminate\Support\Facades\DB;

class CheckAchievements
{
    public function __construct(
        protected StatisticsService $statisticsService
    ) {}

    public function handle($event): void
    {
        $user = $event->user ?? auth()->user();

        if (! $user) {
            return;
        }

        $this->checkCompletedTodos($user);
        $this->checkCompletedPomodoros($user);
        $this->checkStreak($user);
        $this->checkCompletedGoals($user);
    }

    protected function checkCompletedTodos(User $user): void
    {
        $completedCount = \App\Models\FocusFlow\Todo::where('user_id', $user->id)
            ->where('completed', true)
            ->count();

        $achievements = Achievement::where('condition_type', 'completed_todos')
            ->where('condition_value', '<=', $completedCount)
            ->get();

        $this->unlockAchievements($user, $achievements);
    }

    protected function checkCompletedPomodoros(User $user): void
    {
        $completedCount = \App\Models\FocusFlow\PomodoroSession::where('user_id', $user->id)
            ->where('type', 'work')
            ->where('completed', true)
            ->count();

        $achievements = Achievement::where('condition_type', 'completed_pomodoros')
            ->where('condition_value', '<=', $completedCount)
            ->get();

        $this->unlockAchievements($user, $achievements);
    }

    protected function checkStreak(User $user): void
    {
        $statistic = $this->statisticsService->getOrCreate($user, now());
        $streakDays = $statistic->streak_days;

        $achievements = Achievement::where('condition_type', 'streak_days')
            ->where('condition_value', '<=', $streakDays)
            ->get();

        $this->unlockAchievements($user, $achievements);
    }

    protected function checkCompletedGoals(User $user): void
    {
        $completedCount = \App\Models\FocusFlow\Goal::where('user_id', $user->id)
            ->where('completed', true)
            ->count();

        $achievements = Achievement::where('condition_type', 'completed_goals')
            ->where('condition_value', '<=', $completedCount)
            ->get();

        $this->unlockAchievements($user, $achievements);
    }

    protected function unlockAchievements(User $user, $achievements): void
    {
        foreach ($achievements as $achievement) {
            DB::table('user_achievements')->insertOrIgnore([
                'user_id' => $user->id,
                'achievement_id' => $achievement->id,
                'unlocked_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
