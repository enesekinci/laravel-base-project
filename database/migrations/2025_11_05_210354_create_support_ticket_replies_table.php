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
        Schema::create('support_ticket_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('support_ticket_id');
            $table->unsignedBigInteger('user_id')->nullable(); // Admin
            $table->unsignedBigInteger('customer_id')->nullable(); // Customer
            $table->text('message');
            $table->boolean('is_internal')->default(false); // Sadece adminler görebilir
            $table->timestamps();

            $table->foreign('support_ticket_id')->references('id')->on('support_tickets')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->index('support_ticket_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_ticket_replies');
    }
};
