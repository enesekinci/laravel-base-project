<?php

namespace App\Services;

use App\Models\CustomerRepresentative;
use Illuminate\Pagination\LengthAwarePaginator;

class CustomerRepresentativeService
{
    /**
     * Temsilcileri listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = CustomerRepresentative::query()
            ->with('customer:id,name,email');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('email', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('phone', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['customer_id'])) {
            $query->where('customer_id', $filters['customer_id']);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Temsilci oluştur
     */
    public function create(array $data): CustomerRepresentative
    {
        return CustomerRepresentative::create($data);
    }

    /**
     * Temsilci güncelle
     */
    public function update(CustomerRepresentative $representative, array $data): CustomerRepresentative
    {
        $representative->update($data);

        return $representative->fresh();
    }

    /**
     * Temsilci sil
     */
    public function delete(CustomerRepresentative $representative): bool
    {
        return $representative->delete();
    }
}

