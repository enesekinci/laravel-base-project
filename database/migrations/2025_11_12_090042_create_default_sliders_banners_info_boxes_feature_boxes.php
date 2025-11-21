<?php

use App\Models\Banner;
use App\Models\FeatureBox;
use App\Models\InfoBox;
use App\Models\Slider;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Sliders (Demo1 Home Slider)
        Slider::updateOrCreate(
            ['title' => 'Summer Sale', 'location' => 'home'],
            [
                'title' => 'Summer Sale',
                'subtitle' => 'Find the Boundaries. Push Through!',
                'heading' => 'Summer Sale',
                'description' => null,
                'image' => '/porto/assets/images/demoes/demo1/slider/slide-1.png',
                'link' => '/porto/demo1-shop.html',
                'price' => '99',
                'price_em' => '199',
                'button_text' => 'Shop Now!',
                'button_url' => '/porto/demo1-shop.html',
                'background_color' => '#2699D0',
                'animation_name' => 'fadeInUpShorter',
                'text_uppercase' => false,
                'location' => 'home',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        Slider::updateOrCreate(
            ['title' => 'Great Deals', 'location' => 'home'],
            [
                'title' => 'Great Deals',
                'subtitle' => 'Over 200 products with discounts',
                'heading' => 'Great Deals',
                'description' => null,
                'image' => '/porto/assets/images/demoes/demo1/slider/slide-2.jpg',
                'link' => '/porto/demo1-shop.html',
                'price' => '99',
                'price_em' => '299',
                'button_text' => 'Get Yours!',
                'button_url' => '/porto/demo1-shop.html',
                'background_color' => '#dadada',
                'animation_name' => 'fadeInUpShorter',
                'text_uppercase' => true,
                'location' => 'home',
                'sort_order' => 2,
                'is_active' => true,
            ]
        );

        Slider::updateOrCreate(
            ['title' => 'New Arrivals', 'location' => 'home'],
            [
                'title' => 'New Arrivals',
                'subtitle' => 'Up to 70% off',
                'heading' => 'New Arrivals',
                'description' => null,
                'image' => '/porto/assets/images/demoes/demo1/slider/slide-3.jpg',
                'link' => '/porto/demo1-shop.html',
                'price' => '99',
                'price_em' => '299',
                'button_text' => 'Get Yours!',
                'button_url' => '/porto/demo1-shop.html',
                'background_color' => '#e5e4e2',
                'animation_name' => 'fadeInUpShorter',
                'text_uppercase' => true,
                'location' => 'home',
                'sort_order' => 3,
                'is_active' => true,
            ]
        );

        // Banners (Demo1 Home Banners)
        Banner::updateOrCreate(
            ['title' => 'Porto Watches', 'position' => 'home'],
            [
                'title' => 'Porto Watches',
                'subtitle' => '30%',
                'description' => null,
                'image' => '/porto/assets/images/demoes/demo1/banners/banner-1.jpg',
                'image_alt' => 'banner',
                'link' => '/porto/demo1-shop.html',
                'position' => 'home',
                'price' => null,
                'price_em' => '20%',
                'button_text' => 'Shop Now',
                'button_url' => '/porto/demo1-shop.html',
                'background_color' => '#dadada',
                'text_align' => 'left',
                'animation_name' => 'fadeInLeftShorter',
                'animation_delay' => '500',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        Banner::updateOrCreate(
            ['title' => 'Deal Promos', 'position' => 'home'],
            [
                'title' => 'Deal Promos',
                'subtitle' => 'Starting at $99',
                'description' => null,
                'image' => '/porto/assets/images/demoes/demo1/banners/banner-2.jpg',
                'image_alt' => 'banner',
                'link' => '/porto/demo1-shop.html',
                'position' => 'home',
                'price' => null,
                'price_em' => null,
                'button_text' => 'Shop Now',
                'button_url' => '/porto/demo1-shop.html',
                'background_color' => '#dadada',
                'text_align' => 'center',
                'animation_name' => 'fadeInUpShorter',
                'animation_delay' => '200',
                'sort_order' => 2,
                'is_active' => true,
            ]
        );

        Banner::updateOrCreate(
            ['title' => 'Handbags', 'position' => 'home'],
            [
                'title' => 'Handbags',
                'subtitle' => 'Starting at $99',
                'description' => null,
                'image' => '/porto/assets/images/demoes/demo1/banners/banner-3.jpg',
                'image_alt' => 'banner',
                'link' => '/porto/demo1-shop.html',
                'position' => 'home',
                'price' => null,
                'price_em' => null,
                'button_text' => 'Shop Now',
                'button_url' => '/porto/demo1-shop.html',
                'background_color' => '#dadada',
                'text_align' => 'right',
                'animation_name' => 'fadeInRightShorter',
                'animation_delay' => '500',
                'sort_order' => 3,
                'is_active' => true,
            ]
        );

        // Info Boxes (Demo1 Home Info Boxes)
        InfoBox::updateOrCreate(
            ['title' => 'FREE SHIPPING & RETURN', 'location' => 'home'],
            [
                'icon' => 'icon-shipping',
                'title' => 'FREE SHIPPING & RETURN',
                'description' => 'Free shipping on all orders over $99',
                'location' => 'home',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        InfoBox::updateOrCreate(
            ['title' => 'MONEY BACK GUARANTEE', 'location' => 'home'],
            [
                'icon' => 'icon-money',
                'title' => 'MONEY BACK GUARANTEE',
                'description' => '100% money back guarantee',
                'location' => 'home',
                'sort_order' => 2,
                'is_active' => true,
            ]
        );

        InfoBox::updateOrCreate(
            ['title' => 'ONLINE SUPPORT 24/7', 'location' => 'home'],
            [
                'icon' => 'icon-support',
                'title' => 'ONLINE SUPPORT 24/7',
                'description' => 'Lorem ipsum dolor sit amet.',
                'location' => 'home',
                'sort_order' => 3,
                'is_active' => true,
            ]
        );

        // Feature Boxes (Demo1 Home Feature Boxes)
        FeatureBox::updateOrCreate(
            ['title' => 'Customer Support', 'location' => 'home'],
            [
                'icon' => 'icon-earphones-alt',
                'title' => 'Customer Support',
                'subtitle' => 'Need Assistance?',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.',
                'location' => 'home',
                'animation_name' => 'fadeInRightShorter',
                'animation_delay' => '200',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        FeatureBox::updateOrCreate(
            ['title' => 'Secured Payment', 'location' => 'home'],
            [
                'icon' => 'icon-credit-card',
                'title' => 'Secured Payment',
                'subtitle' => 'Safe & Fast',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.',
                'location' => 'home',
                'animation_name' => 'fadeInRightShorter',
                'animation_delay' => '400',
                'sort_order' => 2,
                'is_active' => true,
            ]
        );

        FeatureBox::updateOrCreate(
            ['title' => 'Returns', 'location' => 'home'],
            [
                'icon' => 'icon-action-undo',
                'title' => 'Returns',
                'subtitle' => 'Easy & Free',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.',
                'location' => 'home',
                'animation_name' => 'fadeInRightShorter',
                'animation_delay' => '600',
                'sort_order' => 3,
                'is_active' => true,
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Slider::where('location', 'home')->delete();
        Banner::where('position', 'home')->delete();
        InfoBox::where('location', 'home')->delete();
        FeatureBox::where('location', 'home')->delete();
    }
};
