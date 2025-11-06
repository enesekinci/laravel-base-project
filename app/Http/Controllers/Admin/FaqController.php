<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Services\FaqService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class FaqController extends Controller
{
    public function __construct(
        private FaqService $faqService
    ) {}

    public function index(): Response
    {
        $faqs = $this->faqService->list(
            request()->only(['search', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/Faqs/Index', [
            'faqs' => $faqs,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Faqs/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->faqService->create($validated);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'SSS başarıyla oluşturuldu.');
    }

    public function show(Faq $faq): Response
    {
        return Inertia::render('Admin/Faqs/Show', [
            'faq' => $faq,
        ]);
    }

    public function edit(Faq $faq): Response
    {
        return Inertia::render('Admin/Faqs/Edit', [
            'faq' => $faq,
        ]);
    }

    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->faqService->update($faq, $validated);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'SSS başarıyla güncellendi.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $this->faqService->delete($faq);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'SSS başarıyla silindi.');
    }
}
