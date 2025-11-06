<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Services\ContactFormService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContactFormController extends Controller
{
    public function __construct(
        private ContactFormService $contactFormService
    ) {}

    public function index(): Response
    {
        $contactForms = $this->contactFormService->list(
            request()->only(['search', 'status', 'per_page'])
        );

        return Inertia::render('Admin/ContactForms/Index', [
            'contactForms' => $contactForms,
        ]);
    }

    public function show(ContactForm $contactForm): Response
    {
        $contactForm->load('assignedUser');

        return Inertia::render('Admin/ContactForms/Show', [
            'contactForm' => $contactForm,
        ]);
    }

    public function update(Request $request, ContactForm $contactForm): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,read,replied,closed'],
            'admin_notes' => ['nullable', 'string'],
            'assigned_to' => ['nullable', 'exists:users,id'],
        ]);

        $this->contactFormService->update($contactForm, $validated);

        return redirect()
            ->route('admin.contact-forms.index')
            ->with('success', 'İletişim formu başarıyla güncellendi.');
    }

    public function destroy(ContactForm $contactForm): RedirectResponse
    {
        $this->contactFormService->delete($contactForm);

        return redirect()
            ->route('admin.contact-forms.index')
            ->with('success', 'İletişim formu başarıyla silindi.');
    }
}
