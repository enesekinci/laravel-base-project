<?php

use App\Models\Showcase;
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
        // Featured Products
        Showcase::updateOrCreate(
            ['slug' => 'featured-products'],
            [
                'title' => 'Featured Products',
                'slug' => 'featured-products',
                'description' => 'Featured products showcase',
                'type' => 'product',
                'content' => [], // Admin panelinden yönetilecek
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        // Top Rated Products
        Showcase::updateOrCreate(
            ['slug' => 'top-rated-products'],
            [
                'title' => 'Top Rated Products',
                'slug' => 'top-rated-products',
                'description' => 'Top rated products showcase',
                'type' => 'product',
                'content' => [], // Admin panelinden yönetilecek
                'sort_order' => 2,
                'is_active' => true,
            ]
        );

        // Best Selling Products
        Showcase::updateOrCreate(
            ['slug' => 'best-selling-products'],
            [
                'title' => 'Best Selling Products',
                'slug' => 'best-selling-products',
                'description' => 'Best selling products showcase',
                'type' => 'product',
                'content' => [], // Admin panelinden yönetilecek
                'sort_order' => 3,
                'is_active' => true,
            ]
        );

        // Latest Products
        Showcase::updateOrCreate(
            ['slug' => 'latest-products'],
            [
                'title' => 'Latest Products',
                'slug' => 'latest-products',
                'description' => 'Latest products showcase',
                'type' => 'product',
                'content' => [], // Admin panelinden yönetilecek
                'sort_order' => 4,
                'is_active' => true,
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Showcase::whereIn('slug', [
            'featured-products',
            'top-rated-products',
            'best-selling-products',
            'latest-products',
        ])->delete();
    }
};
