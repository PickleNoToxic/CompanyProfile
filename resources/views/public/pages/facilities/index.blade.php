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
                <img id="modal-image-content" src="" alt="addetail" loading="lazy" class="w-full h-full object-cover rounded-lg">
            </div>
        </div>
    </div>

    <main class="w-screen flex flex-col">
        <section class="mt-[70px] md:mt-[85px] w-full h-full min-h-[calc(100vh-70px)] md:min-h-[calc(100vh-85px)] flex flex-col gap-10 items-center px-2 md:px-[50px] lg:px-[117px] relative">
            <div class="hidden lg:flex absolute w-[119.06px] h-[102.54px] self-end -top-7 left-10">
                <div class="absolute inset-0 flex justify-center items-center">
                    <div class="relative">
                        <div class="absolute w-[50px] h-[50px] bg-gray-300 opacity-60 transform rotate-45 rounded-2xl"></div>
                        <div class="absolute w-[60px] h-[60px] bg-gray-300 opacity-80 transform rotate-45 translate-x-[20px] rounded-2xl"></div>
                    </div>
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-center gap-y-0 md:gap-y-5 gap-x-10">
                @foreach ($datas as $data)
                    <button class="tab-button w-[100px] md:w-[150px] flex flex-col gap-1 justify-end items-center cursor-pointer" data-category="{{ $data->id }}">
                        <h1 class="mt-5 md:mt-[50px] font-semibold tracking-wider {{ $loop->first ? 'text-gradient-primary ' : 'text-graySecondary/50' }} text-xl md:text-2xl">{{ $data->name }}</h1>
                        <div class="{{ $loop->first ? ' ' : 'hidden' }} w-full h-[2px] bg-gradient-primary rounded-3xl"></div>
                    </button>
                @endforeach
            </div>

           
            @foreach ($datas as $data)
                <div class="flex flex-wrap items-center justify-center gap-3 pb-10 w-full tab-panel {{ $loop->first ? '' : 'hidden' }}" data-category="{{ $data->id }}">
                    @if ($data->facilities && $data->facilities->isNotEmpty())
                        @foreach ($data->facilities as $item)
                            <div onclick="showModalImage('{{ $item->name }}', '{{ asset('storage/' . $item->photo) }}')" class="h-auto md:h-[128px] w-11/12 md:w-[228px] rounded-lg cursor-pointer bg-grayPrimary">
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" loading="lazy" class="w-full h-full object-cover rounded-lg">
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 text-sm font-inter italic tracking-wider">Belum ada galeri foto.</p>
                    @endif
                </div>
            @endforeach
        </section>
    </main>
@endsection



@push('addon-script')
    <script>
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabPanels = document.querySelectorAll('.tab-panel');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.getAttribute('data-category');

                // Hapus kelas aktif dari semua tombol
                tabButtons.forEach(btn => {
                    const title = btn.querySelector('h1');
                    const line = btn.querySelector('div');
                    title.classList.remove('text-gradient-primary');
                    title.classList.add('text-graySecondary/50');
                    line.classList.add('hidden');
                    btn.classList.remove('active');
                });

                // Tambahkan kelas aktif ke tombol yang diklik
                const title = button.querySelector('h1');
                const line = button.querySelector('div');
                title.classList.remove('text-graySecondary/50');
                title.classList.add('text-gradient-primary');
                line.classList.remove('hidden');
                button.classList.add('active');

                tabPanels.forEach(panel => {
                    panel.classList.add('hidden');
                });

                // Tampilkan tab-panel yang sesuai
                const activePanel = document.querySelector(`.tab-panel[data-category="${category}"]`);
                if (activePanel) {
                    activePanel.classList.remove('hidden');
                }
            });
        });

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
