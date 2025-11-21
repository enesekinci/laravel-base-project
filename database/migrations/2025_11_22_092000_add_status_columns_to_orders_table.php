<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Eğer user_id yoksa ekle
            if (!Schema::hasColumn('orders', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
                $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            }

            // Address foreign keys
            if (!Schema::hasColumn('orders', 'shipping_address_id')) {
                $table->unsignedBigInteger('shipping_address_id')->nullable()->after('user_id');
                $table->foreign('shipping_address_id')->references('id')->on('addresses')->nullOnDelete();
            }

            if (!Schema::hasColumn('orders', 'billing_address_id')) {
                $table->unsignedBigInteger('billing_address_id')->nullable()->after('shipping_address_id');
                $table->foreign('billing_address_id')->references('id')->on('addresses')->nullOnDelete();
            }

            // Status columns
            if (!Schema::hasColumn('orders', 'status')) {
                $table->string('status')->default('pending')->after('payment_method_id');
            }

            if (!Schema::hasColumn('orders', 'payment_status')) {
                $table->string('payment_status')->default('pending')->after('status');
            }

            if (!Schema::hasColumn('orders', 'shipping_status')) {
                $table->string('shipping_status')->default('pending')->after('payment_status');
            }

            // Notes column
            if (!Schema::hasColumn('orders', 'notes')) {
                $table->text('notes')->nullable()->after('shipping_status');
            }

            // Indexes
            $table->index(['status', 'payment_status', 'shipping_status']);
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }

            if (Schema::hasColumn('orders', 'shipping_address_id')) {
                $table->dropForeign(['shipping_address_id']);
                $table->dropColumn('shipping_address_id');
            }

            if (Schema::hasColumn('orders', 'billing_address_id')) {
                $table->dropForeign(['billing_address_id']);
                $table->dropColumn('billing_address_id');
            }

            if (Schema::hasColumn('orders', 'shipping_method_id')) {
                $table->dropForeign(['shipping_method_id']);
                $table->dropColumn('shipping_method_id');
            }

            if (Schema::hasColumn('orders', 'payment_method_id')) {
                $table->dropForeign(['payment_method_id']);
                $table->dropColumn('payment_method_id');
            }

            $table->dropColumn([
                'status',
                'payment_status',
                'shipping_status',
                'notes',
            ]);
        });
    }
};
