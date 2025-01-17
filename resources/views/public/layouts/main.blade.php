<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title }}</title>

        <meta name="description" content="Transformer Center" />
        <meta name="author" content="Star IT" />
        <link rel="shortcut icon" href="/assets/images/Transformer-Favicon.png" type="image/x-icon" />
        <link rel="icon" href="/assets/images/Transformer-Favicon.png" type="image/x-icon"/>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Parisienne&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

        {{-- style --}}
        @stack('prepend-style')
        @stack('addon-style')

        @vite('resources/css/app.css')
    </head>
    <body>
        @include('public.includes.navbar')

        <!-- content -->
        @yield('container')

        @include('public.includes.wa')
        @include('public.includes.footer')

        {{-- script --}}
        @stack('prepend-script')
        @include('public.includes.script')
        @stack('addon-script')
    </body>
</html>