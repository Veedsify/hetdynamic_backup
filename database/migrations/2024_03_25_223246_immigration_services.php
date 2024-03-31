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
        Schema::create("immigration_services", function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("featured_image");
            $table->string("slug");
            $table->boolean("highlight_features_active")->default(0);
            $table->boolean("service_features_active")->default(0);
            $table->boolean("benefits_section_active")->default(0);
            $table->boolean("requirements_section_1_active")->default(0);
            $table->boolean("requirements_section_2_active")->default(0);
            $table->boolean("option_1_active")->default(0);
            $table->boolean("option_2_active")->default(0);
            $table->boolean("option_3_active")->default(0);
            $table->boolean("extra_requirements_active")->default(0);
            $table->boolean("mandatory_requirements_active")->default(0);
            $table->boolean("timeline_of_events_active")->default(0);
            $table->boolean("sponsorship_active")->default(0);
            $table->string("services_title")->nullable();
            $table->longText("services_first_content")->nullable();
            $table->longText("services_second_content")->nullable();
            $table->string("benefits_title")->nullable();
            $table->string("requirements_section_1_image")->nullable();
            $table->string("requirements_section_1_title")->nullable();
            $table->string("requirements_section_1_subtitle")->nullable();
            $table->string("requirements_section_2_image")->nullable();
            $table->string("requirements_section_2_title")->nullable();
            $table->string("requirements_section_2_subtitle")->nullable();
            $table->string("option_1_title")->nullable();
            $table->longText("option_1_content")->nullable();
            $table->string("option_1_image")->nullable();
            $table->string("option_2_title")->nullable();
            $table->longText("option_2_content")->nullable();
            $table->string("option_2_image")->nullable();
            $table->string("option_3_title")->nullable();
            $table->longText("option_3_content")->nullable();
            $table->string("option_3_image")->nullable();
            $table->string("extra_requirements_title")->nullable();
            $table->longText("extra_requirements_content")->nullable();
            $table->string("extra_requirements_image")->nullable();
            $table->string("mandatory_requirements_title")->nullable();
            $table->string("timeline_of_events_title")->nullable();
            $table->string("sponsorship_title")->nullable();
            $table->string("sponsorship_image")->nullable();
            $table->longText("sponsorship_content")->nullable();
            $table->string("tags")->nullable();
            $table->string("country")->nullable();
            $table->string("service")->nullable();
            $table->boolean("status")->default(0);
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
