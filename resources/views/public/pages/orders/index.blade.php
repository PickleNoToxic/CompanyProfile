@extends('public.layouts.main')


@section('container')
    <main class="w-screen flex flex-col min-h-[calc(100vh-138px)]">
        <section class="mt-[70px] md:mt-[85px] w-full h-full flex flex-col gap-10 items-center px-2 md:px-[50px] lg:px-[117px] relative">
            <div class="hidden md:flex absolute w-[119.06px] h-[102.54px] self-end -top-7 left-10">
                <div class="absolute inset-0 flex justify-center items-center">
                    <div class="relative">
                        <div class="absolute w-[50px] h-[50px] bg-gray-300 opacity-60 transform rotate-45 rounded-2xl"></div>
                        <div class="absolute w-[60px] h-[60px] bg-gray-300 opacity-80 transform rotate-45 translate-x-[20px] rounded-2xl"></div>
                    </div>
                </div>
            </div>
            @if ($data->order)
                <h1 class="mt-[50px] font-semibold tracking-wider text-gradient-primary text-2xl">Cara Pemesanan</h1>
                <div class="flex items-center justify-center w-full h-full pb-10">
                    <div class="h-auto w-11/12 cursor-pointer">
                        <img src="{{ asset('storage/' . $data->order) }}" alt="orders" loading="lazy" class="w-full h-full object-cover">
                    </div>
                </div>
            @endif
        </section>
        <section class=" w-full h-full flex flex-col gap-10 items-center px-2 md:px-[50px] lg:px-[117px]">
            <h1 class="mt-[50px] font-semibold tracking-wider text-gradient-primary text-2xl">FAQ</h1>
            <div class="flex flex-col items-center justify-center w-full h-full pb-20 gap-5 font-inter">
                @foreach ($faqs as $faq)
                    <div class="h-full w-11/12 bg-white border border-gray-300 rounded-3xl flex flex-col gap-3 px-4 md:px-7 py-3 cursor-pointer card-faq">
                        <!-- title -->
                        <div class="h-full w-full flex flex-row justify-between items-start gap-[1px]">
                            <h3 class="w-full text-sm lg:text-base">{{ $faq->question }}</h3>
                            <div class="w-5 md:w-6 bg-black rounded-full mt-1 md:mt-0 transition ease-in-out duration-300 rotate-180 card-faq-icon">
                                <img src="/assets/images/arrow-white.svg" loading="lazy" alt="icon arrow" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <!-- content -->
                        <div class="hidden w-full md:w-11/12 text-xs md:text-sm text-justify ml-3 md:ml-10 pr-3 md:pr-0 card-faq-content">
                            {!! $faq->answer !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection


@push('addon-script')
    <script>
        const faqCards = document.querySelectorAll('.card-faq')

        let cardFaqActiveIndex = 0

        faqCards?.forEach((card, index) => {
            card.addEventListener('click', () => {
                card.querySelector('.card-faq-content').classList.toggle('hidden')
                card.querySelector('.card-faq-icon').classList.toggle('rotate-180')
                
                if (cardFaqActiveIndex !== index ) {
                    faqCards[cardFaqActiveIndex].querySelector('.card-faq-content').classList.add('hidden')
                    faqCards[cardFaqActiveIndex].querySelector('.card-faq-icon').classList.add('rotate-180')
                }

                cardFaqActiveIndex = index;
            })
        })
    </script>
@endpush