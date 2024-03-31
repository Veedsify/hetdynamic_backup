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
        Schema::create('homepage_consultings', function (Blueprint $table) {
            $table->id();
            $table->string('consulting_title');
            $table->text('consulting_description');
            $table->string('consulting_feature_1');
            $table->string('consulting_feature_2');
            $table->string('consulting_desc_1');
            $table->string('consulting_desc_2');
            $table->string('consulting_image');
            $table->string('consulting_image_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_consulting');
    }
};
