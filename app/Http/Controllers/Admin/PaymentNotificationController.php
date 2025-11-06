<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentNotification;
use App\Services\PaymentNotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PaymentNotificationController extends Controller
{
    public function __construct(
        private PaymentNotificationService $paymentNotificationService
    ) {}

    public function index(): Response
    {
        $paymentNotifications = $this->paymentNotificationService->list(
            request()->only(['search', 'status', 'per_page'])
        );

        return Inertia::render('Admin/PaymentNotifications/Index', [
            'paymentNotifications' => $paymentNotifications,
        ]);
    }

    public function show(PaymentNotification $paymentNotification): Response
    {
        $paymentNotification->load(['customer', 'assignedUser']);

        return Inertia::render('Admin/PaymentNotifications/Show', [
            'paymentNotification' => $paymentNotification,
        ]);
    }

    public function update(Request $request, PaymentNotification $paymentNotification): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,processed,closed'],
            'admin_notes' => ['nullable', 'string'],
            'assigned_to' => ['nullable', 'exists:users,id'],
        ]);

        $this->paymentNotificationService->update($paymentNotification, $validated);

        return redirect()
            ->route('admin.payment-notifications.index')
            ->with('success', 'Ödeme bildirimi başarıyla güncellendi.');
    }

    public function destroy(PaymentNotification $paymentNotification): RedirectResponse
    {
        $this->paymentNotificationService->delete($paymentNotification);

        return redirect()
            ->route('admin.payment-notifications.index')
            ->with('success', 'Ödeme bildirimi başarıyla silindi.');
    }
}
