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
        Schema::create('tbl_product_image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_url');
            $table->string('image_type');
            $table->integer('is_main');
            $table->unsignedInteger('product_id');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('tbl_product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_productimage');
    }
};
