<?php

namespace App\Services;

use App\Models\Supplier;
use Illuminate\Pagination\LengthAwarePaginator;

class SupplierService
{
    /**
     * Tedarikçileri listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Supplier::query()->orderBy('name');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('code', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('email', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Tedarikçi oluştur
     */
    public function create(array $data): Supplier
    {
        return Supplier::create($data);
    }

    /**
     * Tedarikçi güncelle
     */
    public function update(Supplier $supplier, array $data): Supplier
    {
        $supplier->update($data);

        return $supplier->fresh();
    }

    /**
     * Tedarikçi sil
     */
    public function delete(Supplier $supplier): bool
    {
        return $supplier->delete();
    }
}
