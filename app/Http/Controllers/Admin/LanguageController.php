<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Services\LanguageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class LanguageController extends Controller
{
    public function __construct(
        private LanguageService $languageService
    ) {}

    public function index(): Response
    {
        $languages = $this->languageService->list(
            request()->only(['search', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/Languages/Index', [
            'languages' => $languages,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Languages/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'size:2', 'unique:languages,code'],
            'native_name' => ['nullable', 'string', 'max:255'],
            'flag' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'is_default' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $this->languageService->create($validated);

        return redirect()
            ->route('admin.languages.index')
            ->with('success', 'Dil başarıyla oluşturuldu.');
    }

    public function show(Language $language): Response
    {
        return Inertia::render('Admin/Languages/Show', [
            'language' => $language,
        ]);
    }

    public function edit(Language $language): Response
    {
        return Inertia::render('Admin/Languages/Edit', [
            'language' => $language,
        ]);
    }

    public function update(Request $request, Language $language): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'size:2', 'unique:languages,code,' . $language->id],
            'native_name' => ['nullable', 'string', 'max:255'],
            'flag' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'is_default' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $this->languageService->update($language, $validated);

        return redirect()
            ->route('admin.languages.index')
            ->with('success', 'Dil başarıyla güncellendi.');
    }

    public function destroy(Language $language): RedirectResponse
    {
        $this->languageService->delete($language);

        return redirect()
            ->route('admin.languages.index')
            ->with('success', 'Dil başarıyla silindi.');
    }
}
