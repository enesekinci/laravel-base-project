<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('media_files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('disk')->default('public');
            $table->string('path');      // storage içindeki relative path (ör: media/2025/11/abc.jpg)
            $table->string('filename');  // orijinal dosya adı
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size')->default(0); // bytes

            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();

            $table->string('collection')->nullable(); // products, sliders, banners, blog_images vs.
            $table->string('alt')->nullable();
            $table->boolean('is_private')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();

            $table->index('user_id');
            $table->index('collection');
            $table->index('is_private');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_files');
    }
};

