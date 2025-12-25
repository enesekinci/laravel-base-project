<?php

declare(strict_types=1);

use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Services\ProductVariantGenerator;

it('generates all combinations of options', function (): void {
    $product = Product::factory()->create();
    $generator = new ProductVariantGenerator;

    $colorOption = Option::factory()->create(['name' => 'Renk']);
    $black = OptionValue::factory()->create(['option_id' => $colorOption->id, 'value' => 'Siyah']);
    $white = OptionValue::factory()->create(['option_id' => $colorOption->id, 'value' => 'Beyaz']);

    $sizeOption = Option::factory()->create(['name' => 'Beden']);
    $sizeS = OptionValue::factory()->create(['option_id' => $sizeOption->id, 'value' => 'S']);
    $sizeM = OptionValue::factory()->create(['option_id' => $sizeOption->id, 'value' => 'M']);

    $options = [
        [
            'option_id' => $colorOption->id,
            'value_ids' => [$black->id, $white->id],
        ],
        [
            'option_id' => $sizeOption->id,
            'value_ids' => [$sizeS->id, $sizeM->id],
        ],
    ];

    $variants = $generator->generate($product, $options);

    expect($variants)->toHaveCount(4);
});
