<?php

declare(strict_types=1);

use App\Models\Product;
use App\Models\ProductVariant;
use Carbon\Carbon;

it('uses base product price when variant price is null', function (): void {
    $product = Product::factory()->create([
        'price' => 200,
    ]);

    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'price' => null,
    ]);

    expect($variant->getEffectivePrice())->toBe(200.0);
});

it('uses variant price when set', function (): void {
    $product = Product::factory()->create([
        'price' => 200,
    ]);

    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'price' => 250,
    ]);

    expect($variant->getEffectivePrice())->toBe(250.0);
});

it('applies special price when in date range', function (): void {
    Carbon::setTestNow('2025-01-10');

    $product = Product::factory()->create([
        'price' => 200,
        'special_price' => 150,
        'special_price_type' => 'fixed',
        'special_price_start' => '2025-01-01',
        'special_price_end' => '2025-01-31',
    ]);

    expect($product->getEffectivePrice())->toBe(150.0);
});

it('ignores special price when out of date range', function (): void {
    Carbon::setTestNow('2025-02-10');

    $product = Product::factory()->create([
        'price' => 200,
        'special_price' => 150,
        'special_price_type' => 'fixed',
        'special_price_start' => '2025-01-01',
        'special_price_end' => '2025-01-31',
    ]);

    expect($product->getEffectivePrice())->toBe(200.0);
});

it('handles percent special price', function (): void {
    Carbon::setTestNow('2025-01-10');

    $product = Product::factory()->create([
        'price' => 200,
        'special_price' => 10, // 10%
        'special_price_type' => 'percent',
        'special_price_start' => '2025-01-01',
        'special_price_end' => '2025-01-31',
    ]);

    expect($product->getEffectivePrice())->toBe(180.0);
});
