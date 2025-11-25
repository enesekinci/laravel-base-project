<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition()
    {
        $unitPrice = $this->faker->randomFloat(2, 10, 500);
        $quantity = $this->faker->numberBetween(1, 5);
        $subtotal = $unitPrice * $quantity;

        return [
            'order_id' => Order::factory(),
            'product_id' => Product::factory(),
            'product_variant_id' => null,
            'name' => $this->faker->words(3, true),
            'sku' => $this->faker->unique()->bothify('SKU-####'),
            'unit_price' => $unitPrice,
            'quantity' => $quantity,
            'tax_class_id' => null,
            'tax_rate' => 0,
            'subtotal' => $subtotal,
            'discount_total' => 0,
            'tax_total' => 0,
            'total' => $subtotal,
        ];
    }
}
