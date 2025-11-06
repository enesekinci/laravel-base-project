<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Pagination\LengthAwarePaginator;

class BannerService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Banner::query();

        if (isset($filters['search'])) {
            $query->where('title', 'like', '%' . $filters['search'] . '%');
        }

        if (isset($filters['position'])) {
            $query->where('position', $filters['position']);
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('sort_order')->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Banner
    {
        return Banner::create($data);
    }

    public function update(Banner $banner, array $data): Banner
    {
        $banner->update($data);
        return $banner->fresh();
    }

    public function delete(Banner $banner): bool
    {
        return $banner->delete();
    }
}
