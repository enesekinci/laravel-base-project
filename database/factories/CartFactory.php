<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition()
    {
        return [
            'user_id'    => User::factory(),
            'status'     => 'active',
            'currency'   => 'TRY',
            'items_count' => 0,
            'subtotal'   => 0,
            'total'      => 0,
        ];
    }
}
