<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition()
    {
        return [
            'code'          => strtoupper($this->faker->bothify('COUPON-####')),
            'type'          => $this->faker->randomElement(['percent', 'fixed']),
            'value'         => $this->faker->randomFloat(2, 5, 50),
            'min_cart_total'=> $this->faker->randomFloat(2, 0, 100),
            'usage_limit'   => $this->faker->numberBetween(10, 100),
            'usage_limit_per_user' => null,
            'used_count'    => 0,
            'is_active'     => true,
            'starts_at'     => now()->subDay(),
            'ends_at'       => now()->addMonth(),
        ];
    }
}
