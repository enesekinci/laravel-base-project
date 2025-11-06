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
        Schema::create('payment_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('order_number')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('TRY');
            $table->text('message');
            $table->enum('status', ['new', 'processed', 'closed'])->default('new');
            $table->text('admin_notes')->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('set null');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_notifications');
    }
};
