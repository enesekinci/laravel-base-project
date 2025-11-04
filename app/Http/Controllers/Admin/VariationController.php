<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVariationRequest;
use App\Http\Requests\UpdateVariationRequest;
use App\Models\Variation;
use App\Services\VariationService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class VariationController extends Controller
{
    public function __construct(
        private VariationService $variationService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $variations = $this->variationService->list(request()->only(['search', 'type', 'per_page']));

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
        $variation = $this->variationService->create($request->validated());

        return redirect()
            ->route('admin.variations.index')
            ->with('success', 'Varyasyon başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Variation $variation): Response
    {
        $variation->load('values');

        return Inertia::render('Admin/Variations/Show', [
            'variation' => $variation,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variation $variation): Response
    {
        $variation->load('values');

        return Inertia::render('Admin/Variations/Edit', [
            'variation' => $variation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVariationRequest $request, Variation $variation): RedirectResponse
    {
        $this->variationService->update($variation, $request->validated());

        return redirect()
            ->route('admin.variations.index')
            ->with('success', 'Varyasyon başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variation $variation): RedirectResponse
    {
        $this->variationService->delete($variation);

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
