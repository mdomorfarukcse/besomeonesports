@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('About Us'))

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
    <b class="text-uppercase">{{ __('About Us') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('About Us') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 sub-headh-bask body-part pt-0">
        <div class="about-page-main comon-sub-page-main d-inline-block w-100">
            <div class="about-club-top">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-2 g-lg-5">
                        <div class="col position-relative">
                            <figure class="big-img">
                                <img src="{{ asset('frontend/images/about.webp') }}" alt="pic" />
                            </figure>
                            <figure class="small-img">
                                <img src="{{ asset('frontend/images/about_imge.jpg') }}" alt="pic2" />
                            </figure>
                        </div>
                        <div class="col">
                            <h5 class="samll-sub mb-1 mt-0">Our Story</h5>
                            <h2 class="comon-heading m-0">About Us</h2>
                            <p class="mt-3">
                                At Be Someone Sports, our missions is to inspire and empower individuals to achieve their
                                full potential through sports. We Strive to create a positive and inclusive environment
                                where everyone can develop their skills, build confidence, and experience the joys of
                                athletic achievement. Through our programs and activities, we aim to promote physical
                                fitness, teamwork, and sportsmanship, while instilling values as determination,
                                perseverance, and respect. Our ultimate goal is to help individuals become their best
                                selves, both on and off the courts.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="match-result-div">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Upcoming Leagues</h5>
                    <h1>REGISTER FOR EVENTS HERE</h1>
                </div>

                <div class="col-lg-9 mt-5 mx-auto">
                    <div class="next-matchu mt-4">
                        @foreach ($upcomingLeagues as $key => $league)
                            <div class="comon-matchbn">
                                <div class="topikn-div">
                                    <div class="more-details-div d-md-flex align-items-center">
                                        <h5 class="m-0">
                                            <i class="fas fa-calendar-week"></i> {{ show_date($league->start) }} -
                                            {{ show_date($league->end) }}
                                        </h5>
                                        <h6>/ {{ $league->sport->name }}</h6>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-8">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-12">
                                                    <div class="cul-div">
                                                        <h6>
                                                            {{ $league->name }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-4 mt-3 mt-md-0 d-flex justify-content-center justify-content-lg-end align-items-center">
                                            <a href="{{ route('administration.league.show', ['league' => $league]) }}"
                                                class="btn bookin-btn"> <i class="fas fa-tags"></i> League Details</a>
                                            <a href="{{ route('administration.league.show', ['league' => $league]) }}"
                                                class="btn btn-bok-link"> <i class="fas fa-external-link-square-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="bg-img-left">
                <img src="{{ asset('frontend/images/NFL-Player-PNG-1.png') }}" alt="pngmb" />
            </div>

            <div class="red-bottrom">
                <img src="{{ asset('frontend/images/white_bottom_wave_01.png') }}" alt="pngmb" />
            </div>
        </div>
    </section>
    <section class="ads">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ban-ati-com ads-all-list">
                        @if (!is_null($bottom_ad)) 
                            <a href="{{ $bottom_ad->url }}">
                                <span>Ad</span>
                                <img src="{{ show_image($bottom_ad->avatar) }}" height="100" alt="" />
                            </a>
                        @else
                            <a href="/contact">
                                <span>Ad</span>
                                <img src="{{ asset('frontend/images/ad.png') }}" height="100" alt="" />
                            </a>
                        @endif
                    </div>
                </div>
            </div>
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
