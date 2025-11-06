<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Integration;
use App\Services\IntegrationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class IntegrationController extends Controller
{
    public function __construct(
        private IntegrationService $integrationService
    ) {}

    public function index(): Response
    {
        $integrations = $this->integrationService->list(
            request()->only(['search', 'type', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/Integrations/Index', [
            'integrations' => $integrations,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Integrations/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'provider' => ['nullable', 'string', 'max:255'],
            'config' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->integrationService->create($validated);

        return redirect()
            ->route('admin.integrations.index')
            ->with('success', 'Entegrasyon başarıyla oluşturuldu.');
    }

    public function show(Integration $integration): Response
    {
        return Inertia::render('Admin/Integrations/Show', [
            'integration' => $integration,
        ]);
    }

    public function edit(Integration $integration): Response
    {
        return Inertia::render('Admin/Integrations/Edit', [
            'integration' => $integration,
        ]);
    }

    public function update(Request $request, Integration $integration): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'provider' => ['nullable', 'string', 'max:255'],
            'config' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->integrationService->update($integration, $validated);

        return redirect()
            ->route('admin.integrations.index')
            ->with('success', 'Entegrasyon başarıyla güncellendi.');
    }

    public function destroy(Integration $integration): RedirectResponse
    {
        $this->integrationService->delete($integration);

        return redirect()
            ->route('admin.integrations.index')
            ->with('success', 'Entegrasyon başarıyla silindi.');
    }
}
