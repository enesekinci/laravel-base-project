<?php

namespace App\Services;

use App\Models\TaxClass;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TaxClassService
{
    /**
     * Vergi sınıflarını listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = TaxClass::query()->orderBy('name');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Vergi sınıfı oluştur
     */
    public function create(array $data): TaxClass
    {
        return TaxClass::create($data);
    }

    /**
     * Vergi sınıfı güncelle
     */
    public function update(TaxClass $taxClass, array $data): TaxClass
    {
        $taxClass->update($data);

        return $taxClass->fresh();
    }

    /**
     * Vergi sınıfı sil
     */
    public function delete(TaxClass $taxClass): bool
    {
        return $taxClass->delete();
    }

    /**
     * Tüm aktif vergi sınıflarını getir
     */
    public function allActive(): Collection
    {
        return TaxClass::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
    }
}

