<?php

declare(strict_types=1);

namespace App\Http\Controllers\FocusFlow\Api;

use App\Http\Controllers\Controller;
use App\Models\FocusFlow\Reminder;
use App\Services\FocusFlow\ReminderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'FocusFlow Reminders', description: 'FocusFlow Reminder management endpoints')]
class ReminderController extends Controller
{
    public function __construct(
        protected ReminderService $reminderService
    ) {}

    #[OA\Get(
        path: '/api/v1/reminders',
        summary: 'Get all reminders',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Reminders']
    )]
    #[OA\Parameter(name: 'completed', in: 'query', required: false, schema: new OA\Schema(type: 'boolean'))]
    #[OA\Parameter(name: 'upcoming', in: 'query', required: false, schema: new OA\Schema(type: 'boolean'))]
    #[OA\Parameter(name: 'category', in: 'query', required: false, schema: new OA\Schema(type: 'string'))]
    #[OA\Response(
        response: 200,
        description: 'List of reminders',
        content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/Reminder'))
    )]
    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['completed', 'upcoming', 'category']);
        $reminders = $this->reminderService->getAll($request->user(), $filters);

        return response()->json($reminders);
    }

    #[OA\Post(
        path: '/api/v1/reminders',
        summary: 'Create a new reminder',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Reminders']
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['title', 'datetime'],
            properties: [
                new OA\Property(property: 'title', type: 'string', example: 'New Reminder'),
                new OA\Property(property: 'description', type: 'string', nullable: true),
                new OA\Property(property: 'datetime', type: 'string', format: 'date-time', example: '2025-01-21T14:30:00Z'),
                new OA\Property(property: 'priority', type: 'string', enum: ['Düşük', 'Orta', 'Yüksek', 'Kritik']),
                new OA\Property(property: 'category', type: 'string', example: 'Kişisel'),
                new OA\Property(property: 'recurring_config', type: 'object', nullable: true),
            ]
        )
    )]
    #[OA\Response(
        response: 201,
        description: 'Reminder created',
        content: new OA\JsonContent(ref: '#/components/schemas/Reminder')
    )]
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'datetime' => ['required', 'date'],
            'priority' => ['nullable', 'in:Düşük,Orta,Yüksek,Kritik'],
            'category' => ['nullable', 'string'],
            'recurring_config' => ['nullable', 'array'],
        ]);

        $reminder = $this->reminderService->create($request->user(), $data);

        return response()->json($reminder, 201);
    }

    #[OA\Get(
        path: '/api/v1/reminders/{id}',
        summary: 'Get a specific reminder',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Reminders']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(
        response: 200,
        description: 'Reminder details',
        content: new OA\JsonContent(ref: '#/components/schemas/Reminder')
    )]
    public function show(Reminder $reminder): JsonResponse
    {
        $this->authorize('view', $reminder);

        return response()->json($reminder);
    }

    #[OA\Put(
        path: '/api/v1/reminders/{id}',
        summary: 'Update a reminder',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Reminders']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'title', type: 'string'),
                new OA\Property(property: 'description', type: 'string', nullable: true),
                new OA\Property(property: 'datetime', type: 'string', format: 'date-time'),
                new OA\Property(property: 'priority', type: 'string', enum: ['Düşük', 'Orta', 'Yüksek', 'Kritik']),
                new OA\Property(property: 'category', type: 'string'),
                new OA\Property(property: 'recurring_config', type: 'object', nullable: true),
            ]
        )
    )]
    #[OA\Response(
        response: 200,
        description: 'Reminder updated',
        content: new OA\JsonContent(ref: '#/components/schemas/Reminder')
    )]
    public function update(Request $request, Reminder $reminder): JsonResponse
    {
        $this->authorize('update', $reminder);

        $data = $request->validate([
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'datetime' => ['sometimes', 'date'],
            'priority' => ['nullable', 'in:Düşük,Orta,Yüksek,Kritik'],
            'category' => ['nullable', 'string'],
            'recurring_config' => ['nullable', 'array'],
        ]);

        $this->reminderService->update($reminder, $data);

        return response()->json($reminder->fresh());
    }

    #[OA\Delete(
        path: '/api/v1/reminders/{id}',
        summary: 'Delete a reminder',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Reminders']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(response: 200, description: 'Reminder deleted')]
    public function destroy(Reminder $reminder): JsonResponse
    {
        $this->authorize('delete', $reminder);

        $this->reminderService->delete($reminder);

        return response()->json(['message' => 'Reminder deleted successfully']);
    }

    #[OA\Post(
        path: '/api/v1/reminders/{id}/complete',
        summary: 'Complete a reminder',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Reminders']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(
        response: 200,
        description: 'Reminder completed',
        content: new OA\JsonContent(ref: '#/components/schemas/Reminder')
    )]
    public function complete(Reminder $reminder): JsonResponse
    {
        $this->authorize('update', $reminder);

        $this->reminderService->complete($reminder);

        return response()->json($reminder->fresh());
    }

    #[OA\Post(
        path: '/api/v1/reminders/{id}/snooze',
        summary: 'Snooze a reminder',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Reminders']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['minutes'],
            properties: [
                new OA\Property(property: 'minutes', type: 'integer', enum: [5, 10, 30], example: 10),
            ]
        )
    )]
    #[OA\Response(
        response: 200,
        description: 'Reminder snoozed',
        content: new OA\JsonContent(ref: '#/components/schemas/Reminder')
    )]
    public function snooze(Request $request, Reminder $reminder): JsonResponse
    {
        $this->authorize('update', $reminder);

        $data = $request->validate([
            'minutes' => ['required', 'integer', 'in:5,10,30'],
        ]);

        $this->reminderService->snooze($reminder, $data['minutes']);

        return response()->json($reminder->fresh());
    }

    #[OA\Get(
        path: '/api/v1/reminders/upcoming',
        summary: 'Get upcoming reminders',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Reminders']
    )]
    #[OA\Parameter(name: 'limit', in: 'query', required: false, schema: new OA\Schema(type: 'integer', default: 10))]
    #[OA\Response(
        response: 200,
        description: 'Upcoming reminders',
        content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/Reminder'))
    )]
    public function upcoming(Request $request): JsonResponse
    {
        $limit = $request->input('limit', 10);
        $reminders = $this->reminderService->getUpcoming($request->user(), $limit);

        return response()->json($reminders);
    }
}
