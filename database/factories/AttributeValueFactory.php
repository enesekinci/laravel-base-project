<?php

namespace Database\Factories;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeValueFactory extends Factory
{
    protected $model = AttributeValue::class;

    public function definition()
    {
        return [
            'attribute_id' => Attribute::factory(),
            'value'        => ucfirst($this->faker->word),
            'sort_order'   => 0,
        ];
    }
}
