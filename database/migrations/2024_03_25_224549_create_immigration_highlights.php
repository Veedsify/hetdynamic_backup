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
        Schema::create('immigration_highlights', function (Blueprint $table) {
            $table->id();
            $table->longText('feature_title')->nullable();
            $table->longText('feature_context')->nullable();
            $table->foreignId('immigration_service_id')->refrences('id')->on("immigration_services")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('immigration_highlights');
    }
};
