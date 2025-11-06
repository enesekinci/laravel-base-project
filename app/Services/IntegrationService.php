<?php

namespace App\Services;

use App\Models\Integration;
use Illuminate\Pagination\LengthAwarePaginator;

class IntegrationService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Integration::query();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('provider', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Integration
    {
        return Integration::create($data);
    }

    public function update(Integration $integration, array $data): Integration
    {
        $integration->update($data);
        return $integration->fresh();
    }

    public function delete(Integration $integration): bool
    {
        return $integration->delete();
    }
}

