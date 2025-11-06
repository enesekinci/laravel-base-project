<?php

namespace App\Services;

use App\Models\SupportTicket;
use Illuminate\Pagination\LengthAwarePaginator;

class SupportTicketService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = SupportTicket::query()
            ->with(['customer:id,name,email', 'assignedUser:id,name']);

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('ticket_number', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('subject', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['priority'])) {
            $query->where('priority', $filters['priority']);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): SupportTicket
    {
        return SupportTicket::create($data);
    }

    public function update(SupportTicket $supportTicket, array $data): SupportTicket
    {
        $supportTicket->update($data);
        return $supportTicket->fresh()->load(['customer', 'assignedUser']);
    }

    public function delete(SupportTicket $supportTicket): bool
    {
        return $supportTicket->delete();
    }
}

