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
            <div class="mt-20 w-auto h-[300px] md:h-[500px] bg-gray-300 rounded-lg">
                <img id="modal-image-content" src="" alt="detail" loading="lazy" class="w-full h-full object-cover rounded-lg">
            </div>
        </div>
    </div>

    <main class="w-screen flex flex-col">
        <section class="mt-[70px] md:mt-[85px] w-full h-full min-h-[calc(100vh-70px)] md:min-h-[calc(100vh-85px)] flex flex-col gap-10 items-center py-10">
            <div class="w-full flex flex-col gap-10 pb-16 px-2 md:px-10 lg:px-[117px] relative">
                <div class="w-11/12 self-center">
                    <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}" loading="lazy" class="w-full h-full object-cover rounded-xl">
                </div>
                <div class="flex flex-col">
                    <h1 class="font-semibold tracking-wider text-gradient-primary text-2xl text-center">{{ $post->title }}</h1>
                    <h5 class="font-normal tracking-wider text-gray-500 text-sm text-center">{{ $post->created_at->diffForHumans() }}</h5>
                </div>
                <div class="w-full px-5 text-justify">
                    <p>
                        {!! $post->description !!}
                    </p>
                </div>

                {{-- gallery --}}
                @if ($post->galleries->count())
                    <h1 class="mt-[50px] font-semibold tracking-wider text-gradient-primary text-2xl text-center">Galeri Artikel</h1>
                    <div class="flex flex-wrap items-center justify-center gap-3 pb-10 w-full">
                        @foreach ($post->galleries as $gallery)
                            <div onclick="showModalImage('{{ $gallery->name }}', '{{ asset('storage/' . $gallery->photo) }}')" class="h-auto md:h-[128px] w-11/12 md:w-[228px] rounded-lg cursor-pointer bg-grayPrimary">
                                <img src="{{ asset('storage/' . $gallery->photo) }}" alt="{{ $gallery->name }}" loading="lazy" class="w-full h-full object-cover rounded-lg">
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- more artikel --}}
                <h1 class="mt-[50px] font-semibold tracking-wider text-gradient-primary text-2xl text-center">More Artikel</h1>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 md:gap-5 px-0 md:px-3">
                    @foreach ($datas as $data)
                        <a href="{{ route('post', $data->slug) }}" class="flex flex-row justify-center items-center gap-3 w-full md:w-[430px h-full md:h-[120px] cursor-pointer">
                            <div class="flex-none w-28 h-28 bg-grayPrimary rounded-xl">
                                <img src="{{ asset('storage/' . $data->photo) }}" alt="{{ $data->title }}" loading="lazy" class="w-full h-full rounded-xl object-cover">
                            </div>
                            <div class="flex-1 flex flex-col gap-2 justify-between font-inter py-2 h-full">
                                <h3 class="text-base">
                                    {{ $data->title }}
                                </h3>
                                <span class="text-sm text-gray-300">{{ $data->created_at->diffForHumans() }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
                <a href="{{ route('posts') }}" class="font-normal cursor-pointer tracking-wider text-bluePrimary text-sm text-center lg:text-end underline underline-offset-2">All Artikel</a>
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