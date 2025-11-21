<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('code')->unique(); // paytr, iyzico, craftgate, stripe, bank_transfer, cod
            $table->string('type')->default('online'); // online, offline

            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);

            $table->json('config')->nullable(); // api key, merchant id vs.

            $table->timestamps();
            $table->softDeletes();

            $table->index('is_active');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
