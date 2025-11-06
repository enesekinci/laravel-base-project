<?php

namespace App\Services;

use App\Models\Popup;
use Illuminate\Pagination\LengthAwarePaginator;

class PopupService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Popup::query();

        if (isset($filters['search'])) {
            $query->where('title', 'like', '%' . $filters['search'] . '%');
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Popup
    {
        return Popup::create($data);
    }

    public function update(Popup $popup, array $data): Popup
    {
        $popup->update($data);
        return $popup->fresh();
    }

    public function delete(Popup $popup): bool
    {
        return $popup->delete();
    }
}

