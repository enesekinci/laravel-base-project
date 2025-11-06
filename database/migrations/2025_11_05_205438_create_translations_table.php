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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->unsignedBigInteger('language_id');
            $table->text('value');
            $table->string('group')->default('general');
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->unique(['key', 'language_id', 'group']);
            $table->index('key');
            $table->index('group');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
