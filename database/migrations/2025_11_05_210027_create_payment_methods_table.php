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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->json('config')->nullable(); // API keys, credentials, vb.
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
        DB::table('payment_methods')->insert([
            ['name' => 'Kredi Kartı', 'code' => 'credit_card', 'description' => 'Visa, Mastercard, American Express', 'is_active' => true, 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Banka Havalesi', 'code' => 'bank_transfer', 'description' => 'Banka havalesi ile ödeme', 'is_active' => true, 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kapıda Ödeme', 'code' => 'cash_on_delivery', 'description' => 'Kapıda nakit ödeme', 'is_active' => true, 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PayPal', 'code' => 'paypal', 'description' => 'PayPal ile ödeme', 'is_active' => true, 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
