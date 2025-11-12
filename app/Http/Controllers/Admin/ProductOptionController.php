<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductOptionRequest;
use App\Http\Requests\UpdateProductOptionRequest;
use App\Models\ProductOption;
use App\Services\ProductOptionService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ProductOptionController extends Controller
{
    public function __construct(
        private ProductOptionService $productOptionService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $options = $this->productOptionService->list(
            request()->only(['search', 'type', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/ProductOptions/Index', [
            'options' => $options,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/ProductOptions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductOptionRequest $request): RedirectResponse
    {
        $option = $this->productOptionService->create($request->validated());

        return redirect()
            ->route('admin.options.index')
            ->with('success', 'Ürün seçeneği başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductOption $productOption): Response
    {
        $productOption->load('values');

        return Inertia::render('Admin/ProductOptions/Show', [
            'option' => $productOption,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductOption $productOption): Response
    {
        $productOption->load('values');

        return Inertia::render('Admin/ProductOptions/Edit', [
            'option' => $productOption,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateProductOptionRequest $request,
        ProductOption $productOption
    ): RedirectResponse {
        $this->productOptionService->update(
            $productOption,
            $request->validated()
        );

        return redirect()
            ->route('admin.options.index')
            ->with('success', 'Ürün seçeneği başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductOption $productOption): RedirectResponse
    {
        $this->productOptionService->delete($productOption);

        return redirect()
            ->route('admin.options.index')
            ->with('success', 'Ürün seçeneği başarıyla silindi.');
    }
}
