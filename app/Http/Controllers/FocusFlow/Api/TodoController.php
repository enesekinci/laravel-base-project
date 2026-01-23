<?php

declare(strict_types=1);

namespace App\Http\Controllers\FocusFlow\Api;

use App\Http\Controllers\Controller;
use App\Models\FocusFlow\Todo;
use App\Services\FocusFlow\TodoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'FocusFlow Todos', description: 'FocusFlow Todo management endpoints')]
class TodoController extends Controller
{
    public function __construct(
        protected TodoService $todoService
    ) {}

    #[OA\Get(
        path: '/api/v1/todos',
        summary: 'Get all todos',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Todos']
    )]
    #[OA\Parameter(name: 'completed', in: 'query', description: 'Filter by completion status', required: false, schema: new OA\Schema(type: 'boolean'))]
    #[OA\Response(
        response: 200,
        description: 'List of todos',
        content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/Todo'))
    )]
    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['completed', 'category', 'priority', 'deadline']);
        $todos = $this->todoService->getAll($request->user(), $filters);

        return response()->json($todos);
    }

    #[OA\Post(
        path: '/api/v1/todos',
        summary: 'Create a new todo',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Todos']
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['title'],
            properties: [
                new OA\Property(property: 'title', type: 'string', example: 'New Task'),
                new OA\Property(property: 'description', type: 'string', nullable: true),
                new OA\Property(property: 'category', type: 'string', example: 'İş'),
                new OA\Property(property: 'priority', type: 'string', enum: ['Düşük', 'Orta', 'Yüksek', 'Kritik'], example: 'Orta'),
                new OA\Property(property: 'deadline', type: 'string', format: 'date-time', nullable: true),
                new OA\Property(property: 'order', type: 'integer', example: 0),
                new OA\Property(property: 'subtasks', type: 'array', items: new OA\Items(
                    properties: [
                        new OA\Property(property: 'title', type: 'string', example: 'Subtask 1'),
                        new OA\Property(property: 'order', type: 'integer', example: 0),
                    ]
                )),
            ]
        )
    )]
    #[OA\Response(
        response: 201,
        description: 'Todo created',
        content: new OA\JsonContent(ref: '#/components/schemas/Todo')
    )]
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category' => ['nullable', 'string'],
            'priority' => ['nullable', 'in:Düşük,Orta,Yüksek,Kritik'],
            'deadline' => ['nullable', 'date'],
            'order' => ['nullable', 'integer'],
            'recurring_config' => ['nullable', 'array'],
            'subtasks' => ['nullable', 'array'],
            'subtasks.*.title' => ['required', 'string'],
            'subtasks.*.order' => ['nullable', 'integer'],
        ]);

        $todo = $this->todoService->create($request->user(), $data);

        return response()->json($todo, 201);
    }

    #[OA\Get(
        path: '/api/v1/todos/{id}',
        summary: 'Get a specific todo',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Todos']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(
        response: 200,
        description: 'Todo details',
        content: new OA\JsonContent(ref: '#/components/schemas/Todo')
    )]
    public function show(Todo $todo): JsonResponse
    {
        $this->authorize('view', $todo);

        return response()->json($todo->load('subtasks'));
    }

    #[OA\Put(
        path: '/api/v1/todos/{id}',
        summary: 'Update a todo',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Todos']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'title', type: 'string'),
                new OA\Property(property: 'description', type: 'string', nullable: true),
                new OA\Property(property: 'category', type: 'string'),
                new OA\Property(property: 'priority', type: 'string', enum: ['Düşük', 'Orta', 'Yüksek', 'Kritik']),
                new OA\Property(property: 'deadline', type: 'string', format: 'date-time', nullable: true),
                new OA\Property(property: 'order', type: 'integer'),
                new OA\Property(property: 'subtasks', type: 'array', items: new OA\Items(
                    properties: [
                        new OA\Property(property: 'title', type: 'string'),
                        new OA\Property(property: 'completed', type: 'boolean'),
                        new OA\Property(property: 'order', type: 'integer'),
                    ]
                )),
            ]
        )
    )]
    #[OA\Response(
        response: 200,
        description: 'Todo updated',
        content: new OA\JsonContent(ref: '#/components/schemas/Todo')
    )]
    public function update(Request $request, Todo $todo): JsonResponse
    {
        $this->authorize('update', $todo);

        $data = $request->validate([
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category' => ['nullable', 'string'],
            'priority' => ['nullable', 'in:Düşük,Orta,Yüksek,Kritik'],
            'deadline' => ['nullable', 'date'],
            'order' => ['nullable', 'integer'],
            'recurring_config' => ['nullable', 'array'],
            'subtasks' => ['nullable', 'array'],
            'subtasks.*.title' => ['required', 'string'],
            'subtasks.*.completed' => ['nullable', 'boolean'],
            'subtasks.*.order' => ['nullable', 'integer'],
        ]);

        $this->todoService->update($todo, $data);

        return response()->json($todo->fresh()->load('subtasks'));
    }

    #[OA\Delete(
        path: '/api/v1/todos/{id}',
        summary: 'Delete a todo',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Todos']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(response: 200, description: 'Todo deleted')]
    public function destroy(Todo $todo): JsonResponse
    {
        $this->authorize('delete', $todo);

        $this->todoService->delete($todo);

        return response()->json(['message' => 'Todo deleted successfully']);
    }

    #[OA\Post(
        path: '/api/v1/todos/{id}/complete',
        summary: 'Complete a todo',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Todos']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(
        response: 200,
        description: 'Todo completed',
        content: new OA\JsonContent(ref: '#/components/schemas/Todo')
    )]
    public function complete(Todo $todo): JsonResponse
    {
        $this->authorize('update', $todo);

        $this->todoService->complete($todo);

        return response()->json($todo->fresh()->load('subtasks'));
    }

    #[OA\Post(
        path: '/api/v1/todos/reorder',
        summary: 'Reorder todos',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Todos']
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'todo_ids', type: 'array', items: new OA\Items(type: 'integer')),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Todos reordered')]
    public function reorder(Request $request): JsonResponse
    {
        $data = $request->validate([
            'todo_ids' => ['required', 'array'],
            'todo_ids.*' => ['required', 'integer', 'exists:todos,id'],
        ]);

        $this->todoService->reorder($request->user(), $data['todo_ids']);

        return response()->json(['message' => 'Todos reordered successfully']);
    }
}
