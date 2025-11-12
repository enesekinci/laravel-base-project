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
        Schema::create('attribute_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id');
            $table->string('value');
            $table->string('slug')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('attribute_id')
                ->references('id')
                ->on('attributes')
                ->onDelete('cascade');

            $table->index('attribute_id');
            $table->index('slug');
            $table->index('sort_order');
        });

        // Seed data
        $now = now();

        // Attributes'ları bul
        $screenSize = DB::table('attributes')->where('name', 'Ekran Boyutu')->first();
        $ram = DB::table('attributes')->where('name', 'RAM')->first();
        $storage = DB::table('attributes')->where('name', 'Depolama')->first();
        $processor = DB::table('attributes')->where('name', 'İşlemci')->first();
        $os = DB::table('attributes')->where('name', 'İşletim Sistemi')->first();

        if ($screenSize) {
            DB::table('attribute_values')->insert([
                ['attribute_id' => $screenSize->id, 'value' => '13 inç', 'slug' => '13-inc', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $screenSize->id, 'value' => '14 inç', 'slug' => '14-inc', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $screenSize->id, 'value' => '15.6 inç', 'slug' => '15-6-inc', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $screenSize->id, 'value' => '17 inç', 'slug' => '17-inc', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }

        if ($ram) {
            DB::table('attribute_values')->insert([
                ['attribute_id' => $ram->id, 'value' => '4 GB', 'slug' => '4-gb', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $ram->id, 'value' => '8 GB', 'slug' => '8-gb', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $ram->id, 'value' => '16 GB', 'slug' => '16-gb', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $ram->id, 'value' => '32 GB', 'slug' => '32-gb', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }

        if ($storage) {
            DB::table('attribute_values')->insert([
                ['attribute_id' => $storage->id, 'value' => '128 GB SSD', 'slug' => '128-gb-ssd', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $storage->id, 'value' => '256 GB SSD', 'slug' => '256-gb-ssd', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $storage->id, 'value' => '512 GB SSD', 'slug' => '512-gb-ssd', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $storage->id, 'value' => '1 TB SSD', 'slug' => '1-tb-ssd', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $storage->id, 'value' => '1 TB HDD', 'slug' => '1-tb-hdd', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }

        if ($processor) {
            DB::table('attribute_values')->insert([
                ['attribute_id' => $processor->id, 'value' => 'Intel Core i3', 'slug' => 'intel-core-i3', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $processor->id, 'value' => 'Intel Core i5', 'slug' => 'intel-core-i5', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $processor->id, 'value' => 'Intel Core i7', 'slug' => 'intel-core-i7', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $processor->id, 'value' => 'AMD Ryzen 5', 'slug' => 'amd-ryzen-5', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $processor->id, 'value' => 'AMD Ryzen 7', 'slug' => 'amd-ryzen-7', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $processor->id, 'value' => 'Apple M1', 'slug' => 'apple-m1', 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $processor->id, 'value' => 'Apple M2', 'slug' => 'apple-m2', 'sort_order' => 7, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }

        if ($os) {
            DB::table('attribute_values')->insert([
                ['attribute_id' => $os->id, 'value' => 'Windows 11', 'slug' => 'windows-11', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $os->id, 'value' => 'Windows 10', 'slug' => 'windows-10', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $os->id, 'value' => 'macOS', 'slug' => 'macos', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
                ['attribute_id' => $os->id, 'value' => 'Linux', 'slug' => 'linux', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_values');
    }
};
