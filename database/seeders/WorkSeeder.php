<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Work;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Work::create([
            'name' => 'Holistic Healthy Beauty',
            'is_active' => true,
        ]);

        Work::create([
            'name' => 'Life Skill Experience Center',
            'is_active' => true,
        ]);

        Work::create([
            'name' => 'Life Skill Training',
            'is_active' => true,
        ]);

        Work::create([
            'name' => 'Financial Education',
            'is_active' => true,
        ]);

        Work::create([
            'name' => 'Property Consultant',
            'is_active' => true,
        ]);

        Work::create([
            'name' => 'Consumer Goods',
            'is_active' => true,
        ]);

        Work::create([
            'name' => 'Hospitality',
            'is_active' => true,
        ]);

        Work::create([
            'name' => 'Digital Marketing',
            'is_active' => true,
        ]);
    }
}
