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
        Schema::table('banners', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->after('title');
            $table->string('price')->nullable()->after('subtitle');
            $table->string('price_em')->nullable()->after('price');
            $table->string('button_text')->default('Shop Now')->after('price_em');
            $table->string('button_url')->default('/porto/demo1-shop.html')->after('button_text');
            $table->string('background_color')->nullable()->after('button_url');
            $table->string('text_align')->default('left')->after('background_color'); // left, center, right
            $table->string('animation_name')->nullable()->after('text_align');
            $table->string('animation_delay')->nullable()->after('animation_name');
            $table->string('image_alt')->default('banner')->after('animation_delay');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn([
                'subtitle',
                'price',
                'price_em',
                'button_text',
                'button_url',
                'background_color',
                'text_align',
                'animation_name',
                'animation_delay',
                'image_alt',
            ]);
        });
    }
};
