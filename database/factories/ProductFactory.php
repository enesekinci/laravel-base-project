<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Brand;
use App\Models\TaxClass;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $name = $this->faker->words(3, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name) . '-' . Str::random(5),
            'sku' => strtoupper(Str::random(8)),
            'description' => $this->faker->paragraph,
            'short_description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 100, 999),
            'manage_stock' => true,
            'quantity' => 50,
            'in_stock' => true,
            'brand_id' => Brand::factory(),
            'tax_class_id' => TaxClass::factory(),
            'is_active' => true,
        ];
    }
}
