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
        Schema::create('reviewpage_contents', function (Blueprint $table) {
            $table->id();
            $table->string('review_title');
            $table->string('review_description');
            $table->string('review_list_1');
            $table->string('review_list_2');
            $table->string('review_list_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviewpage_contents');
    }
};
