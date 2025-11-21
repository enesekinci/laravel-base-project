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
        Schema::table('attributes', function (Blueprint $table) {
            $table->unsignedBigInteger('attribute_set_id')->nullable()->after('id');
            $table->foreign('attribute_set_id')->references('id')->on('attribute_sets')->onDelete('set null');
            $table->index('attribute_set_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attributes', function (Blueprint $table) {
            $table->dropForeign(['attribute_set_id']);
            $table->dropIndex(['attribute_set_id']);
            $table->dropColumn('attribute_set_id');
        });
    }
};
