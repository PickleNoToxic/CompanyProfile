@extends('public.layouts.main')

@push('addon-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
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
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endpush

@section('container')
    <main class="relative overflow-clip">
        {{-- 1 --}}
        <section
            class="w-full h-[64rem] flex flex-col font-[600] justify-between text-3xl pb-64 px-[5%] pt-48 tracking-widest text-center font-poppins 
             bg-cover bg-center transform z-0"
            style="background-image: url('{{ asset('assets/images/banner.png') }}')">
            <h1 class="text-[#2E3191]">{{ $master_web->title }}</h1>
            <div class="text-center w-full rounded-xl bg-[#ffffffb5] py-4">
                <h1 class="text-lg tracking-normal">Our Clients:</h1>
                <div class="grid grid-cols-6 w-fit gap-x-16 mx-auto">
                    @for ($i = 0; $i < 6; $i++)
                        <img class="h-28 " src="{{ asset('assets/images/starGroupLogo.png') }}" alt="Star Group Logo">
                    @endfor
                </div>
            </div>
        </section>
        {{-- 2 --}}
        <section class="w-[120%] h-[45rem] -mt-32 pb-20 bg-white transform -rotate-6 -ms-8 relative z-10">
            <div
                class="relative flex flex-col lg:flex-row ms-9 space-y-12 lg:space-y-0 px-[5%] py-[2.5%] lg:px-[2.5%] w-screen h-full items-center transform rotate-6 overflow-clip ">
                <div class="flex items-center ">
                    <img class="h-56" src="{{ asset('assets/images/starGroupLogo.png') }}" alt="">
                </div>
                <div class="flex flex-[2] item-center ">
                    <p class="font-poppins text-center lg:text-start "> Is a company group that is ready to grow
                        to become the best in the world.
                        work closely with our team
                        which is a big family of Binar Group.</p>
                </div>
                <div class="flex flex-col flex-[5] lg:ms-20 text-center lg:text-start">
                    <h1 class="text-[#2E3191] capitalize font-[600] text-3xl mb-8"><span
                            class="overline decorat decoration-[#F8B500] decoration-[6px] overline-offset-4 ">our
                            com</span>panies</h1>
                    <div class="grid grid-cols-4  w-fit gap-y-2 gap-x-12  ">
                        @for ($i = 0; $i < 8; $i++)
                            <img class="h-40" src="{{ asset('assets/images/starGroupLogo.png') }}" alt="Star Group Logo">
                        @endfor
                    </div>

                </div>
            </div>
        </section>
        <div class="w-[120%] h-[20rem] bg-slate-200 transform rotate-6 relative -ms-12 mt-12 z-20"></div>

        {{-- 3 --}}
        {{-- gambar atas --}}
        <section
            class="w-[120%] h-[55rem] -ms-16 -mt-[20rem] -rotate-6 overflow-clip relative z-30 border-t-[0.8rem] border-[#F8B500]">
            <!-- Background Div -->
            <div class="absolute inset-0 -z-10 transform bg-[50%_13%] rotate-[10deg] 
                bg-cover bg-center before:content-[''] before:absolute before:inset-0 before:bg-[#00094b8a] before:rounded-md
                -mt-40"
                style="background-image: url('{{ asset('assets/images/bgSkyScrapper1.png') }}')">
            </div>

            <!-- Content -->
            <div class="relative w-full h-full transform rotate-3 overflow-visible flex items-center justify-center">
                <p class="text-white font-bold text-lg">Content on</p>
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
            class="w-[120%] -ms-16 h-[32rem] bg-white transform -mt-52 relative z-50 transform -rotate-6 border-b-[0.8rem] border-[#F8B500]">
            <div class="relative w-screen h-full rotate-6 pt-16 ms-[4rem] px-[2.5%] py-[5%]">
                <h1 id="directors-title" class="text-[#2E3191] font-[600] text-3xl text-center mb-8">
                    {{ $master_web->directors_title }}
                </h1>
                <div class="swiper-container mt-16">
                    <div class="swiper-wrapper">
                        @foreach ($directors as $director)
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
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        {{-- 5 --}}
        <section
            class="w-[120%] h-[60rem]  
            bg-cover transform rotate-6 -ms-16 -mt-40 bg-[50%_100%] 
            relative z-40 
            before:content-[''] before:absolute before:inset-0 before:bg-[#00094bb8] before:z-10 before:rounded-md"
            style="background-image: url('{{ asset('assets/images/bgSkyScrapper2.png') }}')">
            <div
                class="relative w-screen ms-16 ps-[10%] pe-[2.5%] pb-[2.5%] pt-[10%]  h-full transform -rotate-6 overflow-visible flex flex-col justify-end z-20">
                <div class="flex h-fit justify-end text-end w-full">
                    <div class="flex flex-col w-1/3">
                        <h1 class="text-white capitalize font-[600] text-3xl mb-8">
                            testim<span
                                class="overline decorat decoration-[#F8B500] decoration-[6px] overline-offset-4">onial</span>
                        </h1>
                        <p class="font-poppins text-white">
                            A concrete evidence of the satisfaction and trust held by our clients towards
                            our products or services.
                        </p>
                    </div>
                </div>
                <div class="relative flex-grow flex items-center swiper-testimonials-container">
                    <div class="swiper-wrapper ">
                        <div class="swiper-slide flex items-center">
                            <div class="relative w-64 h-64">
                                <div class="absolute -top-12 -left-10 w-40 h-40 bg-[#FFFFFFcb] rounded-full shadow-lg">
                                </div>
                                <div class="absolute z-20 top-36 left-32 w-16 h-16 bg-[#f8b600cb] rounded-full shadow-md">
                                </div>
                                <div class="relative z-10 w-48 h-48 bg-white rounded-full overflow-hidden shadow-xl">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnG9XsiAuW2P1NkrMyXF-qAnh2to04EpRvIg&s"
                                        alt="Profile" class="w-full h-full object-cover" />
                                </div>
                            </div>
                            <div class="flex flex-col text-white">
                                <p class="text-[#F8B500] font-poppins font-bold">Rachmadi Joesoef</p>
                                <p class="font-poppins">Owner PT. Konimex</p>
                                <p class="font-poppins w-3/5">Suatu bentuk pelatihan yang sangat berbeda dengan pelatihan
                                    yang kami jalani sebelumnya. Sangat nyata dengan konsep EXPERIENTIAL LEARNING.</p>
                            </div>
                        </div>
                        <div class="swiper-slide flex items-center">
                            <div class="relative w-64 h-64">
                                <div class="absolute -top-12 -left-10 w-40 h-40 bg-[#f8b600cb] rounded-full shadow-lg">
                                </div>
                                <div class="absolute z-20 top-36 left-32 w-16 h-16 bg-[#f8b600cb] rounded-full shadow-md">
                                </div>
                                <div class="relative z-10 w-48 h-48 bg-white rounded-full overflow-hidden shadow-xl">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnG9XsiAuW2P1NkrMyXF-qAnh2to04EpRvIg&s"
                                        alt="Profile" class="w-full h-full object-cover" />
                                </div>
                            </div>
                            <div class="flex flex-col text-white">
                                <p class="text-[#F8B500] font-poppins font-bold">Rachmadi Joesoef</p>
                                <p class="font-poppins">Owner PT. Konimex</p>
                                <p class="font-poppins w-3/5">Suatu bentuk pelatihan yang sangat berbeda dengan pelatihan
                                    yang kami jalani sebelumnya. Sangat nyata dengan konsep EXPERIENTIAL LEARNING.</p>
                            </div>
                        </div>
                        <div class="swiper-slide flex items-center">
                            <div class="relative w-64 h-64">
                                <div class="absolute -top-12 -left-10 w-40 h-40 bg-[#f8b600cb] rounded-full shadow-lg">
                                </div>
                                <div class="absolute z-20 top-36 left-32 w-16 h-16 bg-[#f8b600cb] rounded-full shadow-md">
                                </div>
                                <div class="relative z-10 w-48 h-48 bg-white rounded-full overflow-hidden shadow-xl">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnG9XsiAuW2P1NkrMyXF-qAnh2to04EpRvIg&s"
                                        alt="Profile" class="w-full h-full object-cover" />
                                </div>
                            </div>
                            <div class="flex flex-col text-white">
                                <p class="text-[#F8B500] font-poppins font-bold">Rachmadi Joesoef</p>
                                <p class="font-poppins">Owner PT. Konimex</p>
                                <p class="font-poppins w-3/5">Suatu bentuk pelatihan yang sangat berbeda dengan pelatihan
                                    yang kami jalani sebelumnya. Sangat nyata dengan konsep EXPERIENTIAL LEARNING.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>


            </div>
        </section>

        <div class="w-[120%] h-44 bg-slate-200 transform -rotate-6 relative -mt-[12.5rem] -ms-12  z-20">
        </div>

        {{-- 6 --}}
        <section class="w-[120%] h-[50rem] -ms-16 transform -rotate-6 relative z-50">
            <div
                class="relative w-screen h-full rotate-6 pt-16 ms-[4rem] px-[10%] py-[5%] flex flex-col mx-auto justify-center items-center">
                <h1 id="contact-us-title" class="text-[#2E3191] font-[600] text-3xl text-center mb-8">
                    {{ $master_web->contact_us_title }}
                </h1>

                <div class="flex flex-col lg:flex-row">
                    <div class="relative h-full transform overflow-visible flex-1 py-24 me-24 ">
                        <div class="mb-4 flex">
                            <a class="flex-shrink-0 w-8"
                                href="https://www.google.com/maps?q={{ urlencode($contact->address) }}" target="_blank"
                                rel="noopener noreferrer">
                                <img class="w-full" src="{{ asset('assets/images/contact_us_location.png') }}">
                            </a>
                            <p class="ml-8 ">{{ $contact->address }}</p>
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
                            <p class="ml-8">{{ $formatted_contact_phone }}</p>
                        </div>
                    </div>
                    <div class="flex-2 w-full lg:w-[40vw] h-[400px] lg:h-auto overflow-hidden rounded-3xl">
                        @if ($contact->map)
                            <iframe class="w-full h-full" src="{{ $contact->map }}" width="100%" height="100%"
                                style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
        <div class="w-[120%] h-[16rem] bg-slate-200 transform -rotate-6 relative -mb-[9.5rem] -mt-[4.5rem] -ms-12  z-20">
        </div>

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

            titleElement.innerHTML =
                `
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

            titleElement.innerHTML =
                `
                <span class="overline decorate decoration-[#F8B500] decoration-[6px] overline-offset-4">${firstHalf}</span>${secondHalf}`;
        });
    </script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 48,
        });
        const swiperTestimonials = new Swiper('.swiper-testimonials-container', {
            slidesPerView: 1,
            spaceBetween: 90,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
        });
    </script>
@endpush
