<?php

namespace App\Services;

use App\Models\PaymentMethod;
use Illuminate\Pagination\LengthAwarePaginator;

class PaymentMethodService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = PaymentMethod::query();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('code', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('sort_order')->orderBy('name')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): PaymentMethod
    {
        return PaymentMethod::create($data);
    }

    public function update(PaymentMethod $paymentMethod, array $data): PaymentMethod
    {
        $paymentMethod->update($data);
        return $paymentMethod->fresh();
    }

    public function delete(PaymentMethod $paymentMethod): bool
    {
        return $paymentMethod->delete();
    }
}

