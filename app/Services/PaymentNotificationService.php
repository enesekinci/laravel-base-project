<?php

namespace App\Services;

use App\Models\PaymentNotification;
use Illuminate\Pagination\LengthAwarePaginator;

class PaymentNotificationService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = PaymentNotification::query()
            ->with(['customer:id,name,email', 'assignedUser:id,name,email']);

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('email', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('order_number', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): PaymentNotification
    {
        return PaymentNotification::create($data);
    }

    public function update(PaymentNotification $paymentNotification, array $data): PaymentNotification
    {
        $paymentNotification->update($data);
        return $paymentNotification->fresh()->load(['customer', 'assignedUser']);
    }

    public function delete(PaymentNotification $paymentNotification): bool
    {
        return $paymentNotification->delete();
    }
}
