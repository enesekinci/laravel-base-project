<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeSet;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Models\ProductVariant;
use App\Models\TaxClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PerformanceTestSeeder extends Seeder
{
    public function run(): void
    {
        // Brands
        $brands = Brand::factory()->count(10)->create();

        // Tax Classes
        $taxClasses = TaxClass::factory()->count(3)->create();

        // Categories (5-10 kategori)
        $categories = Category::factory()->count(8)->create();

        // Options (Renk, Beden, Malzeme)
        $colorOption = Option::factory()->create(['name' => 'Renk']);
        $sizeOption = Option::factory()->create(['name' => 'Beden']);
        $materialOption = Option::factory()->create(['name' => 'Malzeme']);

        // Option Values
        $colors = ['Siyah', 'Beyaz', 'Kırmızı', 'Mavi', 'Yeşil', 'Sarı', 'Turuncu', 'Mor'];
        $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        $materials = ['Pamuk', 'Polyester', 'Keten', 'Yün', 'İpek'];

        $colorValues = collect($colors)->map(fn ($color) => OptionValue::factory()->create([
            'option_id' => $colorOption->id,
            'value' => $color,
        ]));

        $sizeValues = collect($sizes)->map(fn ($size) => OptionValue::factory()->create([
            'option_id' => $sizeOption->id,
            'value' => $size,
        ]));

        $materialValues = collect($materials)->map(fn ($material) => OptionValue::factory()->create([
            'option_id' => $materialOption->id,
            'value' => $material,
        ]));

        // Attributes (10-20 attribute)
        $attributeSet = AttributeSet::factory()->create(['name' => 'Genel']);
        $attributes = Attribute::factory()->count(15)->create([
            'is_filterable' => true,
        ]);
        $attributeSet->attributes()->attach($attributes->pluck('id')->toArray());

        // Products (1-2 bin ürün)
        $products = Product::factory()->count(1500)->create(function () use ($brands, $taxClasses) {
            return [
                'brand_id' => $brands->random()->id,
                'tax_class_id' => $taxClasses->random()->id,
            ];
        });

        // Her ürüne kategori ata
        $products->each(function ($product) use ($categories) {
            $product->categories()->attach($categories->random(rand(1, 3))->pluck('id')->toArray());
        });

        // Her ürüne attribute değerleri ata
        $products->each(function ($product) use ($attributes) {
            $selectedAttributes = $attributes->random(rand(3, 8));
            foreach ($selectedAttributes as $attribute) {
                ProductAttributeValue::factory()->create([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'value_string' => fake()->word(),
                ]);
            }
        });

        // Her ürüne 2-5 variant ekle
        $products->each(function ($product) use ($colorValues, $sizeValues, $materialValues, $colorOption, $sizeOption, $materialOption) {
            $variantCount = rand(2, 5);

            for ($i = 0; $i < $variantCount; $i++) {
                $variant = ProductVariant::factory()->create([
                    'product_id' => $product->id,
                    'sku' => $product->sku.'-'.Str::upper(Str::random(4)),
                ]);

                // Her variant'a rastgele option value'lar ata
                $selectedColor = $colorValues->random();
                $selectedSize = $sizeValues->random();
                $selectedMaterial = $materialValues->random();

                $variant->optionValues()->attach([
                    $selectedColor->id => ['option_id' => $colorOption->id],
                    $selectedSize->id => ['option_id' => $sizeOption->id],
                    $selectedMaterial->id => ['option_id' => $materialOption->id],
                ]);
            }
        });
    }
}
