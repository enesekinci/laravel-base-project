<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']) . '-' . Str::random(5);
        }

        $product = Product::create($data);

        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validateData($request, $product->id);

        $product->update($data);

        return response()->json($product, 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }

    protected function validateData(Request $request, ?int $productId = null): array
    {
        $uniqueSkuRule = Rule::unique('products', 'sku');
        $uniqueSlugRule = Rule::unique('products', 'slug');

        if ($productId) {
            $uniqueSkuRule = $uniqueSkuRule->ignore($productId);
            $uniqueSlugRule = $uniqueSlugRule->ignore($productId);
        }

        return $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'slug'        => ['nullable', 'string', $uniqueSlugRule],
            'sku'         => ['nullable', 'string', $uniqueSkuRule],
            'price'       => ['required', 'numeric', 'min:0'],
            'special_price'       => ['nullable', 'numeric', 'min:0'],
            'special_price_type'  => ['nullable', Rule::in(['percent', 'fixed'])],
            'special_price_start' => ['nullable', 'date'],
            'special_price_end'   => ['nullable', 'date', 'after_or_equal:special_price_start'],
            'manage_stock'        => ['nullable', 'boolean'],
            'quantity'            => ['nullable', 'integer', 'min:0'],
            'in_stock'            => ['nullable', 'boolean'],
            'brand_id'            => ['nullable', 'exists:brands,id'],
            'tax_class_id'        => ['nullable', 'exists:tax_classes,id'],
            'is_active'           => ['nullable', 'boolean'],
        ]);
    }
}
