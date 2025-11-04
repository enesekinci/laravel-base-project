<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Models\Attribute;
use App\Services\AttributeService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class AttributeController extends Controller
{
    public function __construct(
        private AttributeService $attributeService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $attributes = $this->attributeService->list(request()->only(['search', 'type', 'is_filterable', 'per_page']));

        return Inertia::render('Admin/Attributes/Index', [
            'attributes' => $attributes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Attributes/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttributeRequest $request): RedirectResponse
    {
        $attribute = $this->attributeService->create($request->validated());

        return redirect()
            ->route('admin.attributes.index')
            ->with('success', 'Özellik başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $attribute): Response
    {
        $attribute->load('values');

        return Inertia::render('Admin/Attributes/Show', [
            'attribute' => $attribute,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $attribute): Response
    {
        $attribute->load('values');

        return Inertia::render('Admin/Attributes/Edit', [
            'attribute' => $attribute,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttributeRequest $request, Attribute $attribute): RedirectResponse
    {
        $this->attributeService->update($attribute, $request->validated());

        return redirect()
            ->route('admin.attributes.index')
            ->with('success', 'Özellik başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attribute $attribute): RedirectResponse
    {
        $this->attributeService->delete($attribute);

        return redirect()
            ->route('admin.attributes.index')
            ->with('success', 'Özellik başarıyla silindi.');
    }
}
