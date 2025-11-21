<?php

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Faq;
use App\Models\FeatureBox;
use App\Models\InfoBox;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('renders demo1 index page successfully', function () {
    $response = $this->get(route('demo1'));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.index');
});

it('renders demo1 about page successfully', function () {
    $response = $this->get(route('porto.page', ['page' => 'demo1-about.html']));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.about');
});

it('renders demo1 contact page successfully', function () {
    $response = $this->get(route('porto.page', ['page' => 'demo1-contact.html']));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.contact');
});

it('renders demo1 shop page successfully', function () {
    $response = $this->get(route('porto.page', ['page' => 'demo1-shop.html']));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.shop');
});

it('renders demo1 blog page successfully', function () {
    $response = $this->get(route('porto.page', ['page' => 'demo1-blog.html']));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.blog');
});

it('renders demo1 product page successfully', function () {
    $product = Product::factory()->create(['status' => 'published']);

    $response = $this->get(route('porto.page', ['page' => 'demo1-product.html', 'product' => $product->slug]));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.product');
});

it('renders demo1 single blog post page successfully', function () {
    $post = Blog::factory()->create([
        'status' => 'published',
        'published_at' => now(),
    ]);

    $response = $this->get(route('porto.page', ['page' => 'demo1-single.html', 'post' => $post->slug]));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.single');
});

it('renders demo1 cart page successfully', function () {
    $response = $this->get(route('porto.page', ['page' => 'demo1-cart.html']));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.cart');
});

it('renders demo1 checkout page successfully', function () {
    $response = $this->get(route('porto.page', ['page' => 'demo1-checkout.html']));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.checkout');
});

it('renders demo1 wishlist page successfully', function () {
    $response = $this->get(route('porto.page', ['page' => 'demo1-wishlist.html']));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.wishlist');
});

it('renders demo1 dashboard page successfully', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this->actingAs($user)
        ->get(route('porto.page', ['page' => 'demo1-dashboard.html']));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.dashboard');
});

it('renders demo1 login page successfully', function () {
    $response = $this->get(route('porto.page', ['page' => 'demo1-login.html']));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.login');
});

it('renders demo1 forgot password page successfully', function () {
    $response = $this->get(route('porto.page', ['page' => 'demo1-forgot-password.html']));

    $response->assertStatus(200);
    $response->assertViewIs('porto.demo1.forgot-password');
});

it('passes required data to demo1 index view', function () {
    InfoBox::factory()->count(3)->create(['is_active' => true, 'location' => 'home']);
    Slider::factory()->count(2)->create(['is_active' => true, 'location' => 'home']);
    Banner::factory()->count(3)->create(['is_active' => true, 'position' => 'home']);
    Product::factory()->count(5)->create(['status' => 'published', 'is_featured' => true]);
    Brand::factory()->count(3)->create(['is_active' => true]);

    $response = $this->get(route('demo1'));

    $response->assertStatus(200);
    $response->assertViewHas('infoBoxes');
    $response->assertViewHas('sliders');
    $response->assertViewHas('banners');
    $response->assertViewHas('featuredProducts');
    $response->assertViewHas('brands');
});

it('passes required data to demo1 shop view', function () {
    Product::factory()->count(10)->create(['status' => 'published']);
    Category::factory()->count(5)->create(['is_active' => true]);

    $response = $this->get(route('porto.page', ['page' => 'demo1-shop.html']));

    $response->assertStatus(200);
    $response->assertViewHas('products');
});

it('passes required data to demo1 product view', function () {
    $product = Product::factory()->create(['status' => 'published']);
    Product::factory()->count(4)->create(['status' => 'published']);

    $response = $this->get(route('porto.page', ['page' => 'demo1-product.html', 'product' => $product->slug]));

    $response->assertStatus(200);
    $response->assertViewHas('product');
});

it('passes required data to demo1 blog view', function () {
    Blog::factory()->count(5)->create([
        'status' => 'published',
        'published_at' => now(),
    ]);

    $response = $this->get(route('porto.page', ['page' => 'demo1-blog.html']));

    $response->assertStatus(200);
    $response->assertViewHas('blogPosts');
});

it('passes required data to demo1 contact view', function () {
    Faq::factory()->count(3)->create(['is_active' => true]);
    FeatureBox::factory()->count(4)->create(['is_active' => true, 'location' => 'contact']);

    $response = $this->get(route('porto.page', ['page' => 'demo1-contact.html']));

    $response->assertStatus(200);
    $response->assertViewHas('faqs');
    $response->assertViewHas('contactInfoBoxes');
});

it('passes required data to demo1 about view', function () {
    FeatureBox::factory()->count(3)->create(['is_active' => true, 'location' => 'about']);

    $response = $this->get(route('porto.page', ['page' => 'demo1-about.html']));

    $response->assertStatus(200);
    $response->assertViewHas('featureBoxes');
});

it('returns 404 for non-existent page', function () {
    $response = $this->get(route('porto.page', ['page' => 'non-existent-page.html']));

    $response->assertStatus(404);
});

it('handles query parameters correctly', function () {
    Category::factory()->create(['slug' => 'test-category', 'is_active' => true]);
    Product::factory()->count(5)->create(['status' => 'published']);

    $response = $this->get(route('porto.page', ['page' => 'demo1-shop.html', 'category' => 'test-category']));

    $response->assertStatus(200);
});

it('uses correct demo CSS class', function () {
    $response = $this->get(route('demo1'));

    $response->assertStatus(200);
    $response->assertViewHas('demoCss', 'demo1');
});

it('uses correct main class for demo1 index', function () {
    $response = $this->get(route('demo1'));

    $response->assertStatus(200);
    $response->assertViewHas('mainClass', 'home');
});

