<?php

namespace App\Services;

use App\Models\Language;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class LanguageService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Language::query();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('code', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('sort_order')->orderBy('name')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function all(): Collection
    {
        return Language::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }

    public function create(array $data): Language
    {
        return Language::create($data);
    }

    public function update(Language $language, array $data): Language
    {
        $language->update($data);
        return $language->fresh();
    }

    public function delete(Language $language): bool
    {
        return $language->delete();
    }
}

