@extends('public.layouts.main')

@push('addon-style')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <style>
        p.text-white * {
            color: white !important;
        }
    </style>
@endpush

@section('container')
    <!-- modal video -->
    <div id="modal-video" class="hidden w-screen h-screen bg-black/95 fixed top-0 left-0 z-50 font-poppins flex justify-center text-white" data-src="https://www.youtube.com/embed/{{ $data->about_video }}?autoplay=1">
        <div class="w-full max-h-[100vh] overflow-y-scroll flex flex-col justify-start items-center py-10 relative" style="-ms-overflow-style: none; scrollbar-width: none;">
            <div onclick="toggleModalVideo()" class="bg-white text-black/90 w-10 h-10 rounded-full fixed right-5 top-5 flex justify-center items-center p-1 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <h1 class="mt-10 md:mt-3 font-poppins font-semibold text-white text-3xl capitalize tracking-wider">Transformer Center</h1>
            <div class="mt-20 w-11/12 lg:w-1/2 h-[300px] md:h-[500px] bg-gray-300 rounded-lg">
                <iframe
                    id="frame-video"
                    class='w-full h-full rounded-lg'
                    title="YouTube video player"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                    allowFullScreen
                >
                </iframe>
            </div>
        </div>
    </div>
    <!-- modal image -->
    <div id="modal-image" class="hidden w-screen h-screen bg-black/95 fixed top-0 left-0 z-50 font-poppins flex justify-center text-white">
        <div class="w-full max-h-[100vh] overflow-y-scroll flex flex-col justify-start items-center py-10 relative" style="-ms-overflow-style: none; scrollbar-width: none;">
            <div onclick="toggleModalImage()" class="bg-white text-black/90 w-10 h-10 rounded-full fixed right-5 top-5 flex justify-center items-center p-1 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <h1 class="mt-10 md:mt-3 font-poppins font-semibold text-white text-xl md:text-3xl capitalize tracking-wider text-center" id="title-image">Transformer Center</h1>
            <div class="mt-20 w-auto h-[300px] lg:h-[500px] bg-gray-300 rounded-lg">
                <img id="modal-image-content" src="" alt="detail" loading="lazy" class="w-full h-full object-cover rounded-lg">
            </div>
        </div>
    </div>
    @include('public.includes.hero')
    <main class="w-screen flex flex-col">
        <div class="relative w-[119.06px] h-[102.54px]">
            <div class="absolute inset-0 flex justify-center items-center">
                <div class="relative">
                    <div class="absolute w-[50px] h-[50px] bg-gray-300 opacity-60 transform rotate-45 rounded-2xl"></div>
                    <div class="absolute w-[60px] h-[60px] bg-gray-300 opacity-80 transform rotate-45 translate-x-[20px] rounded-2xl"></div>
                </div>
            </div>
        </div>

        <section class="py-5 w-full flex justify-center items-center">
            <div class="w-11/12 lg:w-8/12 px-7 lg:px-12 py-11 flex flex-col-reverse lg:flex-row gap-10 lg:gap-3 rounded-[30px] shadow-xl">
                <!-- image -->
                <div class="w-full lg:w-[329px] h-full lg:h-[329px] lg:flex-initial relative">
                    <div onclick="toggleModalVideo()" class="cursor-pointer bg-gray-400 w-full lg:w-[329px] h-auto lg:h-[329px] border-4 lg:border-8 border-white rounded-[20px] md:rounded-[35px] transform rotate-0 lg:rotate-45 translate-x-0 lg:translate-x-[-150px] shadow-xl overflow-hidden relative">
                        <div class="h-full lg:h-[450px] w-full lg:w-[450px] transform lg:-rotate-45 lg:translate-y-[-70px] lg:translate-x-[-60px] z-10">
                            <img src="{{ asset('storage/' . $data->about_thumbnail) }}" alt="thumbnail" loading="lazy" class="object-cover w-full h-full">
                        </div>
                        <img src="/assets/images/Play.png" alt="" class="object-cover absolute m-auto inset-0 top-0 md:-top-20 left-0 md:left-20 md:translate-y-[40px] md:translate-x-[-40px] transform lg:-rotate-45 w-14 h-14 z-20">
                    </div>
                </div>

                <!-- about -->
                <div class="flex-1 flex flex-col" style="text-align: justify; text-justify: inter-word;">
                    <h2 class="font-inter font-bold text-2xl mb-5">{{ $data->about_title }}</h2>
                    <p class="font-inter font-normal text-base text-justify mb-3">
                        {!! $data->about_description !!}
                    </p>
                    {{-- <button class="mt-10 font-light font-inter text-white text-base self-center md:self-end px-5 py-1.5 bg-gradient-primary w-fit rounded-xl">Read More</button> --}}
                </div>
            </div>
        </section>

        <div class="relative w-[119.06px] h-[102.54px] self-end mr-0 md:mr-10">
            <div class="absolute inset-0 md:flex justify-center items-center">
                <div class="relative">
                    <div class="absolute w-[50px] h-[50px] bg-gray-300 opacity-60 transform rotate-45 translate-x-[-20px] rounded-2xl"></div>
                    <div class="absolute w-[60px] h-[60px] bg-gray-300 opacity-80 transform rotate-45 translate-x-[-50px] rounded-2xl"></div>
                </div>
            </div>
        </div>

        <section class="mt-20 lg:mt-0 py-5 w-full flex flex-col gap-5 md:gap-20 justify-center items-center md:mb-20">
            <div class="flex flex-row justify-center items-center gap-1 md:gap-3 w-11/12 lg:w-3/5">
                <div class="w-4 md:w-6 h-4 md:h-6 bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-80 transform rotate-45 rounded-sm md:rounded"></div>
                <h1 class="font-extrabold tracking-wider text-gradient-primary text-2xl md:text-4xl lg:text-5xl text-center w-11/12">
                    {{ $data->value_title }}
                </h1>
                <div class="w-4 md:w-6 h-4 md:h-6 bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-80 transform rotate-45 rounded-sm md:rounded"></div>
            </div>
            <div class="w-11/12 flex flex-col-reverse lg:flex-row justify-between gap-20 lg:gap-0">
                <div class="flex flex-col font-inter text-base px-3 lg:px-5 w-full lg:w-[50%]">
                    {!! $data->value_description !!}
                </div>
                <div class="relative flex flex-row flex-wrap justify-center lg:justify-start gap-20 w-full lg:w-[45%]">
                    <div class="relative w-[119.06px] h-[102.54px] self-end">
                        <div class="absolute inset-0 flex justify-center items-center">
                            <div class="relative">
                                <div class="absolute w-[130px] lg:w-[165px] h-[130px] lg:h-[165px] bg-gray-300 opacity-30 transform rotate-45 translate-x-[-60px] lg:translate-x-[-170px] translate-y-[10px] md:translate-y-[-50px] lg:translate-y-[40px] rounded-[20px] lg:rounded-[35px]"></div>
                                <div class="absolute w-[120px] lg:w-[246px] h-[120px] lg:h-[246px] bg-gray-300 transform rotate-45 translate-y-0 md:-translate-y-14 lg:translate-y-0 translate-x-[-50px] lg:translate-x-[-130px] rounded-[20px] lg:rounded-[35px] border-4 border-white overflow-hidden">
                                    <div onclick="showModalImage('Valuable Edutainment Park', '{{ asset('storage/' . $data->value_photo1) }}')" class="h-[170px] lg:h-[350px] w-[170px] lg:w-[350px] transform -rotate-45 translate-y-[-30px] lg:translate-y-[-50px] translate-x-[-30px] lg:translate-x-[-50px]">
                                        <img src="{{ asset('storage/' . $data->value_photo1) }}" alt="value1" class="object-cover w-full h-full" loading="lazy">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative w-[119.06px] h-[102.54px]">
                        <div class="absolute inset-0 flex justify-center items-center">
                            <div class="relative">
                                <div class="absolute w-[130px] lg:w-[165px] h-[130px] lg:h-[165px] bg-gray-300 opacity-60 transform rotate-45 translate-x-[-75px] lg:translate-x-[-10px] translate-y-[0px] md:translate-y-[-50px] lg:translate-y-[40px] rounded-[20px] lg:rounded-[35px]"></div>
                                <div class="absolute w-[120px] lg:w-[246px] h-[120px] lg:h-[246px] bg-gray-300 transform rotate-45 translate-y-0 md:-translate-y-14 lg:translate-y-0 translate-x-[-70px] lg:translate-x-[-130px] rounded-[20px] lg:rounded-[35px] border-4 border-white overflow-hidden">
                                    <div onclick="showModalImage('Valuable Edutainment Park', '{{ asset('storage/' . $data->value_photo2) }}')" class="h-[170px] lg:h-[350px] w-[170px] lg:w-[350px] transform -rotate-45 translate-y-[-30px] lg:translate-y-[-50px] translate-x-[-30px] lg:translate-x-[-50px]">
                                        <img src="{{ asset('storage/' . $data->value_photo2) }}" alt="value2" class="object-cover w-full h-full" loading="lazy">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative w-[119.06px] h-[102.54px] self-end">
                        <div class="absolute inset-0 flex justify-center items-center">
                            <div class="relative">
                                <div class="absolute w-[130px] lg:w-[165px] h-[130px] lg:h-[165px] bg-gray-300 opacity-60 transform rotate-45 translate-x-[-60px] md:translate-x-[-90px] lg:translate-x-[-90px] translate-y-[-50px] md:translate-y-[-60px] lg:translate-y-[120px] rounded-[20px] lg:rounded-[35px]"></div>
                                <div class="absolute w-[120px] lg:w-[246px] h-[120px] lg:h-[246px] bg-gray-300 transform rotate-45 -translate-y-14 lg:translate-y-0 translate-x-[-50px] md:translate-x-[-90px] lg:translate-x-[-130px] rounded-[20px] lg:rounded-[35px] border-4 border-white overflow-hidden">
                                    <div onclick="showModalImage('Valuable Edutainment Park', '{{ asset('storage/' . $data->value_photo3) }}')" class="h-[170px] lg:h-[350px] w-[170px] lg:w-[350px] transform -rotate-45 translate-y-[-30px] lg:translate-y-[-50px] translate-x-[-30px] lg:translate-x-[-50px]">
                                        <img src="{{ asset('storage/' . $data->value_photo3) }}" alt="value3" class="object-cover w-full h-full" loading="lazy">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="relative w-[119.06px] h-[102.54px] md:ml-10">
            <div class="absolute inset-0 flex justify-center items-center">
                <div class="relative">
                    <div class="absolute w-[65px] h-[65px] bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-60 transform rotate-45 rounded-2xl"></div>
                    <div class="absolute w-[65px] h-[65px] bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-80 transform rotate-45 translate-y-[20px] rounded-2xl"></div>
                </div>
            </div>
        </div>

        <section class="mt-20 md:mt-32 py-5 w-full h-fit min-h-[656px] flex justify-center items-center gradient-primary-opactiy relative">
            <img src="{{ asset('storage/' . $data->statistik_photo) }}" alt="backgorund statistik" loading="lazy" class="-z-10 w-full h-full absolute object-cover">
            <div class="flex flex-row flex-wrap  gap-5 lg:gap-10 px-5 lg:px-36 w-full h-fit justify-center lg:justify-normal">
                <h3 class="w-11/12 lg:w-[528px] text-whitePrimary text-xl md:text-2xl font-bold text-wrap self-center text-center">{{ $data->statistik_title }}</h3>
                @foreach ($statistiks as $statistik)
                    <div class="w-[150px] md:w-[264px] min-h-[80px] md:min-h-[115px] flex flex-col justify-center items-center px-3 md:px-5 py-1 md:py-3 bg-whitePrimary text-center rounded-2xl font-inter text-xs md:text-base">
                        {!! $statistik->description !!}
                    </div>
                @endforeach
                
            </div>
        </section>

        <div class="relative w-[119.06px] h-[102.54px] self-end">
            <div class="absolute inset-0 flex justify-center items-center">
                <div class="relative">
                    <div class="absolute w-[65px] h-[65px] bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-60 transform rotate-45 translate-x-[-50px] rounded-2xl"></div>
                    <div class="absolute w-[65px] h-[65px] bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-80 transform rotate-45 translate-x-[-50px] translate-y-[20px] rounded-2xl"></div>
                </div>
            </div>
        </div>

        <section class="mt-14 md:mt-0 w-full py-5 px-5 md:px-0 flex flex-col gap-10 md:gap-16 justify-center items-center">
            <h1 class="font-inter text-2xl font-bold tracking-wider text-center">{{ $data->benefit_title }}</h1>
            <div class="flex flex-wrap justify-center gap-10 md:gap-16">
                @foreach ($benefits as $benefit)
                    <div class="w-full md:w-[350px] lg:w-[372px] min-h-[196px] bg-whitePrimary box-shadow-white rounded-xl p-8 flex flex-col gap-8">
                        <div class="flex flex-row items-center gap-3">
                            <img src="/assets/images/Checklist.svg" alt="checklist" class="w-6 h-6">
                            <h5 class="text-base font-medium font-inter">{{ $benefit->name }}</h5>
                        </div>
                        <p class="text-justify text-sm font-normal font-inter">
                            {!! $benefit->description !!}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>

        <div class="flex my-0 md:my-10 relative w-[119.06px] h-[102.54px]">
            <div class="absolute inset-0 flex justify-center items-center">
                <div class="relative">
                    <div class="absolute w-[50px] h-[50px] bg-gray-300 opacity-60 transform rotate-45 rounded-2xl"></div>
                    <div class="absolute w-[60px] h-[60px] bg-gray-300 opacity-80 transform rotate-45 translate-x-[20px] rounded-2xl"></div>
                </div>
            </div>
        </div>

        <section class="mt-14 md:mt-0 py-0 md:py-5 flex flex-col gap-10 md:gap-14 justify-center items-center">
            <h1 class="font-inter text-2xl font-bold tracking-wider">{{ $data->program_title }}</h1>
            <div class="w-screen flex flex-col lg:flex-row justify-center items-center px-3 md:px-0 gap-5 lg:gap-3">
                @foreach ($programs as $program)
                    <a href="{{ '/programs#'.$program->slug }}" class="w-full lg:w-[410px] min-h-[500px] md:min-h-[633px] cursor-pointer hover:bg-whitePrimary shadow-xl md:shadow-none hover:shadow-xl rounded-[40px] transition-all delay-200 duration-200 flex flex-col gap-5 md:gap-10 px-3 py-6 md:px-5 md:py-5">
                        <div class="w-[300px] md:w-[370px] h-[300px] md:h-[370px] bg-gray-300 rounded-[30px] self-center">
                            <img src="{{ asset('storage/' . $program->photo) }}" loading="lazy" alt="{{ $program->name }}" class="w-full h-full object-cover rounded-[30px]">
                        </div>
                        <div class="flex flex-col items-center font-inter px-5" style="text-align: justify; text-justify: inter-word;">
                            <h3 class="text-base md:text-xl font-semibold text-center">{{ $program->name }}</h3>
                            {{-- <h5 class="text-sm md:text-base text-center">One day & overnight experience</h5> --}}
                            <div class="description py-2">
                                <p class="mt-5 md:mt-7 text-justify text-xs md:text-base">
                                    {!! $program->description !!}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <section class="mt-32 py-5 w-full h-[656px] flex justify-center items-center gradient-primary-opactiy relative">
            <img src="{{ asset('storage/' . $data->testimonial_photo) }}" alt="testimonial background" loading="lazy" class="-z-10 w-full h-full absolute object-cover">
            <div class="flex flex-col self-start absolute z-10 gap-5 md:gap-10 px-5 lg:px-36 py-10 md:py-20 w-full">
                <h1 class="font-inter font-bold text-white text-xl md:text-2xl text-center tracking-wider">{{ $data->testimonial_title }}</h1>
                <div class="mt-3 md:mt-8 w-full flex flex-row justify-center items-center gap-5 md:gap-0">
                    <div class="swiper-prev w-6 h-full flex justify-center items-center">
                        <img src="/assets/images/Prev.svg" alt="Prev" class="w-6 h-6">
                    </div>
                    <div class="w-full md:w-11/12 lg:w-[1111px] swiper swiperTestimonial flex flex-row">
                        <div class="py-5 md:py-8 w-full md:w-11/12 lg:w-[403px] h-full md:h-[272px] swiper-wrapper flex flex-row gap-0 lg:gap-28">
                            @foreach ($testimonials as $testimonial)
                                <div class="w-full md:w-[403px] h-full md:h-[272px] flex flex-col justify-center items-center font-inter swiper-slide px-3 md:px-0" style="color: white !important; text-align: justify; text-justify: inter-word;">
                                    <div class="w-full flex justify-center h-14 md:h-16 rounded-full">
                                        <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" loading="lazy" class="w-14 md:w-16 h-full rounded-full object-cover">
                                    </div>
                                    <h4 class="mt-4 text-white text-sm md:text-lg font-medium text-center">{{ $testimonial->name }}</h4>
                                    <h5 class="text-yellow-500 italic text-sm md:text-lg text-center">{{ $testimonial->company }}</h5>
                                    <p class="mt-8 text-justify text-white text-xs md:text-base">
                                        {!! $testimonial->description !!}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-next w-6 h-full flex justify-center items-center">
                        <img src="/assets/images/Next.svg" alt="Next" class="w-6 h-6">
                    </div>
                </div>
            </div>
        </section>

        <div class="relative w-[119.06px] h-[102.54px] self-end">
            <div class="absolute inset-0 flex justify-center items-center">
                <div class="relative bg-blue-500">
                    <div class="absolute w-[65px] h-[65px] bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-70 transform rotate-45 translate-x-[-200px] rounded-2xl"></div>
                    <div class="absolute w-[65px] h-[65px] bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-90 transform rotate-45 translate-x-[-170px] rounded-2xl"></div>
                </div>
            </div>
        </div>

        <section class="mt-16 md:mt-0 mb-20 w-full py-5 flex flex-col gap-5 md:gap-10 justify-center items-center">
            <h1 class="font-inter text-2xl font-bold tracking-wider">{{ $data->gallery_title }}</h1>
            <div class="mt-3 md:mt-10 flex gap-11 horizontal-scroll w-full flex-nowrap overflow-scroll swiper swiper-gallery-1">
                <div class="flex gap-11 swiper-wrapper w-full p-1">
                    @foreach ($galleries as $gallery)
                        <div onclick="showModalImage('{{ $gallery->name }}', '{{ asset('storage/' . $gallery->photo) }}')" class="w-[381px] h-[214px] bg-gray-400 rounded-xl swiper-slide">
                            <img src="{{ asset('storage/' . $gallery->photo) }}" alt="{{ $gallery->name }}" loading="lazy" class="w-full h-[214px] object-cover rounded-xl">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex gap-11 horizontal-scroll w-full flex-nowrap overflow-scroll swiper swiper-gallery-2">
                <div class="flex gap-11 swiper-wrapper w-full p-1">
                    @foreach ($galleries->sortByDesc('id') as $gallery)
                        <div onclick="showModalImage('{{ $gallery->name }}', '{{ asset('storage/' . $gallery->photo) }}')" class="w-[381px] h-[214px] bg-gray-400 rounded-xl swiper-slide">
                            <img src="{{ asset('storage/' . $gallery->photo) }}" alt="{{ $gallery->name }}" loading="lazy" class="w-full h-[214px] object-cover rounded-xl">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiperHeroes = new Swiper(".swiper-heroes", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        var swiperGallery1 = new Swiper(".swiper-gallery-1", {
            slidesPerView: 1.3,
            spaceBetween: 5,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 5,
                },
                1024: {
                    slidesPerView: 3.9,
                    spaceBetween: 10,
                },
            },
        });

        var swiperGallery2 = new Swiper(".swiper-gallery-2", {
            slidesPerView: 1.3,
            spaceBetween: 5,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
                reverseDirection: true
            },
            breakpoints: {
                640: {
                    slidesPerView: 2.2,
                    spaceBetween: 5,
                },
                1024: {
                    slidesPerView: 3.9,
                    spaceBetween: 10,
                },
            },
        });

        var swiperTestimonial = new Swiper(".swiperTestimonial", {
            slidesPerView: 1,
            spaceBetween: 5,
            navigation: {
                nextEl: ".swiper-next",
                prevEl: ".swiper-prev",
            },
            mousewheel: true,
            keyboard: true,
            breakpoints: {
                640: {
                    centeredSlides: false,
                    slidesPerView: 1,
                    spaceBetween: 1,
                },
                1024: {
                    centeredSlides: true,
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
            },
        });

        document.querySelectorAll('.description').forEach((element) => {
            const maxLines = 7; // Jumlah baris yang diinginkan
            const lineHeight = parseFloat(getComputedStyle(element).lineHeight); // Ambil line-height
            const maxHeight = lineHeight * maxLines; // Hitung tinggi maksimal
            
            // Terapkan pembatasan
            if (element.scrollHeight > maxHeight) {
                element.style.height = `${maxHeight+10}px`;
                element.style.overflow = 'hidden';
                element.style.display = '-webkit-box';
                element.style.webkitBoxOrient = 'vertical';
            }
        });

        const modalVideo = document.getElementById('modal-video');
        const iframe = document.getElementById('frame-video');
        
        const toggleModalVideo = () => {
            const src = modalVideo.getAttribute('data-src');
            modalVideo.classList.toggle('hidden');

            if (modalVideo.classList.contains("hidden")) {
                iframe.src = "";
            } else {
                iframe.src = src;
            }
        }

        const modalImage = document.getElementById('modal-image');

        const toggleModalImage = () => {
            modalImage.classList.toggle('hidden');
        }
        const showModalImage = (title, imageUrl) => {
            const titleElement = document.getElementById('title-image');
            const imageElement = document.getElementById('modal-image-content');

            titleElement.textContent = title;
            imageElement.src = imageUrl;

            modalImage.classList.remove('hidden');
        };
    </script>
@endpush