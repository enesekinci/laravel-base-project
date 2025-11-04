<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $products = $this->productService->list(
            request()->only(['search', 'status', 'brand_id', 'per_page'])
        );

        return Inertia::render('Admin/Products/Index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Products/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = $this->productService->create($request->validated());

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Ürün başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): Response
    {
        $product->load([
            'brand',
            'taxClass',
            'categories',
            'tags',
            'attributes',
            'variations.values',
            'options',
            'media',
            'links.linkedProduct',
        ]);

        return Inertia::render('Admin/Products/Show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Response
    {
        $product->load([
            'brand',
            'taxClass',
            'categories',
            'tags',
            'attributes',
            'variations.values',
            'options',
            'media',
            'links',
        ]);

        return Inertia::render('Admin/Products/Edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateProductRequest $request,
        Product $product
    ): RedirectResponse {
        $this->productService->update($product, $request->validated());

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Ürün başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $this->productService->delete($product);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Ürün başarıyla silindi.');
    }
}
