<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NotificationHistoryService;
use Inertia\Inertia;
use Inertia\Response;

class NotificationHistoryController extends Controller
{
    public function __construct(
        private NotificationHistoryService $notificationHistoryService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $notificationHistory = $this->notificationHistoryService->list(
            request()->only(['search', 'type', 'status', 'per_page'])
        );

        return Inertia::render('Admin/NotificationHistory/Index', [
            'notificationHistory' => $notificationHistory,
        ]);
    }
}
