<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SosialMedia;

class SosialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SosialMedia::create([
            'name' => 'Facebook',
            'url' => 'facebook.com',
            'is_active' => true,
        ]);

        SosialMedia::create([
            'name' => 'Youtube',
            'url' => 'youtube.com',
            'is_active' => true,
        ]);

        SosialMedia::create([
            'name' => 'LinkedIn',
            'url' => 'linkedin.com',
            'is_active' => true,
        ]);

        SosialMedia::create([
            'name' => 'Instagram',
            'url' => 'instagram.com',
            'is_active' => true,
        ]);
    }
}
