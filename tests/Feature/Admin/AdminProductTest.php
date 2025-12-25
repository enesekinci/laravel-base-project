<?php

declare(strict_types=1);

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists products with filters for admin', function (): void {
    adminUser();

    $brandA = Brand::factory()->create(['name' => 'Brand A']);
    $brandB = Brand::factory()->create(['name' => 'Brand B']);

    $cat1 = Category::factory()->create(['name' => 'T-Shirts']);
    $cat2 = Category::factory()->create(['name' => 'Shoes']);

    $p1 = Product::factory()->create([
        'name' => 'Basic T-Shirt',
        'slug' => 'basic-t-shirt',
        'sku' => 'TSHIRT-1',
        'price' => 100,
        'is_active' => true,
        'brand_id' => $brandA->id,
        'in_stock' => true,
    ]);
    $p1->categories()->sync([$cat1->id]);

    $p2 = Product::factory()->create([
        'name' => 'Running Shoes',
        'slug' => 'running-shoes',
        'sku' => 'SHOE-1',
        'price' => 500,
        'is_active' => false,
        'brand_id' => $brandB->id,
        'in_stock' => false,
    ]);
    $p2->categories()->sync([$cat2->id]);

    // basic list
    $res = $this->getJson('/api/admin/products');

    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'slug',
                    'sku',
                    'price',
                    'is_active',
                    'in_stock',
                    'brand' => [
                        'id',
                        'name',
                    ],
                    'categories' => [
                        '*' => ['id', 'name', 'slug'],
                    ],
                ],
            ],
            'meta' => [
                'current_page',
                'per_page',
                'total',
            ],
        ]);

    // search filter
    $res2 = $this->getJson('/api/admin/products?search=shirt');
    $res2->assertStatus(200);
    $ids2 = collect($res2->json('data'))->pluck('id');

    expect($ids2)->toContain($p1->id);
    expect($ids2)->not()->toContain($p2->id);

    // brand + is_active filter
    $res3 = $this->getJson('/api/admin/products?brand_id='.$brandB->id.'&is_active=0');
    $res3->assertStatus(200);
    $ids3 = collect($res3->json('data'))->pluck('id');

    expect($ids3)->toContain($p2->id);
    expect($ids3)->not()->toContain($p1->id);

    // category filter
    $res4 = $this->getJson('/api/admin/products?category_id='.$cat1->id);
    $res4->assertStatus(200);
    $ids4 = collect($res4->json('data'))->pluck('id');

    expect($ids4)->toContain($p1->id);
    expect($ids4)->not()->toContain($p2->id);
});

it('shows product detail with relations for admin', function (): void {
    adminUser();

    $brand = Brand::factory()->create();
    $cat = Category::factory()->create();

    $product = Product::factory()->create([
        'name' => 'Basic T-Shirt',
        'slug' => 'basic-t-shirt',
        'sku' => 'TSHIRT-1',
        'price' => 100,
        'brand_id' => $brand->id,
        'description' => 'Long description',
        'short_description' => 'Short',
        'is_active' => true,
        'in_stock' => true,
    ]);

    $product->categories()->sync([$cat->id]);

    $res = $this->getJson("/api/admin/products/{$product->id}");

    $res->assertStatus(200)
        ->assertJsonPath('data.id', $product->id)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'slug',
                'sku',
                'price',
                'special_price',
                'is_active',
                'in_stock',
                'manage_stock',
                'quantity',
                'description',
                'short_description',
                'brand' => [
                    'id',
                    'name',
                ],
                'categories' => [
                    '*' => ['id', 'name', 'slug'],
                ],
                'images' => [
                    '*' => ['id', 'path', 'is_base', 'sort_order'],
                ],
            ],
        ]);
});

it('creates a product with basic fields and categories', function (): void {
    adminUser();

    $brand = Brand::factory()->create();
    $cat1 = Category::factory()->create();
    $cat2 = Category::factory()->create();

    $payload = [
        'name' => 'New Product',
        'slug' => 'new-product',
        'sku' => 'NP-001',
        'price' => 199.99,
        'special_price' => null,
        'is_active' => true,
        'in_stock' => true,
        'manage_stock' => true,
        'quantity' => 10,
        'brand_id' => $brand->id,
        'category_ids' => [$cat1->id, $cat2->id],
    ];

    $res = $this->postJson('/api/admin/products', $payload);

    $res->assertStatus(201)
        ->assertJsonPath('data.name', 'New Product')
        ->assertJsonPath('data.brand.id', $brand->id);

    $productId = $res->json('data.id');

    $this->assertDatabaseHas('products', [
        'id' => $productId,
        'name' => 'New Product',
        'brand_id' => $brand->id,
        'is_active' => true,
    ]);

    $this->assertDatabaseHas('product_categories', [
        'product_id' => $productId,
        'category_id' => $cat1->id,
    ]);

    $this->assertDatabaseHas('product_categories', [
        'product_id' => $productId,
        'category_id' => $cat2->id,
    ]);
});

it('updates a product and syncs categories', function (): void {
    adminUser();

    $brand1 = Brand::factory()->create();
    $brand2 = Brand::factory()->create();

    $cat1 = Category::factory()->create();
    $cat2 = Category::factory()->create();
    $cat3 = Category::factory()->create();

    $product = Product::factory()->create([
        'name' => 'Old Name',
        'slug' => 'old-name',
        'sku' => 'OLD-001',
        'price' => 50,
        'brand_id' => $brand1->id,
        'is_active' => true,
        'in_stock' => true,
        'quantity' => 5,
    ]);

    $product->categories()->sync([$cat1->id, $cat2->id]);

    $payload = [
        'name' => 'Updated Name',
        'slug' => 'updated-name',
        'sku' => 'UPD-001',
        'price' => 120,
        'is_active' => false,
        'in_stock' => false,
        'manage_stock' => true,
        'quantity' => 0,
        'brand_id' => $brand2->id,
        'category_ids' => [$cat3->id],
    ];

    $res = $this->putJson("/api/admin/products/{$product->id}", $payload);

    $res->assertStatus(200)
        ->assertJsonPath('data.name', 'Updated Name')
        ->assertJsonPath('data.brand.id', $brand2->id);

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'name' => 'Updated Name',
        'slug' => 'updated-name',
        'sku' => 'UPD-001',
        'price' => 120,
        'brand_id' => $brand2->id,
        'is_active' => false,
        'in_stock' => false,
        'quantity' => 0,
    ]);

    $this->assertDatabaseMissing('product_categories', [
        'product_id' => $product->id,
        'category_id' => $cat1->id,
    ]);

    $this->assertDatabaseHas('product_categories', [
        'product_id' => $product->id,
        'category_id' => $cat3->id,
    ]);
});

it('soft deletes and restores a product', function (): void {
    adminUser();

    $product = Product::factory()->create();

    // delete
    $res = $this->deleteJson("/api/admin/products/{$product->id}");
    $res->assertStatus(204);

    $this->assertSoftDeleted('products', [
        'id' => $product->id,
    ]);

    // index must not show deleted
    $res2 = $this->getJson('/api/admin/products');
    $ids2 = collect($res2->json('data'))->pluck('id');

    expect($ids2)->not()->toContain($product->id);

    // restore
    $res3 = $this->postJson("/api/admin/products/{$product->id}/restore");
    $res3->assertStatus(200)
        ->assertJsonPath('data.id', $product->id);

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'deleted_at' => null,
    ]);
});

it('toggles product active status', function (): void {
    adminUser();

    $product = Product::factory()->create([
        'is_active' => true,
    ]);

    $res = $this->postJson("/api/admin/products/{$product->id}/toggle-active");
    $res->assertStatus(200)
        ->assertJsonPath('data.is_active', false);

    $product->refresh();
    expect((bool) $product->is_active)->toBeFalse();

    $res2 = $this->postJson("/api/admin/products/{$product->id}/toggle-active");
    $res2->assertStatus(200)
        ->assertJsonPath('data.is_active', true);

    $product->refresh();
    expect((bool) $product->is_active)->toBeTrue();
});

it('validates product create payload', function (): void {
    adminUser();

    $res = $this->postJson('/api/admin/products', [
        'name' => '',
        'slug' => '',
        'price' => -10,
    ]);

    $res->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'slug', 'price']);
});
