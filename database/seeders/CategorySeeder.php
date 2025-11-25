<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Dress',
                'slug' => 'dress',
                'image' => 'porto/assets/images/demoes/demo4/products/categories/category-1.jpg',
                'children' => [
                    ['name' => 'Günlük Elbiseler', 'slug' => 'gunluk-elbiseler'],
                    ['name' => 'Gece Elbiseleri', 'slug' => 'gece-elbiseleri'],
                    ['name' => 'Gelinlik', 'slug' => 'gelinlik'],
                ],
            ],
            [
                'name' => 'Watches',
                'slug' => 'watches',
                'image' => 'porto/assets/images/demoes/demo4/products/categories/category-2.jpg',
                'children' => [
                    ['name' => 'Kadın Saatleri', 'slug' => 'kadin-saatleri'],
                    ['name' => 'Erkek Saatleri', 'slug' => 'erkek-saatleri'],
                    ['name' => 'Akıllı Saatler', 'slug' => 'akilli-saatler'],
                ],
            ],
            [
                'name' => 'Machine',
                'slug' => 'machine',
                'image' => 'porto/assets/images/demoes/demo4/products/categories/category-3.jpg',
                'children' => [
                    ['name' => 'Ev Aletleri', 'slug' => 'ev-aletleri'],
                    ['name' => 'Bahçe Makineleri', 'slug' => 'bahce-makineleri'],
                ],
            ],
            [
                'name' => 'Sofa',
                'slug' => 'sofa',
                'image' => 'porto/assets/images/demoes/demo4/products/categories/category-4.jpg',
                'children' => [
                    ['name' => 'Kanepe Takımları', 'slug' => 'kanepe-takimlari'],
                    ['name' => 'Koltuklar', 'slug' => 'koltuklar'],
                ],
            ],
            [
                'name' => 'Headphone',
                'slug' => 'headphone',
                'image' => 'porto/assets/images/demoes/demo4/products/categories/category-6.jpg',
                'children' => [
                    ['name' => 'Kablolu Kulaklıklar', 'slug' => 'kablolu-kulakliklar'],
                    ['name' => 'Kablosuz Kulaklıklar', 'slug' => 'kablosuz-kulakliklar'],
                ],
            ],
            [
                'name' => 'Sports',
                'slug' => 'sports',
                'image' => 'porto/assets/images/demoes/demo4/products/categories/category-5.jpg',
                'children' => [
                    ['name' => 'Spor Ayakkabıları', 'slug' => 'spor-ayakkabilari'],
                    ['name' => 'Spor Giyim', 'slug' => 'spor-giyim'],
                    ['name' => 'Spor Ekipmanları', 'slug' => 'spor-ekipmanlari'],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $children = $categoryData['children'] ?? [];
            unset($categoryData['children']);

            $category = Category::firstOrCreate(
                ['slug' => $categoryData['slug']],
                [
                    'name' => $categoryData['name'],
                    'image' => $categoryData['image'],
                    'description' => $categoryData['name'].' kategorisi',
                    'sort_order' => 0,
                    'is_active' => true,
                ]
            );

            foreach ($children as $childData) {
                Category::firstOrCreate(
                    [
                        'slug' => $childData['slug'],
                        'parent_id' => $category->id,
                    ],
                    [
                        'name' => $childData['name'],
                        'description' => $childData['name'].' alt kategorisi',
                        'sort_order' => 0,
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
