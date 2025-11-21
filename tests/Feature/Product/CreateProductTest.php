<?php

use App\Models\Product;

it('creates a product', function () {
    $product = Product::factory()->create();

    expect($product->id)->not->toBeNull();
    expect($product->brand_id)->not->toBeNull();
    expect($product->tax_class_id)->not->toBeNull();
});
