<?php

namespace App\Services;

use App\Models\ShippingMethod;
use Illuminate\Pagination\LengthAwarePaginator;

class ShippingMethodService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = ShippingMethod::query();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('code', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('sort_order')->orderBy('name')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): ShippingMethod
    {
        return ShippingMethod::create($data);
    }

    public function update(ShippingMethod $shippingMethod, array $data): ShippingMethod
    {
        $shippingMethod->update($data);
        return $shippingMethod->fresh();
    }

    public function delete(ShippingMethod $shippingMethod): bool
    {
        return $shippingMethod->delete();
    }
}

