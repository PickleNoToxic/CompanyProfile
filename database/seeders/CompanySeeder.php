<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Star Inc',
            'url' => 'google.com',
            'description' => 'Suatu bentuk pelatihan yang sangat berbeda dengan pelatihan yang kami jalani sebelumnya. Sangat nyata dengan konsep EXPERIENTIAL LEARNING.',
            'is_active' => true,
        ]);

        Company::create([
            'name' => 'Transformer Center',
            'url' => 'google.com',
            'description' => 'Suatu bentuk pelatihan yang sangat berbeda dengan pelatihan yang kami jalani sebelumnya. Sangat nyata dengan konsep EXPERIENTIAL LEARNING.',
            'is_active' => true,
        ]);

        Company::create([
            'name' => 'AOS',
            'url' => 'google.com',
            'description' => 'Suatu bentuk pelatihan yang sangat berbeda dengan pelatihan yang kami jalani sebelumnya. Sangat nyata dengan konsep EXPERIENTIAL LEARNING.',
            'is_active' => true,
        ]);

        Company::create([
            'name' => 'Cipta Insan Aktif',
            'url' => 'google.com',
            'description' => 'Suatu bentuk pelatihan yang sangat berbeda dengan pelatihan yang kami jalani sebelumnya. Sangat nyata dengan konsep EXPERIENTIAL LEARNING.',
            'is_active' => true,
        ]);

        Company::create([
            'name' => 'Bridge',
            'url' => 'google.com',
            'description' => 'Suatu bentuk pelatihan yang sangat berbeda dengan pelatihan yang kami jalani sebelumnya. Sangat nyata dengan konsep EXPERIENTIAL LEARNING.',
            'is_active' => true,
        ]);

        Company::create([
            'name' => 'BYC',
            'url' => 'google.com',
            'description' => 'Suatu bentuk pelatihan yang sangat berbeda dengan pelatihan yang kami jalani sebelumnya. Sangat nyata dengan konsep EXPERIENTIAL LEARNING.',
            'is_active' => true,
        ]);

        Company::create([
            'name' => 'Brave Star',
            'url' => 'google.com',
            'description' => 'Suatu bentuk pelatihan yang sangat berbeda dengan pelatihan yang kami jalani sebelumnya. Sangat nyata dengan konsep EXPERIENTIAL LEARNING.',
            'is_active' => true,
        ]);

        Company::create([
            'name' => 'Distribusi Cipta Cemerlang',
            'url' => 'google.com',
            'description' => 'Suatu bentuk pelatihan yang sangat berbeda dengan pelatihan yang kami jalani sebelumnya. Sangat nyata dengan konsep EXPERIENTIAL LEARNING.',
            'is_active' => true,
        ]);
    }
}
