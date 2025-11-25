<?php

namespace Database\Factories;

use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentMethodFactory extends Factory
{
    protected $model = PaymentMethod::class;

    public function definition(): array
    {
        return [
            'name' => 'PayTR',
            'code' => 'paytr_'.$this->faker->unique()->word(),
            'type' => 'online',
            'is_active' => true,
            'sort_order' => 0,
            'config' => null,
        ];
    }
}
