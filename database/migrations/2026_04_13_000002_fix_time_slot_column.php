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
            // Add time_slot column if it doesn't exist
            if (!Schema::hasColumn('bookings', 'time_slot')) {
                $table->time('time_slot')->nullable();
            }
            
            // Drop booking_time column if it exists
            if (Schema::hasColumn('bookings', 'booking_time')) {
                $table->dropColumn('booking_time');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'time_slot')) {
                $table->dropColumn('time_slot');
            }
            
            if (Schema::hasColumn('bookings', 'booking_time')) {
                $table->dropColumn('booking_time');
            }
        });
    }
};
