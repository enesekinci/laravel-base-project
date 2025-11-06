<?php

namespace App\Services;

use App\Models\SmsTemplate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SmsTemplateService
{
    /**
     * SMS template'lerini listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = SmsTemplate::query();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('slug', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('message', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('name')
            ->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Tüm SMS template'lerini getir
     */
    public function all(): Collection
    {
        return SmsTemplate::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
    }

    /**
     * SMS template oluştur
     */
    public function create(array $data): SmsTemplate
    {
        return SmsTemplate::create($data);
    }

    /**
     * SMS template güncelle
     */
    public function update(SmsTemplate $smsTemplate, array $data): SmsTemplate
    {
        $smsTemplate->update($data);

        return $smsTemplate->fresh();
    }

    /**
     * SMS template sil
     */
    public function delete(SmsTemplate $smsTemplate): bool
    {
        return $smsTemplate->delete();
    }
}

