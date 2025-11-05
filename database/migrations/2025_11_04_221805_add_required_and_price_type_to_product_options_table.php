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
        Schema::table('product_options', function (Blueprint $table) {
            $table->boolean('required')->default(false)->after('type');
        });

        // Type enum'unu genişletmek için textarea ekliyoruz
        // SQLite'de enum değiştirme zor olduğu için sadece boolean ekliyoruz
        // Type string olarak kalacak
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_options', function (Blueprint $table) {
            //
        });
    }
};
