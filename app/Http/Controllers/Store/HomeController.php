<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        // Slider
        $slider = Slider::where('code', 'home_main')
            ->where('is_active', true)
            ->with(['items' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('sort_order')
                    ->with('media');
            }])
            ->first();

        // Featured Products
        $featuredProducts = Product::featured()
            ->with(['images', 'brand', 'categories'])
            ->get();

        // New Arrivals
        $newArrivals = Product::newArrivals()
            ->with(['images', 'brand', 'categories'])
            ->limit(10)
            ->get();

        // Categories (Ana kategoriler - parent_id null)
        $categories = Category::whereNull('parent_id')
            ->where('is_active', true)
            ->with('products')
            ->orderBy('sort_order')
            ->limit(6)
            ->get();

        // Brands
        $brands = Brand::where('is_active', true)
            ->orderBy('name')
            ->limit(6)
            ->get();

        // Latest Blog Posts
        $blogPosts = Post::where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with(['media', 'categories', 'tags'])
            ->orderBy('published_at', 'desc')
            ->limit(4)
            ->get();

        // Product Widgets
        $featuredWidgetProducts = Product::featured()
            ->with(['images'])
            ->limit(3)
            ->get();

        $bestSellingProducts = Product::bestSelling()
            ->with(['images'])
            ->limit(3)
            ->get();

        $latestProducts = Product::active()
            ->inStock()
            ->with(['images'])
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $topRatedProducts = Product::topRated()
            ->with(['images'])
            ->limit(3)
            ->get();

        return view('store.home', [
            'slider' => $slider,
            'featuredProducts' => $featuredProducts,
            'newArrivals' => $newArrivals,
            'categories' => $categories,
            'brands' => $brands,
            'blogPosts' => $blogPosts,
            'featuredWidgetProducts' => $featuredWidgetProducts,
            'bestSellingProducts' => $bestSellingProducts,
            'latestProducts' => $latestProducts,
            'topRatedProducts' => $topRatedProducts,
        ]);
    }
}
