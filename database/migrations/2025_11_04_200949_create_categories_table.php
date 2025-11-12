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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');

            $table->index('parent_id');
            $table->index('slug');
            $table->index('is_active');
            $table->index('sort_order');
        });

        // Seed data
        $now = now();

        // Ana kategori: Elektronik
        $electronicsId = DB::table('categories')->insertGetId([
            'name' => 'Elektronik',
            'slug' => 'elektronik',
            'description' => 'Elektronik ürünler',
            'parent_id' => null,
            'is_active' => true,
            'sort_order' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Alt kategori: Bilgisayar
        $computerId = DB::table('categories')->insertGetId([
            'name' => 'Bilgisayar',
            'slug' => 'bilgisayar',
            'description' => 'Bilgisayar ve aksesuarları',
            'parent_id' => $electronicsId,
            'is_active' => true,
            'sort_order' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Bilgisayar alt kategorileri
        DB::table('categories')->insert([
            ['name' => 'Laptop', 'slug' => 'laptop', 'description' => 'Laptop bilgisayarlar', 'parent_id' => $computerId, 'is_active' => true, 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Masaüstü Bilgisayar', 'slug' => 'masaustu-bilgisayar', 'description' => 'Masaüstü bilgisayarlar', 'parent_id' => $computerId, 'is_active' => true, 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tablet', 'slug' => 'tablet', 'description' => 'Tablet bilgisayarlar', 'parent_id' => $computerId, 'is_active' => true, 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
        ]);

        // Alt kategori: Telefon
        $phoneId = DB::table('categories')->insertGetId([
            'name' => 'Telefon',
            'slug' => 'telefon',
            'description' => 'Akıllı telefonlar',
            'parent_id' => $electronicsId,
            'is_active' => true,
            'sort_order' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Alt kategori: Aksesuarlar
        DB::table('categories')->insert([
            'name' => 'Aksesuarlar',
            'slug' => 'aksesuarlar',
            'description' => 'Elektronik aksesuarları',
            'parent_id' => $electronicsId,
            'is_active' => true,
            'sort_order' => 3,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
