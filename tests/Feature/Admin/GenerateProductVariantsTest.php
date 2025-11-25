<?php

use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductVariant;

it('generates variants for all option combinations', function () {
    adminUser();
    // Arrange
    $product = Product::factory()->create([
        'price' => 299.90,
    ]);

    // Options: Renk, Beden
    $colorOption = Option::factory()->create(['name' => 'Renk']);
    $sizeOption = Option::factory()->create(['name' => 'Beden']);

    // Option values
    $black = OptionValue::factory()->create([
        'option_id' => $colorOption->id,
        'value' => 'Siyah',
    ]);

    $white = OptionValue::factory()->create([
        'option_id' => $colorOption->id,
        'value' => 'Beyaz',
    ]);

    $sizeS = OptionValue::factory()->create([
        'option_id' => $sizeOption->id,
        'value' => 'S',
    ]);

    $sizeM = OptionValue::factory()->create([
        'option_id' => $sizeOption->id,
        'value' => 'M',
    ]);

    // Payload: 2 renk x 2 beden = 4 kombinasyon
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
            'manage_stock' => true,
            'quantity' => 0,
        ],
    ];

    // Act
    $response = $this->postJson(
        route('api.admin.products.variants.generate', $product),
        $payload
    );

    // Assert: Response
    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'sku',
                    'price',
                    'in_stock',
                    'is_active',
                    'option_values' => [
                        '*' => [
                            'id',
                            'value',
                            'option' => [
                                'id',
                                'name',
                            ],
                        ],
                    ],
                ],
            ],
            'meta' => [
                'created_count',
            ],
        ]);

    // 4 kombinasyon bekliyoruz
    $json = $response->json();
    expect($json['meta']['created_count'])->toBe(4);

    // DB assertion: 4 variant oluşmuş olmalı
    $this->assertDatabaseCount('product_variants', 4);

    // Her varyantın en az 2 option_value pivotu olmalı (Renk + Beden)
    $variants = ProductVariant::where('product_id', $product->id)->get();

    expect($variants)->toHaveCount(4);

    foreach ($variants as $variant) {
        expect($variant->optionValues)->toHaveCount(2);
    }
});

it('does not create duplicate variants when generate is called again', function () {
    adminUser();
    // Arrange
    $product = Product::factory()->create([
        'price' => 299.90,
    ]);

    // Options
    $colorOption = Option::factory()->create(['name' => 'Renk']);
    $sizeOption = Option::factory()->create(['name' => 'Beden']);

    $black = OptionValue::factory()->create([
        'option_id' => $colorOption->id,
        'value' => 'Siyah',
    ]);

    $white = OptionValue::factory()->create([
        'option_id' => $colorOption->id,
        'value' => 'Beyaz',
    ]);

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
            'manage_stock' => true,
            'quantity' => 0,
        ],
    ];

    // İlk çağrı: 4 kombinasyon üretir
    $first = $this->postJson(
        route('api.admin.products.variants.generate', $product),
        $payload
    );

    $first->assertStatus(200);

    $firstJson = $first->json();
    expect($firstJson['meta']['created_count'])->toBe(4);

    $this->assertDatabaseCount('product_variants', 4);

    // İkinci çağrı: aynı kombinasyonlar, duplicate oluşmamalı
    $second = $this->postJson(
        route('api.admin.products.variants.generate', $product),
        $payload
    );

    $second->assertStatus(200);

    $secondJson = $second->json();
    expect($secondJson['meta']['created_count'])->toBe(0);

    // Hala sadece 4 variant olmalı
    $this->assertDatabaseCount('product_variants', 4);
});
