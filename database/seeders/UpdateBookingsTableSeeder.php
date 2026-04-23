<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateBookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            // Check if table exists
            if (!Schema::hasTable('bookings')) {
                $this->command->info('Bookings table does not exist');
                return;
            }

            // Add base_amount column if it doesn't exist
            if (!Schema::hasColumn('bookings', 'base_amount')) {
                Schema::table('bookings', function ($table) {
                    $table->decimal('base_amount', 10, 2)->nullable()->after('amount');
                });
                $this->command->info('Added base_amount column');
            }

            // Add gst_amount column if it doesn't exist
            if (!Schema::hasColumn('bookings', 'gst_amount')) {
                Schema::table('bookings', function ($table) {
                    $table->decimal('gst_amount', 10, 2)->nullable()->after('base_amount');
                });
                $this->command->info('Added gst_amount column');
            }

            // Add booking_number column if it doesn't exist
            if (!Schema::hasColumn('bookings', 'booking_number')) {
                Schema::table('bookings', function ($table) {
                    $table->string('booking_number')->unique()->nullable()->after('id');
                });
                $this->command->info('Added booking_number column');
            }

            // Add customer_address column if it doesn't exist
            if (!Schema::hasColumn('bookings', 'customer_address')) {
                Schema::table('bookings', function ($table) {
                    $table->text('customer_address')->nullable()->after('customer_phone');
                });
                $this->command->info('Added customer_address column');
            }

            // Update existing bookings to have booking numbers
            DB::table('bookings')->whereNull('booking_number')->update([
                'booking_number' => DB::raw("CONCAT('GB', UPPER(UNIX_TIMESTAMP(NOW(3)) + id))")
            ]);

            $this->command->info('Bookings table updated successfully');

        } catch (\Exception $e) {
            $this->command->error('Error updating bookings table: ' . $e->getMessage());
        }
    }
}
