<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // customer
            $table->string('type')->default('shipping'); // shipping, billing
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->string('country')->default('TR');
            $table->string('city');
            $table->string('district')->nullable();
            $table->string('postcode')->nullable();
            $table->string('line_1');
            $table->string('line_2')->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->index(['user_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
