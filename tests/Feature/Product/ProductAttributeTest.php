<?php

use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductAttributeValue;

it('stores attribute values on a product', function () {
    $product = Product::factory()->create();
    $attribute = Attribute::factory()->create();

    ProductAttributeValue::factory()->create([
        'product_id' => $product->id,
        'attribute_id' => $attribute->id,
        'value_string' => 'Pamuk',
    ]);

    expect($product->attributeValues()->count())->toBe(1);
});
