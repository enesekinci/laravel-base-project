<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomCode;
use App\Services\CustomCodeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CustomCodeController extends Controller
{
    public function __construct(
        private CustomCodeService $customCodeService
    ) {}

    public function index(): Response
    {
        $customCodes = $this->customCodeService->list(
            request()->only(['search', 'location', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/CustomCodes/Index', [
            'customCodes' => $customCodes,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/CustomCodes/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'code' => ['required', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->customCodeService->create($validated);

        return redirect()
            ->route('admin.custom-codes.index')
            ->with('success', 'Özel kod başarıyla oluşturuldu.');
    }

    public function show(CustomCode $customCode): Response
    {
        return Inertia::render('Admin/CustomCodes/Show', [
            'customCode' => $customCode,
        ]);
    }

    public function edit(CustomCode $customCode): Response
    {
        return Inertia::render('Admin/CustomCodes/Edit', [
            'customCode' => $customCode,
        ]);
    }

    public function update(Request $request, CustomCode $customCode): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'code' => ['required', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->customCodeService->update($customCode, $validated);

        return redirect()
            ->route('admin.custom-codes.index')
            ->with('success', 'Özel kod başarıyla güncellendi.');
    }

    public function destroy(CustomCode $customCode): RedirectResponse
    {
        $this->customCodeService->delete($customCode);

        return redirect()
            ->route('admin.custom-codes.index')
            ->with('success', 'Özel kod başarıyla silindi.');
    }
}
