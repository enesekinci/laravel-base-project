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
        Schema::create('model_translations', function (Blueprint $table) {
            $table->id();
            $table->morphs('translatable'); // translatable_type, translatable_id
            $table->unsignedBigInteger('language_id');
            $table->json('translations'); // {name: "...", description: "...", meta_title: "..."}
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->unique(['translatable_type', 'translatable_id', 'language_id'], 'translatable_language_unique');
            $table->index('language_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_translations');
    }
};
