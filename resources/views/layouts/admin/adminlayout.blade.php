<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{--  FONTS  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    {{-- CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description }}">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset($pagedata->site_logo) }}">

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/styles.css') }}">

    <title>
        {{ $title }}
    </title>

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('admin-assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    {{-- JODIT --}}
    <x-admin.joditcss />

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.47.0/dist/apexcharts.min.js"></script>
</head>

<body>
    @yield('content')

    {{-- OFF CANVAS CUSTOMIZER --}}
    <x-admin.customizer />
    {{-- CUSTOMIZER ENDS --}}

    {{-- Searchbar --}}
    <x-admin.searchbar />
    {{-- Searchbar ENDS --}}


    <script src="{{ asset('admin-assets/js/vendor.min.js') }}"></script>
    <!-- Import Js Files -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('admin-assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/theme/app.init.js') }}"></script>
    <script src="{{ asset('admin-assets/js/theme/theme.js') }}"></script>
    <script src="{{ asset('admin-assets/js/theme/app.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/theme/sidebarmenu.js') }}"></script>

    {{-- JODIT SCRIPTS --}}
    <x-admin.joditjs />
    <script src="{{ asset('custom/js/initjodit.js') }}"></script>
    <script src="{{ asset('admin-assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/dashboards/dashboard.js') }}"></script>
    <script src="{{ asset('admin-assets/js/custom.js') }}"></script>
</body>

</html>
