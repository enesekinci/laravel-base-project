<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Services\EmailTemplateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EmailTemplateController extends Controller
{
    public function __construct(
        private EmailTemplateService $emailTemplateService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $emailTemplates = $this->emailTemplateService->list(
            request()->only(['search', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/EmailTemplates/Index', [
            'emailTemplates' => $emailTemplates,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/EmailTemplates/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:email_templates,slug'],
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'variables' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $emailTemplate = $this->emailTemplateService->create($validated);

        return redirect()
            ->route('admin.email-templates.index')
            ->with('success', 'Email şablonu başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailTemplate $emailTemplate): Response
    {
        return Inertia::render('Admin/EmailTemplates/Show', [
            'emailTemplate' => $emailTemplate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailTemplate $emailTemplate): Response
    {
        return Inertia::render('Admin/EmailTemplates/Edit', [
            'emailTemplate' => $emailTemplate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailTemplate $emailTemplate): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:email_templates,slug,' . $emailTemplate->id],
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'variables' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->emailTemplateService->update($emailTemplate, $validated);

        return redirect()
            ->route('admin.email-templates.index')
            ->with('success', 'Email şablonu başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailTemplate $emailTemplate): RedirectResponse
    {
        $this->emailTemplateService->delete($emailTemplate);

        return redirect()
            ->route('admin.email-templates.index')
            ->with('success', 'Email şablonu başarıyla silindi.');
    }
}
