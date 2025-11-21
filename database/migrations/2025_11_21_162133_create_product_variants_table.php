<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('sku')->nullable()->unique();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('special_price', 10, 2)->nullable();
            $table->enum('special_price_type', ['percent', 'fixed'])->nullable();
            $table->date('special_price_start')->nullable();
            $table->date('special_price_end')->nullable();
            $table->boolean('manage_stock')->default(true);
            $table->integer('quantity')->default(0);
            $table->boolean('in_stock')->default(true);
            $table->string('barcode')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->index('product_id');
            $table->index('sku');
            $table->index('is_active');
            $table->index('in_stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
