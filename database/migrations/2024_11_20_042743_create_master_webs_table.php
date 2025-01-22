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
            $table->text('title');
            $table->string('hero_background')->nullable();
            $table->string('company_icon')->nullable();
            $table->text('description');
            $table->string('companies_title');
            $table->string('vision_mission_title');
            $table->string('mission_title');
            $table->text('mission_description');
            $table->string('mission_photo')->nullable();
            $table->string('value_title');
            $table->string('vision_mission_background')->nullable();
            $table->string('motto');
            $table->string('works_title');
            $table->text('works_description');
            $table->integer('number_of_projects');
            $table->integer('number_of_satisfied_clients');
            $table->string('projects_icon')->nullable();
            $table->string('satisfied_clients_icon')->nullable();
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
