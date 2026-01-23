<?php

declare(strict_types=1);

namespace App\Http\Controllers\FocusFlow\Api;

use App\Http\Controllers\Controller;
use App\Services\FocusFlow\StatisticsService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'FocusFlow Statistics', description: 'FocusFlow Statistics endpoints')]
class StatisticsController extends Controller
{
    public function __construct(
        protected StatisticsService $statisticsService
    ) {}

    #[OA\Get(
        path: '/api/v1/statistics',
        summary: 'Get statistics for a period',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Statistics']
    )]
    #[OA\Parameter(name: 'period', in: 'query', required: false, schema: new OA\Schema(type: 'string', enum: ['week', 'month'], default: 'week'))]
    #[OA\Parameter(name: 'year', in: 'query', required: false, schema: new OA\Schema(type: 'integer'))]
    #[OA\Parameter(name: 'month', in: 'query', required: false, schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(
        response: 200,
        description: 'Statistics data',
        content: new OA\JsonContent(ref: '#/components/schemas/Statistic')
    )]
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        $period = $request->input('period', 'week'); // week, month

        if ($period === 'week') {
            $startDate = Carbon::now()->startOfWeek();
            $stats = $this->statisticsService->getWeeklyStats($user, $startDate);
        } else {
            $year = $request->input('year', now()->year);
            $month = $request->input('month', now()->month);
            $stats = $this->statisticsService->getMonthlyStats($user, $year, $month);
        }

        return response()->json($stats);
    }

    #[OA\Get(
        path: '/api/v1/statistics/daily',
        summary: 'Get daily statistics',
        security: [['sanctum' => []]],
        tags: ['FocusFlow Statistics']
    )]
    #[OA\Parameter(name: 'date', in: 'query', required: false, schema: new OA\Schema(type: 'string', format: 'date'))]
    #[OA\Response(
        response: 200,
        description: 'Daily statistics',
        content: new OA\JsonContent(ref: '#/components/schemas/Statistic')
    )]
    public function daily(Request $request): JsonResponse
    {
        $date = $request->input('date', now()->format('Y-m-d'));
        $statistic = $this->statisticsService->getOrCreate($request->user(), Carbon::parse($date));

        return response()->json($statistic);
    }
}
