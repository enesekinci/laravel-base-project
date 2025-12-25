<?php

declare(strict_types=1);

use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductVariant;

it('filters products by option value (color)', function (): void {
    $color = Option::factory()->create(['name' => 'Renk']);

    $black = OptionValue::factory()->create([
        'option_id' => $color->id,
        'value' => 'Siyah',
    ]);

    $white = OptionValue::factory()->create([
        'option_id' => $color->id,
        'value' => 'Beyaz',
    ]);

    // Product with black variant
    $productBlack = Product::factory()->create();
    $variantBlack = ProductVariant::factory()->create(['product_id' => $productBlack->id]);

    $variantBlack->optionValues()->attach($black->id, ['option_id' => $color->id]);

    // Product with white variant
    $productWhite = Product::factory()->create();
    $variantWhite = ProductVariant::factory()->create(['product_id' => $productWhite->id]);

    $variantWhite->optionValues()->attach($white->id, ['option_id' => $color->id]);

    // FILTER (simulate)
    $products = Product::whereHas('variants.optionValues', function ($q) use ($black): void {
        $q->where('option_value_id', $black->id);
    })->get();

    expect($products->count())->toBe(1);
    expect($products->first()->id)->toBe($productBlack->id);
});
