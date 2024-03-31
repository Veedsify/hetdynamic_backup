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
        Schema::create('aboutpage_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('about_us_title');
            $table->string('about_us_sub_title_1');
            $table->string('about_us_sub_title_2');
            $table->text('about_us_description_1');
            $table->text('about_us_description_2');
            $table->string('about_us_feature_1');
            $table->string('about_us_feature_2');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutpage_abouts');

    }
};
