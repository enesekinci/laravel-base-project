<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table): void {
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

        Schema::create('slider_items', function (Blueprint $table): void {
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

        // Başlangıç verileri
        $now = now();
        $firstUser = DB::table('users')->first();

        // Ana slider oluştur
        $sliderId = DB::table('sliders')->insertGetId([
            'name' => 'Ana Sayfa Slider',
            'code' => 'home_main',
            'is_active' => true,
            'sort_order' => 0,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Slider item 1
        $media1Id = DB::table('media_files')->insertGetId([
            'user_id' => $firstUser?->id,
            'disk' => 'public',
            'path' => 'sliders/slide-1.jpg',
            'filename' => 'slide-1.jpg',
            'mime_type' => 'image/jpeg',
            'size' => 0,
            'width' => 1903,
            'height' => 499,
            'collection' => 'sliders',
            'alt' => 'Welcome to Laravel Base Project',
            'is_private' => false,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('slider_items')->insert([
            'slider_id' => $sliderId,
            'media_file_id' => $media1Id,
            'title' => 'Welcome to Laravel Base Project',
            'subtitle' => 'Modern Laravel boilerplate for your next project',
            'button_text' => 'Get Started',
            'button_url' => '#',
            'link_url' => '#',
            'sort_order' => 1,
            'is_active' => true,
            'meta' => json_encode([
                'heading' => 'Laravel 12',
                'subheading' => 'Ready to use',
            ]),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Slider item 2
        $media2Id = DB::table('media_files')->insertGetId([
            'user_id' => $firstUser?->id,
            'disk' => 'public',
            'path' => 'sliders/slide-2.jpg',
            'filename' => 'slide-2.jpg',
            'mime_type' => 'image/jpeg',
            'size' => 0,
            'width' => 1903,
            'height' => 499,
            'collection' => 'sliders',
            'alt' => 'Build amazing applications',
            'is_private' => false,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('slider_items')->insert([
            'slider_id' => $sliderId,
            'media_file_id' => $media2Id,
            'title' => 'Build Amazing Applications',
            'subtitle' => 'Start building your next project today',
            'button_text' => 'Learn More',
            'button_url' => '#',
            'link_url' => '#',
            'sort_order' => 2,
            'is_active' => true,
            'meta' => json_encode([
                'heading' => 'Fast Development',
            ]),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('slider_items');
        Schema::dropIfExists('sliders');
    }
};
