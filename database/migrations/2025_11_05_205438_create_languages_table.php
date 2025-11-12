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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code', 2)->unique(); // tr, en, vb.
            $table->string('native_name')->nullable();
            $table->string('flag')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_default')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('code');
            $table->index('is_active');
            $table->index('is_default');
        });

        // Seed data
        $now = now();
        DB::table('languages')->insert([
            ['name' => 'Türkçe', 'code' => 'tr', 'native_name' => 'Türkçe', 'flag' => '🇹🇷', 'is_active' => true, 'is_default' => true, 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'English', 'code' => 'en', 'native_name' => 'English', 'flag' => '🇬🇧', 'is_active' => true, 'is_default' => false, 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Deutsch', 'code' => 'de', 'native_name' => 'Deutsch', 'flag' => '🇩🇪', 'is_active' => true, 'is_default' => false, 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
