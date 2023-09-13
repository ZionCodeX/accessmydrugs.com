<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">

<head>
    <base href="../../">
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Access My Drugs </title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Buy original, branded perfumes, gold jewelry and bars from Dubai. We buy and ship to you when you order.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
        <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon/amd-icon.png">
  
    @include('components/inc_header_links_shop')

</head>







<body>

    <!-- Main Wrapper Start -->
        @include('components/inc_header_top_section_shop')


        @include('components/inc_navbar_section_shop')



                    @yield('content')


        @include('components/inc_footer_content_shop')


        @include('components/inc_footer_links_shop')


</body>

</html>