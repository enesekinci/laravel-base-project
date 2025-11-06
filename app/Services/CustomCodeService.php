<?php

namespace App\Services;

use App\Models\CustomCode;
use Illuminate\Pagination\LengthAwarePaginator;

class CustomCodeService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = CustomCode::query();

        if (isset($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }

        if (isset($filters['location'])) {
            $query->where('location', $filters['location']);
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): CustomCode
    {
        return CustomCode::create($data);
    }

    public function update(CustomCode $customCode, array $data): CustomCode
    {
        $customCode->update($data);
        return $customCode->fresh();
    }

    public function delete(CustomCode $customCode): bool
    {
        return $customCode->delete();
    }
}

