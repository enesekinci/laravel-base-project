<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Pagination\LengthAwarePaginator;

class FaqService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Faq::query();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('question', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('answer', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('sort_order')->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Faq
    {
        return Faq::create($data);
    }

    public function update(Faq $faq, array $data): Faq
    {
        $faq->update($data);
        return $faq->fresh();
    }

    public function delete(Faq $faq): bool
    {
        return $faq->delete();
    }
}

