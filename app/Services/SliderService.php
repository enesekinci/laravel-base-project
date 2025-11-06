<?php

namespace App\Services;

use App\Models\Slider;
use Illuminate\Pagination\LengthAwarePaginator;

class SliderService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Slider::query();

        if (isset($filters['search'])) {
            $query->where('title', 'like', '%' . $filters['search'] . '%');
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('sort_order')->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Slider
    {
        return Slider::create($data);
    }

    public function update(Slider $slider, array $data): Slider
    {
        $slider->update($data);
        return $slider->fresh();
    }

    public function delete(Slider $slider): bool
    {
        return $slider->delete();
    }
}

