<?php

declare(strict_types=1);

use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductVariant;

it('generates product variants from options', function (): void {
    adminUser();
    $product = Product::factory()->create();

    $colorOption = Option::factory()->create(['name' => 'Renk']);
    $black = OptionValue::factory()->create([
        'option_id' => $colorOption->id,
        'value' => 'Siyah',
    ]);
    $white = OptionValue::factory()->create([
        'option_id' => $colorOption->id,
        'value' => 'Beyaz',
    ]);

    $sizeOption = Option::factory()->create(['name' => 'Beden']);
    $sizeS = OptionValue::factory()->create([
        'option_id' => $sizeOption->id,
        'value' => 'S',
    ]);
    $sizeM = OptionValue::factory()->create([
        'option_id' => $sizeOption->id,
        'value' => 'M',
    ]);

    $payload = [
        'options' => [
            [
                'option_id' => $colorOption->id,
                'value_ids' => [$black->id, $white->id],
            ],
            [
                'option_id' => $sizeOption->id,
                'value_ids' => [$sizeS->id, $sizeM->id],
            ],
        ],
        'base' => [
            'price' => 299.90,
            'quantity' => 10,
        ],
    ];

    $response = $this->postJson(
        route('api.admin.products.variants.generate', $product),
        $payload
    );

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'sku',
                    'price',
                ],
            ],
            'meta' => [
                'created_count',
            ],
        ]);

    expect($response->json('meta.created_count'))->toBe(4);
    expect(ProductVariant::where('product_id', $product->id)->count())->toBe(4);
});

it('skips existing variant combinations', function (): void {
    adminUser();
    $product = Product::factory()->create();

    $colorOption = Option::factory()->create(['name' => 'Renk']);
    $black = OptionValue::factory()->create([
        'option_id' => $colorOption->id,
        'value' => 'Siyah',
    ]);

    $sizeOption = Option::factory()->create(['name' => 'Beden']);
    $sizeM = OptionValue::factory()->create([
        'option_id' => $sizeOption->id,
        'value' => 'M',
    ]);

    // Mevcut varyant oluştur
    $existingVariant = ProductVariant::factory()->create(['product_id' => $product->id]);
    $existingVariant->optionValues()->attach([
        $black->id => ['option_id' => $colorOption->id],
        $sizeM->id => ['option_id' => $sizeOption->id],
    ]);

    $payload = [
        'options' => [
            [
                'option_id' => $colorOption->id,
                'value_ids' => [$black->id],
            ],
            [
                'option_id' => $sizeOption->id,
                'value_ids' => [$sizeM->id],
            ],
        ],
    ];

    $response = $this->postJson(
        route('api.admin.products.variants.generate', $product),
        $payload
    );

    expect($response->json('meta.created_count'))->toBe(0);
    expect(ProductVariant::where('product_id', $product->id)->count())->toBe(1);
});
