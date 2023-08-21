<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Meta Starts --}}
        @include('layouts.administration.partials.metas')
        {{-- Meta Ends --}}
        
        {{--  Page Title  --}}
        <title> {{ config('app.name') }} | @yield('page_title') </title>
        <!-- Fevicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

        <!-- Start css -->
        @include('layouts.administration.partials.stylesheet')
        <!-- End css -->
    </head>
    <body class="vertical-layout">
        <!-- Start Container -->
        <div id="containerbar" class="containerbar authenticate-bg">
            <!-- Start Container -->
            <div class="container">
                <div class="auth-box error-box">
                    <!-- Start row -->
                    <div class="row no-gutters align-items-center justify-content-center">
                        <!-- Start col -->
                        <div class="col-md-8 col-lg-6">
                            <div class="text-center">
                                <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid error-logo" alt="logo" />
                                <img src="{{ asset('assets/images/error/404.png') }}" class="img-fluid error-image" alt="404" />
                                <h4 class="error-subtitle mb-4">Oops! Page not Found</h4>
                                <p class="mb-4">We did not find the page you are looking for. Please return to previous page or visit home page.</p>
                                <a href="{{ route('frontend.homepage.index') }}" class="btn btn-primary font-16"><i class="feather icon-home mr-2"></i> Go back to Dashboard</a>
                            </div>
                        </div>
                        <!-- End col -->
                    </div>
                    <!-- End row -->
                </div>
            </div>
            <!-- End Container -->
        </div>
        <!-- End Containerbar -->
       <!-- Start js -->
       @include('layouts.administration.partials.scripts')
       <!-- End js -->
   </body>
</html>
