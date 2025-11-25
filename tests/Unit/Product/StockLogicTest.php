<?php

use App\Models\Product;
use App\Models\ProductVariant;

it('sets in_stock based on quantity when manage_stock enabled', function () {
    $product = Product::factory()->create([
        'manage_stock' => true,
        'quantity' => 10,
        'in_stock' => false, // yanlış da olsa helper düzeltecek
    ]);

    expect($product->isInStock())->toBeTrue();

    $product->quantity = 0;
    expect($product->isInStock())->toBeFalse();
});

it('respects manual in_stock when manage_stock disabled', function () {
    $product = Product::factory()->create([
        'manage_stock' => false,
        'quantity' => 0,
        'in_stock' => true,
    ]);

    expect($product->isInStock())->toBeTrue();

    $product->in_stock = false;
    expect($product->isInStock())->toBeFalse();
});

it('variant stock overrides product stock', function () {
    $product = Product::factory()->create([
        'manage_stock' => true,
        'quantity' => 0,
        'in_stock' => false,
    ]);

    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'manage_stock' => true,
        'quantity' => 5,
        'in_stock' => true,
    ]);

    expect($variant->isInStock())->toBeTrue();
});
