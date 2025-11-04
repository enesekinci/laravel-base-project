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
        Schema::create('variation_template_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variation_template_id');
            $table->string('label');
            $table->string('value')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('variation_template_id')
                ->references('id')
                ->on('variation_templates')
                ->onDelete('cascade');

            $table->index('variation_template_id');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variation_template_values');
    }
};
