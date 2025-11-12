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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('attribute_set_id')->nullable();
            $table->boolean('is_filterable')->default(false);
            $table->boolean('is_required')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('attribute_set_id')
                ->references('id')
                ->on('attribute_sets')
                ->onDelete('set null');
            $table->index('attribute_set_id');
            $table->index('is_filterable');
            $table->index('sort_order');
        });

        // Attribute categories pivot table
        Schema::create('attribute_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('attribute_id')
                ->references('id')
                ->on('attributes')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->unique(['attribute_id', 'category_id']);
            $table->index('attribute_id');
            $table->index('category_id');
        });

        // Seed data - Attribute set zaten oluşturulmuş olmalı (attribute_sets migration'ında)
        $computerSet = DB::table('attribute_sets')->where('slug', 'bilgisayar-ozellikleri')->first();
        $computerSetId = $computerSet->id ?? 1;

        $now = now();

        // Ekran Boyutu
        $screenSizeId = DB::table('attributes')->insertGetId([
            'name' => 'Ekran Boyutu',
            'attribute_set_id' => $computerSetId,
            'is_filterable' => true,
            'is_required' => false,
            'sort_order' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('attribute_values')->insert([
            ['attribute_id' => $screenSizeId, 'value' => '13 inç', 'slug' => '13-inc', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $screenSizeId, 'value' => '14 inç', 'slug' => '14-inc', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $screenSizeId, 'value' => '15.6 inç', 'slug' => '15-6-inc', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $screenSizeId, 'value' => '17 inç', 'slug' => '17-inc', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
        ]);

        // RAM
        $ramId = DB::table('attributes')->insertGetId([
            'name' => 'RAM',
            'attribute_set_id' => $computerSetId,
            'is_filterable' => true,
            'is_required' => false,
            'sort_order' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('attribute_values')->insert([
            ['attribute_id' => $ramId, 'value' => '4 GB', 'slug' => '4-gb', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $ramId, 'value' => '8 GB', 'slug' => '8-gb', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $ramId, 'value' => '16 GB', 'slug' => '16-gb', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $ramId, 'value' => '32 GB', 'slug' => '32-gb', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
        ]);

        // Depolama
        $storageId = DB::table('attributes')->insertGetId([
            'name' => 'Depolama',
            'attribute_set_id' => $computerSetId,
            'is_filterable' => true,
            'is_required' => false,
            'sort_order' => 3,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('attribute_values')->insert([
            ['attribute_id' => $storageId, 'value' => '128 GB SSD', 'slug' => '128-gb-ssd', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $storageId, 'value' => '256 GB SSD', 'slug' => '256-gb-ssd', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $storageId, 'value' => '512 GB SSD', 'slug' => '512-gb-ssd', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $storageId, 'value' => '1 TB SSD', 'slug' => '1-tb-ssd', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $storageId, 'value' => '1 TB HDD', 'slug' => '1-tb-hdd', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
        ]);

        // İşlemci
        $processorId = DB::table('attributes')->insertGetId([
            'name' => 'İşlemci',
            'attribute_set_id' => $computerSetId,
            'is_filterable' => true,
            'is_required' => false,
            'sort_order' => 4,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('attribute_values')->insert([
            ['attribute_id' => $processorId, 'value' => 'Intel Core i3', 'slug' => 'intel-core-i3', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $processorId, 'value' => 'Intel Core i5', 'slug' => 'intel-core-i5', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $processorId, 'value' => 'Intel Core i7', 'slug' => 'intel-core-i7', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $processorId, 'value' => 'AMD Ryzen 5', 'slug' => 'amd-ryzen-5', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $processorId, 'value' => 'AMD Ryzen 7', 'slug' => 'amd-ryzen-7', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $processorId, 'value' => 'Apple M1', 'slug' => 'apple-m1', 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $processorId, 'value' => 'Apple M2', 'slug' => 'apple-m2', 'sort_order' => 7, 'created_at' => $now, 'updated_at' => $now],
        ]);

        // İşletim Sistemi
        $osId = DB::table('attributes')->insertGetId([
            'name' => 'İşletim Sistemi',
            'attribute_set_id' => $computerSetId,
            'is_filterable' => true,
            'is_required' => false,
            'sort_order' => 5,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('attribute_values')->insert([
            ['attribute_id' => $osId, 'value' => 'Windows 11', 'slug' => 'windows-11', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $osId, 'value' => 'Windows 10', 'slug' => 'windows-10', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $osId, 'value' => 'macOS', 'slug' => 'macos', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['attribute_id' => $osId, 'value' => 'Linux', 'slug' => 'linux', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_categories');
        Schema::dropIfExists('attributes');
    }
};
