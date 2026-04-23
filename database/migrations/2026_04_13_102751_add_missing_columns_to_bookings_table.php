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
        Schema::table('bookings', function (Blueprint $table) {
            $table->text('address')->nullable()->after('customer_phone');
            $table->enum('status', ['pending', 'payment_pending', 'payment_verified', 'confirmed', 'completed', 'cancelled'])->default('pending')->after('location');
            $table->text('notes')->nullable()->after('payment_screenshot');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['address', 'status', 'notes']);
        });
    }
};
