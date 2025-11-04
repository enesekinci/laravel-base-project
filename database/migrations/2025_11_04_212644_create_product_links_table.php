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
        Schema::create('product_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('linked_product_id');
            $table->enum('type', ['up_sell', 'cross_sell', 'related'])->default('related');
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('linked_product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->unique(['product_id', 'linked_product_id', 'type']);
            $table->index('product_id');
            $table->index('linked_product_id');
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_links');
    }
};
