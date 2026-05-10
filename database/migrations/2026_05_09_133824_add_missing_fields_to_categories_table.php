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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('title', 200)->nullable()->after('name');
            $table->string('tagline', 300)->nullable()->after('description');
            $table->string('category_icon_image')->nullable()->after('image');
            $table->json('submenu')->nullable()->after('category_icon_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['title', 'tagline', 'category_icon_image', 'submenu']);
        });
    }
};
