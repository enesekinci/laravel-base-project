<?php

namespace App\Services;

use App\Models\Showcase;
use Illuminate\Pagination\LengthAwarePaginator;

class ShowcaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Showcase::query();

        if (isset($filters['search'])) {
            $query->where('title', 'like', '%' . $filters['search'] . '%');
        }

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('sort_order')->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Showcase
    {
        return Showcase::create($data);
    }

    public function update(Showcase $showcase, array $data): Showcase
    {
        $showcase->update($data);
        return $showcase->fresh();
    }

    public function delete(Showcase $showcase): bool
    {
        return $showcase->delete();
    }
}

