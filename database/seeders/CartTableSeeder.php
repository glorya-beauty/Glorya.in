<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Drop tables if they exist
        Schema::dropIfExists('cart_items');
        Schema::dropIfExists('carts');

        // Create carts table
        Schema::create('carts', function ($table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Create cart_items table
        Schema::create('cart_items', function ($table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->onDelete('cascade');
            $table->string('service_name');
            $table->decimal('service_price', 8, 2);
            $table->string('service_image');
            $table->string('service_time');
            $table->string('service_category');
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });

        $this->command->info('Cart tables created successfully!');
    }
}
