<?php

declare(strict_types=1);

namespace App\Livewire\FocusFlow\Admin\Dashboard;

use App\Services\FocusFlow\PomodoroService;
use App\Services\FocusFlow\ReminderService;
use App\Services\FocusFlow\StatisticsService;
use App\Services\FocusFlow\TodoService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DashboardOverview extends Component
{
    public function render(
        TodoService $todoService,
        PomodoroService $pomodoroService,
        ReminderService $reminderService,
        StatisticsService $statisticsService
    ): View {
        $user = auth()->user();

        // Bugünkü görevler
        $todayTodos = $todoService->getAll($user, [
            'deadline' => 'today',
            'completed' => false,
        ]);

        // Yaklaşan hatırlatıcılar
        $upcomingReminders = $reminderService->getUpcoming($user, 5);

        // Bugünkü pomodoro sayısı
        $todayPomodoroCount = $pomodoroService->getTodayCount($user);

        // Bugünkü istatistikler
        $todayStats = $statisticsService->getOrCreate($user, now());

        // Aktif hedefler
        $activeGoals = \App\Models\FocusFlow\Goal::where('user_id', $user->id)
            ->where('completed', false)
            ->orderBy('target_date', 'asc')
            ->limit(5)
            ->get();

        return view('livewire.focusflow.admin.dashboard.dashboard-overview', [
            'todayTodos' => $todayTodos,
            'upcomingReminders' => $upcomingReminders,
            'todayPomodoroCount' => $todayPomodoroCount,
            'todayStats' => $todayStats,
            'activeGoals' => $activeGoals,
        ]);
    }
}
