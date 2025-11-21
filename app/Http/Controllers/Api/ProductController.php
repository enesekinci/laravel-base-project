<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()
            ->withIncludes($request)
            ->applyFilters($request)
            ->paginate(15);

        return ProductResource::collection($products);
    }

    public function show(Product $product, Request $request)
    {
        // Route model binding ile product geldi, ama include'lara göre yeniden load ediyoruz
        $builder = Product::query()->whereKey($product->getKey());

        $builder->withIncludes($request);

        $product = $builder->firstOrFail();

        return new ProductResource($product);
    }
}
