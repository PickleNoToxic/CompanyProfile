<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title }}</title>

    <meta name="description" content="Marketing Tools Star Group" />
    <meta name="author" content="Star IT" />
    <link rel="shortcut icon" href="/assets/images/starGroupLogo.png" type="image/x-icon" />
    <link rel="icon" href="/assets/images/starGroupLogo.png" type="image/x-icon"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Parisienne&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

    {{-- style --}}
    @stack('prepend-style')
    @stack('addon-style')

    @vite('resources/css/app.css')
</head>

<body>
    <main class="w-screen h-screen">
        <img src="{{ asset('assets/images/background-marketing-tools.png') }}" alt="background" class="absolute w-full h-full object-cover -z-10" />
                
        <section class="duration-[2000ms] ease-in-out flex justify-start items-center flex-col gap-3 font-poppins tracking-wider w-screen h-screen overflow-y-auto pb-10">
            <a href='/' class="items-center mt-10 mb-3">
                <div class="rounded-full bg-whitePrimary p-7">
                    <img src="{{ asset('storage/' . $master_web->company_icon) }}" alt="Logo" class=" w-24 h-auto" />
                </div>
            </a>
            <div class="px-3 flex flex-col gap-3 mb-11 text-center">
                <h2 class="font-semibold text-3xl uppercase mb-3 text-whitePrimary">star group</h2>
            </div>
            <div class="flex flex-col items-center gap-10 w-full pb-10 mt-1">
                @foreach ($linktrees as $linktree)
                    <button onclick="openModal('{{ $linktree->title }}', '{{ $linktree->description }}', '{{ asset('storage/' . $linktree->company->photo) }}', '{{ $linktree->company->url }}', '{{ $linktree->company->galleries }}')" class="bg-whitePrimary rounded-full px-5 py-4 md:max-w-[500px] w-11/12 md:w-[500px] flex flex-row items-center gap-3">
                        <div class="bg-whitePrimary rounded-full p-[5px] shadow-md">
                            <img src="{{ asset('storage/' . $linktree->photo) }}" alt="" class="h-6 w-6 object-contain">
                        </div>
                        <span class="text-start">
                            {{ $linktree->title }}
                        </span>
                    </button> 
                @endforeach
                
            </div>
        </section>
    </main>



    <div id="modal" onclick="closeModal()" class="fixed inset-0 bg-black bg-opacity-50 flex items-end justify-center hidden pt-20">
        <div class="bg-whitePrimary w-full max-w-lg min-h-[85vh] mt-5 h-full p-6 rounded-t-3xl shadow-lg relative" onclick="event.stopPropagation()">
            <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 w-20 h-20 bg-whitePrimary rounded-full flex items-center justify-center shadow-md p-2">
                <img id="modalImage" src="" alt="Content Image" class="h-full w-full object-contain rounded-full">
            </div>
            <div class="mt-10 h-full overflow-y-auto pb-16">
                <div class="flex flex-col gap-2">
                    <h2 id="modalTitle" class="text-xl font-semibold text-blue-900 text-center"></h2>
                    <p id="modalContent" class="text-gray-600 mt-2 text-justify text-xs md:text-sm"></p>
                </div>
        
                <div class="relative w-full max-w-3xl mx-auto overflow-hidden mt-7">
                    <div id="sliderContainer" class="relative">
                        <div id="slider" class="flex gap-2 transition-transform duration-500 ease-out">
                        </div>
                    </div>
                
                    <button onclick="prevSlide()" class="absolute left-2 top-1/2 -translate-y-1/2 bg-whitePrimary py-2 px-3 rounded-full shadow-lg z-10">
                        ◀
                    </button>
                    <button onclick="nextSlide()" class="absolute right-2 top-1/2 -translate-y-1/2 bg-whitePrimary py-2 px-3 rounded-full shadow-lg z-10">
                        ▶
                    </button>
                </div>
                <div class="mt-24 flex flex-col gap-3 text-center">
                    <a id="modalLink" href="" target="_blank"
                        class="text-whitePrimary w-full bg-[#2E3191] hover:bg-blue-800 rounded-lg py-2 uppercase tracking-wider">
                        Site
                    </a>
                    <button onclick="closeModal()" class="w-full bg-red-800 hover:bg-red-700 text-whitePrimary uppercase tracking-wider py-2 rounded-lg">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const openModal = (title, content, image, site, galleries) => {
            document.getElementById("modalTitle").innerText = title;
            document.getElementById("modalContent").innerHTML = content;
            document.getElementById("modalImage").src = image;
            document.getElementById("modalLink").href = site;
            document.getElementById("modal").classList.remove("hidden");

            if (typeof galleries === "string") {
                try {
                    galleries = JSON.parse(galleries);
                } catch (e) {
                    console.error("Error parsing galleries:", e);
                    galleries = [];
                }
            }

            const slider = document.getElementById('slider');
            slider.innerHTML = '';
    
            if (galleries.length > 0) {
                galleries.forEach(gallery => {
                    let slide = document.createElement('a');
                    slide.classList.add('h-80', 'max-w-[85%]', 'flex-shrink-0', 'rounded-2xl', 'overflow-hidden', 'cursor-pointer');
                    slide.href = `/storage/${gallery.url}`;
                    slide.target = "_blank"; 
                    slide.rel = "noopener noreferrer"; 

                    let img = document.createElement('img');
                    img.src = `/storage/${gallery.photo}`;
                    img.classList.add('w-full', 'h-full', 'object-contain', 'cursor-pointer', 'rounded-2xl');
                    img.alt = gallery.title;

                    slide.appendChild(img);
                    slider.appendChild(slide);
                });
            }

            currentIndex = 0;
            updateSlider();
            document.getElementById("modal").classList.remove("hidden");
        }

        let currentIndex = 0;

        function updateSlider() {
            const slider = document.getElementById('slider');
            const slides = slider.children.length;
            const slideWidth = slider.children[0]?.offsetWidth + 8 || 0;

            if (slides > 0) {
                if (currentIndex < 0) {
                    currentIndex = slides - 1;
                } else if (currentIndex >= slides) {
                    currentIndex = 0;
                }
                slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
            }
        }

        function prevSlide() {
            currentIndex--;
            updateSlider();
        }

        function nextSlide() {
            currentIndex++;
            updateSlider();
        }

        function closeModal() {
            document.getElementById("modal").classList.add("hidden");
        }
    </script>
</body>

</html>
