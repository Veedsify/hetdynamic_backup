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
        Schema::create("blog_comments_replies", function (Blueprint $table) {
            $table->id();
            $table->foreignId("blog_comment_id")->constrained("blog_comments")->cascadeOnDelete();
            $table->string("name");
            $table->string("email");
            $table->text("message");
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
