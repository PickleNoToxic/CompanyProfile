<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'name' => 'Rachmadi Joesoef',
            'company' => 'Owner PT. Konimex',
            'description' => 'Suatu bentuk pelatihan yang sangat berbeda dengan pelatihan yang kami jalani sebelumnya. Sangat nyata dengan konsep EXPERIENTIAL LEARNING.',
            'is_active' => true,
        ]);
    }
}
