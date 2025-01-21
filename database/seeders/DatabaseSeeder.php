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
            'title' => 'Your journey to success begins with STAR GROUP',
            'description' => 'Is acompany group that is ready to grow to become the best in the world. Work closely with our team which is a big family of Binar Group.',
            'companies_title' => 'Our Companies',
            'motto' => 'UNITY FOR LOVE',
            'vision_mission_title' => 'TO BECOME THE BEST INTEGRATED BUSINESS COMPANY IN INDONESIA',
            'mission_title' => 'Our Mission',
            'mission_description' => 'To be the best in the world.',
            'value_title' => 'Core Value',
            'works_title' => 'The Work',
            'works_description' => 'We offer a wide range of services to support the growth of your business.',
            'number_of_projects' => 31368,
            'number_of_satisfied_customers' => 273,
            'directors_title' => 'Our Directors',
            'testimonials_title' => 'Testimonial',
            'testimonials_description' => 'A concrete evidence of the satisfaction and trust held by our clients towards our products or services.',
            'contact_us_title' => 'Contact Us',
        ]);

        Contact::create([
            'address' => 'Jl. Ngagel Madya No. 19-21, Baratajaya, Kecamatan Gubeng, Surabaya - 60284',
            'phone' => '08113488000',
            'email' => 'info@binarcorporation.com',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5642229902005!2d112.75752527318546!3d-7.290318871652854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbb488e196b3%3A0x5255849de512e153!2sJl.%20Ngagel%20Madya%20No.19%2C%20Baratajaya%2C%20Kec.%20Gubeng%2C%20Surabaya%2C%20Jawa%20Timur%2060284!5e0!3m2!1sen!2sid!4v1737094646491!5m2!1sen!2sid'
        ]);

        $this->call([
            ValueSeeder::class
        ]);
    }
}
