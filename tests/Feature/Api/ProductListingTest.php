<?php

declare(strict_types=1);

use App\Models\Attribute;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Models\ProductVariant;

it('returns paginated product list with basic fields', function (): void {
    Product::factory()->count(3)->create();

    $response = $this->getJson('/api/products');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'slug',
                    'price',
                    'in_stock',
                    'is_active',
                ],
            ],
            'meta' => [
                'current_page',
                'last_page',
                'per_page',
                'total',
            ],
        ]);
});

it('includes variants and attributes in product listing when requested', function (): void {
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

    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'sku' => 'TSHIRT-BASIC-SIYAH-M',
    ]);

    $variant->optionValues()->attach([
        $black->id => ['option_id' => $colorOption->id],
        $sizeM->id => ['option_id' => $sizeOption->id],
    ]);

    $materialAttr = Attribute::factory()->create([
        'name' => 'Materyal',
        'slug' => 'material',
        'type' => 'text',
    ]);

    ProductAttributeValue::factory()->create([
        'product_id' => $product->id,
        'attribute_id' => $materialAttr->id,
        'value_string' => 'Pamuk',
    ]);

    $response = $this->getJson('/api/products?include=variants,attributes');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'slug',
                    'variants' => [
                        '*' => [
                            'id',
                            'sku',
                            'price',
                            'in_stock',
                            'option_values' => [
                                '*' => [
                                    'id',
                                    'option' => [
                                        'id',
                                        'name',
                                    ],
                                    'value',
                                ],
                            ],
                        ],
                    ],
                    'attributes' => [
                        '*' => [
                            'code',
                            'label',
                            'value',
                        ],
                    ],
                ],
            ],
        ]);
});
