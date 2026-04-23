<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add booking_number and gst_amount columns to bookings table if they don't exist
        if (Schema::hasTable('bookings')) {
            Schema::table('bookings', function ($table) {
                if (!Schema::hasColumn('bookings', 'booking_number')) {
                    $table->string('booking_number')->nullable();
                }
                if (!Schema::hasColumn('bookings', 'gst_amount')) {
                    $table->decimal('gst_amount', 8, 2)->nullable();
                }
            });
        }

        // Create booking_items table if it doesn't exist
        if (!Schema::hasTable('booking_items')) {
            Schema::create('booking_items', function ($table) {
                $table->id();
                $table->foreignId('booking_id')->constrained()->onDelete('cascade');
                $table->string('service_name');
                $table->decimal('service_price', 8, 2);
                $table->string('service_image');
                $table->string('service_time');
                $table->string('service_category');
                $table->integer('quantity')->default(1);
                $table->timestamps();
            });
        }

        $this->command->info('Booking tables updated successfully!');
    }
}
