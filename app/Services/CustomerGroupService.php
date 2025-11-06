<?php

namespace App\Services;

use App\Models\CustomerGroup;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CustomerGroupService
{
    /**
     * Müşteri gruplarını listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = CustomerGroup::query()
            ->withCount('customers');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('slug', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('name')
            ->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Tüm müşteri gruplarını getir
     */
    public function all(): Collection
    {
        return CustomerGroup::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
    }

    /**
     * Müşteri grubu oluştur
     */
    public function create(array $data): CustomerGroup
    {
        return CustomerGroup::create($data);
    }

    /**
     * Müşteri grubu güncelle
     */
    public function update(CustomerGroup $customerGroup, array $data): CustomerGroup
    {
        $customerGroup->update($data);

        return $customerGroup->fresh();
    }

    /**
     * Müşteri grubu sil
     */
    public function delete(CustomerGroup $customerGroup): bool
    {
        return $customerGroup->delete();
    }
}

