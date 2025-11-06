<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Redirect;
use App\Services\RedirectService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RedirectController extends Controller
{
    public function __construct(
        private RedirectService $redirectService
    ) {}

    public function index(): Response
    {
        $redirects = $this->redirectService->list(
            request()->only(['search', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/Redirects/Index', [
            'redirects' => $redirects,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Redirects/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'from' => ['required', 'string', 'max:255', 'unique:redirects,from'],
            'to' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:301,302'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->redirectService->create($validated);

        return redirect()
            ->route('admin.redirects.index')
            ->with('success', 'Yönlendirme başarıyla oluşturuldu.');
    }

    public function show(Redirect $redirect): Response
    {
        return Inertia::render('Admin/Redirects/Show', [
            'redirect' => $redirect,
        ]);
    }

    public function edit(Redirect $redirect): Response
    {
        return Inertia::render('Admin/Redirects/Edit', [
            'redirect' => $redirect,
        ]);
    }

    public function update(Request $request, Redirect $redirect): RedirectResponse
    {
        $validated = $request->validate([
            'from' => ['required', 'string', 'max:255', 'unique:redirects,from,' . $redirect->id],
            'to' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:301,302'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->redirectService->update($redirect, $validated);

        return redirect()
            ->route('admin.redirects.index')
            ->with('success', 'Yönlendirme başarıyla güncellendi.');
    }

    public function destroy(Redirect $redirect): RedirectResponse
    {
        $this->redirectService->delete($redirect);

        return redirect()
            ->route('admin.redirects.index')
            ->with('success', 'Yönlendirme başarıyla silindi.');
    }
}
