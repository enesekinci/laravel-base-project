<?php

use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductVariant;

it('filters in API by color and size together', function () {
    $color = Option::factory()->create(['name' => 'Renk']);
    $size = Option::factory()->create(['name' => 'Beden']);

    $black = OptionValue::factory()->create(['option_id' => $color->id, 'value' => 'Siyah']);
    $white = OptionValue::factory()->create(['option_id' => $color->id, 'value' => 'Beyaz']);

    $sizeM = OptionValue::factory()->create(['option_id' => $size->id, 'value' => 'M']);
    $sizeL = OptionValue::factory()->create(['option_id' => $size->id, 'value' => 'L']);

    // ürün 1 → Siyah M
    $product1 = Product::factory()->create();
    $variant1 = ProductVariant::factory()->create(['product_id' => $product1->id]);
    $variant1->optionValues()->attach([
        $black->id => ['option_id' => $color->id],
        $sizeM->id => ['option_id' => $size->id],
    ]);

    // ürün 2 → Beyaz M
    $product2 = Product::factory()->create();
    $variant2 = ProductVariant::factory()->create(['product_id' => $product2->id]);
    $variant2->optionValues()->attach([
        $white->id => ['option_id' => $color->id],
        $sizeM->id => ['option_id' => $size->id],
    ]);

    // filtre: renk = siyah, beden = M
    $response = $this->getJson('/api/products?filter[color]='.$black->id.'&filter[size]='.$sizeM->id);

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.id', $product1->id);
});
