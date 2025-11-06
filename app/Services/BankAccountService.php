<?php

namespace App\Services;

use App\Models\BankAccount;
use Illuminate\Pagination\LengthAwarePaginator;

class BankAccountService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = BankAccount::query();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('bank_name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('account_holder', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('account_number', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): BankAccount
    {
        return BankAccount::create($data);
    }

    public function update(BankAccount $bankAccount, array $data): BankAccount
    {
        $bankAccount->update($data);
        return $bankAccount->fresh();
    }

    public function delete(BankAccount $bankAccount): bool
    {
        return $bankAccount->delete();
    }
}

