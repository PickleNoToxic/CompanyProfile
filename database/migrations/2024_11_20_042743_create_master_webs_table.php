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
            $table->string('about_title');
            $table->text('about_description');
            $table->string('about_thumbnail')->nullable();
            $table->string('about_video')->nullable();
            $table->string('value_title');
            $table->text('value_description')->nullable();
            $table->string('value_photo1')->nullable();
            $table->string('value_photo2')->nullable();
            $table->string('value_photo3')->nullable();
            $table->string('statistik_title');
            $table->string('benefit_title');
            $table->string('order')->nullable();
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
