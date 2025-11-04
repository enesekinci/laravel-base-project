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
        Schema::create('product_variation_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_variation_id');
            $table->unsignedBigInteger('variation_template_id');
            $table->unsignedBigInteger('variation_template_value_id');
            $table->timestamps();

            $table->foreign('product_variation_id')
                ->references('id')
                ->on('product_variations')
                ->onDelete('cascade');

            $table->foreign('variation_template_id')
                ->references('id')
                ->on('variation_templates')
                ->onDelete('cascade');

            $table->foreign('variation_template_value_id')
                ->references('id')
                ->on('variation_template_values')
                ->onDelete('cascade');

            $table->unique(['product_variation_id', 'variation_template_id', 'variation_template_value_id']);
            $table->index('product_variation_id');
            $table->index('variation_template_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variation_values');
    }
};
