<?php

use App\Models\User;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

if (!function_exists('adminUser')) {
    function adminUser(): User {
        $user = User::factory()->create();
        test()->actingAs($user);
        return $user;
    }
}

it('lists variants for a product for admin', function () {
    adminUser();

    $product = Product::factory()->create([
        'price' => 100,
    ]);

    $v1 = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'sku'        => 'VAR-1',
        'price'      => 120,
        'quantity'   => 5,
        'is_active'  => true,
    ]);

    $v2 = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'sku'        => 'VAR-2',
        'price'      => 130,
        'quantity'   => 0,
        'is_active'  => false,
    ]);

    // başka ürün varyantı karışmasın diye
    $otherProduct = Product::factory()->create();
    $otherVariant = ProductVariant::factory()->create([
        'product_id' => $otherProduct->id,
    ]);

    $response = $this->getJson("/api/admin/products/{$product->id}/variants");

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'sku',
                    'price',
                    'quantity',
                    'is_active',
                ],
            ],
        ]);

    $ids = collect($response->json('data'))->pluck('id');

    expect($ids)->toContain($v1->id);
    expect($ids)->toContain($v2->id);
    expect($ids)->not()->toContain($otherVariant->id);
});

it('updates variant price, quantity and active flag', function () {
    adminUser();

    $product = Product::factory()->create([
        'price' => 100,
    ]);

    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'sku'        => 'VAR-1',
        'price'      => 120,
        'quantity'   => 5,
        'is_active'  => true,
    ]);

    $payload = [
        'price'     => 150.50,
        'quantity'  => 10,
        'is_active' => false,
    ];

    $response = $this->putJson("/api/admin/products/{$product->id}/variants/{$variant->id}", $payload);

    $response->assertStatus(200)
        ->assertJsonPath('data.price', 150.50)
        ->assertJsonPath('data.quantity', 10)
        ->assertJsonPath('data.is_active', false);

    $variant->refresh();

    expect((float) $variant->price)->toBe(150.50);
    expect($variant->quantity)->toBe(10);
    expect((bool) $variant->is_active)->toBeFalse();
});

it('returns 404 when updating variant that does not belong to product', function () {
    adminUser();

    $product = Product::factory()->create();
    $otherProduct = Product::factory()->create();

    $variant = ProductVariant::factory()->create([
        'product_id' => $otherProduct->id,
    ]);

    $response = $this->putJson("/api/admin/products/{$product->id}/variants/{$variant->id}", [
        'price' => 200,
    ]);

    $response->assertStatus(404);
});

it('soft deletes a variant via admin', function () {
    adminUser();

    $product = Product::factory()->create();

    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
    ]);

    $response = $this->deleteJson("/api/admin/products/{$product->id}/variants/{$variant->id}");

    $response->assertStatus(204);

    $this->assertSoftDeleted('product_variants', [
        'id' => $variant->id,
    ]);
});

it('validates variant update payload', function () {
    adminUser();

    $product = Product::factory()->create();

    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'price'      => 100,
        'quantity'   => 5,
    ]);

    $response = $this->putJson("/api/admin/products/{$product->id}/variants/{$variant->id}", [
        'price'    => -10,
        'quantity' => -5,
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['price', 'quantity']);
});

