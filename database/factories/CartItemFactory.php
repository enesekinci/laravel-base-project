<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
    protected $model = CartItem::class;

    public function definition()
    {
        $product = Product::factory()->create();
        $unitPrice = (float) $product->price;
        $quantity = $this->faker->numberBetween(1, 5);
        $totalPrice = $unitPrice * $quantity;

        return [
            'cart_id' => Cart::factory(),
            'product_id' => $product->id,
            'product_variant_id' => null,
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'total_price' => $totalPrice,
        ];
    }
}
