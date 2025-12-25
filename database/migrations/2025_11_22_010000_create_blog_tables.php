<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_categories', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();

            $table->index('slug');
        });

        Schema::create('post_tags', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();

            $table->index('slug');
        });

        Schema::create('posts', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('media_file_id')->nullable(); // cover image

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();

            $table->string('status')->default('draft'); // draft, published
            $table->timestamp('published_at')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('media_file_id')->references('id')->on('media_files')->nullOnDelete();

            $table->index('status');
            $table->index('published_at');
        });

        Schema::create('post_post_category', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('post_category_id');
            $table->timestamps();

            $table->unique(['post_id', 'post_category_id']);
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
            $table->foreign('post_category_id')->references('id')->on('post_categories')->cascadeOnDelete();
        });

        Schema::create('post_post_tag', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('post_tag_id');
            $table->timestamps();

            $table->unique(['post_id', 'post_tag_id']);
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
            $table->foreign('post_tag_id')->references('id')->on('post_tags')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_post_tag');
        Schema::dropIfExists('post_post_category');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('post_categories');
    }
};
