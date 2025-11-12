<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('slug');
            $table->index('is_active');
            $table->index('sort_order');
        });

        // Seed data
        $brands = [
            ['name' => 'Apple', 'slug' => 'apple', 'description' => 'Apple teknoloji ürünleri', 'is_active' => true, 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Samsung', 'slug' => 'samsung', 'description' => 'Samsung elektronik ürünleri', 'is_active' => true, 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'HP', 'slug' => 'hp', 'description' => 'HP bilgisayar ve yazıcılar', 'is_active' => true, 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dell', 'slug' => 'dell', 'description' => 'Dell bilgisayar ve monitörler', 'is_active' => true, 'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lenovo', 'slug' => 'lenovo', 'description' => 'Lenovo laptop ve masaüstü bilgisayarlar', 'is_active' => true, 'sort_order' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Asus', 'slug' => 'asus', 'description' => 'Asus bilgisayar ve gaming ürünleri', 'is_active' => true, 'sort_order' => 6, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('brands')->insert($brands);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
