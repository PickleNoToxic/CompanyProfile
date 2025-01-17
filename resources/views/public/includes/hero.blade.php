<header class="mt-[70px] md:mt-[85px] h-[300px] md:h-[598px] w-full bg-slate-400 swiper swiper-heroes">
    <div class="swiper-wrapper">
        @foreach ($heroes as $hero)
            <a href="{{ $hero->url }}" class="swiper-slide">
                <img src="{{ asset('storage/' . $hero->photo) }}" alt="{{ $hero->name }}" class="w-full h-full object-cover" loading="lazy">
            </a>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</header>