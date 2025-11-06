<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Pagination\LengthAwarePaginator;

class CustomerService
{
    /**
     * Müşterileri listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Customer::query()
            ->with('groups:id,name');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('email', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('phone', 'like', '%' . $filters['search'] . '%');
            });
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Müşteri oluştur
     */
    public function create(array $data): Customer
    {
        $customer = Customer::create($data);

        if (isset($data['group_ids'])) {
            $customer->groups()->sync($data['group_ids']);
        }

        return $customer->load('groups');
    }

    /**
     * Müşteri güncelle
     */
    public function update(Customer $customer, array $data): Customer
    {
        $customer->update($data);

        if (isset($data['group_ids'])) {
            $customer->groups()->sync($data['group_ids']);
        }

        return $customer->fresh()->load('groups');
    }

    /**
     * Müşteri sil
     */
    public function delete(Customer $customer): bool
    {
        return $customer->delete();
    }
}

