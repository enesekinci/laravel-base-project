<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'status' => 'pending',
            'payment_status' => 'pending',
            'payment_method' => 'cod',
            'currency' => 'TRY',
            'subtotal' => $this->faker->randomFloat(2, 100, 1000),
            'discount_total' => 0,
            'tax_total' => $this->faker->randomFloat(2, 10, 100),
            'shipping_total' => $this->faker->randomFloat(2, 0, 50),
            'grand_total' => $this->faker->randomFloat(2, 100, 1000),
            'customer_email' => $this->faker->email,
            'customer_name' => $this->faker->name,
            'customer_phone' => $this->faker->phoneNumber,
            'placed_at' => now(),
        ];
    }
}
