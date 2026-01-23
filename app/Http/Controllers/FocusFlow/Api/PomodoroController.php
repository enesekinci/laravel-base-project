<?php

declare(strict_types=1);

namespace App\Http\Controllers\FocusFlow\Api;

use App\Http\Controllers\Controller;
use App\Models\FocusFlow\PomodoroSession;
use App\Services\FocusFlow\PomodoroService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'FocusFlow Pomodoro', description: 'FocusFlow Pomodoro management endpoints')]
class PomodoroController extends Controller
{
    public function __construct(
        protected PomodoroService $pomodoroService
    ) {}

    #[OA\Get(
        path: '/api/v1/pomodoro/sessions',
        summary: 'Get pomodoro sessions',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Pomodoro']
    )]
    #[OA\Parameter(name: 'date', in: 'query', required: false, schema: new OA\Schema(type: 'string', format: 'date'))]
    #[OA\Parameter(name: 'type', in: 'query', required: false, schema: new OA\Schema(type: 'string', enum: ['work', 'short-break', 'long-break']))]
    #[OA\Response(
        response: 200,
        description: 'List of sessions',
        content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/PomodoroSession'))
    )]
    public function sessions(Request $request): JsonResponse
    {
        $filters = $request->only(['date', 'type']);
        $sessions = $this->pomodoroService->getSessions($request->user(), $filters);

        return response()->json($sessions);
    }

    #[OA\Post(
        path: '/api/v1/pomodoro/sessions',
        summary: 'Start a new pomodoro session',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Pomodoro']
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'todo_id', type: 'integer', nullable: true),
                new OA\Property(property: 'task_title', type: 'string', nullable: true),
                new OA\Property(property: 'duration', type: 'integer', example: 25),
                new OA\Property(property: 'type', type: 'string', enum: ['work', 'short-break', 'long-break'], example: 'work'),
            ]
        )
    )]
    #[OA\Response(
        response: 201,
        description: 'Session started',
        content: new OA\JsonContent(ref: '#/components/schemas/PomodoroSession')
    )]
    public function startSession(Request $request): JsonResponse
    {
        $data = $request->validate([
            'todo_id' => ['nullable', 'integer', 'exists:todos,id'],
            'task_title' => ['nullable', 'string', 'max:255'],
            'duration' => ['nullable', 'integer', 'min:1'],
            'type' => ['nullable', 'in:work,short-break,long-break'],
        ]);

        $session = $this->pomodoroService->startSession($request->user(), $data);

        return response()->json($session, 201);
    }

    #[OA\Post(
        path: '/api/v1/pomodoro/sessions/{id}/complete',
        summary: 'Complete a pomodoro session',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Pomodoro']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(
        response: 200,
        description: 'Session completed',
        content: new OA\JsonContent(ref: '#/components/schemas/PomodoroSession')
    )]
    public function completeSession(PomodoroSession $session): JsonResponse
    {
        $this->authorize('update', $session);

        $this->pomodoroService->completeSession($session);

        return response()->json($session->fresh());
    }

    #[OA\Get(
        path: '/api/v1/pomodoro/settings',
        summary: 'Get pomodoro settings',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Pomodoro']
    )]
    #[OA\Response(
        response: 200,
        description: 'User settings',
        content: new OA\JsonContent(ref: '#/components/schemas/PomodoroSetting')
    )]
    public function settings(Request $request): JsonResponse
    {
        $settings = $this->pomodoroService->getSettings($request->user());

        return response()->json($settings);
    }

    #[OA\Put(
        path: '/api/v1/pomodoro/settings',
        summary: 'Update pomodoro settings',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Pomodoro']
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'work_duration', type: 'integer'),
                new OA\Property(property: 'short_break_duration', type: 'integer'),
                new OA\Property(property: 'long_break_duration', type: 'integer'),
                new OA\Property(property: 'pomodoros_until_long_break', type: 'integer'),
                new OA\Property(property: 'auto_start_breaks', type: 'boolean'),
                new OA\Property(property: 'auto_start_pomodoros', type: 'boolean'),
                new OA\Property(property: 'sound_enabled', type: 'boolean'),
                new OA\Property(property: 'notification_enabled', type: 'boolean'),
                new OA\Property(property: 'sound_volume', type: 'number', format: 'float'),
            ]
        )
    )]
    #[OA\Response(
        response: 200,
        description: 'Settings updated',
        content: new OA\JsonContent(ref: '#/components/schemas/PomodoroSetting')
    )]
    public function updateSettings(Request $request): JsonResponse
    {
        $data = $request->validate([
            'work_duration' => ['sometimes', 'integer', 'min:1'],
            'short_break_duration' => ['sometimes', 'integer', 'min:1'],
            'long_break_duration' => ['sometimes', 'integer', 'min:1'],
            'pomodoros_until_long_break' => ['sometimes', 'integer', 'min:1'],
            'auto_start_breaks' => ['sometimes', 'boolean'],
            'auto_start_pomodoros' => ['sometimes', 'boolean'],
            'sound_enabled' => ['sometimes', 'boolean'],
            'notification_enabled' => ['sometimes', 'boolean'],
            'sound_volume' => ['sometimes', 'numeric', 'min:0', 'max:1'],
        ]);

        $this->pomodoroService->updateSettings($request->user(), $data);

        return response()->json($this->pomodoroService->getSettings($request->user()));
    }

    #[OA\Get(
        path: '/api/v1/pomodoro/today-count',
        summary: "Get today's pomodoro count",
        security: [['sanctum' => []]],
        tags: ['FocusFlow Pomodoro']
    )]
    #[OA\Response(
        response: 200,
        description: "Today's count",
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'count', type: 'integer', example: 5),
            ]
        )
    )]
    public function todayCount(Request $request): JsonResponse
    {
        $count = $this->pomodoroService->getTodayCount($request->user());

        return response()->json(['count' => $count]);
    }
}
