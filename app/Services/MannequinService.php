<?php

namespace App\Services;

use App\Models\Mannequin;
use Illuminate\Pagination\LengthAwarePaginator;

class MannequinService
{
    /**
     * Mankenleri listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Mannequin::query()->orderBy('name');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('code', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Manken oluştur
     */
    public function create(array $data): Mannequin
    {
        return Mannequin::create($data);
    }

    /**
     * Manken güncelle
     */
    public function update(Mannequin $mannequin, array $data): Mannequin
    {
        $mannequin->update($data);

        return $mannequin->fresh();
    }

    /**
     * Manken sil
     */
    public function delete(Mannequin $mannequin): bool
    {
        return $mannequin->delete();
    }
}
