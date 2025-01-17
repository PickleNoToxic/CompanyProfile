@extends('public.layouts.main')


@section('container')
    <main class="w-screen flex flex-col">
        <section class="mt-[70px] md:mt-[85px] w-full h-full md:h-[calc(100vh-85px)] flex flex-col gap-10">
            <a href="{{ route('post', $posts[0]->slug) }}" class="swiper-slide h-[calc(100vh-70px)] md:h-[calc(100vh-85px)] relative">
                <div class="absolute bottom-10 left-0 md:left-5 p-5 bg-black/80 w-full md:w-1/2 rounded-lg">
                    <h1 class="font-inter text-base md:text-3xl font-semibold md:font-bold text-white">
                        {{ $posts[0]->title }}
                    </h1>
                </div>
                <img src="{{ asset('storage/' . $posts[0]->photo) }}" alt="{{ $posts[0]->title }}" class="w-full h-full object-cover" loading="lazy">
            </a>
        </section>
        <section class="flex flex-col px-3 md:px-10 lg:px-16 py-5 md:py-12">
            <h1 class="mt-7 md:mt-[50px] font-semibold tracking-wider text-center md:text-start text-gradient-primary text-2xl">
                Berita Transformer Center
            </h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-5 gap-10 md:gap-5 px-0 md:px-3">
                @foreach ($posts->skip(1) as $post)
                    <a href="{{ route('post', $post->slug) }}" class="flex flex-row justify-center items-center gap-3 w-full md:w-[430px h-full md:h-[120px] cursor-pointer">
                        <div class="flex-none w-28 h-28 bg-grayPrimary rounded-xl">
                            <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}" loading="lazy" class="w-full h-full rounded-xl object-cover">
                        </div>
                        <div class="flex-1 flex flex-col gap-2 justify-between font-inter py-2 h-full">
                            <h3 class="text-base">
                                {{ $post->title }}
                            </h3>
                            <span class="text-sm text-gray-300">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="flex justify-center md:justify-end items-center mt-20 mb-5 md:mb-10 w-full">
                {{ $posts->links() }}
            </div>
        </section>
    </main>
@endsection