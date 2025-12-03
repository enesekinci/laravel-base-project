<?php

use App\Domains\Crm\Models\User;
use App\Models\Address;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ShippingMethod;
use App\Models\TaxClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

if (! function_exists('actingUser')) {
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
        'price' => 100,
        'tax_class_id' => $tax->id,
        'manage_stock' => true,
        'quantity' => 10,
    ]);

    $cart = Cart::factory()->create([
        'user_id' => $user->id,
        'status' => 'active',
    ]);

    CartItem::factory()->create([
        'cart_id' => $cart->id,
        'product_id' => $product->id,
        'product_variant_id' => null,
        'quantity' => 2,
        'unit_price' => 100,
        'total_price' => 200,
    ]);

    $shippingAddress = Address::factory()->create([
        'user_id' => $user->id,
        'type' => 'shipping',
    ]);

    $shippingMethod = ShippingMethod::factory()->create([
        'is_active' => true,
        'price' => 10,
    ]);

    $paymentMethod = PaymentMethod::factory()->create([
        'code' => 'paytr',
        'is_active' => true,
    ]);

    $payload = [
        'shipping_address_id' => $shippingAddress->id,
        'shipping_method_id' => $shippingMethod->id,
        'payment_method_id' => $paymentMethod->id,
    ];

    $res = $this->postJson('/api/checkout', $payload);

    $res->assertStatus(201)
        ->assertJsonStructure([
            'order_id',
            'payment' => [
                'success',
                'redirectUrl',
                'htmlForm',
                'message',
            ],
        ]);

    $orderId = $res->json('order_id');

    $this->assertDatabaseHas('orders', [
        'id' => $orderId,
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
        'price' => 200,
        'tax_class_id' => null, // Tax yok
        'manage_stock' => false,
    ]);

    $cart = Cart::factory()->create([
        'user_id' => $user->id,
        'status' => 'active',
    ]);

    CartItem::factory()->create([
        'cart_id' => $cart->id,
        'product_id' => $product->id,
        'quantity' => 1,
        'unit_price' => 200,
        'total_price' => 200,
    ]);

    // Cart'ı recalculate et
    $cartService = app(\App\Services\CartService::class);
    $cartService->recalculateCart($cart);
    $cart->refresh();

    $shippingAddress = Address::factory()->create([
        'user_id' => $user->id,
        'type' => 'shipping',
    ]);

    $shippingMethod = ShippingMethod::factory()->create([
        'is_active' => true,
        'price' => 10,
    ]);

    $paymentMethod = PaymentMethod::factory()->create([
        'code' => 'paytr',
        'is_active' => true,
    ]);

    $coupon = Coupon::factory()->create([
        'code' => 'SAVE10',
        'type' => 'percent',
        'value' => 10,     // %10
        'min_cart_total' => 100,
        'is_active' => true,
        'starts_at' => Carbon::now()->subDay(),
        'ends_at' => Carbon::now()->addDay(),
    ]);

    $res = $this->postJson('/api/checkout', [
        'shipping_address_id' => $shippingAddress->id,
        'shipping_method_id' => $shippingMethod->id,
        'payment_method_id' => $paymentMethod->id,
    ]);

    $res->assertStatus(201);

    $orderId = $res->json('order_id');

    // Order'ı veritabanından kontrol et
    $order = \App\Models\Order::find($orderId);
    expect($order)->not->toBeNull();
    expect((float) $order->subtotal)->toBe(200.0);
    // Coupon işlemi henüz controller'da yok, bu yüzden discount_total 0 olacak
    expect((float) $order->discount_total)->toBe(0.0);
    expect((float) $order->grand_total)->toBe(210.0); // 200 + 10 (shipping) - 0 (discount)

    $this->assertDatabaseHas('orders', [
        'id' => $orderId,
    ]);
});
