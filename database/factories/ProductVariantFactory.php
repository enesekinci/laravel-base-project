<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductVariantFactory extends Factory
{
    protected $model = ProductVariant::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'sku' => 'VAR-'.Str::random(6),
            'price' => $this->faker->randomFloat(2, 100, 999),
            'manage_stock' => true,
            'quantity' => 30,
            'in_stock' => true,
            'is_active' => true,
        ];
    }
}
