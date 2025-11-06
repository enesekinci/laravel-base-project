<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\Tag;
use App\Models\TaxClass;
use App\Models\Variation;
use App\Models\VariationTemplate;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService,
        private CategoryService $categoryService
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
        $brands = Brand::query()
            ->where('is_active', true)
            ->ordered()
            ->get(['id', 'name']);

        $categories = $this->categoryService->allTree();

        $tags = Tag::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name']);

        $taxClasses = TaxClass::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'rate']);

        $attributes = Attribute::query()
            ->with([
                'values' => function ($query) {
                    $query->orderBy('sort_order')->orderBy('value');
                },
                'attributeSet:id,name',
            ])
            ->active()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get(['id', 'name', 'attribute_set_id']);

        $variations = Variation::query()
            ->with(['values' => function ($query) {
                $query->orderBy('sort_order')->orderBy('label');
            }])
            ->ordered()
            ->get(['id', 'name', 'type']);

        $productOptions = ProductOption::query()
            ->with(['values' => function ($query) {
                $query->orderBy('sort_order')->orderBy('label');
            }])
            ->active()
            ->ordered()
            ->get(['id', 'name', 'type', 'required']);

        $variationTemplates = VariationTemplate::query()
            ->with(['values' => function ($query) {
                $query->orderBy('sort_order')->orderBy('label');
            }])
            ->where('is_active', true)
            ->ordered()
            ->get(['id', 'name', 'type']);

        return Inertia::render('Admin/Products/Create', [
            'brands' => $brands,
            'categories' => $categories,
            'tags' => $tags,
            'taxClasses' => $taxClasses,
            'attributes' => $attributes,
            'variations' => $variations,
            'productOptions' => $productOptions,
            'variationTemplates' => $variationTemplates,
        ]);
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

        $brands = Brand::query()
            ->where('is_active', true)
            ->ordered()
            ->get(['id', 'name']);

        $categories = $this->categoryService->allTree();

        $tags = Tag::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name']);

        $taxClasses = TaxClass::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'rate']);

        $attributes = Attribute::query()
            ->with([
                'values' => function ($query) {
                    $query->orderBy('sort_order')->orderBy('value');
                },
                'attributeSet:id,name',
            ])
            ->active()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get(['id', 'name', 'attribute_set_id']);

        $variations = Variation::query()
            ->with(['values' => function ($query) {
                $query->orderBy('sort_order')->orderBy('label');
            }])
            ->ordered()
            ->get(['id', 'name', 'type']);

        $productOptions = ProductOption::query()
            ->with(['values' => function ($query) {
                $query->orderBy('sort_order')->orderBy('label');
            }])
            ->active()
            ->ordered()
            ->get(['id', 'name', 'type', 'required']);

        return Inertia::render('Admin/Products/Edit', [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
            'tags' => $tags,
            'taxClasses' => $taxClasses,
            'attributes' => $attributes,
            'variations' => $variations,
            'productOptions' => $productOptions,
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
