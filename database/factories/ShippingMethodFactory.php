<?php

namespace Database\Factories;

use App\Models\ShippingMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingMethodFactory extends Factory
{
    protected $model = ShippingMethod::class;

    public function definition(): array
    {
        return [
            'name'           => 'Flat Rate',
            'code'           => 'flat_rate_' . $this->faker->unique()->word(),
            'type'           => 'flat_rate',
            'price'          => 10,
            'min_cart_total' => 0,
            'is_active'      => true,
            'sort_order'     => 0,
            'config'         => null,
        ];
    }
}
