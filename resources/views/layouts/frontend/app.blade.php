<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Meta Starts --}}
        @include('layouts.frontend.partials.metas')
        {{-- Meta Ends --}}
        
        {{--  Page Title  --}}
        <title> {{ config('app.name') }} | @yield('page_title') </title>
        <!-- Fevicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

        <!-- Start css -->
        @include('layouts.frontend.partials.stylesheets')
        <!-- End css -->
    </head>
    <body>
        <!-- Start navbar -->
        @include('layouts.frontend.partials.navbar')
        <!-- End navbar -->

        <!-- Start Breadcrumbbar -->
        @include('layouts.frontend.partials.breadcrumb')
        <!-- End Breadcrumbbar -->
        
        <!-- Start row -->
        @yield('content')
        <!-- End row -->
        

        <!-- Start Footerbar -->
        @include('layouts.frontend.partials.footer')
        <!-- End Footerbar -->
        
        <!-- Start Auth Modals -->
        @include('layouts.frontend.partials.auth_modals')
        <!-- End Auth Modals -->

        <!-- Start Mobile Menu -->
        @include('layouts.frontend.partials.mobile_menu')
        <!-- End Mobile Menu -->

        <!-- Start js -->
        @include('layouts.frontend.partials.scripts')
        <!-- End js -->

        @include('sweetalert::alert')
    </body>
</html>
