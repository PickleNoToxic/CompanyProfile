<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'name' => 'BCA',
            'is_active' => true,
        ]);

        Client::create([
            'name' => 'ASTRA Internasional',
            'is_active' => true,
        ]);

        Client::create([
            'name' => 'Indofood',
            'is_active' => true,
        ]);

        Client::create([
            'name' => 'Omron',
            'is_active' => true,
        ]);

        Client::create([
            'name' => 'Kalbe',
            'is_active' => true,
        ]);

        Client::create([
            'name' => 'Konimex',
            'is_active' => true,
        ]);
    }
}
