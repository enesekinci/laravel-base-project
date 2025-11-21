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
        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('attribute_id');
            $table->string('value_string')->nullable();
            $table->text('value_text')->nullable();
            $table->integer('value_int')->nullable();
            $table->decimal('value_decimal', 15, 4)->nullable();
            $table->timestamp('value_datetime')->nullable();
            $table->unsignedBigInteger('option_value_id')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->foreign('option_value_id')->references('id')->on('option_values')->onDelete('set null');
            $table->index(['product_id', 'attribute_id']);
            $table->index('attribute_id');
            $table->index('option_value_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attribute_values');
    }
};
