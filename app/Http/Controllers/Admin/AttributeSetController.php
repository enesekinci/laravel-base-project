<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributeSetRequest;
use App\Http\Requests\UpdateAttributeSetRequest;
use App\Models\AttributeSet;
use App\Services\AttributeSetService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class AttributeSetController extends Controller
{
    public function __construct(
        private AttributeSetService $attributeSetService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $attributeSets = $this->attributeSetService->list(
            request()->only(['search', 'is_active', 'per_page']),
        );

        return Inertia::render('Admin/AttributeSets/Index', [
            'attributeSets' => $attributeSets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/AttributeSets/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttributeSetRequest $request): RedirectResponse
    {
        $attributeSet = $this->attributeSetService->create($request->validated());

        return redirect()
            ->route('admin.attribute-sets.index')
            ->with('success', 'Özellik seti başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AttributeSet $attributeSet): Response
    {
        $attributeSet->load(['attributes']);

        return Inertia::render('Admin/AttributeSets/Show', [
            'attributeSet' => $attributeSet,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttributeSet $attributeSet): Response
    {
        return Inertia::render('Admin/AttributeSets/Edit', [
            'attributeSet' => $attributeSet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateAttributeSetRequest $request,
        AttributeSet $attributeSet,
    ): RedirectResponse {
        $this->attributeSetService->update(
            $attributeSet,
            $request->validated(),
        );

        return redirect()
            ->route('admin.attribute-sets.index')
            ->with('success', 'Özellik seti başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttributeSet $attributeSet): RedirectResponse
    {
        $this->attributeSetService->delete($attributeSet);

        return redirect()
            ->route('admin.attribute-sets.index')
            ->with('success', 'Özellik seti başarıyla silindi.');
    }
}

