@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Gallery'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Gallery') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Gallery') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100">
        <div class="mediasection d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Gallery</h5>
                    <h1>Our <span> Latest Media </span></h1>
                </div>
                <div class="row row-cols-2 row-cols-lg-4 mt-0 g-4 mt-3">
                    @foreach ($galleries as $keys => $gallery)
                        <div class="col">
                            <a data-fancybox="wk" href="{{ show_image($gallery->avatar) }}" class="comon-links-divb05">
                                <figure>
                                    <img src="{{ show_image($gallery->avatar) }}" alt="{{ $gallery->name }}" />
                                    <figcaption>
                                        {{ $gallery->name }}
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    @endforeach
    
                </div>
            </div>
        </div>
        <div class="location-div01 d-inline-block w-100">
            <div class="mindle-heading text-center">
                <h5>Map</h5>
                <h1>Office <span> Location </span></h1>
            </div>
            <span class="bgi-text light-tsext01"> Map </span>

            <iframe
                class="w-100 mt-5"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d444897.3091659081!2d-95.2459789!3d29.4065695!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640859fbe88c531%3A0x32451695f313c938!2sBe%20Someone%20Sports-%20Youth%20Sports%20%7C%20Youth%20Basketball%20%7C%20Youth%20Volleyball%20%7C%20AAU%20Tournaments!5e0!3m2!1sen!2sbd!4v1691411696578!5m2!1sen!2sbd"
                height="450"
                style="border: 0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
    </section>
    
    <!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
