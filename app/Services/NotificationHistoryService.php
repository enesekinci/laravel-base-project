<?php

namespace App\Services;

use App\Models\NotificationHistory;
use Illuminate\Pagination\LengthAwarePaginator;

class NotificationHistoryService
{
    /**
     * Bildirim geçmişini listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = NotificationHistory::query()
            ->with(['user:id,name,email', 'customer:id,name,email']);

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('to', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('subject', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('message', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Bildirim geçmişi oluştur
     */
    public function create(array $data): NotificationHistory
    {
        return NotificationHistory::create($data);
    }
}

