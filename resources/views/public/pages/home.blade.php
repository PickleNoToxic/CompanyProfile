@extends('public.layouts.main')

@push('addon-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        p.text-white * {
            color: white !important;
        }

        .swiper-slide {
            width: auto; 
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endpush

@section('container')
    <main class="w-screen relative overflow-clip ">
        {{-- 1 --}}
        <section
            class="flex flex-col font-[600] text-3xl pt-48 tracking-widest text-center font-poppins text-[#2E3191] w-full h-[64rem] 
             bg-cover bg-center transform  z-0"
            style="background-image: url('{{ asset('assets/images/banner.png') }}')">
            <h1 class="mx-72 leading-relaxed">{{ $master_web->title }}</h1>
        </section>
        {{-- 2 --}}
        <section class="w-[120%] h-[32rem] -mt-48 bg-white transform -rotate-6 -ms-8 relative z-10">
            <div class="relative flex justify-between w-full h-full transform rotate-6 overflow-visible flex py-28 ps-16 pe-64">
                <div class="bg-slate-300 flex flex-[4] items-center h-full">
                    <img class="h-full" src="{{ asset('assets/images/starGroupLogo.png') }}" alt="">
                    <p class="font-poppins "> Is a company group that is ready to grow
                        to become the best in the world.
                        work closely with our team
                        which is a big family of Binar Group.</p>
                </div>
                <div class="flex flex-col flex-[5] -mb-8 -mt-16 bg-slate-300">
                    <h1 class="text-[#2E3191] capitalize font-[600] text-3xl"><span
                            class="overline decorat decoration-[#F8B500] decoration-[6px] overline-offset-4">our
                            com</span>panies</h1>
                    <div class="grid grid-cols-4 mt-8 w-fit gap-4  ">
                        @for ($i = 0; $i < 8; $i++)
                            <img class="h-32" src="{{ asset('assets/images/starGroupLogo.png') }}" alt="Star Group Logo">
                        @endfor
                    </div>

                </div>
            </div>
        </section>
        <div class="w-[120%] h-[20rem] bg-slate-200 transform rotate-6 relative -ms-12  z-20"></div>


        {{-- 3 --}}
        {{-- gambar atas --}}
        <section
            class="w-[120%] h-[55rem] -ms-16 -mt-[20rem] -rotate-6 overflow-clip relative z-30 border-t-[0.8rem] border-[#F8B500]">

            <!-- Background Div -->
            <div class="absolute inset-0 -z-10 transform bg-[50%_13%] rotate-[10deg] 
                bg-cover bg-center before:content-[''] before:absolute before:inset-0 before:bg-[#00094b8a] before:rounded-md
                -mt-40"
                style="background-image: url('{{ asset('assets/images/bgSkyScrapper1.png') }}')">

                >
            </div>

            <!-- Content -->
            <div class="relative w-full h-full transform rotate-3 overflow-visible flex items-center justify-center">
                <p class="text-white font-bold text-lg">Content on Green</p>
            </div>
        </section>
        {{-- gambar bawah --}}
        <section
            class="w-[120%] h-[55rem] -mt-[30rem]
            bg-cover bg-[50%_100%] transform rotate-6 -ms-16 relative z-40
            before:content-[''] before:absolute before:inset-0 before:bg-[#00094bb8] before:z-10 before:rounded-md
            "
            style="background-image: url('{{ asset('assets/images/bgSkyScrapper1.png') }}')">
            <div class="relative w-full h-full transform rotate-3 overflow-visible flex items-center justify-center z-20">
                <p class="text-white font-bold text-lg">Content on Green</p>
            </div>
        </section>
        {{-- 4 --}}
        <section
            class="w-[140%] -ms-16 h-[28rem] bg-white transform -mt-52 relative z-50 transform -rotate-6 border-b-[0.8rem] border-[#F8B500]">
            <div class="rotate-6 pt-16 ms-17">
                <h1 id="directors-title" class="text-[#2E3191] font-[600] text-3xl text-center mb-8">
                    {{ $master_web->directors_title}}
                </h1>
                <div class="swiper-container mt-16">
                    <div class="swiper-wrapper">
                        @foreach ($directors as $director)
                            <div class="swiper-slide flex-shrink-0">
                                <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]" src="{{ asset('storage/' . $director->photo) }}" alt="">
                                <p class="mt-4 text-center">{{ $director->name }}</p>
                            </div>
                            <div class="swiper-slide flex-shrink-0">
                                <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]" src="{{ asset('storage/' . $director->photo) }}" alt="">
                                <p class="mt-4 text-center">{{ $director->name }}</p>
                            </div>
                            <div class="swiper-slide flex-shrink-0">
                                <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]" src="{{ asset('storage/' . $director->photo) }}" alt="">
                                <p class="mt-4 text-center">{{ $director->name }}</p>
                            </div>
                            <div class="swiper-slide flex-shrink-0">
                                <img class="w-40 h-40 rounded-full shadow-[-6px_0px_0px_#F8B500]" src="{{ asset('storage/' . $director->photo) }}" alt="">
                                <p class="mt-4 text-center">{{ $director->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        {{-- 5 --}}
        <section
            class="w-[120%] h-[40rem]  
                    bg-cover transform rotate-6 -ms-16  -mt-40 bg-[50%_100%] scale-x-[-1]
                    relative z-40 
                    before:content-[''] before:absolute before:inset-0 before:bg-[#00094bb8] before:z-10 before:rounded-md"
            style="background-image: url('{{ asset('assets/images/bgSkyScrapper2.png') }}')">

            <div class="relative w-full h-full transform -rotate-6 overflow-visible flex p-32 ">
                <p class="font-bold text-lg">Content on Orange</p>
            </div>
        </section>
        <div class="w-[120%] h-44 bg-slate-200 transform -rotate-6 relative -mt-52 -ms-12  z-20"></div>

        {{-- 6 --}}
        <section class="w-[120%] h-fit bg-white -ms-16 transform -rotate-6 relative z-30">
            <div class="rotate-6 mt-20">
                <h1 id="contact-us-title" class="text-[#2E3191] font-[600] text-3xl text-center px-[20%] mb-8">
                    {{ $master_web->contact_us_title }}
                </h1>
                <div class="flex flex-col lg:flex-row">
                    <div class="relative w-full h-full transform overflow-visible flex-1 p-32">
                        <div class="mb-4 flex">
                            <a href="https://www.google.com/maps?q={{ urlencode($contact->address) }}" target="_blank" rel="noopener noreferrer">
                                <img class="w-8" src="{{ asset('assets/images/contact_us_location.png') }}">
                            </a>
                            <p class="ml-8">{{ $contact->address }}</p>
                        </div>
                        <div class="mb-4 flex items-center">
                            <a href="mailto:{{ $contact->email }}">
                                <img class="w-8" src="{{ asset('assets/images/contact_us_gmail.png') }}">
                            </a>
                            <p class="ml-8">{{ $contact->email }}</p>
                        </div>
                        <div class="mb-4 flex items-center">
                            <a href="https://wa.me/62{{ $contact->phone }}">
                                <img class="w-8" src="{{ asset('assets/images/contact_us_wa.png') }}">
                            </a>
                            <p class="ml-8">{{ $formatted_contact_phone }}</p>
                        </div>
                    </div>
                    <div class="flex-1 w-full lg:w-[40vw] h-[400px] lg:h-auto bg-grayPrimary overflow-hidden rounded-3xl">
                        @if ($contact->map)
                            <iframe
                                class="w-full h-full"
                                src="{{ $contact->map }}"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        @endif
                    </div>
                </div>
                <div class="items-center flex justify-center mt-16">
                    <p>Follow Us: </p>
                    @foreach ($sosial_medias as $data)
                        <a href="{{ $data->url }}" target="_blank" rel="noopener noreferrer">
                            <img class="w-8 ml-4" src="{{ asset('storage/' . $data->photo) }}">
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="w-[120%] h-[16rem] bg-slate-200 transform -rotate-6 relative -mb-20 -mt-[4.5rem] -ms-12  z-20"></div>

    </main>
@endsection
@push('addon-script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const titleElement = document.getElementById("contact-us-title");
            const text = titleElement.textContent.trim();

            const halfLength = Math.ceil(text.length / 2);

            const firstHalf = text.slice(0, halfLength);
            console.log(firstHalf);
            const secondHalf = text.slice(halfLength);
            console.log(secondHalf);

            titleElement.innerHTML = `
                <span class="overline decorate decoration-[#F8B500] decoration-[6px] overline-offset-4">${firstHalf}</span>${secondHalf}`;
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const titleElement = document.getElementById("directors-title");
            const text = titleElement.textContent.trim();

            const halfLength = Math.ceil(text.length / 2);

            const firstHalf = text.slice(0, halfLength);
            console.log(firstHalf);
            const secondHalf = text.slice(halfLength);
            console.log(secondHalf);

            titleElement.innerHTML = `
                <span class="overline decorate decoration-[#F8B500] decoration-[6px] overline-offset-4">${firstHalf}</span>${secondHalf}`;
        });
    </script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 48,  
        });
    </script>
@endpush
