<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // "Home Main Slider"
            $table->string('code')->unique();    // "home_main"
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('is_active');
            $table->index('code');
        });

        Schema::create('slider_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slider_id');
            $table->unsignedBigInteger('media_file_id')->nullable(); // görsel
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('link_url')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->json('meta')->nullable(); // extra json
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('slider_id')->references('id')->on('sliders')->cascadeOnDelete();
            $table->foreign('media_file_id')->references('id')->on('media_files')->nullOnDelete();

            $table->index('slider_id');
            $table->index('is_active');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slider_items');
        Schema::dropIfExists('sliders');
    }
};
