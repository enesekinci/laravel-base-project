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
        Schema::create('attribute_set_attribute', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_set_id');
            $table->unsignedBigInteger('attribute_id');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('attribute_set_id')->references('id')->on('attribute_sets')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->unique(['attribute_set_id', 'attribute_id']);
            $table->index('attribute_set_id');
            $table->index('attribute_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_set_attribute');
    }
};
