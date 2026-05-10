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
        Schema::table('services', function (Blueprint $table) {
            // Add subcategory column
            $table->string('subcategory')->nullable()->after('category');
            
            // Change description to longtext for CKEditor support
            $table->longText('description')->nullable()->change();
            
            // Add additional useful columns for service management
            $table->text('short_description')->nullable()->after('description');
            $table->string('slug')->unique()->after('name');
            $table->decimal('original_price', 8, 2)->nullable()->after('short_description');
            $table->decimal('final_price', 8, 2)->nullable()->after('original_price');
            $table->decimal('discount_percentage', 5, 2)->nullable()->after('final_price');
            $table->integer('duration')->nullable()->comment('Duration in minutes')->after('discount_percentage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'subcategory',
                'short_description', 
                'slug',
                'original_price',
                'final_price',
                'discount_percentage',
                'duration'
            ]);
            
            // Revert description back to text
            $table->text('description')->nullable()->change();
        });
    }
};
