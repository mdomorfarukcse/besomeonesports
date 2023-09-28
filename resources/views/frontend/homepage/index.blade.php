@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Homepage'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        .breadcrumb-section {
            display: none;
        }

        .slider-banner .cover {
            background-color: #11347985 !important;
        }
    </style>
@endsection


@section('content')

    <!-- Start row -->
    <section class="float-start w-100 banner-part">
        <div class="slider-banner">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('frontend/images/slider/slider4.jpg') }}" alt="images not found" />

                        <div class="cover">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="header-content">
                                            <h2 class="fadeInDown animated">Be Someone Sports</h2>
                                            <h1 class="fadeInDown animated">Winning and losing
                                                <span class="d-block">are a part of everyday life. </span>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('frontend/images/slider/slider2.jpg') }}" alt="images not found" />

                        <div class="cover">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="header-content">
                                            <h2 class="fadeInUp animated">Our Mission</h2>
                                            <h1 class="fadeInUp animated">
                                                Inspire and empower Individuals
                                                <span class="d-block">Through Sports.</span>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="gb-roguch">
            <img src="{{ asset('frontend/images/h1-bottom-background-image.png') }}" alt="pnm" />
        </div>
    </section>
    <section class="ads">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ban-ati-com ads-all-list">
                        <a href="#">
                            <span>Ad</span>
                            <img src="https://unsplash.it/g/1100/100" height="100" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="float-start w-100 ">
        <div class="about-sec-home">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 align-items-center">
                    <div class="col-md-6">
                        <h5>Our Club</h5>
                        <h1>About the <span> Be Someone Sports </span></h1>
                        <p class="my-3">
                            At Be Someone Sports, our missions is to inspire and empower individuals to achieve their
                            full potential through sports. We Strive to create a positive and inclusive environment
                            where everyone can develop their skills, build confidence, and experience the joys of
                            athletic achievement. Through our programs and activities, we aim to promote physical
                            fitness, teamwork, and sportsmanship, while instilling values as determination,
                            perseverance, and respect. Our ultimate goal is to help individuals become their best
                            selves, both on and off the courts.
                        </p>

                        <h6>Winning and losing are a part of <span>everyday life.</span> This is not the everyone wins
                            league.</h6>

                        <a href="{{ route('frontend.about.index') }}" class="btn btn-about">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z">
                                    </path>
                                </svg>
                            </span>
                            About More
                        </a>
                    </div>
                    <div class="col-md-6">
                        <figure class="m-0 right-ab0">
                            <img src="{{ asset('frontend/images/besomeonesport_about.jpg') }}" alt="pbm" />
                        </figure>
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
        <div class="our-spocerder d-inline-block w-100">
            <div class="container">
                <div class="col-lg-7">
                    <h1>Join Our <span> Organization </span></h1>
                    <h6 class="my-3">Be Someone Sports is a youth sports organization for volleyball and basketball in the
                        Friendswood, Pearland, Alvin, and League City Areas. Grades K - 8th.<span class="d-lg-block">
                            upcoming matches or sports events faster! </span></h6>
                    <div class="d-flex align-items-center">
                        <a href="#" class="btn subc"> Join Player !</a>
                        <a href="#" class="btn leaguebtn ms-4"> Become a Coach !</a>
                        {{-- <a href="#" class="btn leaguebtn ms-4"> All Leagues</a> --}}
                    </div>
                </div>
                <figure class="m-0 right-imgplya">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="gnm" />
                </figure>
            </div>
        </div>


        <div class="shop-apge-div">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Our Shop</h5>
                    <h1>Latest <span> Products </span></h1>
                </div>
                <div id="products" class="mt-4">
                    <div class="d-none d-md-block">
                        <div class="row g-lg-4 justify-content-between">

                            @foreach ($products as $keys => $product)
                                <div class="item list-item col-md-3 col-lg-3 col-xl-3 view-group grid-group-item collist">
                                    <div class="comon-items-d1">
                                        <a href="{{ route('frontend.shop.show', ['product' => $product]) }}"
                                            target="_blank" class="left-div-list">
                                            <figure class="mb-0">
                                                @if ($product->images->count() > 0)
                                                    <img src="{{ show_image($product->images->first()->path) }}"
                                                        alt="sm" />
                                                @else
                                                    <p>No images available</p>
                                                @endif
                                            </figure>
                                        </a>

                                        <div class="right-list-div ">
                                            <div class="d-flex mb-1 justify-content-between align-items-center">
                                                <h6 class="locations-ts">
                                                    <i class="fas fa-tags"></i>
                                                    @foreach ($product->categories as $category)
                                                        <a href="#" class="category">
                                                            {{ print_one_line($category->name, 20) }}
                                                        </a>
                                                    @endforeach
                                                </h6>
                                            </div>
                                            <a href="{{ route('frontend.shop.show', ['product' => $product]) }}"
                                                target="_blank" class="titel-product">
                                                {{ print_one_line($product->name) }}
                                            </a>

                                            <p>
                                                {{ print_one_line($product->description, 110) }}
                                            </p>
                                            <h2>${{ $product->price }}</h2>
                                            <div class="d-flex mt-3 align-items-center justify-content-between">
                                                <a href="{{ route('frontend.shop.show', ['product' => $product]) }}"
                                                    class="btn view-products mt-0">
                                                    Add To Cart
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <a href="{{ route('frontend.shop.index') }}" class="btn all-pro-btn mx-auto btn-about">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z">
                            </path>
                        </svg>
                    </span>
                    View All Products
                </a>
            </div>
        </div>

        <div class="our-small-details">
            <div class="container">
                <div class="row row-cols-2 row-cols-lg-4 g-4 g-lg-0">
                    <div class="col">
                        <div class="comon-divbn d-md-flex align-items-center">
                            <figure>
                                <img src="{{ asset('frontend/images/819590.png') }}" alt="pnbm" />
                            </figure>
                            <div class="right-dibvb">
                                <h2>{{ $total['leagues'] }} +</h2>
                                <h6>Total Leagues</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col d-lg-grid justify-content-lg-center">
                        <div class="comon-divbn d-md-flex align-items-center">
                            <figure>
                                <img src="{{ asset('frontend/images/8964688.png') }}" alt="pnbm" />
                            </figure>
                            <div class="right-dibvb">
                                <h2>{{ $total['players'] }} +</h2>
                                <h6>Players</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col d-lg-grid justify-content-lg-end">
                        <div class="comon-divbn d-md-flex align-items-center">
                            <figure>
                                <img src="{{ asset('frontend/images/33838.png') }}" alt="pnbm" />
                            </figure>
                            <div class="right-dibvb">
                                <h2>{{ $total['coaches'] }} +</h2>
                                <h6>Trained Coaches</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col d-lg-grid justify-content-lg-end">
                        <div class="comon-divbn d-md-flex align-items-center">
                            <figure>
                                <img src="{{ asset('frontend/images/1851036.png') }}" alt="pnbm" />
                            </figure>
                            <div class="right-dibvb">
                                <h2>{{ $total['teams'] }} +</h2>
                                <h6>Teams</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-small-back02">
                <img src="{{ asset('frontend/images/105418368_1510579202457512_85905419722283172_n.jpg') }}"
                    alt="sportsfbn" />
            </div>

            {{-- <div class="top-imgn">
                <img src="{{ asset('frontend/images/white-bg-01.png') }}" alt="bnm" />
            </div>
            <div class="bootom-imgn">
                <img src="{{ asset('frontend/images/white-bg-01-btom.png') }}" alt="bnm" />
            </div> --}}
        </div>

        <div class="mediasection d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Gallery</h5>
                    <h1>Our <span> Latest Media </span></h1>
                </div>
                <div class="row row-cols-2 row-cols-lg-4 mt-0 g-4 mt-3">
                    @foreach ($galleries as $key => $gallery)
                        <div class="col">
                            <a data-fancybox="{{ $gallery->name }}" href="{{ show_image($gallery->path) }}"
                                class="comon-links-divb05">
                                <figure>
                                    <img src="{{ show_image($gallery->path) }}" alt="{{ $gallery->name }}" />
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
    </section>
    <section class="float-start w-100">
        <div class="mediasection d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Videos</h5>
                    <h1>Our <span> Latest Video </span></h1>
                </div>
                <div class="row row-cols-2 row-cols-lg-4 mt-0 g-4 mt-3">
                    @foreach ($videos as $key => $video)
                        <div class="col-md-6">
                            <iframe width="100%" height="345" src="{{ $video->youtubeurl }}">
                            </iframe>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="ads">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ban-ati-com ads-all-list">
                        <a href="#">
                            <span>Ad</span>
                            <img src="https://unsplash.it/g/1100/100" height="100" alt="" />
                        </a>
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
