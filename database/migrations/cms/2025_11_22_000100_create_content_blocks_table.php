<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('content_blocks', function (Blueprint $table): void {
            $table->id();

            $table->string('key')->unique(); // "home.slider_banners", "home.top_brands"
            $table->string('name');          // admin label
            $table->string('type')->default('json'); // json, html, markdown
            $table->json('value')->nullable();       // baner listesi, section config vs.
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->index('key');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_blocks');
    }
};
