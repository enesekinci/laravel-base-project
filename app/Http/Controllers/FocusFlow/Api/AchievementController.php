<?php

declare(strict_types=1);

namespace App\Http\Controllers\FocusFlow\Api;

use App\Http\Controllers\Controller;
use App\Models\FocusFlow\Achievement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'FocusFlow Achievements', description: 'FocusFlow Achievement endpoints')]
class AchievementController extends Controller
{
    #[OA\Get(
        path: '/api/v1/achievements',
        summary: 'Get all achievements and user progress',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Achievements']
    )]
    #[OA\Response(
        response: 200,
        description: 'Achievements data',
        content: new OA\JsonContent(
            type: 'array',
            items: new OA\Items(
                properties: [
                    new OA\Property(property: 'id', type: 'integer'),
                    new OA\Property(property: 'name', type: 'string'),
                    new OA\Property(property: 'description', type: 'string'),
                    new OA\Property(property: 'icon', type: 'string', nullable: true),
                    new OA\Property(property: 'condition_type', type: 'string'),
                    new OA\Property(property: 'condition_value', type: 'integer'),
                    new OA\Property(property: 'is_unlocked', type: 'boolean'),
                    new OA\Property(property: 'unlocked_at', type: 'string', format: 'date-time', nullable: true),
                ]
            )
        )
    )]
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        $userAchievements = $user->achievements()->get()->keyBy('id');

        $achievements = Achievement::all()->map(function ($achievement) use ($userAchievements) {
            $userAchievement = $userAchievements->get($achievement->id);

            return [
                'id' => $achievement->id,
                'name' => $achievement->name,
                'description' => $achievement->description,
                'icon' => $achievement->icon,
                'condition_type' => $achievement->condition_type,
                'condition_value' => $achievement->condition_value,
                'is_unlocked' => (bool) $userAchievement,
                'unlocked_at' => $userAchievement ? $userAchievement->pivot->unlocked_at : null,
            ];
        });

        return response()->json($achievements);
    }

    #[OA\Get(
        path: '/api/v1/achievements/{id}',
        summary: 'Get a specific achievement',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Achievements']
    )]
    #[OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(
        response: 200,
        description: 'Achievement details',
        content: new OA\JsonContent(ref: '#/components/schemas/Achievement')
    )]
    public function show(Achievement $achievement): JsonResponse
    {
        return response()->json($achievement);
    }
}
