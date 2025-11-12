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
        Schema::create('variation_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['text', 'color', 'image'])->default('text');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('type');
            $table->index('is_active');
            $table->index('sort_order');
        });

        // Seed data - Sadece variation_templates, variation_template_values seed data'sı variation_template_values migration'ında
        $now = now();

        // Renk
        DB::table('variation_templates')->insert([
            'name' => 'Renk',
            'type' => 'color',
            'sort_order' => 1,
            'is_active' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Kapasite
        DB::table('variation_templates')->insert([
            'name' => 'Kapasite',
            'type' => 'text',
            'sort_order' => 2,
            'is_active' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Boyut
        DB::table('variation_templates')->insert([
            'name' => 'Boyut',
            'type' => 'text',
            'sort_order' => 3,
            'is_active' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variation_templates');
    }
};
