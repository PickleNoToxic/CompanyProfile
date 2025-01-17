@extends('public.layouts.main')


@section('container')
    <main class="w-screen flex flex-col">
        <section class="mt-[70px] md:mt-[85px] w-full h-full min-h-[calc(100vh-70px)] lg:min-h-[calc(100vh-85px)] flex flex-col lg:flex-row">
            <div class="flex-none w-full lg:w-[40vw] h-[400px] lg:h-auto bg-grayPrimary">
                @if ($data->map)
                    <iframe
                        src="{{ $data->map }}"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                @else
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2504.0072829759665!2d112.53160053517212!3d-7.864043995994758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7880b7d5a0c855%3A0x97a941c38202fa3b!2sTransformer%20Center%20%26%20Kampoeng%20Kidz!5e1!3m2!1sen!2sid!4v1724997461333!5m2!1sen!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                @endif
            </div>
            <div class="flex-1 w-full flex flex-col gap-16 px-5 md:px-10 py-16 lg:py-10 relative">
                <div class="hidden md:flex absolute w-[119.06px] h-[102.54px] self-end -top-7 right-0">
                    <div class="absolute inset-0 flex justify-center items-center">
                        <div class="relative">
                            <div class="absolute w-[65px] h-[65px] bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-60 transform rotate-45 translate-x-[-20px] rounded-2xl"></div>
                            <div class="absolute w-[65px] h-[65px] bg-gradient-to-tr from-bluePrimary to-greenSecondary opacity-80 transform rotate-45 translate-x-[-50px] rounded-2xl"></div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col font-inter">
                    <h1 class="font-medium tracking-wider text-gradient-primary text-xl md:text-4xl lg:text-2xl">
                        Kontak Kami
                    </h1>
                    <div class="mt-4 flex flex-col gap-2 lg:gap-1 px-1 md:px-2 text-sm md:text-xl lg:text-sm">
                        <div class="flex flex-row items-center gap-4">
                            <img src="/assets/images/Address-Icon.png" alt="icon" class="w-auto h-5">
                            <span>{{ $data->address }}</span>
                        </div>
                        <div class="flex flex-row items-center gap-4">
                            <img src="/assets/images/Phone-Icon.png" alt="icon" class="w-auto h-5">
                            <span>{{ $data->phone }}</span>
                        </div>
                        <div class="flex flex-row items-center gap-4">
                            <img src="/assets/images/Email-Icon.png" alt="icon" class="w-auto h-5">
                            <span>{{ $data->email }}</span>
                        </div>
                        <div class="flex flex-row items-center gap-4">
                            <img src="/assets/images/Web-Icon.png" alt="icon" class="w-auto h-5">
                            <span>{{ $data->website }}</span>
                        </div>
                    </div>
                </div>

                @if (!empty($sosmeds))
                    <div class="flex flex-col font-inter">
                        <h1 class="font-medium tracking-wider text-gradient-primary text-xl md:text-4xl lg:text-2xl">
                            Sosial Media
                        </h1>
                        <div class="mt-4 flex flex-col md:flex-row md:flex-wrap justify-center gap-3 md:gap-5 lg:gap-7 px-2 text-sm md:text-xl lg:text-sm">
                            @foreach ($sosmeds as $sosmeds)
                                <a href="{{ $sosmeds->url }}" rel="noopener noreferrer" target="_blank" class="flex flex-row items-center gap-2 cursor-pointer">
                                    <div class="w-8 h-8 rounded-full bg-white flex justify-center items-center shadow-lg shadow-black/50 p-1.5">
                                        <img src="{{ asset('storage/' . $sosmeds->photo) }}" alt="{{ $sosmeds->name }}" loading="eager" class="w-full h-full">
                                    </div>
                                    <span class="font-inter text-bluePrimary cursor-pointer underline underline-offset-2">{{ $sosmeds->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (!empty($partners))
                    <div class="flex flex-col font-inter">
                        <h1 class="font-medium tracking-wider text-gradient-primary text-xl md:text-4xl lg:text-2xl">
                            Our Partner
                        </h1>
                        <div class="mt-4 flex flex-wrap justify-center gap-x-5 md:gap-x-7 gap-y-1 md:gap-y-3 px-2 pb-3">
                            @foreach ($partners as $partner)
                                <div class="flex flex-row items-center cursor-pointer">
                                    <img src="{{ asset('storage/' . $partner->photo) }}" alt="{{ $partner->name }}" loading="eager" class="w-auto h-16 grayscale">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection