<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Value;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Value::create([
            'name' => 'H.O.T Selaras',
            'initial' => 'H',
            'description' => 'Mengedepankan hati untuk memahami, otak untuk menganalisis dan mengambil keputusan bijak, serta tindakan yang konsisten dengan nilai-nilai tersebut untuk mencapai harmoni dan hasil yang optimal.',
            'is_active' => true,
        ]);

        Value::create([
            'name' => 'ACTIVE',
            'initial' => 'A',
            'description' => 'Mendorong kemampuan beradaptasi terhadap tantangan, menciptakan ide-ide orisinal, serta menunjukkan keberanian dan tanggung jawab dalam mengambil langkah yang diperlukan.',
            'is_active' => true,
        ]);

        Value::create([
            'name' => 'UNITY',
            'initial' => 'U',
            'description' => 'Menjunjung kebersamaan dan kolaborasi yang didasarkan pada kasih sayang, membangun hubungan yang harmonis, dan melayani dengan tulus untuk mencapai tujuan bersama yang lebih besar.',
            'is_active' => true,
        ]);
    }
}
