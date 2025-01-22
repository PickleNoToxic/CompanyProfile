@extends('public.layouts.main')

@push('addon-style')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .no-scroll {
            overflow: hidden;
        }

        #mission-description ul {
            list-style-type: none;
        }

        #mission-description li {
            position: relative;
            margin-bottom: 8px;
            padding-left: 2rem;
            line-height: 2;
            display: flex;
            align-items: center;
        }

        #mission-description li::before {
            content: '•';
            font-size: 3rem;
            color: #F8B500;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        #mission-description li p {
            flex-grow: 1;
            line-height: 1.5;
        }


        .swiper-slide {
            width: auto;
        }

        .swiper-pagination-bullet {
            background-color: #FFFFFF;
            opacity: 0.3;
        }

        .swiper-pagination-bullet-active {
            background-color: #F8B500;
            opacity: 1;
        }

        .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            margin: 0 5px;
            border-radius: 50%;
        }

        .testimonial-description div {
            max-width: 10rem;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
        }

        @media screen and (min-width: 1024px) {
            .testimonial-description div {
                max-width: 28rem;
            }
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endpush

@section('container')
    <main class="relative overflow-clip">
        <!-- Modal Overlay -->
        <div id="modal-overlay"
            class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm transition-opacity duration-300 ease-in-out opacity-0 pointer-events-none z-40">
        </div>
        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:px-5 rounded-t">
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:px-5 space-y-4">
                        <img id="modal-photo" class="w-full h-auto object-cover rounded" alt="Company Photo">
                        <h3 id="modal-title" class="text-xl font-semibold"></h3>
                        <p id="modal-description" class="text-justify leading-relaxed"></p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 rounded-b">
                        <a id="modal-link" href="" target="_blank"
                            class="text-white w-full bg-[#2E3191] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Visit
                            Site
                            <i class="fa fa-chevron-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- 1 --}}
        {{-- 1 OK --}}
        <section
            class="w-full h-[64rem] flex flex-col font-[600] justify-between text-3xl pb-64 px-8 pt-48 tracking-widest text-center font-poppins 
             bg-cover bg-center transform z-0"
            style="background-image: url('{{ asset('storage/' . $master_web->hero_background) }}')">
            <h1 class="text-[#2E3191]">{!! $master_web->title !!}</h1>
            <div class="text-center w-full rounded-xl bg-[#ffffffb5] py-4 overflow-hidden max-w-[90%] mx-auto ">
                <h1 class="text-base md:text-2xl tracking-normal">Our Clients:</h1>
                <div class="swiper-clients-container ms-8 mt-4 ">
                    <div class="swiper-wrapper">
                        @for ($i = 0; $i < 3; $i++)
                            @foreach ($clients as $client)
                                <div class="swiper-slide flex-shrink-0">
                                    <img class="h-[1.5rem] lg:h-[2rem] grayscale-[100%]"
                                        src="{{ asset('storage/' . $client->photo) }}" alt="Client Photo">
                                </div>
                                <div class="swiper-slide flex-shrink-0">
                                    <img class="h-[1.5rem] lg:h-[2rem] grayscale-[100%]"
                                        src="{{ asset('storage/' . $client->photo) }}" alt="Client Photo">
                                </div>
                                <div class="swiper-slide flex-shrink-0">
                                    <img class="h-[1.5rem] lg:h-[2rem] grayscale-[100%]"
                                        src="{{ asset('storage/' . $client->photo) }}" alt="Client Photo">
                                </div>
                                <div class="swiper-slide flex-shrink-0">
                                    <img class="h-[1.5rem] lg:h-[2rem] grayscale-[100%]"
                                        src="{{ asset('storage/' . $client->photo) }}" alt="Client Photo">
                                </div>
                                <div class="swiper-slide flex-shrink-0">
                                    <img class="h-[1.5rem] lg:h-[2rem] grayscale-[100%]"
                                        src="{{ asset('storage/' . $client->photo) }}" alt="Client Photo">
                                </div>
                            @endforeach
                        @endfor
                    </div>
                </div>
            </div>
        </section>

        {{-- 2 OK --}}
        <section class="w-[140%] h-[40rem] -mt-32 bg-white transform -rotate-6 -ms-8 relative z-10">
            <div
                class="rotate-6 flex lg:flex-row flex-col  ms-8 p-8  w-screen h-full items-center justify-center lg:space-y-0 space-y-12 space-x-0 lg:space-x-12">
                <!-- Div Pertama -->
                <div class="w-full lg:w-[50%] lg:space-y-0 space-y-12 flex flex-col lg:flex-row ">
                    <div class="flex flex-shrink-0 justify-center items-center">
                        <img class="h-56" src="{{ asset('storage/' . $master_web->company_icon) }}">
                    </div>
                    <div class="flex justify-center  items-center ">
                        <p id="description" class="max-w-96 font-poppins text-center lg:text-start"> </p>
                    </div>
                </div>
                <!-- Div Kedua -->
                <div class="w-full lg:w-[50%] justify-center ">
                    <h1 id="companies-title" class="text-[#2E3191] font-[600] text-center lg:text-start text-3xl mb-8">
                        {{ $master_web->companies_title }}
                    </h1>
                    <div class="swiper-container swiper-companies-container mt-4 overflow-hidden">
                        <div class="swiper-wrapper">
                            @foreach ($companies as $company)
                                <div class="swiper-slide swiper-companies-slide h-28 w-28 flex items-center object-contain flex-shrink-0 cursor-pointer"
                                    data-name="{{ $company->name }}" data-description="{{ $company->description }}"
                                    data-photo="{{ asset('storage/' . $company->photo_description) }}"
                                    data-url="{{ $company->url }}">
                                    <img src="{{ asset('storage/' . $company->photo) }}" alt="{{ $company->name }}">
                                </div>
                                <div class="swiper-slide swiper-companies-slide h-28 w-28 flex items-center object-contain flex-shrink-0 cursor-pointer"
                                    data-name="{{ $company->name }}" data-description="{{ $company->description }}"
                                    data-photo="{{ asset('storage/' . $company->photo_description) }}"
                                    data-url="{{ $company->url }}">
                                    <img src="{{ asset('storage/' . $company->photo) }}" alt="{{ $company->name }}">
                                </div>
                                <div class="swiper-slide swiper-companies-slide h-28 w-28 flex items-center object-contain flex-shrink-0 cursor-pointer"
                                    data-name="{{ $company->name }}" data-description="{{ $company->description }}"
                                    data-photo="{{ asset('storage/' . $company->photo_description) }}"
                                    data-url="{{ $company->url }}">
                                    <img src="{{ asset('storage/' . $company->photo) }}" alt="{{ $company->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- bar1 OK --}}
        <div class="w-[140%] h-[20rem] bg-slate-200 transform rotate-6 relative -ms-12 mt-12 z-20"></div>

        {{-- 3 --}}
        <section
            class="w-[140%] h-[60rem] s:h-[55rem] md:h-[45rem] lg:h-[60rem] xl:h-[65rem] -ms-16 s:-ms-20 -mt-[20rem] md:-mt-[21rem] lg:-mt-[22rem] xl:-mt-[23.5rem] -rotate-6 overflow-clip relative z-30">
            <!-- Background Div -->
            <div class="absolute inset-0 -z-10 transform bg-[50%_13%]
                bg-cover bg-center before:content-[''] before:absolute before:inset-0 before:bg-[#00094bb8] before:rounded-md
                -mt-40"
                style="background-image: url('{{ asset('storage/' . $master_web->vision_mission_background) }}')">
            </div>

            <!-- Content -->
            <div
                class="relative w-screen h-full ms-16 s:ms-20 px-8 py-12 md:py-16 lg:py-24 transform rotate-6 overflow-visible flex flex-col items-start justify-center">
                <h1
                    class="text-[#F8B500] font-[600] tracking-widest text-xl md:text-3xl md:px-32 lg:px-64 text-center leading-relaxed">
                    {{ $master_web->vision_mission_title }}
                </h1>
                <div
                    class="flex flex-col md:flex-row w-full py-8 md:py-16 lg:py-32 items-center md:items-start justify-between space-y-8 md:space-y-0 md:space-x-8">
                    <div class="w-full md:w-[50%] flex justify-center">
                        <img src="{{ asset('storage/' . $master_web->mission_photo) }}" class="rounded-lg">
                    </div>
                    <div class="w-full md:w-[50%] flex flex-col justify-center md:justify-start">
                        <h1 id="mission-title" class="text-white font-[600] text-3xl text-start">
                            {{ $master_web->mission_title }}
                        </h1>
                        <div class="pt-8">
                            <div id="mission-description" class="max-w-128 font-poppins text-white text-start">
                                {!! $master_web->mission_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- bar2  --}}
        <div
            class="w-[140%] h-[16rem] bg-slate-200 transform rotate-6 relative -mt-[15.8rem] md:-mt-[14rem] lg:-mt-[14rem] xl:-mt-[12rem] -ms-12  z-20">
        </div>


        {{-- 4  OK --}}
        <section
            class="w-[140%] h-[50rem] md:h-[55rem] lg:h-[50rem] xl:h-[55rem] -ms-16 transform -rotate-6 relative z-50 lg">
            <div
                class="relative w-screen h-full rotate-6 ms-16 md:ms-[4.7rem]  px-8 pt-8 pb-40 md:pt-28 md:pb-28 lg:pt-40 lg:pb-40  md:-top-24 lg:-top-32 flex flex-col justify-center items-center space-y-12">
                <h1 id="value-title" class="text-[#2E3191] font-[600] text-3xl text-center">
                    {{ $master_web->value_title }}
                </h1>
                <div class="flex flex-row space-x-4 items-center">
                    @foreach ($values as $value)
                        <h1
                            class="bg-[#2E3191] text-[#FFCA05] w-16 h-16 flex justify-center items-center rounded-full text-2xl font-bold">
                            {{ $value->initial }}</h1>
                    @endforeach
                </div>

                <!-- Swiper Container -->
                <div class="swiper-values-container w-full">
                    <div class="swiper-wrapper flex flex-row lg:justify-center">
                        @foreach ($values as $value)
                            <div class="swiper-slide flex flex-col max-w-72 px-4 py-2 bg-[#F0F1FA] py-8 rounded-xl text-center">
                                <h1 class="text-[#2E3191] font-bold mb-8">{{ $value->name }}</h1>
                                <p>{!! $value->description !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


        {{-- bar3 --}}
        <div
            class="w-[140%] h-[16rem] bg-slate-200 transform -rotate-6 relative  md:-mb-[12.5rem] lg:-mb-[11.5rem] xl:-mb-[9.5rem] -mt-[4.5rem] -ms-12  z-20">
        </div>

        {{-- 5 OK --}}
        {{-- gambar atas OK --}}
        <section
            class="w-[140%] h-[16rem] md:h-[21rem] lg:h-[25rem] xl:h-[30rem] -ms-16 -mt-[20rem] md:-mt-[21rem] lg:-mt-[22rem] xl:-mt-[23.5rem]  -rotate-6 overflow-clip relative z-30 border-t-[0.8rem] border-[#F8B500]">
            <!-- Background Div -->
            <div class="absolute inset-0 -z-10 transform bg-[50%_32%] rotate-[10deg] 
                bg-cover  before:content-[''] before:absolute before:inset-0 before:bg-[#00094b8a] before:rounded-md
                -mt-40 -ms-44"
                style="background-image: url('{{ asset('storage/' . $master_web->vision_mission_background) }}')">
            </div>

            <!-- Content -->
            <div
                class="relative w-screen h-full transform ms-[4.5rem] rotate-6 -top-16 md:-top-20 xl:-top-[5.5rem] flex items-center justify-center px-8 py-20 md:py-28 lg:py-36  xl:py-40 ">
                <h1 class="text-[#F8B500] font-[600] tracking-widest text-xl md:text-3xl text-center leading-relaxed">
                    {{ $master_web->motto }} 
                </h1>
            </div>
        </section>
        {{-- gambar bawah --}}
        <section class="w-[140%] h-[60rem] md:h-[68rem] lg:h-[65rem]  -mt-32
            transform rotate-6 -ms-16 relative z-40 overflow-clip">
            <div class="absolute inset-0 -z-10 transform bg-[100%_50%] 
                bg-cover  before:content-[''] before:absolute before:inset-0 before:bg-[#00094bb8] before:rounded-md
                -mt-96"
                style="background-image: url('{{ asset('storage/' . $master_web->vision_mission_background) }}')">
            </div>
            <div
                class="relative w-screen h-full transform -rotate-6 ms-16 px-4 md:px-8 pt-24 pb-64 -top-20  overflow-visible flex items-center justify-center z-20">
                <div class="flex flex-col w-full space-y-8 justify-between">
                    <div class="flex flex-col lg:max-w-[50%]">
                        <h1 id="works-title" class="text-white font-[600] text-3xl text-start mb-8">
                            {{ $master_web->works_title }}
                        </h1>

                        <p id="works-description"
                            class="font-poppins  text-white text-xs  lg:text-base xl:text-xl ">
                        </p>
                    </div>

                    <div class="flex flex-col lg:flex-row justify-between flex-grow space-y-8 ">
                        <div class="flex lg:w-3/5 lg:me-32 overflow-clip ">
                            <div class="relative swiper-container swiper-works-container w-full mx-auto  lg:px-12">
                                <div class="swiper-wrapper">
                                    @for ($i = 0; $i < 20; $i++)
                                        @foreach ($works as $work)
                                            <div
                                                class="swiper-slide w-fit h-fit !mt-6 lg:!mt-12   swiper-companies-slide overflow-hidden flex flex-col text-center justify-center items-center">
                                                <div>
                                                    <img class="w-32 lg:w-44 h-32 lg:h-44 object-cover rounded-full"
                                                        src="{{ asset('storage/' . $work->photo) }}" alt="{{ $work->name}}">
                                                    <p class="mt-4 text-white">{{ $work->name }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class=" flex lg:w-2/5 justify-evenly items-center">
                            <div class="flex flex-col w-fit  items-center justify-center text-center">
                                <img src="{{ asset('storage/' . $master_web->projects_icon) }}"
                                    alt="Projects" class="w-16 mb-8 lg:w-24 h-auto">
                                <h1 class="w-fit text-white text-3xl font-bold">{{ $master_web->number_of_projects }}</h1>
                                <h1 class="w-fit text-white ">Project</h1>
                            </div>
                            <div class="flex flex-col w-fit  items-center justify-center text-center">
                                <img src="{{ asset('storage/' . $master_web->satisfied_clients_icon) }}"
                                    alt="Satisfied Clients" class="w-16 mb-8 lg:w-24 h-auto">
                                <h1 class="w-fit text-white text-3xl font-bold">{{ $master_web->number_of_satisfied_clients }}</h1>
                                <h1 class="w-fit text-white ">Satisfied Client</h1>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- 6 OK --}}
        <section
            class="w-[140%] -ms-16 h-[28rem] bg-white transform -mt-72 relative z-50 transform -rotate-6 border-b-[0.8rem] border-[#F8B500]">
            <div class="relative w-screen h-full rotate-6 py-16 ms-[4rem] px-8">
                <h1 id="directors-title" class="text-[#2E3191] font-[600] text-3xl text-center mb-8">
                    {{ $master_web->directors_title }}
                </h1>
                <div class="swiper-container swiper-directors-container mt-16 mx-8">
                    <div class="swiper-wrapper">
                        @foreach ($directors as $director)
                            <div class="swiper-slide flex-shrink-0">
                                <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]"
                                    src="{{ asset('storage/' . $director->photo) }}" alt="">
                                <p class="mt-4 text-center">{{ $director->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- 7 OK --}}
        <section
            class="w-[140%] h-[60rem]  
            bg-cover transform rotate-6 -ms-16 -mt-40 bg-[50%_100%] 
            relative z-40 
            before:content-[''] before:absolute before:inset-0 before:bg-[#00094bb8] before:z-10 before:rounded-md"
            style="background-image: url('{{ asset('storage/' . $master_web->testimonials_background) }}')">
            <div
                class="relative w-screen ms-16 pt-48 pb-24 px-4 sm:px-8 h-full transform -rotate-6 overflow-visible flex flex-col justify-center z-20">
                <div class="flex h-fit justify-end text-end w-full">
                    <div class="flex flex-col ">
                        <h1 id="testimonials-title" class="text-white font-[600] text-3xl mb-8">
                            {{ $master_web->testimonials_title }}
                        </h1>
                        <p id="testimonials-description"
                            class="font-poppins max-w-60 md:max-w-96 lg:max-w-[28rem] text-white text-xs  lg:text-base xl:text-xl ">
                        </p>
                    </div>
                </div>
                <div
                    class="relative flex items-center justify-center swiper-testimonials-container overflow-hidden w-full h-full">
                    <div class="swiper-wrapper flex w-full h-full">
                        @for ($i = 0; $i < 7; $i++)
                            @foreach ($testimonials as $testimonial)
                                <div
                                    class="swiper-slide flex-shrink-0 w-full flex flex-col items-center justify-center h-auto">
                                    <div class="relative flex flex-col md:flex-row items-center ">
                                        <!-- Profile image and design -->
                                        <div class="relative">
                                            <div
                                                class="absolute -top-4 lg:-top-12 -left-3 lg:-left-10 w-20 lg:w-40 h-20 lg:h-40 bg-[#f8b600cb] rounded-full shadow-lg">
                                            </div>
                                            <div
                                                class="absolute z-20 top-32 lg:top-36 left-28 lg:left-32 w-8 lg:w-16 h-8 lg:h-16 bg-[#f8b600cb] rounded-full shadow-md">
                                            </div>
                                            <div
                                                class="relative z-10 w-40 lg:w-48 h-40 lg:h-48 bg-white rounded-full overflow-hidden shadow-xl">
                                                <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="Profile"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                        </div>
                                        <!-- Testimonial details -->
                                        <div
                                            class="flex flex-col text-white w-full mt-6 max-w-[20rem]  md:max-w-[24rem]  lg:max-w-[32rem] xl:max-w-[36rem] text-center md:text-start md:ms-8  overflow-auto text-xs lg:text-base xl:text-xl">
                                            <p class="text-[#F8B500] font-poppins font-bold">{{ $testimonial->name }}</p>
                                            <p class="font-poppins mt-1">{{ $testimonial->company }}</p>
                                            <p class="testimonial-description mt-4">{!! $testimonial->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endfor
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>

        {{-- bar4 --}}
        <div
            class="w-[140%] h-64 bg-slate-200 transform -rotate-6 relative -mt-[15.7rem] md:-mt-[17rem] lg:-mt-[18rem] xl:-mt-[20rem] -ms-12  z-20">
        </div>

        {{-- 8 --}}
        <section
            class="w-[140%] h-[52rem] md:h-[65rem] lg:h-[45rem] xl:h-[55rem] -ms-16 transform -rotate-6 relative z-50 -mt-16 lg:-mt-0">
            <div
                class="relative w-screen h-full rotate-6 ms-[4rem] px-8 py-28 flex flex-col mx-auto justify-center items-center mt-0">
                <h1 id="contact-us-title" class=" text-[#2E3191] font-[600] text-3xl text-center mb-8">
                    {{ $master_web->contact_us_title }}
                </h1>
                <div class="flex flex-col  6 lg:flex-row w-full ">
                    <div
                        class="transform overflow-visible lg:flex lg:flex-col lg:flex-1  lg:justify-center pt-8 lg:py-24 lg:mx-12 order-2 lg:order-1">
                        <div class="mb-4 flex">
                            <a class="flex-shrink-0 w-8"
                                href="https://www.google.com/maps?q={{ urlencode($contact->address) }}" target="_blank"
                                rel="noopener noreferrer">
                                <img class="w-full" src="{{ asset('assets/images/contact_us_location.png') }}">
                            </a>
                            <p class="ml-8">{{ $contact->address }}</p>
                        </div>
                        <div class="mb-4 flex items-center">
                            <a class="flex-shrink-0 w-8" href="mailto:{{ $contact->email }}">
                                <img class="w-full" src="{{ asset('assets/images/contact_us_gmail.png') }}">
                            </a>
                            <p class="ml-8">{{ $contact->email }}</p>
                        </div>
                        <div class="mb-4 flex items-center">
                            <a class="flex-shrink-0 w-8" href="https://wa.me/62{{ $contact->phone }}">
                                <img class="w-full" src="{{ asset('assets/images/contact_us_wa.png') }}">
                            </a>
                            <p class="ml-8 ">{{ $formatted_contact_phone }}</p>
                        </div>
                    </div>
                    <div class="  lg:flex-[2]  overflow-hidden w-full rounded-3xl order-1 lg:order-2">
                        @if ($contact->map)
                            <div class="relative w-full aspect-[16/9] overflow-hidden rounded-3xl">
                                <iframe class="absolute top-0 left-0 w-full h-full" src="{{ $contact->map }}"
                                    style="border: 0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                                </iframe>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex  items-center justify-center mt-16 lg:mt-8">
                    <p class="whitespace-nowrap">Follow Us: </p>
                    @foreach ($sosial_medias as $data)
                        <a href="{{ $data->url }}" target="_blank" rel="noopener noreferrer">
                            <img class="w-8 ml-4" src="{{ asset('storage/' . $data->photo) }}">
                        </a>
                        <a href="{{ $data->url }}" target="_blank" rel="noopener noreferrer">
                            <img class="w-8 ml-4" src="{{ asset('storage/' . $data->photo) }}">
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- bar5 --}}
        <div
            class="w-[140%] h-[16rem] bg-slate-200 transform -rotate-6 relative -mb-[14.5rem] md:-mb-[12.5rem] lg:-mb-[11.5rem] xl:-mb-[9.5rem] -mt-[4.5rem] -ms-12  z-20">
        </div>

    </main>
@endsection
@push('addon-script')
    <script>
        const body = document.body;
        const overlay = document.getElementById("modal-overlay");

        document.addEventListener("DOMContentLoaded", () => {
            const slides = document.querySelectorAll(".swiper-companies-slide");

            const modal = document.getElementById("default-modal");
            const modalTitle = document.getElementById("modal-title");
            const modalPhoto = document.getElementById("modal-photo");
            const modalDescription = document.getElementById("modal-description");
            const modalLink = document.getElementById("modal-link");

            slides.forEach(slide => {
                slide.addEventListener("click", () => {
                    const name = slide.dataset.name;
                    const description = slide.dataset.description;
                    const photo = slide.dataset.photo;
                    const url = slide.dataset.url;

                    modalTitle.textContent = name;
                    modalPhoto.src = photo;
                    modalDescription.innerHTML = description;
                    modalLink.href = url;

                    modal.classList.remove("hidden");
                    body.classList.add("no-scroll");
                    overlay.classList.add("opacity-100");
                    overlay.classList.remove("pointer-events-none");
                });
            });

            document.querySelectorAll("[data-modal-hide]").forEach(button => {
                button.addEventListener("click", () => {
                    modal.classList.add("hidden");
                    body.classList.remove("no-scroll");
                    overlay.classList.remove("opacity-100");
                    overlay.classList.add("pointer-events-none");
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const description = document.getElementById("description");
            const descriptionContent = @json($master_web->description);
            description.innerHTML = descriptionContent;

            const worksDescription = document.getElementById("works-description");
            const worksDescriptionContent = @json($master_web->works_description);
            worksDescription.innerHTML = worksDescriptionContent

            const testimonialsDescription = document.getElementById("testimonials-description");
            const testimonialsDescriptionContent = @json($master_web->testimonials_description);
            testimonialsDescription.innerHTML = testimonialsDescriptionContent
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            function decorateTitle(titleId) {
                const titleElement = document.getElementById(titleId);
                const text = titleElement.textContent.trim();
                const halfLength = Math.ceil(text.length / 2);
                const firstHalf = text.slice(0, halfLength);
                const secondHalf = text.slice(halfLength);

                titleElement.innerHTML =
                    `<span class="overline decorate decoration-[#F8B500] decoration-[6px] overline-offset-4">${firstHalf}</span>${secondHalf}`;
            }

        decorateTitle("mission-title");
        decorateTitle("contact-us-title");
        decorateTitle("value-title");
        decorateTitle("works-title");
        decorateTitle("directors-title");
        decorateTitle("companies-title");
    });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const titleElement = document.getElementById("testimonials-title");
            const text = titleElement.textContent.trim();

            const halfLength = Math.ceil(text.length / 2);

            const firstHalf = text.slice(0, halfLength);
            const secondHalf = text.slice(halfLength);

            titleElement.innerHTML =
                `${firstHalf}<span class="overline decorate decoration-[#F8B500] decoration-[6px] overline-offset-4">${secondHalf}</span>`;
        });
    </script>
    <script>
        const swiperDirectors = new Swiper('.swiper-directors-container', {
            slidesPerView: 'auto',
            spaceBetween: 96,
        });


        const swiperClients = new Swiper('.swiper-clients-container', {
            slidesPerView: 'auto',
            spaceBetween: 40,
            breakpoints: {
                1024: {
                    spaceBetween: 100,
                },
                1540: {
                    spaceBetween: 128,
                },
            },
        })

        const swiperValues = new Swiper('.swiper-values-container', {
            slidesPerView: 'auto',
            spaceBetween: 40,
        })


        const swiperTestimonials = new Swiper('.swiper-testimonials-container', {
            slidesPerView: 1,
            spaceBetween: 40,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            centeredSlides: true,
        });

        const swiperCompanies = new Swiper('.swiper-companies-container', {
            slidesPerView: 'auto',
            spaceBetween: 72,
            grid: {
                rows: 1,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 'auto',
                    grid: {
                        rows: 2,
                        fill: 'rows'
                    },
                },
            },
        });
        const swiperWorks = new Swiper('.swiper-works-container', {
            slidesPerView: 'auto',
            spaceBetween: 20,
            grid: {
                rows: 1,
                fill: 'rows'
            },
            breakpoints: {
                500: {
                    spaceBetween: 40,
                    grid: {
                        rows: 2,
                        fill: 'rows'
                    }
                },
                1000: {
                    spaceBetween: 92,
                    grid: {
                        rows: 2,
                        fill: 'rows'
                    }
                },
            },
        });
    </script>
@endpush
