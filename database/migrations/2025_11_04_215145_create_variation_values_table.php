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
        Schema::create('variation_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variation_id');
            $table->string('label');
            $table->string('value')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('variation_id')
                ->references('id')
                ->on('variations')
                ->onDelete('cascade');

            $table->index('variation_id');
            $table->index('sort_order');
        });

        // Seed data
        $now = now();

        // Variation'ları bul
        $colorVariation = DB::table('variations')->where('name', 'Renk')->first();
        $sizeVariation = DB::table('variations')->where('name', 'Boyut')->first();
        $capacityVariation = DB::table('variations')->where('name', 'Kapasite')->first();

        if ($colorVariation) {
            DB::table('variation_values')->insert([
                ['variation_id' => $colorVariation->id, 'label' => 'Siyah', 'value' => 'black', 'color' => '#000000', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['variation_id' => $colorVariation->id, 'label' => 'Beyaz', 'value' => 'white', 'color' => '#FFFFFF', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
                ['variation_id' => $colorVariation->id, 'label' => 'Kırmızı', 'value' => 'red', 'color' => '#EF4444', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
                ['variation_id' => $colorVariation->id, 'label' => 'Mavi', 'value' => 'blue', 'color' => '#3B82F6', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
                ['variation_id' => $colorVariation->id, 'label' => 'Yeşil', 'value' => 'green', 'color' => '#10B981', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }

        if ($sizeVariation) {
            DB::table('variation_values')->insert([
                ['variation_id' => $sizeVariation->id, 'label' => 'XS', 'value' => 'xs', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['variation_id' => $sizeVariation->id, 'label' => 'S', 'value' => 's', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
                ['variation_id' => $sizeVariation->id, 'label' => 'M', 'value' => 'm', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
                ['variation_id' => $sizeVariation->id, 'label' => 'L', 'value' => 'l', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
                ['variation_id' => $sizeVariation->id, 'label' => 'XL', 'value' => 'xl', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }

        if ($capacityVariation) {
            DB::table('variation_values')->insert([
                ['variation_id' => $capacityVariation->id, 'label' => '64 GB', 'value' => '64gb', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['variation_id' => $capacityVariation->id, 'label' => '128 GB', 'value' => '128gb', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
                ['variation_id' => $capacityVariation->id, 'label' => '256 GB', 'value' => '256gb', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
                ['variation_id' => $capacityVariation->id, 'label' => '512 GB', 'value' => '512gb', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
                ['variation_id' => $capacityVariation->id, 'label' => '1 TB', 'value' => '1tb', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variation_values');
    }
};
