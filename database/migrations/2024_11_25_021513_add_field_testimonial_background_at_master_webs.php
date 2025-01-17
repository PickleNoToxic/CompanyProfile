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
            $table->string('testimonial_photo')->nullable()->after('testimonial_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('master_webs', function (Blueprint $table) {
            $table->dropColumn('testimonial_photo');
        });
    }
};
