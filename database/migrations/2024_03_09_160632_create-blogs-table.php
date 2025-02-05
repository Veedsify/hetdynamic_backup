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
        //
        Schema::create("blogs", function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug");
            $table->text("description");
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->string("category");
            $table->string("tags");
            $table->boolean("status");
            $table->string("image");
            $table->longText("content");
            $table->longText("content_html");
            $table->string("meta_title")->nullable();
            $table->text("meta_description")->nullable();
            $table->string("meta_keywords")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
