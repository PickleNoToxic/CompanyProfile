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
        Schema::create('master_webs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('hero_background')->nullable();
            $table->string('company_icon')->nullable();
            $table->text('description');
            $table->string('companies_title');
            $table->string('vision_mission_title');
            $table->string('vision_mission_background')->nullable();
            $table->string('motto');
            $table->string('directors_title');
            $table->string('testimonials_title');
            $table->text('testimonials_description');
            $table->string('testimonials_background')->nullable();
            $table->string('contact_us_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_webs');
    }
};
