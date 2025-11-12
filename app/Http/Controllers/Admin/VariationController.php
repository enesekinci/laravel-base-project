<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVariationRequest;
use App\Http\Requests\UpdateVariationRequest;
use App\Models\VariationTemplate;
use App\Services\VariationTemplateService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class VariationController extends Controller
{
    public function __construct(
        private VariationTemplateService $variationTemplateService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $variations = $this->variationTemplateService->list(request()->only(['search', 'type', 'is_active', 'per_page']));

        return Inertia::render('Admin/Variations/Index', [
            'variations' => $variations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Variations/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVariationRequest $request): RedirectResponse
    {
        $variation = $this->variationTemplateService->create($request->validated());

        return redirect()
            ->route('admin.variations.index')
            ->with('success', 'Varyasyon başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VariationTemplate $variation): Response
    {
        $variation->load('values');

        return Inertia::render('Admin/Variations/Show', [
            'variation' => $variation,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VariationTemplate $variation): Response
    {
        $variation->load('values');

        return Inertia::render('Admin/Variations/Edit', [
            'variation' => $variation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVariationRequest $request, VariationTemplate $variation): RedirectResponse
    {
        $this->variationTemplateService->update($variation, $request->validated());

        return redirect()
            ->route('admin.variations.index')
            ->with('success', 'Varyasyon başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VariationTemplate $variation): RedirectResponse
    {
        $this->variationTemplateService->delete($variation);

        return redirect()
            ->route('admin.variations.index')
            ->with('success', 'Varyasyon başarıyla silindi.');
    }

    /**
     * Upload image for variation value
     */
    public function uploadImage(\Illuminate\Http\Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'image' => ['required', 'image', 'max:2048'], // Max 2MB
        ]);

        $path = $request->file('image')->store('variations', 'public');

        return response()->json([
            'path' => basename($path), // Sadece dosya adını döndür
        ]);
    }
}
