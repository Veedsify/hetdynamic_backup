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
        Schema::create("global_settings", function (Blueprint $table) {
            $table->id();
            $table->string("admin_email");
            $table->string("default_mail_address");
            $table->string("support_mail_address");
            $table->string("admin_phone");
            $table->string("admin_address");
            $table->string("site_logo");
            $table->string("site_favicon");
            $table->string("site_name");
            $table->string("site_description");
            $table->string("site_facebook");
            $table->string("site_twitter");
            $table->string("site_url");
            $table->string("site_youtube");
            $table->string("site_address");
            $table->string("site_phone");
            $table->string("site_email");
            $table->string("site_instagram");
            $table->string("site_linkedin");
            $table->string("site_pinterest");
            $table->string("mail_address");
            $table->string("mail_host");
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
