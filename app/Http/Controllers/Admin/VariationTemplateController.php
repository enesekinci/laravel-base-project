<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVariationTemplateRequest;
use App\Http\Requests\UpdateVariationTemplateRequest;
use App\Models\VariationTemplate;
use App\Services\VariationTemplateService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class VariationTemplateController extends Controller
{
    public function __construct(
        private VariationTemplateService $variationTemplateService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $templates = $this->variationTemplateService->list(
            request()->only(['search', 'type', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/VariationTemplates/Index', [
            'templates' => $templates,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/VariationTemplates/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVariationTemplateRequest $request): RedirectResponse
    {
        $template = $this->variationTemplateService->create($request->validated());

        return redirect()
            ->route('admin.variation-templates.index')
            ->with('success', 'Varyasyon şablonu başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VariationTemplate $variationTemplate): Response
    {
        $variationTemplate->load('values');

        return Inertia::render('Admin/VariationTemplates/Show', [
            'template' => $variationTemplate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VariationTemplate $variationTemplate): Response
    {
        $variationTemplate->load('values');

        return Inertia::render('Admin/VariationTemplates/Edit', [
            'template' => $variationTemplate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateVariationTemplateRequest $request,
        VariationTemplate $variationTemplate
    ): RedirectResponse {
        $this->variationTemplateService->update(
            $variationTemplate,
            $request->validated()
        );

        return redirect()
            ->route('admin.variation-templates.index')
            ->with('success', 'Varyasyon şablonu başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VariationTemplate $variationTemplate): RedirectResponse
    {
        $this->variationTemplateService->delete($variationTemplate);

        return redirect()
            ->route('admin.variation-templates.index')
            ->with('success', 'Varyasyon şablonu başarıyla silindi.');
    }
}
