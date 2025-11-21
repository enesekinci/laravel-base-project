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
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->after('title');
            $table->string('heading')->nullable()->after('subtitle');
            $table->string('price')->nullable()->after('heading');
            $table->string('price_em')->nullable()->after('price');
            $table->string('button_text')->default('Shop Now!')->after('price_em');
            $table->string('button_url')->default('/porto/demo1-shop.html')->after('button_text');
            $table->string('background_color')->nullable()->after('button_url');
            $table->string('animation_name')->default('fadeInUpShorter')->after('background_color');
            $table->boolean('text_uppercase')->default(false)->after('animation_name');
            $table->string('location')->nullable()->after('text_uppercase'); // home, category, product, vb.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn([
                'subtitle',
                'heading',
                'price',
                'price_em',
                'button_text',
                'button_url',
                'background_color',
                'animation_name',
                'text_uppercase',
                'location',
            ]);
        });
    }
};
