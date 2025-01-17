@extends('public.layouts.main')


@section('container')
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

    <main class="w-screen flex flex-col">
        <section class="mt-[70px] md:mt-[85px] w-full h-full min-h-[calc(100vh-70px)] md:min-h-[calc(100vh-85px)] flex flex-col gap-10 items-center">
            @foreach ($programs as $program)
                @if ($loop->index % 2 == 1)
                    <div class="w-full flex flex-col gap-10 bg-white pb-16 px-2 md:px-[117px] md:relative" id="{{ $program->slug }}">
                        <div class="hidden md:flex absolute w-[119.06px] h-[102.54px] self-end -top-10 right-10">
                            <div class="absolute inset-0 flex justify-center items-center">
                                <div class="relative">
                                    <div class="absolute w-[65px] h-[65px] bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-60 transform rotate-45 translate-x-[-20px] rounded-2xl"></div>
                                    <div class="absolute w-[65px] h-[65px] bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-80 transform rotate-45 translate-x-[-50px] rounded-2xl"></div>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-[50px] font-semibold tracking-wider text-gradient-primary text-2xl text-center">{{ $program->name }}</h1>
                        <div class="w-full flex flex-col-reverse lg:flex-row gap-10 lg:gap-0 text-justify">
                            <div class="flex-1 px-2">
                                {!! $program->description !!}
                            </div>
                            <div class="w-full lg:w-[518px] flex-none flex justify-center items-center">
                                <div onclick="showModalImage('{{ $program->name }}', '{{ asset('storage/' . $program->photo) }}')" class="h-[400px] w-[300px] rounded-xl cursor-pointer">
                                    <img src="{{ asset('storage/' . $program->photo) }}" alt="{{ $program->name }}" loading="lazy" class="w-full h-full object-cover rounded-xl">
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="w-full flex flex-col gap-10 pb-16 px-2 md:px-[117px] md:relative" id="{{ $program->slug }}">
                        <div class="hidden md:flex absolute w-[119.06px] h-[102.54px] self-end -top-7 left-10">
                            <div class="absolute inset-0 flex justify-center items-center">
                                <div class="relative">
                                    <div class="absolute w-[65px] h-[65px] bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-60 transform rotate-45 translate-x-[-20px] rounded-2xl"></div>
                                    <div class="absolute w-[65px] h-[65px] bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-80 transform rotate-45 translate-x-[-50px] rounded-2xl"></div>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-[50px] font-semibold tracking-wider text-gradient-primary text-2xl text-center">{{ $program->name }}</h1>
                        <div class="w-full flex flex-col lg:flex-row gap-10 lg:gap-0 text-justify">
                            <div class="w-full lg:w-[518px] flex-none flex justify-center items-center">
                                <div onclick="showModalImage('{{ $program->name }}', '{{ asset('storage/' . $program->photo) }}')" class="h-[400px] w-[300px] rounded-xl cursor-pointer">
                                    <img src="{{ asset('storage/' . $program->photo) }}" alt="{{ $program->name }}" loading="lazy" class="w-full h-full object-cover rounded-xl">
                                </div>
                            </div>
                            <div class="flex-1 px-2">
                                {!! $program->description !!}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </section>
    </main>
@endsection

@push('addon-script')
    <script>
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