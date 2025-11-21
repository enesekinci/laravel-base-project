<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenerateProductVariantsRequest;
use App\Http\Requests\Admin\UpdateProductVariantRequest;
use App\Http\Resources\ProductVariantResource;
use App\Http\Resources\Admin\AdminProductVariantResource;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Services\ProductVariantGenerator;

class ProductVariantController extends Controller
{
    public function __construct(
        protected ProductVariantGenerator $generator
    ) {}

    public function generate(GenerateProductVariantsRequest $request, Product $product)
    {
        $validated = $request->validated();

        $options = $validated['options'];
        $base    = $validated['base'] ?? [];

        $createdVariants = $this->generator->generate($product, $options, $base);

        // optionValues relation'ını load et
        if ($createdVariants->isNotEmpty()) {
            $createdVariants = ProductVariant::whereIn('id', $createdVariants->pluck('id'))
                ->with('optionValues.option')
                ->get();
        } else {
            // Boş collection olsa bile meta.created_count döndürmek için
            $createdVariants = collect([]);
        }

        return ProductVariantResource::collection($createdVariants)
            ->additional([
                'meta' => [
                    'created_count' => $createdVariants->count(),
                ],
            ]);
    }

    public function index(Product $product)
    {
        $variants = $product->variants()
            ->with(['optionValues.option'])
            ->orderBy('id')
            ->get();

        return AdminProductVariantResource::collection($variants);
    }

    public function update(UpdateProductVariantRequest $request, Product $product, ProductVariant $variant)
    {
        if ($variant->product_id !== $product->id) {
            abort(404);
        }

        $data = $request->validated();

        $variant->fill($data);
        $variant->save();

        $variant->load(['optionValues.option']);

        return new AdminProductVariantResource($variant);
    }

    public function destroy(Product $product, ProductVariant $variant)
    {
        if ($variant->product_id !== $product->id) {
            abort(404);
        }

        $variant->delete();

        return response()->noContent();
    }
}
