<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Client;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Director;
use App\Models\Hero;
use App\Models\MasterWeb;
use App\Models\OurGallery;
use App\Models\Program;
use App\Models\SosialMedia;
use App\Models\Statistik;
use App\Models\Testimonial;
use App\Models\Value;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    public function home()
    {
        $master_web = MasterWeb::first();
        $clients = Client::where('is_active', 1)->get();
        $companies = Company::where('is_active', 1)->get();
        $values = Value::where('is_active', 1)->get();
        $works = Work::where('is_active', 1)->get();
        $directors = Director::where('is_active', 1)->get();
        $testimonials = Testimonial::where('is_active', 1)->get();
        $contact = Contact::first();
        $formatted_contact_phone = preg_replace('/^0/', '+62', $contact->phone);
        $formatted_contact_phone = preg_replace(
            '/^\+62(\d{3})(\d{3})(\d{4})(\d*)$/',
            '(+62) $1 $2 $3 $4',
            $formatted_contact_phone
        );
        $sosial_medias = SosialMedia::where('is_active', 1)->get();

        return view('public.pages.home',[
            "title" => "Company Profile",
            "master_web" => $master_web,
            "clients" => $clients,
            "companies" => $companies,
            "values" => $values,
            "works" => $works,
            "directors" => $directors,
            "testimonials" => $testimonials,
            "contact" => $contact,
            "formatted_contact_phone" => $formatted_contact_phone,
            "sosial_medias" => $sosial_medias,
            ]);
            }
}