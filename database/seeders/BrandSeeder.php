<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['name' => 'Nike', 'logo' => 'porto/assets/images/brands/brand1.png'],
            ['name' => 'Adidas', 'logo' => 'porto/assets/images/brands/brand2.png'],
            ['name' => 'Puma', 'logo' => 'porto/assets/images/brands/brand3.png'],
            ['name' => 'Samsung', 'logo' => 'porto/assets/images/brands/brand4.png'],
            ['name' => 'Apple', 'logo' => 'porto/assets/images/brands/brand5.png'],
            ['name' => 'Sony', 'logo' => 'porto/assets/images/brands/brand6.png'],
        ];

        foreach ($brands as $brandData) {
            Brand::firstOrCreate(
                ['slug' => Str::slug($brandData['name'])],
                [
                    'name' => $brandData['name'],
                    'logo' => $brandData['logo'],
                    'is_active' => true,
                ]
            );
        }
    }
}
