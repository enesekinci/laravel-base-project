<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('status')->default('pending'); // pending, paid, cancelled, shipped, completed, refunded
            $table->string('payment_status')->default('pending'); // pending, paid, failed, refunded
            $table->string('payment_method')->nullable(); // paytr, iyzico, cod, bank_transfer vs
            $table->string('transaction_ref')->nullable(); // gateway referansı
            $table->string('currency', 3)->default('TRY');
            $table->decimal('subtotal', 12, 2)->default(0);        // ürünlerin toplamı
            $table->decimal('discount_total', 12, 2)->default(0);  // kupon vb.
            $table->decimal('tax_total', 12, 2)->default(0);       // KDV
            $table->decimal('shipping_total', 12, 2)->default(0);  // kargo
            $table->decimal('grand_total', 12, 2)->default(0);     // ödenecek toplam
            $table->string('coupon_code')->nullable();
            $table->decimal('coupon_discount', 12, 2)->default(0);
            $table->json('billing_address')->nullable();
            $table->json('shipping_address')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->timestamp('placed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->index('user_id');
            $table->index('status');
            $table->index('payment_status');
            $table->index('coupon_code');
            $table->index('placed_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
