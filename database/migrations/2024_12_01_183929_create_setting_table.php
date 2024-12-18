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
        Schema::create('tbl_setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location');
            $table->string('hotline');
            $table->string('email');
            $table->string('logo');
            $table->string('time_active');
            $table->string('site_name');
            $table->string('site_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_setting');
    }
};
