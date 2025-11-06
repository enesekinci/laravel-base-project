<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Popup;
use App\Services\PopupService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PopupController extends Controller
{
    public function __construct(
        private PopupService $popupService
    ) {}

    public function index(): Response
    {
        $popups = $this->popupService->list(
            request()->only(['search', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/Popups/Index', [
            'popups' => $popups,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Popups/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'string'],
            'link' => ['nullable', 'string'],
            'display_delay' => ['nullable', 'integer', 'min:0'],
            'display_duration' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->popupService->create($validated);

        return redirect()
            ->route('admin.popups.index')
            ->with('success', 'Popup başarıyla oluşturuldu.');
    }

    public function show(Popup $popup): Response
    {
        return Inertia::render('Admin/Popups/Show', [
            'popup' => $popup,
        ]);
    }

    public function edit(Popup $popup): Response
    {
        return Inertia::render('Admin/Popups/Edit', [
            'popup' => $popup,
        ]);
    }

    public function update(Request $request, Popup $popup): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'string'],
            'link' => ['nullable', 'string'],
            'display_delay' => ['nullable', 'integer', 'min:0'],
            'display_duration' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->popupService->update($popup, $validated);

        return redirect()
            ->route('admin.popups.index')
            ->with('success', 'Popup başarıyla güncellendi.');
    }

    public function destroy(Popup $popup): RedirectResponse
    {
        $this->popupService->delete($popup);

        return redirect()
            ->route('admin.popups.index')
            ->with('success', 'Popup başarıyla silindi.');
    }
}
