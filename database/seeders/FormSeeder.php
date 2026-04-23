<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Drop existing tables
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('registrations');
        Schema::dropIfExists('newsletter_subscriptions');

        // Create contacts table
        Schema::create('contacts', function ($table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->text('message')->nullable();
            $table->string('subject')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
        });

        // Create appointments table
        Schema::create('appointments', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('service_type');
            $table->date('appointment_date');
            $table->string('preferred_time');
            $table->text('notes')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        // Create registrations table
        Schema::create('registrations', function ($table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->text('message')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
        });

        // Create newsletter_subscriptions table
        Schema::create('newsletter_subscriptions', function ($table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('status')->default('active');
            $table->timestamp('subscribed_at')->useCurrent();
            $table->timestamps();
        });

        $this->command->info('Form tables created successfully!');
    }
}
