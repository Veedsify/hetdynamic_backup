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
        Schema::create('aboutpage_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('experience_title');
            $table->string('experience_sub_title');
            $table->text('experience_description');
            $table->string('experience_feature_1');
            $table->string('experience_feature_2');
            $table->integer('experience_years');
            $table->string('experience_image_1');
            $table->string('experience_image_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutpage_experience');
    }
};
