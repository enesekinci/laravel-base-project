<?php

namespace App\Services;

use App\Models\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;

class RedirectService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Redirect::query();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('from', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('to', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Redirect
    {
        return Redirect::create($data);
    }

    public function update(Redirect $redirect, array $data): Redirect
    {
        $redirect->update($data);
        return $redirect->fresh();
    }

    public function delete(Redirect $redirect): bool
    {
        return $redirect->delete();
    }
}

