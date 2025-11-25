<?php

namespace Database\Factories;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductAttributeValueFactory extends Factory
{
    protected $model = ProductAttributeValue::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'attribute_id' => Attribute::factory(),
            'value_string' => $this->faker->word,
        ];
    }
}
