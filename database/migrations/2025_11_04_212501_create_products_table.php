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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('tax_class_id')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->boolean('is_virtual')->default(false);
            $table->string('seo_url')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->date('new_from')->nullable();
            $table->date('new_to')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('set null');

            $table->foreign('tax_class_id')
                ->references('id')
                ->on('tax_classes')
                ->onDelete('set null');

            $table->index('slug');
            $table->index('sku');
            $table->index('brand_id');
            $table->index('tax_class_id');
            $table->index('status');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
