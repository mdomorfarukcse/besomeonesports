@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Mission'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        .img-container {
            height: 450px;
            /* Fixed height for image containers */
            overflow: hidden;
            /* Ensure images don't overflow their container */
        }

        .img-container img {
            width: 100%;
            /* Make images fill their container */
            height: 100%;
            /* Make images fill the height of their container */
            object-fit: cover;
            /* Maintain aspect ratio while covering the container */
        }
        .about-club-top .row>*{
            padding-right: 0px !important; 
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Mission') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Mission') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 sub-headh-bask body-part pt-0">
        <div class="about-page-main comon-sub-page-main d-inline-block w-100 mb-5">
            <div class="about-club-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="samll-sub mb-1 mt-0">Our Story</h5>
                            <h2 class="comon-heading m-0">Mission</h2>
                            <p class="mt-3 mb-3">
                                At Be Someone Sports, we are on a mission to empower young athletes through a better youth
                                sports experience. Be Someone Sports was founded to inspire individuals to achieve their
                                full potential through the power of sports. We aim to ignite the spark of confidence that
                                comes with discovering one’s strengths and capabilities. Our goal is to help our athletes
                                hone their skills and talents, and ultimately become the best version of themselves – both
                                on and off the court or field.
                            </p>
                        </div>
                        <div class="col-md-3 img-container mb-1">
                            <img src="{{ asset('frontend/images/028_BSS_All-Stars-min.jpg') }}" alt="pic2" />
                        </div>
                        <div class="col-md-6 img-container mb-1">
                            <img src="{{ asset('frontend/images/about1.jpg') }}" alt="pic2" />
                        </div>
                        <div class="col-md-3 img-container mb-1">
                            <img src="{{ asset('frontend/images/010_BSS_All-Stars (2)-min.jpg') }}" alt="pic2" />
                        </div>
                        <div class="col-md-12 mt-3 mb-3">
                            <p>
                                Through our programs and activities, we aim to promote physical fitness, teamwork, and
                                sportsmanship, while instilling values such as determination, perseverance, and respect. Our
                                commitment is to provide a program where young athletes can excel, not only in their
                                athletic abilities but also in their character development. Whether dribbling a basketball,
                                catching a football, or serving a volleyball, our leagues are designed to inspire teamwork,
                                resilience, and a love for the game.
                            </p>
                        </div>
                        <div class="col-md-3 img-container">
                            <img src="{{ asset('frontend/images/Be Someone Winter Basketball 01-27-24 (77)-min.jpg') }}" alt="pic2" />
                        </div>
                        <div class="col-md-6 img-container">
                            <img src="{{ asset('frontend/images/Be Someone Volleyball All Star Game 11-18-23 (207)-min.jpg') }}" alt="pic2" />
                        </div>
                        <div class="col-md-3 img-container">
                            <img src="{{ asset('frontend/images/BeSomone Sports Basketball  Summer 2023 All Star Game 08-19-23 (286) (1)-min.jpg') }}" alt="pic2" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="match-result-div">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Upcoming Leagues</h5>
                    <h1>REGISTER NOW</h1>
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
        <div class="about-page-main comon-sub-page-main d-inline-block w-100">
            <div class="about-club-top">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="mindle-heading text-center">
                                <h5>Follow Us</h5>
                                <h1>Our <span> Instragram </span></h1>
                            </div>
                            <iframe class="instagram-media instagram-media-rendered" id="instagram-embed-0"
                                src="https://www.instagram.com/be_someonesports/embed/?cr=1&amp;v=13&amp;wp=1296&amp;rd=http%3A%2F%2Fbesomeonesports.test&amp;rp=%2Fmission#%7B%22ci%22%3A0%2C%22os%22%3A457.19999998807907%2C%22ls%22%3A287.19999998807907%2C%22le%22%3A362.69999998807907%7D"
                                allowtransparency="true" allowfullscreen="true" frameborder="0" height="1064"
                                data-instgrm-payload-id="instagram-media-payload-0" scrolling="no"
                                style="background-color: white;border-radius: 3px;border: 1px solid rgb(219, 219, 219);box-shadow: none;display: block;margin: 0px 0px 12px;min-width: 326px;padding: 0px;width: 100%;"></iframe>
                        </div>
                    </div>
                </div>
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
