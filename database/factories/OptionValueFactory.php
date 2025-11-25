<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\OptionValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionValueFactory extends Factory
{
    protected $model = OptionValue::class;

    public function definition()
    {
        return [
            'option_id' => Option::factory(),
            'value' => ucfirst($this->faker->colorName),
            'sort_order' => 0,
        ];
    }
}
