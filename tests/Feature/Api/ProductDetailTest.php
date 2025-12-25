<?php

declare(strict_types=1);

use App\Models\Attribute;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Models\ProductVariant;
use Illuminate\Support\Str;

it('returns product detail with variants and attributes', function (): void {
    $product = Product::factory()->create([
        'name' => 'Basic T-Shirt',
        'slug' => Str::slug('Basic T-Shirt').'-test',
        'price' => 299.90,
    ]);

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
        'price' => 319.90,
    ]);

    $variant->optionValues()->attach([
        $black->id => ['option_id' => $colorOption->id],
        $sizeM->id => ['option_id' => $sizeOption->id],
    ]);

    $materialAttr = Attribute::factory()->create([
        'name' => 'Materyal',
        'slug' => 'material',
        'type' => 'text',
        'is_filterable' => true,
    ]);

    ProductAttributeValue::factory()->create([
        'product_id' => $product->id,
        'attribute_id' => $materialAttr->id,
        'value_string' => 'Pamuk',
    ]);

    $response = $this->getJson('/api/products/'.$product->slug.'?include=variants,attributes');

    $response->assertStatus(200)
        ->assertJsonPath('data.slug', $product->slug)
        ->assertJsonPath('data.name', 'Basic T-Shirt')
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'slug',
                'price',
                'in_stock',
                'variants' => [
                    '*' => [
                        'id',
                        'sku',
                        'price',
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
                'attributes' => [
                    '*' => [
                        'code',
                        'label',
                        'value',
                    ],
                ],
            ],
        ]);
});
