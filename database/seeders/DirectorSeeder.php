<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Director::create([
            'name' => 'Sellyana',
            'is_active' => true,
        ]);

        Director::create([
            'name' => 'Adrianus Pangemanan',
            'is_active' => true,
        ]);

        Director::create([
            'name' => 'Maria Regina',
            'is_active' => true,
        ]);

        Director::create([
            'name' => 'Purwanto',
            'is_active' => true,
        ]);

        Director::create([
            'name' => 'Agus Setiadi',
            'is_active' => true,
        ]);

        Director::create([
            'name' => 'Sendy F. Tantono',
            'is_active' => true,
        ]);
    }
}
