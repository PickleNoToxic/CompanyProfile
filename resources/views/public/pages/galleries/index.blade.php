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
        <section class="mt-[70px] md:mt-[85px] w-full h-full min-h-[calc(100vh-70px)] md:min-h-[calc(100vh-85px)] flex flex-col gap-10 items-center px-2 md:px-[50px] lg:px-[117px] relative">
            <div class="hidden md:flex absolute w-[119.06px] h-[102.54px] self-end -top-7 left-10">
                <div class="absolute inset-0 flex justify-center items-center">
                    <div class="relative">
                        <div class="absolute w-[50px] h-[50px] bg-gray-300 opacity-60 transform rotate-45 rounded-2xl"></div>
                        <div class="absolute w-[60px] h-[60px] bg-gray-300 opacity-80 transform rotate-45 translate-x-[20px] rounded-2xl"></div>
                    </div>
                </div>
            </div>
            <h1 class="mt-[50px] font-semibold tracking-wider text-gradient-primary text-2xl">Galeri Foto</h1>
            <div class="flex flex-wrap items-center justify-center gap-3 pb-10 w-full">
                @foreach ($datas as $data)
                    <div onclick="showModalImage('{{ $data->name }}', '{{ asset('storage/' . $data->photo) }}')" class="h-auto md:h-[128px] w-11/12 md:w-[228px] rounded-lg cursor-pointer bg-grayPrimary">
                        <img src="{{ asset('storage/' . $data->photo) }}" alt="{{ $data->name }}" loading="lazy" class="w-full h-full object-cover rounded-lg">
                    </div>
                @endforeach
            </div>
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