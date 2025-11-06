<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SmsTemplate;
use App\Services\SmsTemplateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SmsTemplateController extends Controller
{
    public function __construct(
        private SmsTemplateService $smsTemplateService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $smsTemplates = $this->smsTemplateService->list(
            request()->only(['search', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/SmsTemplates/Index', [
            'smsTemplates' => $smsTemplates,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/SmsTemplates/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:sms_templates,slug'],
            'message' => ['required', 'string'],
            'variables' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $smsTemplate = $this->smsTemplateService->create($validated);

        return redirect()
            ->route('admin.sms-templates.index')
            ->with('success', 'SMS şablonu başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SmsTemplate $smsTemplate): Response
    {
        return Inertia::render('Admin/SmsTemplates/Show', [
            'smsTemplate' => $smsTemplate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SmsTemplate $smsTemplate): Response
    {
        return Inertia::render('Admin/SmsTemplates/Edit', [
            'smsTemplate' => $smsTemplate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SmsTemplate $smsTemplate): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:sms_templates,slug,' . $smsTemplate->id],
            'message' => ['required', 'string'],
            'variables' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->smsTemplateService->update($smsTemplate, $validated);

        return redirect()
            ->route('admin.sms-templates.index')
            ->with('success', 'SMS şablonu başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SmsTemplate $smsTemplate): RedirectResponse
    {
        $this->smsTemplateService->delete($smsTemplate);

        return redirect()
            ->route('admin.sms-templates.index')
            ->with('success', 'SMS şablonu başarıyla silindi.');
    }
}
