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
        Schema::create('variation_template_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variation_template_id');
            $table->string('label');
            $table->string('value')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('variation_template_id')
                ->references('id')
                ->on('variation_templates')
                ->onDelete('cascade');

            $table->index('variation_template_id');
            $table->index('sort_order');
        });

        // Seed data
        $now = now();

        // Variation templates'ları bul
        $color = DB::table('variation_templates')->where('name', 'Renk')->first();
        $capacity = DB::table('variation_templates')->where('name', 'Kapasite')->first();
        $size = DB::table('variation_templates')->where('name', 'Boyut')->first();

        if ($color) {
            DB::table('variation_template_values')->insert([
                ['variation_template_id' => $color->id, 'label' => 'Siyah', 'value' => 'black', 'color' => '#000000', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['variation_template_id' => $color->id, 'label' => 'Beyaz', 'value' => 'white', 'color' => '#FFFFFF', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
                ['variation_template_id' => $color->id, 'label' => 'Gümüş', 'value' => 'silver', 'color' => '#C0C0C0', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
                ['variation_template_id' => $color->id, 'label' => 'Altın', 'value' => 'gold', 'color' => '#FFD700', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }

        if ($capacity) {
            DB::table('variation_template_values')->insert([
                ['variation_template_id' => $capacity->id, 'label' => '128 GB', 'value' => '128gb', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['variation_template_id' => $capacity->id, 'label' => '256 GB', 'value' => '256gb', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
                ['variation_template_id' => $capacity->id, 'label' => '512 GB', 'value' => '512gb', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
                ['variation_template_id' => $capacity->id, 'label' => '1 TB', 'value' => '1tb', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }

        if ($size) {
            DB::table('variation_template_values')->insert([
                ['variation_template_id' => $size->id, 'label' => 'XS', 'value' => 'xs', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['variation_template_id' => $size->id, 'label' => 'S', 'value' => 's', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
                ['variation_template_id' => $size->id, 'label' => 'M', 'value' => 'm', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
                ['variation_template_id' => $size->id, 'label' => 'L', 'value' => 'l', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
                ['variation_template_id' => $size->id, 'label' => 'XL', 'value' => 'xl', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variation_template_values');
    }
};
