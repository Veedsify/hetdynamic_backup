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
        Schema::create('page_trackers', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->string('method');
            $table->string('url');
            $table->string('user_agent');
            $table->string('referrer')->nullable();
            $table->string('device');
            $table->string('platform');
            $table->string('browser');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_trackers');
    }
};
