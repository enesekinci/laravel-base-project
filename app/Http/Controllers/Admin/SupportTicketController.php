<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Services\SupportTicketService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SupportTicketController extends Controller
{
    public function __construct(
        private SupportTicketService $supportTicketService
    ) {}

    public function index(): Response
    {
        $supportTickets = $this->supportTicketService->list(
            request()->only(['search', 'status', 'priority', 'per_page'])
        );

        return Inertia::render('Admin/SupportTickets/Index', [
            'supportTickets' => $supportTickets,
        ]);
    }

    public function show(SupportTicket $supportTicket): Response
    {
        $supportTicket->load(['customer', 'assignedUser', 'replies.user', 'replies.customer']);

        return Inertia::render('Admin/SupportTickets/Show', [
            'supportTicket' => $supportTicket,
        ]);
    }

    public function update(Request $request, SupportTicket $supportTicket): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:open,in_progress,resolved,closed'],
            'priority' => ['required', 'in:low,medium,high,urgent'],
            'assigned_to' => ['nullable', 'exists:users,id'],
            'admin_notes' => ['nullable', 'string'],
        ]);

        $this->supportTicketService->update($supportTicket, $validated);

        return redirect()
            ->route('admin.support-tickets.index')
            ->with('success', 'Destek talebi başarıyla güncellendi.');
    }

    public function destroy(SupportTicket $supportTicket): RedirectResponse
    {
        $this->supportTicketService->delete($supportTicket);

        return redirect()
            ->route('admin.support-tickets.index')
            ->with('success', 'Destek talebi başarıyla silindi.');
    }
}
