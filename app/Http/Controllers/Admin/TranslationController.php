<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use App\Services\TranslationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TranslationController extends Controller
{
    public function __construct(
        private TranslationService $translationService
    ) {}

    public function index(): Response
    {
        $translations = $this->translationService->list(
            request()->only(['search', 'language_id', 'group', 'per_page'])
        );

        $languages = app(\App\Services\LanguageService::class)->all();

        return Inertia::render('Admin/Translations/Index', [
            'translations' => $translations,
            'languages' => $languages,
        ]);
    }

    public function create(): Response
    {
        $languages = app(\App\Services\LanguageService::class)->all();

        return Inertia::render('Admin/Translations/Create', [
            'languages' => $languages,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'key' => ['required', 'string', 'max:255'],
            'language_id' => ['required', 'exists:languages,id'],
            'value' => ['required', 'string'],
            'group' => ['nullable', 'string', 'max:255'],
        ]);

        $this->translationService->create($validated);

        return redirect()
            ->route('admin.translations.index')
            ->with('success', 'Çeviri başarıyla oluşturuldu.');
    }

    public function show(Translation $translation): Response
    {
        $translation->load('language');

        return Inertia::render('Admin/Translations/Show', [
            'translation' => $translation,
        ]);
    }

    public function edit(Translation $translation): Response
    {
        $translation->load('language');
        $languages = app(\App\Services\LanguageService::class)->all();

        return Inertia::render('Admin/Translations/Edit', [
            'translation' => $translation,
            'languages' => $languages,
        ]);
    }

    public function update(Request $request, Translation $translation): RedirectResponse
    {
        $validated = $request->validate([
            'key' => ['required', 'string', 'max:255'],
            'language_id' => ['required', 'exists:languages,id'],
            'value' => ['required', 'string'],
            'group' => ['nullable', 'string', 'max:255'],
        ]);

        $this->translationService->update($translation, $validated);

        return redirect()
            ->route('admin.translations.index')
            ->with('success', 'Çeviri başarıyla güncellendi.');
    }

    public function destroy(Translation $translation): RedirectResponse
    {
        $this->translationService->delete($translation);

        return redirect()
            ->route('admin.translations.index')
            ->with('success', 'Çeviri başarıyla silindi.');
    }
}
