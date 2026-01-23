<?php

declare(strict_types=1);

namespace App\Http\Controllers\FocusFlow\Api;

use App\Http\Controllers\Controller;
use App\Services\FocusFlow\PomodoroService;
use App\Services\FocusFlow\ReminderService;
use App\Services\FocusFlow\StatisticsService;
use App\Services\FocusFlow\TodoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'FocusFlow Dashboard', description: 'FocusFlow Dashboard endpoints')]
class DashboardController extends Controller
{
    public function __construct(
        protected TodoService $todoService,
        protected PomodoroService $pomodoroService,
        protected ReminderService $reminderService,
        protected StatisticsService $statisticsService
    ) {}

    #[OA\Get(
        path: '/api/v1/dashboard',
        summary: 'Get dashboard overview',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Dashboard']
    )]
    #[OA\Response(
        response: 200,
        description: 'Dashboard data',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'today_todos', type: 'array', items: new OA\Items(ref: '#/components/schemas/Todo')),
                new OA\Property(property: 'upcoming_reminders', type: 'array', items: new OA\Items(ref: '#/components/schemas/Reminder')),
                new OA\Property(property: 'today_pomodoro_count', type: 'integer'),
                new OA\Property(property: 'today_stats', type: 'object'),
                new OA\Property(property: 'active_goals', type: 'array', items: new OA\Items(ref: '#/components/schemas/Goal')),
            ]
        )
    )]
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();

        // Bugünkü görevler
        $todayTodos = $this->todoService->getAll($user, [
            'deadline' => 'today',
            'completed' => false,
        ]);

        // Yaklaşan hatırlatıcılar
        $upcomingReminders = $this->reminderService->getUpcoming($user, 5);

        // Bugünkü pomodoro sayısı
        $todayPomodoroCount = $this->pomodoroService->getTodayCount($user);

        // Bugünkü istatistikler
        $todayStats = $this->statisticsService->getOrCreate($user, now());

        // Aktif hedefler (tamamlanmamış)
        $activeGoals = \App\Models\FocusFlow\Goal::where('user_id', $user->id)
            ->where('completed', false)
            ->orderBy('target_date', 'asc')
            ->limit(5)
            ->get();

        return response()->json([
            'today_todos' => $todayTodos,
            'upcoming_reminders' => $upcomingReminders,
            'today_pomodoro_count' => $todayPomodoroCount,
            'today_stats' => $todayStats,
            'active_goals' => $activeGoals,
        ]);
    }
}
