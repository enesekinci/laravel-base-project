<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Brand;
use App\Models\TaxClass;
use Illuminate\Support\Str;

if (!function_exists('adminUser')) {
    function adminUser(): User {
        $user = User::factory()->create();
        test()->actingAs($user);
        return $user;
    }
}

it('creates product via admin', function () {
    adminUser();
    $brand = Brand::factory()->create();
    $tax   = TaxClass::factory()->create();

    $payload = [
        'name'        => 'Admin Product',
        'slug'        => Str::slug('Admin Product'),
        'sku'         => 'ADMIN-001',
        'price'       => 199.90,
        'brand_id'    => $brand->id,
        'tax_class_id'=> $tax->id,
        'is_active'   => true,
    ];

    $response = $this->postJson(route('admin.products.store'), $payload);

    $response->assertStatus(201);

    $this->assertDatabaseHas('products', [
        'name' => 'Admin Product',
        'sku'  => 'ADMIN-001',
    ]);
});

it('validates required fields on create', function () {
    adminUser();
    $response = $this->postJson(route('admin.products.store'), []);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'price']);
});

it('updates product via admin', function () {
    adminUser();
    $product = Product::factory()->create([
        'name'  => 'Old Name',
        'price' => 100,
    ]);

    $payload = [
        'name'  => 'New Name',
        'price' => 150,
    ];

    $response = $this->putJson(route('admin.products.update', $product), $payload);

    $response->assertStatus(200);

    $this->assertDatabaseHas('products', [
        'id'   => $product->id,
        'name' => 'New Name',
        'price'=> 150,
    ]);
});

it('soft deletes product via admin', function () {
    adminUser();
    $product = Product::factory()->create();

    $response = $this->deleteJson(route('admin.products.destroy', $product));

    $response->assertStatus(204);

    $this->assertSoftDeleted('products', [
        'id' => $product->id,
    ]);
});

