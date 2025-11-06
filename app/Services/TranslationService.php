<?php

namespace App\Services;

use App\Models\Translation;
use Illuminate\Pagination\LengthAwarePaginator;

class TranslationService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Translation::query()->with('language:id,name,code');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('key', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('value', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['language_id'])) {
            $query->where('language_id', $filters['language_id']);
        }

        if (isset($filters['group'])) {
            $query->where('group', $filters['group']);
        }

        return $query->orderBy('key')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Translation
    {
        return Translation::create($data);
    }

    public function update(Translation $translation, array $data): Translation
    {
        $translation->update($data);
        return $translation->fresh()->load('language');
    }

    public function delete(Translation $translation): bool
    {
        return $translation->delete();
    }
}

