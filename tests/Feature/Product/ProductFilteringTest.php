<?php

use App\Models\Attribute;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Models\ProductVariant;

function createProductWithColorAndSize(string $colorValue, string $sizeValue): Product
{
    $colorOption = Option::firstOrCreate(['name' => 'Renk'], ['type' => 'select']);
    $sizeOption = Option::firstOrCreate(['name' => 'Beden'], ['type' => 'select']);

    $color = OptionValue::create([
        'option_id' => $colorOption->id,
        'value' => $colorValue,
        'sort_order' => 0,
    ]);

    $size = OptionValue::create([
        'option_id' => $sizeOption->id,
        'value' => $sizeValue,
        'sort_order' => 0,
    ]);

    $product = Product::factory()->create();

    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'quantity' => 10,
        'in_stock' => true,
    ]);

    $variant->optionValues()->attach([
        $color->id => ['option_id' => $colorOption->id],
        $size->id => ['option_id' => $sizeOption->id],
    ]);

    return $product;
}

it('filters products by color option value', function () {
    $blackProduct = createProductWithColorAndSize('Siyah', 'M');
    $whiteProduct = createProductWithColorAndSize('Beyaz', 'L');

    $colorOption = Option::where('name', 'Renk')->firstOrFail();
    $blackValue = OptionValue::where('option_id', $colorOption->id)
        ->where('value', 'Siyah')
        ->firstOrFail();

    $response = $this->getJson('/api/products?filter[color]='.$blackValue->id);

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.id', $blackProduct->id);
});

it('filters products by attribute (e.g. material)', function () {
    $materialAttr = Attribute::factory()->create([
        'name' => 'Materyal',
        'slug' => 'material',
        'type' => 'text',
        'is_filterable' => true,
    ]);

    $cottonProduct = Product::factory()->create();
    $polyProduct = Product::factory()->create();

    ProductAttributeValue::create([
        'product_id' => $cottonProduct->id,
        'attribute_id' => $materialAttr->id,
        'value_string' => 'Pamuk',
    ]);

    ProductAttributeValue::create([
        'product_id' => $polyProduct->id,
        'attribute_id' => $materialAttr->id,
        'value_string' => 'Polyester',
    ]);

    $response = $this->getJson('/api/products?filter[attribute][material]=Pamuk');

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.id', $cottonProduct->id);
});
