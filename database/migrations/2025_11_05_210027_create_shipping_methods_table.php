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
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->enum('type', ['fixed', 'free', 'weight_based', 'price_based'])->default('fixed');
            $table->decimal('cost', 10, 2)->default(0);
            $table->json('config')->nullable(); // Weight ranges, price ranges, vb.
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('code');
            $table->index('is_active');
            $table->index('sort_order');
        });

        // Seed data
        $now = now();

        DB::table('shipping_methods')->insert([
            ['name' => 'Ücretsiz Kargo', 'code' => 'free_shipping', 'description' => '150₺ ve üzeri siparişlerde ücretsiz', 'type' => 'free', 'cost' => 0.00, 'is_active' => true, 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Standart Kargo', 'code' => 'standard', 'description' => '3-5 iş günü içinde teslimat', 'type' => 'fixed', 'cost' => 25.00, 'is_active' => true, 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Hızlı Kargo', 'code' => 'express', 'description' => '1-2 iş günü içinde teslimat', 'type' => 'fixed', 'cost' => 50.00, 'is_active' => true, 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Aynı Gün Teslimat', 'code' => 'same_day', 'description' => 'Aynı gün içinde teslimat (İstanbul içi)', 'type' => 'fixed', 'cost' => 75.00, 'is_active' => true, 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
    }
};
