<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analytic;
use App\Services\AnalyticService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AnalyticController extends Controller
{
    public function __construct(
        private AnalyticService $analyticService
    ) {}

    public function index(): Response
    {
        $analytics = $this->analyticService->list(
            request()->only(['search', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/Analytics/Index', [
            'analytics' => $analytics,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Analytics/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'provider' => ['nullable', 'string', 'max:255'],
            'tracking_id' => ['nullable', 'string', 'max:255'],
            'config' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->analyticService->create($validated);

        return redirect()
            ->route('admin.analytics.index')
            ->with('success', 'Analitik başarıyla oluşturuldu.');
    }

    public function show(Analytic $analytic): Response
    {
        return Inertia::render('Admin/Analytics/Show', [
            'analytic' => $analytic,
        ]);
    }

    public function edit(Analytic $analytic): Response
    {
        return Inertia::render('Admin/Analytics/Edit', [
            'analytic' => $analytic,
        ]);
    }

    public function update(Request $request, Analytic $analytic): RedirectResponse
    {
        $validated = $request->validate([
            'provider' => ['nullable', 'string', 'max:255'],
            'tracking_id' => ['nullable', 'string', 'max:255'],
            'config' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->analyticService->update($analytic, $validated);

        return redirect()
            ->route('admin.analytics.index')
            ->with('success', 'Analitik başarıyla güncellendi.');
    }

    public function destroy(Analytic $analytic): RedirectResponse
    {
        $this->analyticService->delete($analytic);

        return redirect()
            ->route('admin.analytics.index')
            ->with('success', 'Analitik başarıyla silindi.');
    }
}
