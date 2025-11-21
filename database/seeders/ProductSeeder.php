<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMedia;
use App\Models\ProductVariation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Önce kategoriler oluşturalım
        $categories = [
            'Electronics' => ['Laptops', 'Phones', 'Tablets'],
            'Fashion' => ['Men', 'Women', 'Kids'],
            'Home & Garden' => ['Furniture', 'Decor', 'Kitchen'],
        ];

        $categoryModels = [];
        foreach ($categories as $parentName => $children) {
            $parent = Category::firstOrCreate(
                ['slug' => Str::slug($parentName)],
                [
                    'name' => $parentName,
                    'description' => "Category for {$parentName}",
                    'is_active' => true,
                    'sort_order' => 0,
                ]
            );
            $categoryModels[$parentName] = $parent;

            foreach ($children as $childName) {
                $child = Category::firstOrCreate(
                    ['slug' => Str::slug($childName)],
                    [
                        'name' => $childName,
                        'parent_id' => $parent->id,
                        'description' => "Category for {$childName}",
                        'is_active' => true,
                        'sort_order' => 0,
                    ]
                );
                $categoryModels[$childName] = $child;
            }
        }

        // Demo ürünler
        $products = [
            [
                'name' => 'Wireless Bluetooth Headphones',
                'category' => 'Electronics',
                'price' => 89.99,
                'description' => 'High-quality wireless headphones with noise cancellation and 30-hour battery life.',
                'is_featured' => true,
            ],
            [
                'name' => 'Smart Watch Pro',
                'category' => 'Electronics',
                'price' => 299.99,
                'description' => 'Advanced smartwatch with fitness tracking, heart rate monitor, and GPS.',
                'is_featured' => true,
            ],
            [
                'name' => 'Laptop Backpack',
                'category' => 'Fashion',
                'price' => 49.99,
                'description' => 'Durable laptop backpack with multiple compartments and USB charging port.',
                'is_featured' => false,
            ],
            [
                'name' => 'Men\'s Casual Shirt',
                'category' => 'Men',
                'price' => 39.99,
                'description' => 'Comfortable cotton shirt perfect for casual wear.',
                'is_featured' => false,
            ],
            [
                'name' => 'Women\'s Summer Dress',
                'category' => 'Women',
                'price' => 59.99,
                'description' => 'Elegant summer dress made from breathable fabric.',
                'is_featured' => true,
            ],
            [
                'name' => 'Kids Sneakers',
                'category' => 'Kids',
                'price' => 34.99,
                'description' => 'Comfortable and durable sneakers for active kids.',
                'is_featured' => false,
            ],
            [
                'name' => 'Modern Coffee Table',
                'category' => 'Furniture',
                'price' => 199.99,
                'description' => 'Stylish coffee table with tempered glass top and wooden legs.',
                'is_featured' => false,
            ],
            [
                'name' => 'Wall Art Canvas Set',
                'category' => 'Decor',
                'price' => 79.99,
                'description' => 'Set of 3 modern abstract canvas prints for home decoration.',
                'is_featured' => true,
            ],
            [
                'name' => 'Stainless Steel Cookware Set',
                'category' => 'Kitchen',
                'price' => 149.99,
                'description' => '10-piece professional cookware set with non-stick coating.',
                'is_featured' => false,
            ],
            [
                'name' => 'Portable Bluetooth Speaker',
                'category' => 'Electronics',
                'price' => 45.99,
                'description' => 'Waterproof portable speaker with 360-degree sound.',
                'is_featured' => true,
            ],
            [
                'name' => 'Yoga Mat Premium',
                'category' => 'Home & Garden',
                'price' => 29.99,
                'description' => 'Extra thick yoga mat with carrying strap.',
                'is_featured' => false,
            ],
            [
                'name' => 'Gaming Mouse RGB',
                'category' => 'Electronics',
                'price' => 69.99,
                'description' => 'Professional gaming mouse with customizable RGB lighting and 16000 DPI.',
                'is_featured' => true,
            ],
        ];

        foreach ($products as $productData) {
            $category = $categoryModels[$productData['category']] ?? null;

            $product = Product::firstOrCreate(
                ['slug' => Str::slug($productData['name'])],
                [
                    'name' => $productData['name'],
                    'sku' => 'SKU-'.strtoupper(Str::random(8)),
                    'description' => $productData['description'],
                    'short_description' => Str::limit($productData['description'], 100),
                    'price' => $productData['price'],
                    'status' => 'published',
                    'is_featured' => $productData['is_featured'],
                    'stock_quantity' => rand(10, 100),
                    'rating' => rand(3, 5),
                ]
            );

            // Kategori ilişkisi
            if ($category) {
                $product->categories()->syncWithoutDetaching([$category->id]);
            }

            // Varyasyonlar ekle
            $variations = [
                [
                    'name' => 'Standard',
                    'sku' => $product->sku.'-STD',
                    'price' => $productData['price'],
                    'stock' => rand(10, 50),
                ],
            ];

            // Bazı ürünlere farklı fiyatlı varyasyonlar ekle
            if (in_array($productData['name'], ['Men\'s Casual Shirt', 'Women\'s Summer Dress', 'Kids Sneakers'])) {
                $variations[] = [
                    'name' => 'Premium',
                    'sku' => $product->sku.'-PRM',
                    'price' => $productData['price'] * 1.2,
                    'stock' => rand(5, 20),
                ];
            }

            foreach ($variations as $variationData) {
                ProductVariation::firstOrCreate(
                    ['product_id' => $product->id, 'sku' => $variationData['sku']],
                    $variationData
                );
            }

            // Placeholder görseller ekle
            $imageCount = rand(1, 3);
            for ($i = 1; $i <= $imageCount; $i++) {
                ProductMedia::firstOrCreate(
                    ['product_id' => $product->id, 'path' => "/porto/assets/images/products/product-{$i}.jpg"],
                    [
                        'type' => 'image',
                        'sort_order' => $i,
                    ]
                );
            }
        }

        $this->command->info('Products seeded successfully!');
    }
}
