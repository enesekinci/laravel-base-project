<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table): void {
            $table->id();
            $table->string('name');           // "Main Menu"
            $table->string('code')->unique(); // "main", "footer"
            $table->timestamps();
            $table->softDeletes();

            $table->index('code');
        });

        Schema::create('menu_items', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('parent_id')->nullable();

            $table->string('title');
            $table->string('type')->default('url'); // url,page,category,post
            $table->string('url')->nullable();      // type=url
            $table->unsignedBigInteger('target_id')->nullable(); // page_id, category_id vs. type'a göre

            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('menu_id')->references('id')->on('menus')->cascadeOnDelete();
            $table->foreign('parent_id')->references('id')->on('menu_items')->nullOnDelete();

            $table->index('menu_id');
            $table->index('parent_id');
            $table->index('type');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
        Schema::dropIfExists('menus');
    }
};
