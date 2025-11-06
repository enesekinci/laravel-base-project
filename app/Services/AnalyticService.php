<?php

namespace App\Services;

use App\Models\Analytic;
use Illuminate\Pagination\LengthAwarePaginator;

class AnalyticService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Analytic::query();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('provider', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('tracking_id', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Analytic
    {
        return Analytic::create($data);
    }

    public function update(Analytic $analytic, array $data): Analytic
    {
        $analytic->update($data);
        return $analytic->fresh();
    }

    public function delete(Analytic $analytic): bool
    {
        return $analytic->delete();
    }
}

