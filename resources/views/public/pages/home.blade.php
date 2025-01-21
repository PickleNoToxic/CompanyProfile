@extends('public.layouts.main')

@push('addon-style')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        ul {
            list-style: disc;
            padding-left: 1.5rem; 
        }

        li {
            margin-bottom: 1rem; 
        }


        .swiper-slide {
            width: auto;
        }

        .swiper-companies-wrapper {
            display: grid;
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
        {{-- 1 --}}
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
            <div class="rotate-6 flex lg:flex-row flex-col  ms-8 p-8  w-screen h-full items-center justify-center lg:space-y-0 space-y-12 space-x-0 lg:space-x-12">
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
                        <div class="swiper-wrapper swiper-compnaies-wrapper">
                            @foreach ($companies as $company)
                                <div
                                    class="swiper-slide swiper-companies-slide h-28 w-28 flex items-center object-contain flex-shrink-0">
                                    <img class="" src="{{ asset('storage/' . $company->photo) }}">
                                </div>
                                <div
                                    class="swiper-slide swiper-companies-slide h-28 w-28 flex items-center object-contain flex-shrink-0">
                                    <img class="" src="{{ asset('storage/' . $company->photo) }}">
                                </div>
                                <div
                                    class="swiper-slide swiper-companies-slide h-28 w-28 flex items-center object-contain flex-shrink-0">
                                    <img class="" src="{{ asset('storage/' . $company->photo) }}">
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
            class="w-[140%] h-[75rem] -ms-20 -mt-[20rem] md:-mt-[21rem] lg:-mt-[22rem] xl:-mt-[23.5rem]  -rotate-6 overflow-clip relative z-30">
            <!-- Background Div -->
            <div class="absolute inset-0 -z-10 transform bg-[50%_13%]
                bg-cover bg-center before:content-[''] before:absolute before:inset-0 before:bg-[#00094bb8] before:rounded-md
                -mt-40"
                style="background-image: url('{{ asset('storage/' . $master_web->vision_mission_background) }}')">
            </div>

            <!-- Content -->
            <div class="relative w-screen h-full ms-20 px-8 py-12 md:py-24 transform rotate-6 overflow-visible flex flex-col items-start">
                <h1 class="text-[#F8B500] font-[600] tracking-widest text-xl md:text-3xl md:px-32 lg:px-64 text-center leading-relaxed">
                    {{ $master_web->vision_mission_title }}
                </h1>
                <div class="flex flex-col md:flex-row w-full py-8 md:py-32 items-center md:items-start justify-between space-y-8 md:space-y-0 md:space-x-8">
                    <div class="w-full md:w-[50%] flex justify-center">
                        <img src="{{ asset('storage/' . $master_web->mission_photo) }}" class="rounded-lg">
                    </div>
                    <div class="w-full md:w-[50%] flex flex-col justify-center md:justify-start">
                        <h1 id="mission-title" class="text-white font-[600] text-3xl text-start">
                            {{ $master_web->mission_title }}
                        </h1>
                        <div class="pt-8 md:pt-16">
                            <div id="mission-description" class="max-w-128 font-poppins text-white text-start">{!! $master_web->mission_description !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div
            class="w-[140%] h-[16rem] bg-slate-200 transform rotate-6 relative -mt-[15.8rem] md:-mt-[14rem] lg:-mt-[14rem] xl:-mt-[12rem] -ms-12  z-20">
        </div>

        {{-- 4 --}}
        <section
            class="w-[140%] h-[52rem] md:h-[70rem] lg:h-[50rem] xl:h-[65rem] -ms-16 transform -rotate-6 relative z-50 lg:-mt-0">
            <div class="relative w-screen h-full rotate-6 ms-[4rem] px-8 py-28 flex flex-col mx-auto justify-center items-center mt-0">
                <h1 id="contact-us-title" class=" text-[#2E3191] font-[600] text-3xl text-center mb-8">
                    {{ $master_web->contact_us_title }}
                </h1>
                <div class="flex flex-col  6 lg:flex-row w-full ">
                    <div class=" transform overflow-visible lg:flex-1  pt-8 lg:py-24 lg:me-24 order-2 lg:order-1">
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
                <div class="flex  items-center justify-center mt-16">
                    <p class="whitespace-nowrap">Follow Us: </p>
                </div>
        </section>
        {{-- bar3 --}}
        <div
            class="w-[140%] h-[16rem] bg-slate-200 transform -rotate-6 relative  md:-mb-[12.5rem] lg:-mb-[11.5rem] xl:-mb-[9.5rem] -mt-[4.5rem] -ms-12  z-20">
        </div>

        {{-- 5 --}}
        {{-- gambar atas --}}
        <section class="w-[140%] h-[55rem] -ms-16 -mt-[20rem] md:-mt-[21rem] lg:-mt-[22rem] xl:-mt-[23.5rem]  -rotate-6 overflow-clip relative z-30 border-t-[0.8rem] border-[#F8B500]">
            <!-- Background Div -->
            <div class="absolute inset-0 -z-10 transform bg-[50%_13%] rotate-[10deg] 
                bg-cover bg-center before:content-[''] before:absolute before:inset-0 before:bg-[#00094b8a] before:rounded-md
                -mt-40"
                style="background-image: url('{{ asset('storage/' . $master_web->vision_mission_background) }}')">
            </div>

            <!-- Content -->
            <div class="relative w-full h-full transform rotate-3 overflow-visible flex items-center justify-center">
                <p class="text-white font-bold text-lg">Content on</p>
            </div>
        </section>
        {{-- gambar bawah --}}
        <section class="w-[140%] h-[55rem] -mt-[30rem]
            bg-cover bg-[50%_100%] transform rotate-6 -ms-16 relative z-40
            before:content-[''] before:absolute before:inset-0 before:bg-[#00094bb8] before:z-10 before:rounded-md
            "
            style="background-image: url('{{ asset('storage/' . $master_web->vision_mission_background) }}')">
            <div class="relative w-full h-full transform rotate-3 overflow-visible flex items-center justify-center z-20">
                <p class="text-white font-bold text-lg">Content on Green</p>
            </div>
        </section>

        {{-- 6 OK --}}
        <section class="w-[140%] -ms-16 h-[28rem] bg-white transform -mt-72 relative z-50 transform -rotate-6 border-b-[0.8rem] border-[#F8B500]">
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
                            {{-- <div class="swiper-slide flex-shrink-0">
                            <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]"
                                src="{{ asset('storage/' . $director->photo) }}" alt="">
                            <p class="mt-4 text-center">{{ $director->name }}</p>
                        </div>
                        <div class="swiper-slide flex-shrink-0">
                            <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]"
                                src="{{ asset('storage/' . $director->photo) }}" alt="">
                            <p class="mt-4 text-center">{{ $director->name }}</p>
                        </div>
                        <div class="swiper-slide flex-shrink-0">
                            <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]"
                                src="{{ asset('storage/' . $director->photo) }}" alt="">
                            <p class="mt-4 text-center">{{ $director->name }}</p>
                        </div>
                                                <div class="swiper-slide flex-shrink-0">
                            <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]"
                                src="{{ asset('storage/' . $director->photo) }}" alt="">
                            <p class="mt-4 text-center">{{ $director->name }}</p>
                        </div>
                                                <div class="swiper-slide flex-shrink-0">
                            <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]"
                                src="{{ asset('storage/' . $director->photo) }}" alt="">
                            <p class="mt-4 text-center">{{ $director->name }}</p>
                        </div>
                                                <div class="swiper-slide flex-shrink-0">
                            <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]"
                                src="{{ asset('storage/' . $director->photo) }}" alt="">
                            <p class="mt-4 text-center">{{ $director->name }}</p>
                        </div>
                                                <div class="swiper-slide flex-shrink-0">
                            <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]"
                                src="{{ asset('storage/' . $director->photo) }}" alt="">
                            <p class="mt-4 text-center">{{ $director->name }}</p>
                        </div>
                                                <div class="swiper-slide flex-shrink-0">
                            <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]"
                                src="{{ asset('storage/' . $director->photo) }}" alt="">
                            <p class="mt-4 text-center">{{ $director->name }}</p>
                        </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- 7 --}}
        <section
            class="w-[140%] h-[50rem]  
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
                            class="font-poppins max-w-60 md:max-w-96 text-white text-xs  lg:text-base "></p>
                    </div>
                </div>
                <div
                    class="relative flex flex-grow items-center justify-center align-items-center swiper-testimonials-container">
                    <div class="swiper-wrapper w-fit flex justify-center">
                        {{-- @for ($i = 0; $i < 7; $i++) --}}
                        @foreach ($testimonials as $testimonial)
                            <div
                                class="swiper-slide flex justify-center lg:justify-start lg:ps-[20%] items-center text-xs  lg:text-base">
                                <div class="relative">
                                    <div
                                        class="absolute -top-4 lg:-top-12 -left-3 lg:-left-10 w-20 lg:w-40 h-20 lg:h-40 bg-[#f8b600cb] rounded-full shadow-lg">
                                    </div>
                                    <div
                                        class="absolute z-20 top-[7.5rem] lg:top-36 left-24 lg:left-32 w-8 lg:w-16 h-8 lg:h-16 bg-[#f8b600cb] rounded-full shadow-md">
                                    </div>
                                    <div
                                        class="relative z-10 w-36 lg:w-48 h-36 lg:h-48 bg-white rounded-full overflow-hidden shadow-xl">
                                        <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="Profile"
                                            class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="flex max-w-[28rem] flex-col text-white w-full ms-6 ">
                                    <p class="text-[#F8B500] font-poppins font-bold">{{ $testimonial->name }}</p>
                                    <p class="font-poppins">{{ $testimonial->company }}</p>
                                    <p class="testimonial-description mt-4 w-full">
                                        {!! $testimonial->description !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        {{-- @endfor --}}
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <div
            class="w-[140%] h-64 bg-slate-200 transform -rotate-6 relative -mt-[15.7rem] md:-mt-[17rem] lg:-mt-[18rem] xl:-mt-[20rem] -ms-12  z-20">
        </div>

        {{-- 8 --}}
        <section
            class="w-[140%] h-[52rem] md:h-[70rem] lg:h-[50rem] xl:h-[65rem] -ms-16 transform -rotate-6 relative z-50 -mt-16 lg:-mt-0">
            <div
                class="relative w-screen h-full rotate-6 ms-[4rem] px-8 py-28 flex flex-col mx-auto justify-center items-center mt-0">
                <h1 id="contact-us-title" class=" text-[#2E3191] font-[600] text-3xl text-center mb-8">
                    {{ $master_web->contact_us_title }}
                </h1>
                <div class="flex flex-col  6 lg:flex-row w-full ">
                    <div class=" transform overflow-visible lg:flex-1  pt-8 lg:py-24 lg:me-24 order-2 lg:order-1">
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
                <div class="flex  items-center justify-center mt-16">
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
        {{-- bar3 --}}
        <div
            class="w-[140%] h-[16rem] bg-slate-200 transform -rotate-6 relative -mb-[14.5rem] md:-mb-[12.5rem] lg:-mb-[11.5rem] xl:-mb-[9.5rem] -mt-[4.5rem] -ms-12  z-20">
        </div>

    </main>
@endsection
@push('addon-script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const description = document.getElementById("description");
            const descriptionContent = @json($master_web->description);
            description.innerHTML = descriptionContent;

            // const missionDescription = document.getElementById("mission-description");
            // const missionDescriptionContent = @json($master_web->mission_description);
            // missionDescription.innerHTML = missionDescriptionContent;

            const testimonialsDescription = document.getElementById("testimonials-description");
            const testimonialsDescriptionContent = @json($master_web->testimonials_description);
            testimonialsDescription.innerHTML = testimonialsDescriptionContent
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const titleElement = document.getElementById("mission-title");
            const text = titleElement.textContent.trim();

            const halfLength = Math.ceil(text.length / 2);

            const firstHalf = text.slice(0, halfLength);
            const secondHalf = text.slice(halfLength);

            titleElement.innerHTML =
                `<span class="overline decorate decoration-[#F8B500] decoration-[6px] overline-offset-4">${firstHalf}</span>${secondHalf}`;
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const titleElement = document.getElementById("contact-us-title");
            const text = titleElement.textContent.trim();

            const halfLength = Math.ceil(text.length / 2);

            const firstHalf = text.slice(0, halfLength);
            const secondHalf = text.slice(halfLength);

            titleElement.innerHTML =
                `<span class="overline decorate decoration-[#F8B500] decoration-[6px] overline-offset-4">${firstHalf}</span>${secondHalf}`;
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
        document.addEventListener("DOMContentLoaded", () => {
            const titleElement = document.getElementById("directors-title");
            const text = titleElement.textContent.trim();

            const halfLength = Math.ceil(text.length / 2);

            const firstHalf = text.slice(0, halfLength);
            const secondHalf = text.slice(halfLength);

            titleElement.innerHTML =
                `<span class="overline decorate decoration-[#F8B500] decoration-[6px] overline-offset-4">${firstHalf}</span>${secondHalf}`;
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const titleElement = document.getElementById("companies-title");
            const text = titleElement.textContent.trim();

            const halfLength = Math.ceil(text.length / 2);

            const firstHalf = text.slice(0, halfLength);
            const secondHalf = text.slice(halfLength);

            titleElement.innerHTML =
                `<span class="overline decorate decoration-[#F8B500] decoration-[6px] overline-offset-4">${firstHalf}</span>${secondHalf}`;
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



        const swiperTestimonials = new Swiper('.swiper-testimonials-container', {
            slidesPerView: 1,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },

        });

        const swiperCompanies = new Swiper('.swiper-companies-container', {
            slidesPerView: 'auto',
            spaceBetween: 48,
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
    </script>
@endpush
