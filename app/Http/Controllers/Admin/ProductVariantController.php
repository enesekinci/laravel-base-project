<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenerateProductVariantsRequest;
use App\Http\Resources\ProductVariantResource;
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
        }

        return ProductVariantResource::collection($createdVariants)
            ->additional([
                'meta' => [
                    'created_count' => $createdVariants->count(),
                ],
            ]);
    }
}
