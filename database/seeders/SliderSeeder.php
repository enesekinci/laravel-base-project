<?php

namespace Database\Seeders;

use App\Domains\Cms\Models\Slider;
use App\Domains\Cms\Models\SliderItem;
use App\Domains\Crm\Models\User;
use App\Domains\Media\Models\MediaFile;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        // Ana slider oluştur
        $slider = Slider::firstOrCreate(
            ['code' => 'home_main'],
            [
                'name' => 'Ana Sayfa Slider',
                'is_active' => true,
                'sort_order' => 0,
            ]
        );

        // Mevcut slider item'ları temizle
        $slider->items()->delete();

        // Slider item 1
        $media1 = MediaFile::create([
            'user_id' => $user?->id,
            'disk' => 'public',
            'path' => 'porto/assets/images/demoes/demo4/slider/slide-1.jpg',
            'filename' => 'slide-1.jpg',
            'mime_type' => 'image/jpeg',
            'size' => 0,
            'width' => 1903,
            'height' => 499,
            'collection' => 'sliders',
            'alt' => 'Summer Sale',
            'is_private' => false,
        ]);

        SliderItem::create([
            'slider_id' => $slider->id,
            'media_file_id' => $media1->id,
            'title' => 'Summer Sale',
            'subtitle' => 'Find the Boundaries. Push Through!',
            'button_text' => 'Shop Now!',
            'button_url' => '#',
            'link_url' => '#',
            'sort_order' => 1,
            'is_active' => true,
            'meta' => [
                'heading' => '70% Off',
                'subheading' => 'Starting At $199.99',
            ],
        ]);

        // Slider item 2
        $media2 = MediaFile::create([
            'user_id' => $user?->id,
            'disk' => 'public',
            'path' => 'porto/assets/images/demoes/demo4/slider/slide-2.jpg',
            'filename' => 'slide-2.jpg',
            'mime_type' => 'image/jpeg',
            'size' => 0,
            'width' => 1903,
            'height' => 499,
            'collection' => 'sliders',
            'alt' => 'Extra 20% off Accessories',
            'is_private' => false,
        ]);

        SliderItem::create([
            'slider_id' => $slider->id,
            'media_file_id' => $media2->id,
            'title' => 'Summer Sale',
            'subtitle' => 'Extra 20% off',
            'button_text' => 'Shop All Sale',
            'button_url' => '#',
            'link_url' => '#',
            'sort_order' => 2,
            'is_active' => true,
            'meta' => [
                'heading' => 'Accessories',
            ],
        ]);
    }
}
