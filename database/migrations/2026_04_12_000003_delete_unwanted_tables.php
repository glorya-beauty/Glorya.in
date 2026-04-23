<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop unwanted tables if they exist
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('personal_access_tokens');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // No need to recreate these tables
    }
};
