<?php

declare(strict_types=1);

namespace App\Http\Controllers\FocusFlow\Api;

use App\Http\Controllers\Controller;
use App\Models\FocusFlow\Goal;
use App\Services\FocusFlow\GoalService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'FocusFlow Goals', description: 'FocusFlow Goal management endpoints')]
class GoalController extends Controller
{
    public function __construct(
        protected GoalService $goalService
    ) {}

    #[OA\Get(
        path: '/api/v1/goals',
        summary: 'Get all goals',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Goals']
    )]
    #[OA\Parameter(name: 'type', in: 'query', required: false, schema: new OA\Schema(type: 'string', enum: ['daily', 'weekly', 'monthly', 'yearly']))]
    #[OA\Parameter(name: 'completed', in: 'query', required: false, schema: new OA\Schema(type: 'boolean'))]
    #[OA\Response(
        response: 200,
        description: 'List of goals',
        content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/Goal'))
    )]
    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['type', 'completed']);
        $goals = $this->goalService->getAll($request->user(), $filters);

        return response()->json($goals);
    }

    #[OA\Post(
        path: '/api/v1/goals',
        summary: 'Create a new goal',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Goals']
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['title', 'type', 'start_date'],
            properties: [
                new OA\Property(property: 'title', type: 'string', example: 'Learn PHP'),
                new OA\Property(property: 'description', type: 'string', nullable: true),
                new OA\Property(property: 'type', type: 'string', enum: ['daily', 'weekly', 'monthly', 'yearly']),
                new OA\Property(property: 'start_date', type: 'string', format: 'date', example: '2025-01-01'),
                new OA\Property(property: 'target_date', type: 'string', format: 'date', nullable: true),
                new OA\Property(property: 'notes', type: 'string', nullable: true),
                new OA\Property(property: 'sub_goals', type: 'array', items: new OA\Items(
                    properties: [
                        new OA\Property(property: 'title', type: 'string', example: 'Basics'),
                    ]
                )),
            ]
        )
    )]
    #[OA\Response(
        response: 201,
        description: 'Goal created',
        content: new OA\JsonContent(ref: '#/components/schemas/Goal')
    )]
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'in:daily,weekly,monthly,yearly'],
            'start_date' => ['required', 'date'],
            'target_date' => ['nullable', 'date'],
            'notes' => ['nullable', 'string'],
            'sub_goals' => ['nullable', 'array'],
            'sub_goals.*.title' => ['required', 'string'],
        ]);

        $goal = $this->goalService->create($request->user(), $data);

        return response()->json($goal, 201);
    }

    #[OA\Get(
        path: '/api/v1/goals/{id}',
        summary: 'Get a specific goal',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Goals']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(
        response: 200,
        description: 'Goal details',
        content: new OA\JsonContent(ref: '#/components/schemas/Goal')
    )]
    public function show(Goal $goal): JsonResponse
    {
        $this->authorize('view', $goal);

        return response()->json($goal->load('subGoals'));
    }

    #[OA\Put(
        path: '/api/v1/goals/{id}',
        summary: 'Update a goal',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Goals']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'title', type: 'string'),
                new OA\Property(property: 'description', type: 'string', nullable: true),
                new OA\Property(property: 'type', type: 'string', enum: ['daily', 'weekly', 'monthly', 'yearly']),
                new OA\Property(property: 'target_date', type: 'string', format: 'date', nullable: true),
                new OA\Property(property: 'notes', type: 'string', nullable: true),
                new OA\Property(property: 'progress', type: 'integer', minimum: 0, maximum: 100),
                new OA\Property(property: 'sub_goals', type: 'array', items: new OA\Items(
                    properties: [
                        new OA\Property(property: 'title', type: 'string'),
                        new OA\Property(property: 'completed', type: 'boolean'),
                    ]
                )),
            ]
        )
    )]
    #[OA\Response(
        response: 200,
        description: 'Goal updated',
        content: new OA\JsonContent(ref: '#/components/schemas/Goal')
    )]
    public function update(Request $request, Goal $goal): JsonResponse
    {
        $this->authorize('update', $goal);

        $data = $request->validate([
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type' => ['sometimes', 'in:daily,weekly,monthly,yearly'],
            'target_date' => ['nullable', 'date'],
            'notes' => ['nullable', 'string'],
            'progress' => ['sometimes', 'integer', 'min:0', 'max:100'],
            'sub_goals' => ['nullable', 'array'],
            'sub_goals.*.title' => ['required', 'string'],
            'sub_goals.*.completed' => ['nullable', 'boolean'],
        ]);

        $this->goalService->update($goal, $data);

        return response()->json($goal->fresh()->load('subGoals'));
    }

    #[OA\Delete(
        path: '/api/v1/goals/{id}',
        summary: 'Delete a goal',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Goals']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(response: 200, description: 'Goal deleted')]
    public function destroy(Goal $goal): JsonResponse
    {
        $this->authorize('delete', $goal);

        $this->goalService->delete($goal);

        return response()->json(['message' => 'Goal deleted successfully']);
    }

    #[OA\Post(
        path: '/api/v1/goals/{id}/complete',
        summary: 'Complete a goal',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Goals']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(
        response: 200,
        description: 'Goal completed',
        content: new OA\JsonContent(ref: '#/components/schemas/Goal')
    )]
    public function complete(Goal $goal): JsonResponse
    {
        $this->authorize('update', $goal);

        $this->goalService->complete($goal);

        return response()->json($goal->fresh()->load('subGoals'));
    }
}
