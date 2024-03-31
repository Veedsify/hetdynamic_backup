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
        Schema::create('homepage_banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner_text_1')->default("Welcome to " . config('app.name'));
            $table->string('banner_text_2')->default("We are the best in the business");
            $table->string('banner_text_3')->default("We are the best in the business");
            $table->string('banner_image_1');
            $table->string('banner_image_2');
            $table->string('banner_image_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_banner');
    }
};
