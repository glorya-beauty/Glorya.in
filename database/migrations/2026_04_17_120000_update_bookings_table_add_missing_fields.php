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
        // First add the missing columns
        if (!Schema::hasColumn('bookings', 'base_amount')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->decimal('base_amount', 10, 2)->nullable()->after('amount');
            });
        }
        
        if (!Schema::hasColumn('bookings', 'gst_amount')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->decimal('gst_amount', 10, 2)->nullable()->after('base_amount');
            });
        }
        
        if (!Schema::hasColumn('bookings', 'booking_number')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->string('booking_number')->unique()->nullable()->after('id');
            });
        }
        
        if (!Schema::hasColumn('bookings', 'customer_address')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->text('customer_address')->nullable()->after('customer_phone');
            });
        }
        
        // Update status enum separately to avoid conflicts
        try {
            \DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending', 'payment_pending', 'payment_uploaded', 'payment_verified', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending'");
        } catch (\Exception $e) {
            // Column might already have the correct enum values
            \Log::info('Status enum update skipped: ' . $e->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop columns if they exist
        if (Schema::hasColumn('bookings', 'base_amount')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn('base_amount');
            });
        }
        
        if (Schema::hasColumn('bookings', 'gst_amount')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn('gst_amount');
            });
        }
        
        if (Schema::hasColumn('bookings', 'booking_number')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn('booking_number');
            });
        }
        
        if (Schema::hasColumn('bookings', 'customer_address')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn('customer_address');
            });
        }
        
        // Revert status enum
        try {
            \DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending', 'payment_pending', 'payment_verified', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending'");
        } catch (\Exception $e) {
            \Log::info('Status enum revert skipped: ' . $e->getMessage());
        }
    }
};
