<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | {{ $menu }}</title>

    <meta name="description" content="Admin - Transformer Center" />
    <meta name="author" content="Star IT" />
    <link rel="shortcut icon" href="/assets/images/Transformer-Favicon.png" type="image/x-icon" />
    <link rel="icon" href="/assets/images/Transformer-Favicon.png" type="image/x-icon"/>

    {{-- style --}}
    @stack('prepend-style')
    @include('employees.includes.style')
    @stack('addon-style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('sweetalert::alert')
    
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/assets/images/Transformer-Favicon.png" alt="TC" height="60"
                width="60">
        </div>

        @include('employees.includes.header')

        @include('employees.includes.sidebar')

        @yield('container')

        @include('employees.includes.footer')

    </div>
    <!-- ./wrapper -->

    {{-- script --}}
    @stack('prepend-script')
    @include('employees.includes.script')
    @stack('addon-script')

</body>

</html>
