<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('code')->unique(); // free_shipping, local_pickup, flat_rate, custom_xxx
            $table->string('type')->default('flat_rate'); // flat_rate, free_shipping, local_pickup, custom

            $table->decimal('price', 12, 2)->default(0); // flat_rate / local pickup için
            $table->decimal('min_cart_total', 12, 2)->default(0); // free shipping eşiği gibi

            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);

            $table->json('config')->nullable(); // ileride city/region based vs.

            $table->timestamps();
            $table->softDeletes();

            $table->index('is_active');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
    }
};
