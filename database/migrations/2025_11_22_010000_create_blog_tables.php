<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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

        // Başlangıç verileri
        $now = now();
        $firstUser = DB::table('users')->first();

        // Post kategorileri
        $categories = [
            ['name' => 'Moda', 'slug' => 'moda'],
            ['name' => 'Teknoloji', 'slug' => 'teknoloji'],
            ['name' => 'Yaşam', 'slug' => 'yasam'],
            ['name' => 'Spor', 'slug' => 'spor'],
        ];

        $categoryIds = [];
        foreach ($categories as $catData) {
            $categoryId = DB::table('post_categories')->insertGetId([
                'name' => $catData['name'],
                'slug' => $catData['slug'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $categoryIds[$catData['slug']] = $categoryId;
        }

        // Post tag'leri
        $tags = [
            ['name' => 'Yeni Koleksiyon', 'slug' => 'yeni-koleksiyon'],
            ['name' => 'Trend', 'slug' => 'trend'],
            ['name' => 'İndirim', 'slug' => 'indirim'],
            ['name' => 'Öneri', 'slug' => 'oneri'],
        ];

        $tagIds = [];
        foreach ($tags as $tagData) {
            $tagId = DB::table('post_tags')->insertGetId([
                'name' => $tagData['name'],
                'slug' => $tagData['slug'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $tagIds[$tagData['slug']] = $tagId;
        }

        // Blog post'ları (3-5 tane)
        $posts = [
            [
                'title' => 'Laravel 12 ile Modern Web Geliştirme',
                'excerpt' => 'Laravel 12\'nin yeni özelliklerini keşfedin ve modern web uygulamaları geliştirmeye başlayın.',
                'content' => 'Laravel 12, web geliştirme dünyasında yeni bir dönem başlatıyor. Bu makalede, framework\'ün en son özelliklerini ve nasıl kullanılacağını öğreneceksiniz.',
                'image' => 'blog/post-1.jpg',
                'category' => 'teknoloji',
                'tags' => ['trend', 'oneri'],
            ],
            [
                'title' => 'PHP 8.3 Performans İyileştirmeleri',
                'excerpt' => 'PHP 8.3\'ün getirdiği performans iyileştirmeleri ve yeni özellikler hakkında detaylı bilgi.',
                'content' => 'PHP 8.3, önceki sürümlere göre önemli performans iyileştirmeleri getiriyor. Bu makalede, bu iyileştirmeleri ve nasıl faydalanabileceğinizi öğreneceksiniz.',
                'image' => 'blog/post-2.jpg',
                'category' => 'teknoloji',
                'tags' => ['trend'],
            ],
            [
                'title' => 'Sağlıklı Yaşam İçin 10 İpucu',
                'excerpt' => 'Günlük hayatınızda uygulayabileceğiniz basit ama etkili sağlık ipuçları.',
                'content' => 'Sağlıklı bir yaşam sürmek için günlük rutininizde yapabileceğiniz küçük değişiklikler büyük farklar yaratabilir. Bu makalede, pratik ve uygulanabilir ipuçları bulacaksınız.',
                'image' => 'blog/post-3.jpg',
                'category' => 'yasam',
                'tags' => ['oneri'],
            ],
            [
                'title' => 'Spor Yapmanın Faydaları',
                'excerpt' => 'Düzenli spor yapmanın fiziksel ve mental sağlığa olan olumlu etkileri.',
                'content' => 'Spor yapmak sadece fiziksel sağlığımız için değil, aynı zamanda mental sağlığımız için de çok önemlidir. Bu makalede, sporun faydalarını detaylı bir şekilde inceleyeceğiz.',
                'image' => 'blog/post-4.jpg',
                'category' => 'spor',
                'tags' => ['oneri', 'trend'],
            ],
            [
                'title' => '2025 Moda Trendleri',
                'excerpt' => '2025 yılının en öne çıkan moda trendleri ve stil önerileri.',
                'content' => '2025 yılı moda dünyasında yeni trendler ve stiller getiriyor. Bu makalede, bu yılın en popüler moda trendlerini ve nasıl uygulayabileceğinizi öğreneceksiniz.',
                'image' => 'blog/post-5.jpg',
                'category' => 'moda',
                'tags' => ['yeni-koleksiyon', 'trend'],
            ],
        ];

        foreach ($posts as $postData) {
            // Media file oluştur
            $mediaId = DB::table('media_files')->insertGetId([
                'user_id' => $firstUser?->id,
                'disk' => 'public',
                'path' => $postData['image'],
                'filename' => basename($postData['image']),
                'mime_type' => 'image/jpeg',
                'size' => 0,
                'width' => 800,
                'height' => 600,
                'collection' => 'blog',
                'alt' => $postData['title'],
                'is_private' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            // Post oluştur
            $postSlug = Str::slug($postData['title']);
            $postId = DB::table('posts')->insertGetId([
                'author_id' => $firstUser?->id,
                'media_file_id' => $mediaId,
                'title' => $postData['title'],
                'slug' => $postSlug,
                'excerpt' => $postData['excerpt'],
                'content' => $postData['content'],
                'status' => 'published',
                'published_at' => now()->subDays(random_int(1, 30)),
                'meta_title' => $postData['title'],
                'meta_description' => $postData['excerpt'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            // Kategori ilişkisi
            if (isset($categoryIds[$postData['category']])) {
                DB::table('post_post_category')->insertOrIgnore([
                    'post_id' => $postId,
                    'post_category_id' => $categoryIds[$postData['category']],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            // Tag ilişkileri
            foreach ($postData['tags'] as $tagSlug) {
                if (isset($tagIds[$tagSlug])) {
                    DB::table('post_post_tag')->insertOrIgnore([
                        'post_id' => $postId,
                        'post_tag_id' => $tagIds[$tagSlug],
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                }
            }
        }
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
