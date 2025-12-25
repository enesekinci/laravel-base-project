<?php

declare(strict_types=1);

use App\Domains\Crm\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function actingUser()
{
    $user = User::factory()->create();
    test()->actingAs($user);

    return $user;
}

it('returns empty cart for user initially', function (): void {
    $user = actingUser();

    $response = $this->getJson('/api/cart');

    $response->assertStatus(200)
        ->assertJson([
            'data' => [
                'items' => [],
                'subtotal' => 0,
                'total' => 0,
                'items_count' => 0,
            ],
        ]);

    expect(Cart::count())->toBe(1);
    $cart = Cart::first();
    expect($cart->user_id)->toBe($user->id);
    expect($cart->status)->toBe('active');
});

it('adds a product to cart and calculates totals', function (): void {
    $user = actingUser();

    $product = Product::factory()->create([
        'price' => 100,
    ]);

    $payload = [
        'product_id' => $product->id,
        'quantity' => 2,
    ];

    $response = $this->postJson('/api/cart/items', $payload);

    $response->assertStatus(201)
        ->assertJsonStructure([
            'data' => [
                'id',
                'quantity',
                'unit_price',
                'total_price',
                'product' => [
                    'id',
                    'name',
                    'slug',
                ],
            ],
        ]);

    $cart = Cart::first();
    $item = CartItem::first();

    expect($cart->items_count)->toBe(1);
    expect((float) $cart->subtotal)->toBe(200.0);
    expect((float) $cart->total)->toBe(200.0);

    expect($item->product_id)->toBe($product->id);
    expect($item->product_variant_id)->toBeNull();
    expect($item->quantity)->toBe(2);
    expect((float) $item->unit_price)->toBe(100.0);
    expect((float) $item->total_price)->toBe(200.0);
});

it('uses variant price when adding variant to cart', function (): void {
    $user = actingUser();

    $product = Product::factory()->create([
        'price' => 100,
    ]);

    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'price' => 150,
    ]);

    $payload = [
        'product_id' => $product->id,
        'product_variant_id' => $variant->id,
        'quantity' => 1,
    ];

    $response = $this->postJson('/api/cart/items', $payload);

    $response->assertStatus(201);

    $item = CartItem::first();
    $cart = Cart::first();

    expect((float) $item->unit_price)->toBe(150.0);
    expect((float) $item->total_price)->toBe(150.0);
    expect((float) $cart->total)->toBe(150.0);
});

it('increments quantity when adding same product+variant again', function (): void {
    $user = actingUser();

    $product = Product::factory()->create([
        'price' => 100,
    ]);

    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'price' => 120,
    ]);

    $payload = [
        'product_id' => $product->id,
        'product_variant_id' => $variant->id,
        'quantity' => 1,
    ];

    $this->postJson('/api/cart/items', $payload)->assertStatus(201);
    $this->postJson('/api/cart/items', $payload)->assertStatus(201);

    $cart = Cart::first();
    $item = CartItem::first();

    expect(CartItem::count())->toBe(1);
    expect($item->quantity)->toBe(2);
    expect((float) $item->unit_price)->toBe(120.0);
    expect((float) $item->total_price)->toBe(240.0);
    expect((float) $cart->total)->toBe(240.0);
});

it('updates cart item quantity', function (): void {
    $user = actingUser();

    $product = Product::factory()->create([
        'price' => 50,
    ]);

    $this->postJson('/api/cart/items', [
        'product_id' => $product->id,
        'quantity' => 2,
    ])->assertStatus(201);

    $item = CartItem::first();

    $response = $this->putJson('/api/cart/items/'.$item->id, [
        'quantity' => 5,
    ]);

    $response->assertStatus(200)
        ->assertJsonPath('data.quantity', 5);

    $item->refresh();
    $cart = Cart::first();

    expect($item->quantity)->toBe(5);
    expect((float) $item->total_price)->toBe(250.0);
    expect((float) $cart->total)->toBe(250.0);
});

it('removes cart item when quantity set to zero', function (): void {
    $user = actingUser();

    $product = Product::factory()->create([
        'price' => 80,
    ]);

    $this->postJson('/api/cart/items', [
        'product_id' => $product->id,
        'quantity' => 2,
    ])->assertStatus(201);

    $item = CartItem::first();

    $response = $this->putJson('/api/cart/items/'.$item->id, [
        'quantity' => 0,
    ]);

    $response->assertStatus(200);

    expect(CartItem::count())->toBe(0);

    $cart = Cart::first();
    expect((float) $cart->total)->toBe(0.0);
    expect($cart->items_count)->toBe(0);
});

it('deletes cart item via delete endpoint', function (): void {
    $user = actingUser();

    $product = Product::factory()->create([
        'price' => 100,
    ]);

    $this->postJson('/api/cart/items', [
        'product_id' => $product->id,
        'quantity' => 1,
    ])->assertStatus(201);

    $item = CartItem::first();

    $response = $this->deleteJson('/api/cart/items/'.$item->id);

    $response->assertStatus(204);

    expect(CartItem::count())->toBe(0);
    $cart = Cart::first();
    expect((float) $cart->total)->toBe(0.0);
    expect($cart->items_count)->toBe(0);
});

it('validates quantity and product existence', function (): void {
    $user = actingUser();

    $response = $this->postJson('/api/cart/items', [
        'product_id' => 999999,
        'quantity' => 0,
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['product_id', 'quantity']);
});
