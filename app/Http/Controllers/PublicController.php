<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\CategoryFacility;
use App\Models\Client;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Director;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Hero;
use App\Models\MasterWeb;
use App\Models\OurGallery;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Program;
use App\Models\SosialMedia;
use App\Models\Statistik;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    public function index()
    {
        $wa = Contact::first();
        $data = MasterWeb::first();
        $statistiks = Statistik::latest()->get();
        $benefits = Benefit::latest()->get();
        $testimonials = Testimonial::where('is_active', 1)->latest()->get();
        $heroes = Hero::where('is_active', 1)->latest()->get();
        $programs = Program::where('is_active', 1)->where('is_best', 1)->latest()->limit(3)->get();
        $galleries = OurGallery::all();


        return view('public.pages.index', [
            "title" => "Transformer Center",
            "data" => $data,
            "statistiks" => $statistiks,
            "benefits" => $benefits,
            "testimonials" => $testimonials,
            "heroes" => $heroes,
            "programs" => $programs,
            "galleries" => $galleries,
            "wa" => $wa,
        ]);

    }
    public function home()
    {
        $master_web = MasterWeb::first();
        $clients = Client::where('is_active', 1)->get();
        $companies = Company::where('is_active', 1)->get();
        $directors = Director::where('is_active', 1)->get();
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
            "directors" => $directors,
            "contact" => $contact,
            "formatted_contact_phone" => $formatted_contact_phone,
            "sosial_medias" => $sosial_medias
        ]);
        

    }

    public function contact()
    {
        $wa = Contact::first();
        $data = Contact::first();
        $sosmeds = SosialMedia::where('is_active', 1)->get();
        $partners = Partner::where('is_active', 1)->get();

        return view('public.pages.contact.index', [
            "title" => "Contact Us - Transformer Center",
            "data" => $data,
            "sosmeds" => $sosmeds,
            "partners" => $partners,
            "wa" => $wa,
        ]);
    }

    public function galleries()
    {
        $wa = Contact::first();
        $datas = OurGallery::latest()->get();

        return view('public.pages.galleries.index', [
            "title" => "Galleri Foto - Transformer Center",
            "datas" => $datas,
            "wa" => $wa,
        ]);
    }

    public function orders()
    {
        $wa = Contact::first();
        $data = MasterWeb::first();
        $faqs = Faq::latest()->get();

        return view('public.pages.orders.index', [
            "title" => "Pemesanan - Transformer Center",
            "data" => $data,
            "faqs" => $faqs,
            "wa" => $wa,
        ]);
    }

    public function facilities()
    {
        $wa = Contact::first();
        $datas = CategoryFacility::with('facilities')->where('is_active', 1)->get();

        return view('public.pages.facilities.index', [
            "title" => "Fasilitas - Transformer Center",
            "datas" => $datas,
            "wa" => $wa,
        ]);
    }

    public function programs()
    {
        $wa = Contact::first();
        $programs = Program::where('is_active', 1)->get();
        return view('public.pages.programs.index', [
            "title" => "Program - Transformer Center",
            "programs" => $programs,
            "wa" => $wa,
        ]);
    }

    public function posts()
    {
        $wa = Contact::first();
        $posts = Post::where('is_active', 1)->latest()->paginate(7);

        return view('public.pages.posts.index', [
            "title" => "Artikel - Transformer Center",
            "posts" => $posts,
            "wa" => $wa,
        ]);
    }

    public function post(Post $post)
    {
        $wa = Contact::first();
        $datas = Post::where('is_active', 1)
            ->where('id', '!=', $post->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('public.pages.posts.detail', [
            "title" => "Detail Artikel - Transformer Center",
            "post" => $post,
            "datas" => $datas,
            "wa" => $wa,
        ]);
    }
}
