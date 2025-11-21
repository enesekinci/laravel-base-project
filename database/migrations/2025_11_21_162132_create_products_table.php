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
            $table->string('slug');
            $table->string('sku')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('special_price', 10, 2)->nullable();
            $table->enum('special_price_type', ['percent', 'fixed'])->nullable();
            $table->date('special_price_start')->nullable();
            $table->date('special_price_end')->nullable();
            $table->boolean('manage_stock')->default(true);
            $table->integer('quantity')->default(0);
            $table->boolean('in_stock')->default(true);
            $table->date('new_from')->nullable();
            $table->date('new_to')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('tax_class_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->foreign('tax_class_id')->references('id')->on('tax_classes')->onDelete('set null');
            $table->index('brand_id');
            $table->index('tax_class_id');
            $table->index('slug');
            $table->index('sku');
            $table->index('is_active');
            $table->index('in_stock');
            $table->index('name');
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
