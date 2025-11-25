<?php

use App\Models\ProductVariant;

it('creates a product variant', function () {
    $variant = ProductVariant::factory()->create();

    expect($variant->product_id)->not->toBeNull();
    expect($variant->sku)->not->toBeNull();
});

it('attaches option values to a variant', function () {
    $variant = ProductVariant::factory()->create();
    $value = \App\Models\OptionValue::factory()->create();

    $variant->optionValues()->attach($value->id, [
        'option_id' => $value->option_id,
    ]);

    expect($variant->optionValues()->count())->toBe(1);
});
