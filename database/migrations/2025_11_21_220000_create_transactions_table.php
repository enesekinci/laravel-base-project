<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();

            $table->string('gateway')->nullable();        // paytr, iyzico, craftgate, stripe, manual
            $table->string('gateway_transaction_id')->nullable(); // provider tarafındaki id
            $table->string('type')->default('payment');   // payment, refund
            $table->string('status')->default('pending'); // pending, success, failed, refunded

            $table->decimal('amount', 12, 2)->default(0);
            $table->string('currency', 3)->default('TRY');

            $table->json('request_payload')->nullable();  // debug amaçlı
            $table->json('response_payload')->nullable(); // debug amaçlı
            $table->text('message')->nullable();          // hata/başarı açıklaması

            $table->timestamp('processed_at')->nullable();

            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->nullOnDelete();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->nullOnDelete();

            $table->index('order_id');
            $table->index('payment_method_id');
            $table->index('gateway');
            $table->index('type');
            $table->index('status');
            $table->index('processed_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
