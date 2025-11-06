<?php

namespace App\Services;

use App\Models\EmailTemplate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class EmailTemplateService
{
    /**
     * Email template'lerini listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = EmailTemplate::query();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('slug', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('subject', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('name')
            ->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Tüm email template'lerini getir
     */
    public function all(): Collection
    {
        return EmailTemplate::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
    }

    /**
     * Email template oluştur
     */
    public function create(array $data): EmailTemplate
    {
        return EmailTemplate::create($data);
    }

    /**
     * Email template güncelle
     */
    public function update(EmailTemplate $emailTemplate, array $data): EmailTemplate
    {
        $emailTemplate->update($data);

        return $emailTemplate->fresh();
    }

    /**
     * Email template sil
     */
    public function delete(EmailTemplate $emailTemplate): bool
    {
        return $emailTemplate->delete();
    }
}

