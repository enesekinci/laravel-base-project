<?php

use App\Models\User;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\TaxClass;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

if (!function_exists('actingUser')) {
    function actingUser()
    {
        $user = User::factory()->create();
        test()->actingAs($user, 'sanctum');
        return $user;
    }
}

it('creates an order from cart and empties cart', function () {
    $user = actingUser();

    $tax = TaxClass::factory()->create(['rate' => 18]);

    $product = Product::factory()->create([
        'price'        => 100,
        'tax_class_id' => $tax->id,
        'manage_stock' => true,
        'quantity'     => 10,
    ]);

    $cart = Cart::factory()->create([
        'user_id' => $user->id,
        'status'  => 'active',
    ]);

    CartItem::factory()->create([
        'cart_id'           => $cart->id,
        'product_id'        => $product->id,
        'product_variant_id' => null,
        'quantity'          => 2,
        'unit_price'        => 100,
        'total_price'       => 200,
    ]);

    $payload = [
        'payment_method' => 'cod',
        'shipping_total' => 10,
    ];

    $res = $this->postJson('/api/checkout', $payload);

    $res->assertStatus(201)
        ->assertJsonStructure([
            'data' => [
                'id',
                'status',
                'subtotal',
                'tax_total',
                'shipping_total',
                'grand_total',
                'items' => [
                    '*' => [
                        'id',
                        'product_id',
                        'name',
                        'unit_price',
                        'quantity',
                        'total',
                    ],
                ],
            ],
        ]);

    $orderId = $res->json('data.id');

    $this->assertDatabaseHas('orders', [
        'id'     => $orderId,
        'user_id' => $user->id,
    ]);

    // cart silinmiş/boş olmalı
    $this->assertDatabaseMissing('cart_items', [
        'cart_id' => $cart->id,
    ]);
});

it('applies coupon discount on checkout', function () {
    $user = actingUser();

    $product = Product::factory()->create([
        'price'        => 200,
        'tax_class_id' => null, // Tax yok
        'manage_stock' => false,
    ]);

    $cart = Cart::factory()->create([
        'user_id' => $user->id,
        'status'  => 'active',
    ]);

    CartItem::factory()->create([
        'cart_id'    => $cart->id,
        'product_id' => $product->id,
        'quantity'   => 1,
        'unit_price' => 200,
        'total_price' => 200,
    ]);

    $coupon = Coupon::factory()->create([
        'code'          => 'SAVE10',
        'type'          => 'percent',
        'value'         => 10,     // %10
        'min_cart_total' => 100,
        'is_active'     => true,
        'starts_at'     => Carbon::now()->subDay(),
        'ends_at'       => Carbon::now()->addDay(),
    ]);

    $res = $this->postJson('/api/checkout', [
        'coupon_code' => 'SAVE10',
    ]);

    $res->assertStatus(201);

    $data = $res->json('data');

    expect((float) $data['subtotal'])->toBe(200.0);
    expect((float) $data['discount_total'])->toBe(20.0);
    expect((float) $data['grand_total'])->toBe(180.0);

    $this->assertDatabaseHas('orders', [
        'id'             => $data['id'],
        'coupon_code'    => 'SAVE10',
        'coupon_discount' => 20.0,
    ]);
});
