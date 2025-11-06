<?php

namespace App\Services;

use App\Models\Newsletter;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsletterService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Newsletter::query();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('email', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('name', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Newsletter
    {
        return Newsletter::create($data);
    }

    public function update(Newsletter $newsletter, array $data): Newsletter
    {
        $newsletter->update($data);
        return $newsletter->fresh();
    }

    public function delete(Newsletter $newsletter): bool
    {
        return $newsletter->delete();
    }
}
