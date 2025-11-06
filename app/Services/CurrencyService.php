<?php

namespace App\Services;

use App\Models\Currency;
use Illuminate\Pagination\LengthAwarePaginator;

class CurrencyService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Currency::query();

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

    public function create(array $data): Currency
    {
        return Currency::create($data);
    }

    public function update(Currency $currency, array $data): Currency
    {
        $currency->update($data);
        return $currency->fresh();
    }

    public function delete(Currency $currency): bool
    {
        return $currency->delete();
    }
}

