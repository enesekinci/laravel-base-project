<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ActivityLogService;
use Inertia\Inertia;
use Inertia\Response;

class ActivityLogController extends Controller
{
    public function __construct(
        private ActivityLogService $activityLogService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $activityLogs = $this->activityLogService->list(request()->only(['search', 'user_id', 'action', 'model_type', 'per_page']));

        return Inertia::render('Admin/ActivityLogs/Index', [
            'activityLogs' => $activityLogs,
        ]);
    }
}

