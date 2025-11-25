<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Http\Resources\Admin\AdminProductResource;
use App\Models\Product;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()
            ->with(['brand', 'categories'])
            ->whereNull('deleted_at');

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('name', $likeOperator, '%'.$search.'%')
                    ->orWhere('sku', $likeOperator, '%'.$search.'%');
            });
        }

        if (! is_null($request->query('brand_id'))) {
            $query->where('brand_id', $request->query('brand_id'));
        }

        if (! is_null($request->query('is_active'))) {
            $val = (int) $request->query('is_active') === 1;
            $query->where('is_active', $val);
        }

        if (! is_null($request->query('in_stock'))) {
            $val = (int) $request->query('in_stock') === 1;
            $query->where('in_stock', $val);
        }

        if ($catId = $request->query('category_id')) {
            $query->whereHas('categories', function ($q) use ($catId) {
                $q->where('categories.id', $catId);
            });
        }

        $perPage = (int) $request->query('per_page', 20);

        $products = $query->orderByDesc('id')->paginate($perPage);

        return AdminProductResource::collection($products);
    }

    public function show(Product $product)
    {
        $product->load([
            'brand',
            'categories',
            'images',
            'attributes',
            'variants.optionValues.option',
            'attributeValues.attribute',
        ]);

        return new AdminProductResource($product);
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $categoryIds = $data['category_ids'] ?? [];
        unset($data['category_ids']);

        // default flags
        $data['is_active'] = $data['is_active'] ?? true;
        $data['manage_stock'] = $data['manage_stock'] ?? true;
        $data['in_stock'] = $data['in_stock'] ?? true;
        $data['quantity'] = $data['quantity'] ?? 0;

        $product = Product::create($data);

        if (! empty($categoryIds)) {
            $product->categories()->sync($categoryIds);
        }

        $product->load(['brand', 'categories']);

        return (new AdminProductResource($product))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();

        $categoryIds = $data['category_ids'] ?? null;
        unset($data['category_ids']);

        $product->fill($data);
        $product->save();

        if (! is_null($categoryIds)) {
            $product->categories()->sync($categoryIds);
        }

        $product->load(['brand', 'categories']);

        return new AdminProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();

        $product->load(['brand', 'categories']);

        return new AdminProductResource($product);
    }

    public function toggleActive(Product $product)
    {
        $product->is_active = ! $product->is_active;
        $product->save();

        $product->load(['brand', 'categories']);

        return new AdminProductResource($product);
    }
}
