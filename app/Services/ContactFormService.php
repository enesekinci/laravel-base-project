<?php

namespace App\Services;

use App\Models\ContactForm;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactFormService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = ContactForm::query()
            ->with('assignedUser:id,name,email');

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('email', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('subject', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): ContactForm
    {
        return ContactForm::create($data);
    }

    public function update(ContactForm $contactForm, array $data): ContactForm
    {
        $contactForm->update($data);
        return $contactForm->fresh()->load('assignedUser');
    }

    public function delete(ContactForm $contactForm): bool
    {
        return $contactForm->delete();
    }
}
