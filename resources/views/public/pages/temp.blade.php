<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- style --}}
    @stack('prepend-style')
    @stack('addon-style')

    @vite('resources/css/app.css')
</head>

<body>
<section class="relative overflow-clip">
    <div class="w-full h-96 bg-red-500 transform -mb-16 z-0"></div>
    
    <!-- Orange Section -->
    <div class="w-[120%] h-64 bg-orange-500 transform -rotate-3 -ms-2 relative z-10">
        <div class="relative w-full h-full transform rotate-3 overflow-visible flex py-16 px-8">
            <p class="text-white font-bold text-lg">Content on Orange</p>
        </div>
    </div>
    
    <div class="w-full h-[40rem] bg-yellow-500 transform -mt-16 -mb-14"></div>
    
    <!-- Green Section -->
    <div class="w-[120%] h-80 bg-green-500 transform -rotate-3 -ms-2 relative z-10">
        <div class="relative w-full h-full transform rotate-3 overflow-visible flex items-center justify-center">
            <p class="text-white font-bold text-lg">Content on Green</p>
        </div>
    </div>
    
    <div class="w-full h-96 bg-blue-500 transform -mt-14"></div>
</section>






</body>

</html>
