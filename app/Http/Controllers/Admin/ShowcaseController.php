<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Showcase;
use App\Services\ShowcaseService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ShowcaseController extends Controller
{
    public function __construct(
        private ShowcaseService $showcaseService
    ) {}

    public function index(): Response
    {
        $showcases = $this->showcaseService->list(
            request()->only(['search', 'type', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/Showcases/Index', [
            'showcases' => $showcases,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Showcases/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:showcases,slug'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'string', 'in:product,category,custom'],
            'content' => ['nullable', 'array'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->showcaseService->create($validated);

        return redirect()
            ->route('admin.showcases.index')
            ->with('success', 'Vitrin başarıyla oluşturuldu.');
    }

    public function show(Showcase $showcase): Response
    {
        return Inertia::render('Admin/Showcases/Show', [
            'showcase' => $showcase,
        ]);
    }

    public function edit(Showcase $showcase): Response
    {
        return Inertia::render('Admin/Showcases/Edit', [
            'showcase' => $showcase,
        ]);
    }

    public function update(Request $request, Showcase $showcase): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:showcases,slug,' . $showcase->id],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'string', 'in:product,category,custom'],
            'content' => ['nullable', 'array'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->showcaseService->update($showcase, $validated);

        return redirect()
            ->route('admin.showcases.index')
            ->with('success', 'Vitrin başarıyla güncellendi.');
    }

    public function destroy(Showcase $showcase): RedirectResponse
    {
        $this->showcaseService->delete($showcase);

        return redirect()
            ->route('admin.showcases.index')
            ->with('success', 'Vitrin başarıyla silindi.');
    }
}
