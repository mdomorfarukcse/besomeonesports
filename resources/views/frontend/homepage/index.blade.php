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

    <section class="float-start w-100 ">
        <div class="about-sec-home">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 align-items-center">
                    <div class="col">
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

                        <h6>Winning and losing are a part of <span>everyday life.</span>  This is not the everyone wins league.</h6>

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
                    <div class="col">
                        <figure class="m-0 right-ab0">
                            <img src="{{ asset('frontend/images/home_about.png') }}" alt="pbm" />
                        </figure>
                    </div>
                </div>
            </div>
        </div>

        <div class="match-result-div">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Upcoming Events</h5>
                    <h1>REGISTER FOR EVENTS HERE</h1>
                </div>

                <div class="col-lg-9 mt-5 mx-auto">
                    <div class="next-matchu mt-4">
                        <div class="comon-matchbn">
                            <div class="topikn-div">
                                <div class="more-details-div d-md-flex align-items-center">
                                    <h5 class="m-0">
                                        <i class="fas fa-calendar-week"></i> June 05- August 04, 2023
                                    </h5>
                                    <h6>/ Friendswood Schools</h6>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-8">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-12">
                                                <div class="cul-div">
                                                    <h6>
                                                        Be Someone Sports Summer Basketball Leauge
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3 mt-md-0 d-flex justify-content-center justify-content-lg-end align-items-center">
                                        <a href="#" class="btn bookin-btn"> <i class="fas fa-tags"></i> Event Details</a>
                                        <a href="#" class="btn btn-bok-link"> <i class="fas fa-external-link-square-alt"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comon-matchbn">
                            <div class="topikn-div">
                                <div class="more-details-div d-md-flex align-items-center">
                                    <h5 class="m-0">
                                        <i class="fas fa-calendar-week"></i> March 6th - May 12th 2023
                                    </h5>
                                    <h6>/ Friendswood Schools</h6>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-8">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-12">
                                                <div class="cul-div">
                                                    <h6>
                                                        BE SOMEONE SPORTS FRIENDSWOOD VOLLEYBALL LEAGUE
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3 mt-md-0 d-flex justify-content-center justify-content-lg-end align-items-center">
                                        <a href="#" class="btn bookin-btn"> <i class="fas fa-tags"></i> Event Details</a>
                                        <a href="#" class="btn btn-bok-link"> <i class="fas fa-external-link-square-alt"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comon-matchbn">
                            <div class="topikn-div">
                                <div class="more-details-div d-md-flex align-items-center">
                                    <h5 class="m-0">
                                        <i class="fas fa-calendar-week"></i> March 6th - May 12th 2023
                                    </h5>
                                    <h6>/ Friendswood Schools</h6>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-8">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-12">
                                                <div class="cul-div">
                                                    <h6>
                                                        BE SOMEONE SPORTS FRIENDSWOOD VOLLEYBALL LEAGUE
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3 mt-md-0 d-flex justify-content-center justify-content-lg-end align-items-center">
                                        <a href="#" class="btn bookin-btn"> <i class="fas fa-tags"></i> Event Details</a>
                                        <a href="#" class="btn btn-bok-link"> <i class="fas fa-external-link-square-alt"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
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

        <div class="shop-apge-div">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Our Shop</h5>
                    <h1>Latest <span> Products </span></h1>
                </div>
                <div id="products" class="mt-4">
                    <div class="d-none d-md-block">
                        <div class="row g-lg-4 justify-content-between">
                            <div class="item list-item col-md-3 col-lg-3 col-xl-3 view-group grid-group-item collist">
                                <div class="comon-items-d1">
                                    <a href="#" class="left-div-list">
                                        <figure class="mb-0">
                                            <img src="{{ asset('frontend/images/botsman1.png') }}" alt="sm" />
                                        </figure>
                                    </a>
                
                                    <div class="right-list-div ">
                                        <div class="d-flex mb-1 justify-content-between align-items-center">
                                            <h6 class="locations-ts"><i class="fas fa-tags"></i> LIMITED EDITION</h6>
                                        </div>
                                        <a href="#" class="titel-product"> Houston R: matching warm up shirt, hoodie, backpack, sleeves, parent T-shirt, and coach T-shirt</a>
                                        <h2>$ 20</h2>
                                        <div class="d-flex mt-3 align-items-center justify-content-between">
                                            <button type="button" class="btn view-products mt-0">
                                                Add To Cart
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item list-item col-md-3 col-lg-3 col-xl-3 view-group grid-group-item collist">
                                <div class="comon-items-d1">
                                    <a href="#" class="left-div-list">
                                        <figure class="mb-0">
                                            <img src="{{ asset('frontend/images/botsman1.png') }}" alt="sm" />
                                        </figure>
                                    </a>
                
                                    <div class="right-list-div ">
                                        <div class="d-flex mb-1 justify-content-between align-items-center">
                                            <h6 class="locations-ts"><i class="fas fa-tags"></i> LIMITED EDITION</h6>
                                        </div>
                                        <a href="#" class="titel-product"> Houston R: matching warm up shirt, hoodie, backpack, sleeves, parent T-shirt, and coach T-shirt</a>
                                        <h2>$ 20</h2>
                                        <div class="d-flex mt-3 align-items-center justify-content-between">
                                            <button type="button" class="btn view-products mt-0">
                                                Add To Cart
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item list-item col-md-3 col-lg-3 col-xl-3 view-group grid-group-item collist">
                                <div class="comon-items-d1">
                                    <a href="#" class="left-div-list">
                                        <figure class="mb-0">
                                            <img src="{{ asset('frontend/images/botsman1.png') }}" alt="sm" />
                                        </figure>
                                    </a>
                
                                    <div class="right-list-div ">
                                        <div class="d-flex mb-1 justify-content-between align-items-center">
                                            <h6 class="locations-ts"><i class="fas fa-tags"></i> LIMITED EDITION</h6>
                                        </div>
                                        <a href="#" class="titel-product"> Houston R: matching warm up shirt, hoodie, backpack, sleeves, parent T-shirt, and coach T-shirt</a>
                                        <h2>$ 20</h2>
                                        <div class="d-flex mt-3 align-items-center justify-content-between">
                                            <button type="button" class="btn view-products mt-0">
                                                Add To Cart
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item list-item col-md-3 col-lg-3 col-xl-3 view-group grid-group-item collist">
                                <div class="comon-items-d1">
                                    <a href="#" class="left-div-list">
                                        <figure class="mb-0">
                                            <img src="{{ asset('frontend/images/botsman1.png') }}" alt="sm" />
                                        </figure>
                                    </a>
                
                                    <div class="right-list-div ">
                                        <div class="d-flex mb-1 justify-content-between align-items-center">
                                            <h6 class="locations-ts"><i class="fas fa-tags"></i> LIMITED EDITION</h6>
                                        </div>
                                        <a href="#" class="titel-product"> Houston R: matching warm up shirt, hoodie, backpack, sleeves, parent T-shirt, and coach T-shirt</a>
                                        <h2>$ 20</h2>
                                        <div class="d-flex mt-3 align-items-center justify-content-between">
                                            <button type="button" class="btn view-products mt-0">
                                                Add To Cart
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item list-item col-md-3 col-lg-3 col-xl-3 view-group grid-group-item collist">
                                <div class="comon-items-d1">
                                    <a href="#" class="left-div-list">
                                        <figure class="mb-0">
                                            <img src="{{ asset('frontend/images/botsman1.png') }}" alt="sm" />
                                        </figure>
                                    </a>
                
                                    <div class="right-list-div ">
                                        <div class="d-flex mb-1 justify-content-between align-items-center">
                                            <h6 class="locations-ts"><i class="fas fa-tags"></i> LIMITED EDITION</h6>
                                        </div>
                                        <a href="#" class="titel-product"> Houston R: matching warm up shirt, hoodie, backpack, sleeves, parent T-shirt, and coach T-shirt</a>
                                        <h2>$ 20</h2>
                                        <div class="d-flex mt-3 align-items-center justify-content-between">
                                            <button type="button" class="btn view-products mt-0">
                                                Add To Cart
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item list-item col-md-3 col-lg-3 col-xl-3 view-group grid-group-item collist">
                                <div class="comon-items-d1">
                                    <a href="#" class="left-div-list">
                                        <figure class="mb-0">
                                            <img src="{{ asset('frontend/images/botsman1.png') }}" alt="sm" />
                                        </figure>
                                    </a>
                
                                    <div class="right-list-div ">
                                        <div class="d-flex mb-1 justify-content-between align-items-center">
                                            <h6 class="locations-ts"><i class="fas fa-tags"></i> LIMITED EDITION</h6>
                                        </div>
                                        <a href="#" class="titel-product"> Houston R: matching warm up shirt, hoodie, backpack, sleeves, parent T-shirt, and coach T-shirt</a>
                                        <h2>$ 20</h2>
                                        <div class="d-flex mt-3 align-items-center justify-content-between">
                                            <button type="button" class="btn view-products mt-0">
                                                Add To Cart
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item list-item col-md-3 col-lg-3 col-xl-3 view-group grid-group-item collist">
                                <div class="comon-items-d1">
                                    <a href="#" class="left-div-list">
                                        <figure class="mb-0">
                                            <img src="{{ asset('frontend/images/botsman1.png') }}" alt="sm" />
                                        </figure>
                                    </a>
                
                                    <div class="right-list-div ">
                                        <div class="d-flex mb-1 justify-content-between align-items-center">
                                            <h6 class="locations-ts"><i class="fas fa-tags"></i> LIMITED EDITION</h6>
                                        </div>
                                        <a href="#" class="titel-product"> Houston R: matching warm up shirt, hoodie, backpack, sleeves, parent T-shirt, and coach T-shirt</a>
                                        <h2>$ 20</h2>
                                        <div class="d-flex mt-3 align-items-center justify-content-between">
                                            <button type="button" class="btn view-products mt-0">
                                                Add To Cart
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item list-item col-md-3 col-lg-3 col-xl-3 view-group grid-group-item collist">
                                <div class="comon-items-d1">
                                    <a href="#" class="left-div-list">
                                        <figure class="mb-0">
                                            <img src="{{ asset('frontend/images/botsman1.png') }}" alt="sm" />
                                        </figure>
                                    </a>
                
                                    <div class="right-list-div ">
                                        <div class="d-flex mb-1 justify-content-between align-items-center">
                                            <h6 class="locations-ts"><i class="fas fa-tags"></i> LIMITED EDITION</h6>
                                        </div>
                                        <a href="#" class="titel-product"> Houston R: matching warm up shirt, hoodie, backpack, sleeves, parent T-shirt, and coach T-shirt</a>
                                        <h2>$ 20</h2>
                                        <div class="d-flex mt-3 align-items-center justify-content-between">
                                            <button type="button" class="btn view-products mt-0">
                                                Add To Cart
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
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
                                <h2>781 +</h2>
                                <h6>Matches Winery</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col d-lg-grid justify-content-lg-center">
                        <div class="comon-divbn d-md-flex align-items-center">
                            <figure>
                                <img src="{{ asset('frontend/images/8964688.png') }}" alt="pnbm" />
                            </figure>
                            <div class="right-dibvb">
                                <h2>1200 +</h2>
                                <h6>Team Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col d-lg-grid justify-content-lg-end">
                        <div class="comon-divbn d-md-flex align-items-center">
                            <figure>
                                <img src="{{ asset('frontend/images/33838.png') }}" alt="pnbm" />
                            </figure>
                            <div class="right-dibvb">
                                <h2>10 +</h2>
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
                                <h2>15 +</h2>
                                <h6>Award</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-small-back02">
                <img src="{{ asset('frontend/images/105418368_1510579202457512_85905419722283172_n.jpg') }}"
                    alt="sportsfbn" />
            </div>

            <div class="top-imgn">
                <img src="{{ asset('frontend/images/white-bg-01.png') }}" alt="bnm" />
            </div>
            <div class="bootom-imgn">
                <img src="{{ asset('frontend/images/white-bg-01-btom.png') }}" alt="bnm" />
            </div>
        </div>

        <div class="mediasection d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Gallery</h5>
                    <h1>Our <span> Latest Media </span></h1>
                </div>
                <div class="row row-cols-2 row-cols-lg-4 mt-0 g-4 mt-3">
                    <div class="col">
                        <a data-fancybox="wk" href="{{ asset('frontend/images/pexels-photo-2834917.webp') }}"
                            class="comon-links-divb05">
                            <figure>
                                <img src="{{ asset('frontend/images/pexels-photo-2834917.webp') }}" alt="pbnm" />
                                <figcaption>
                                    FGC CUP 2022
                                </figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="col">
                        <a data-fancybox="wk"
                            href="{{ asset('frontend/images/basketball-professional-action-player-163423.jpg') }}"
                            class="comon-links-divb05">
                            <figure>
                                <img src="{{ asset('frontend/images/basketball-professional-action-player-163423.jpg') }}"
                                    alt="pbnm" />
                                <figcaption>
                                    FGC CUP 2022
                                </figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="col">
                        <a data-fancybox="wk" href="{{ asset('frontend/images/pexels-photo-974502.webp') }}"
                            class="comon-links-divb05">
                            <figure>
                                <img src="{{ asset('frontend/images/pexels-photo-974502.webp') }}" alt="pbnm" />
                                <figcaption>
                                    FGC CUP 2022
                                </figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="col">
                        <a data-fancybox="wk" href="{{ asset('frontend/images/pexels-photo-2116469.webp') }}"
                            class="comon-links-divb05">
                            <figure>
                                <img src="{{ asset('frontend/images/pexels-photo-2116469.webp') }}" alt="pbnm" />
                                <figcaption>
                                    FGC CUP 2022
                                </figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="col">
                        <a data-fancybox="wk"
                            href="{{ asset('frontend/images/football-american-football-quarterback-runner-163439.jpg') }}"
                            class="comon-links-divb05">
                            <figure>
                                <img src="{{ asset('frontend/images/football-american-football-quarterback-runner-163439.jpg') }}"
                                    alt="pbnm" />
                                <figcaption>
                                    FGC CUP 2022
                                </figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="col">
                        <a data-fancybox="wk" href="{{ asset('frontend/images/pexels-photo-974501.webp') }}"
                            class="comon-links-divb05">
                            <figure>
                                <img src="{{ asset('frontend/images/pexels-photo-974501.webp') }}" alt="pbnm" />
                                <figcaption>
                                    FGC CUP 2022
                                </figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="col">
                        <a data-fancybox="wk" href="{{ asset('frontend/images/pexels-photo-934083.webp') }}"
                            class="comon-links-divb05">
                            <figure>
                                <img src="{{ asset('frontend/images/pexels-photo-934083.webp') }}" alt="pbnm" />
                                <figcaption>
                                    FGC CUP 2022
                                </figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="col">
                        <a data-fancybox="wk" href="{{ asset('frontend/images/pexels-photo-2874717.jpg') }}"
                            class="comon-links-divb05">
                            <figure>
                                <img src="{{ asset('frontend/images/pexels-photo-2874717.jpg') }}" alt="pbnm" />
                                <figcaption>
                                    FGC CUP 2022
                                </figcaption>
                            </figure>
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
