<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use App\Models\MasterWeb;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('Super09876'),
            'roles' => 'SUPERADMIN',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Admin 01',
            'email' => 'admin01@gmail.com',
            'password' => bcrypt('Admin01123'),
            'roles' => 'ADMIN',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Admin 02',
            'email' => 'admin02@mail.com',
            'password' => bcrypt('Admin02123'),
            'roles' => 'ADMIN',
            'is_active' => false,
        ]);

        MasterWeb::create([
            'about_title' => 'Tentang Kami',
            'about_description' => 'Transformer Center merupakan Multi-function venue berbasis edutainment Park yang berlokasi di Kota Wisata Batu, Jawa Timur. Berdiri sejak 2001, Menghadirkan berbagai macam program edukasi, training center hingga entertainment bagi semua kalangan mulai dari anak-anak hingga professional, bahkan berbagai event bisa selalu disesuaikan dengan kebutuhan setiap klien.',
            'value_title' => 'To Become The Most Valuable Edutainment Park In Indonesia',
            'statistik_title' => 'Kami berupaya untuk selalu memberikan pengalaman Terbaik Penuh Nilai',
            'benefit_title' => 'Kenapa Harus Transformer Center',
            'program_title' => 'Program',
            'testimonial_title' => 'Testimonial',
            'gallery_title' => 'Galeri Transformer Center',
        ]);

        Contact::create([
            'address' => 'Jl. Ngagel Madya No. 19-21, Baratajaya, Kecamatan Gubeng, Surabaya - 60284',
            'phone' => '08113488000',
            'email' => 'info@binarcorporation.com',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2504.0072829759665!2d112.53160053517212!3d-7.864043995994758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7880b7d5a0c855%3A0x97a941c38202fa3b!2sTransformer%20Center%20%26%20Kampoeng%20Kidz!5e1!3m2!1sen!2sid!4v1724997461333!5m2!1sen!2sid'
        ]);
    }
}
