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
        Schema::table('master_webs', function (Blueprint $table) {
            $table->string('program_title')->after('order');
            $table->string('testimonial_title')->after('program_title');
            $table->string('gallery_title')->after('testimonial_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('master_webs', function (Blueprint $table) {
            $table->dropColumn('program_title');
            $table->dropColumn('testimonial_title');
            $table->dropColumn('gallery_title');
        });
    }
};
