<?php

declare(strict_types=1);

use App\Models\Brand;
use App\Models\Product;
use App\Models\TaxClass;
use Illuminate\Support\Str;

it('creates product via admin', function (): void {
    adminUser();
    $brand = Brand::factory()->create();
    $tax = TaxClass::factory()->create();

    $payload = [
        'name' => 'Admin Product',
        'slug' => Str::slug('Admin Product'),
        'sku' => 'ADMIN-001',
        'price' => 199.90,
        'brand_id' => $brand->id,
        'tax_class_id' => $tax->id,
        'is_active' => true,
    ];

    $response = $this->postJson(route('api.admin.products.store'), $payload);

    $response->assertStatus(201);

    $this->assertDatabaseHas('products', [
        'name' => 'Admin Product',
        'sku' => 'ADMIN-001',
    ]);
});

it('validates required fields on create', function (): void {
    adminUser();
    $response = $this->postJson(route('api.admin.products.store'), []);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'price']);
});

it('updates product via admin', function (): void {
    adminUser();
    $product = Product::factory()->create([
        'name' => 'Old Name',
        'price' => 100,
    ]);

    $payload = [
        'name' => 'New Name',
        'price' => 150,
    ];

    $response = $this->putJson(route('api.admin.products.update', $product), $payload);

    $response->assertStatus(200);

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'name' => 'New Name',
        'price' => 150,
    ]);
});

it('soft deletes product via admin', function (): void {
    adminUser();
    $product = Product::factory()->create();

    $response = $this->deleteJson(route('api.admin.products.destroy', $product));

    $response->assertStatus(204);

    $this->assertSoftDeleted('products', [
        'id' => $product->id,
    ]);
});
