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
        Schema::create('homepage_supports', function (Blueprint $table) {
            $table->id();
            $table->string('support_title');
            $table->text('support_feature_1');
            $table->text('support_feature_2');
            $table->text('support_feature_3');
            $table->string('support_image');
            $table->string('support_video');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_support');
    }
};
