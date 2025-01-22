<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | {{ $menu }}</title>

    <meta name="description" content="Admin - Star Group" />
    <meta name="author" content="Star IT" />
    <link rel="shortcut icon" href="/assets/images/starGroupLogo.png" type="image/x-icon" />
    <link rel="icon" href="/assets/images/starGroupLogo.png" type="image/x-icon"/>

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
            <img class="animation__shake" src="/assets/images/starGroupLogo.png" alt="TC" height="120"
                width="120">
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
