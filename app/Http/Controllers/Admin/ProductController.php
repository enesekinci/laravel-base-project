<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Option;
use App\Models\Tag;
use App\Models\TaxClass;
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

        $variations = VariationTemplate::query()
            ->with(['values' => function ($query) {
                $query->orderBy('sort_order')->orderBy('label');
            }])
            ->active()
            ->ordered()
            ->get();

        $productOptions = Option::query()
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
            ->active()
            ->ordered()
            ->get();

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
        try {
            \Illuminate\Support\Facades\DB::beginTransaction();

            $product = $this->productService->create($request->validated());
            \Illuminate\Support\Facades\DB::commit();
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();

            $error = [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ];

            \Illuminate\Support\Facades\Log::error('Product creation failed', $error);

            dd($error);

            return redirect()->back()->with('error', 'Ürün oluşturulurken bir hata oluştu: ' . $e->getMessage());
        }

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
            'variations.values.variationTemplateValue',
            'variations.values.variationTemplate',
            'variationTemplates.variationTemplate.values',
            'optionValues',
            'media',
            'links',
        ]);

        // Attributes'ı attribute_id'ye göre grupla
        $attributesGrouped = [];
        foreach ($product->attributes as $attribute) {
            $attrId = $attribute->id;
            if (!isset($attributesGrouped[$attrId])) {
                $attributesGrouped[$attrId] = [
                    'attribute_id' => $attrId,
                    'attribute_value_ids' => [],
                ];
            }
            if ($attribute->pivot->attribute_value_id) {
                $attributesGrouped[$attrId]['attribute_value_ids'][] = $attribute->pivot->attribute_value_id;
            }
        }
        $product->attributes_formatted = array_values($attributesGrouped);

        // Variations'ı düzelt - variation_template_id ve variation_template_value_id'yi ekle
        foreach ($product->variations as $variation) {
            $variation->variation_values_formatted = $variation->values->map(function ($value) {
                return [
                    'variation_id' => $value->variation_template_id,
                    'variation_value_id' => $value->variation_template_value_id,
                ];
            })->toArray();
        }

        // Variation Templates'ı formatla - frontend için
        $product->variation_templates_formatted = $product->variationTemplates->map(function ($productVariationTemplate) use ($product) {
            $template = $productVariationTemplate->variationTemplate;
            if (!$template) {
                return null;
            }

            // Bu template'e ait seçili value ID'lerini bul
            $selectedValueIds = [];
            foreach ($product->variations as $variation) {
                foreach ($variation->values as $value) {
                    if ($value->variation_template_id === $template->id) {
                        $selectedValueIds[] = $value->variation_template_value_id;
                    }
                }
            }
            $selectedValueIds = array_unique($selectedValueIds);

            return [
                'variation_id' => $template->id,
                'name' => $template->name,
                'type' => $template->type,
                'variation_value_ids' => array_values($selectedValueIds),
                'sort_order' => $productVariationTemplate->sort_order,
            ];
        })->filter()->values()->toArray();

        // Options'ı option_id'ye göre grupla
        $optionsGrouped = [];
        foreach ($product->optionValues as $optionValue) {
            $optionId = $optionValue->option_id;
            if (!isset($optionsGrouped[$optionId])) {
                $optionsGrouped[$optionId] = [
                    'option_id' => $optionId,
                    'values' => [],
                ];
            }
            $optionsGrouped[$optionId]['values'][] = [
                'label' => $optionValue->label,
                'value' => $optionValue->value,
                'price_adjustment' => $optionValue->price_adjustment,
                'price_type' => $optionValue->price_type,
                'sort_order' => $optionValue->sort_order,
            ];
        }
        $product->options_formatted = array_values($optionsGrouped);

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

        $variations = VariationTemplate::query()
            ->with(['values' => function ($query) {
                $query->orderBy('sort_order')->orderBy('label');
            }])
            ->active()
            ->ordered()
            ->get();

        $productOptions = Option::query()
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
