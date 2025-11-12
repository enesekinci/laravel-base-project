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
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('type')->default('select'); // select, radio, checkbox
            $table->boolean('required')->default(false);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('type');
            $table->index('is_active');
            $table->index('sort_order');
        });

        // Seed data - Sadece options, option_values seed data'sı option_values migration'ında
        $now = now();

        // Garanti Süresi
        DB::table('options')->insert([
            'name' => 'Garanti Süresi',
            'description' => 'Ürün garanti süresi seçenekleri',
            'type' => 'select',
            'required' => false,
            'sort_order' => 1,
            'is_active' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Kurulum Hizmeti
        DB::table('options')->insert([
            'name' => 'Kurulum Hizmeti',
            'description' => 'Profesyonel kurulum hizmeti',
            'type' => 'checkbox',
            'required' => false,
            'sort_order' => 2,
            'is_active' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Ekstra RAM
        DB::table('options')->insert([
            'name' => 'Ekstra RAM',
            'description' => 'Ekstra RAM yükseltme seçenekleri',
            'type' => 'radio',
            'required' => false,
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
        Schema::dropIfExists('options');
    }
};
