<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('contact_person')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('website')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('code');
            $table->index('is_active');
        });

        // Seed data
        $now = now();
        DB::table('suppliers')->insert([
            ['name' => 'Teknoloji Distribütör A.Ş.', 'code' => 'TEK-DIST-001', 'contact_person' => 'Ahmet Yılmaz', 'email' => 'info@tekdist.com', 'phone' => '+90 212 555 0101', 'address' => 'Teknoloji Mahallesi, Bilgisayar Sokak No:1', 'city' => 'İstanbul', 'country' => 'Türkiye', 'tax_number' => '1234567890', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Elektronik Toptan', 'code' => 'ELEK-TOP-001', 'contact_person' => 'Mehmet Demir', 'email' => 'satis@elektoptan.com', 'phone' => '+90 312 555 0202', 'address' => 'Toptan Caddesi, Elektronik Plaza', 'city' => 'Ankara', 'country' => 'Türkiye', 'tax_number' => '0987654321', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
