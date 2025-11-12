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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code', 3)->unique(); // TRY, USD, EUR
            $table->string('symbol');
            $table->decimal('exchange_rate', 10, 4)->default(1);
            $table->boolean('is_default')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('code');
            $table->index('is_default');
            $table->index('is_active');
        });

        // Seed data
        $now = now();
        DB::table('currencies')->insert([
            ['name' => 'Türk Lirası', 'code' => 'TRY', 'symbol' => '₺', 'exchange_rate' => 1.0000, 'is_default' => true, 'is_active' => true, 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'US Dollar', 'code' => 'USD', 'symbol' => '$', 'exchange_rate' => 32.5000, 'is_default' => false, 'is_active' => true, 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Euro', 'code' => 'EUR', 'symbol' => '€', 'exchange_rate' => 35.0000, 'is_default' => false, 'is_active' => true, 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'British Pound', 'code' => 'GBP', 'symbol' => '£', 'exchange_rate' => 40.0000, 'is_default' => false, 'is_active' => true, 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
