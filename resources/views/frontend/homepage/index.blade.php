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
    .breadcrumb-section{
        display: none;
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
                    <img src="{{ asset('frontend/images/banner1.jpg') }}" alt="images not found" />

                    <div class="cover">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="header-content">
                                        <h2 class="fadeInDown animated">Rcb Bulls</h2>
                                        <h1 class="fadeInDown animated">We Look up, <span class="d-block"> Never Give Up </span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend/images/banner2.jpg') }}" alt="images not found" />

                    <div class="cover">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="header-content">
                                        <h2 class="fadeInUp animated">Live On <span>8:30ET</span></h2>
                                        <h1 class="fadeInUp animated">
                                            United Leagues
                                            <span class="d-block">Season Begins </span>
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
                    <h1>About the <span> RCB Bulls </span></h1>
                    <p class="my-3">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>

                    <h6>It has survived <span>100+ win</span> not only five centuries, but also the leap into <span>30+ tropy</span> electronic typesetting</h6>

                    <a href="about.html" class="btn btn-about">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"></path>
                            </svg>
                        </span>
                        About More
                    </a>
                </div>
                <div class="col">
                    <figure class="m-0 right-ab0">
                        <img src="{{ asset('frontend/images/next01.png') }}" alt="pbm" />
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="match-result-div">
        <div class="container">
            <div class="mindle-heading text-center">
                <h5>Fixtures</h5>
                <h1>Latest Match Result</h1>
            </div>

            <div class="col-lg-9 mt-5 mx-auto">
                <div class="comon-results-div">
                    <div class="leag-name text-center">
                        <h4>United FC Cup</h4>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="club-items d-flex flex-column flex-lg-row align-items-start">
                                <figure>
                                    <img src="{{ asset('frontend/images/club1.png') }}" alt="bn" />
                                </figure>
                                <h5>
                                    Roethlon
                                    <span class="d-block">South America</span>
                                </h5>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="d-none d-lg-block">
                                <div class="vds-resut text-center">
                                    <div class="golas-divb mb-2">
                                        <h3>02 : 01</h3>
                                    </div>
                                    <div class="watch-div">
                                        <a href="#" class="btn btn-wtch1"> <i class="fas fa-play"></i> Match Highligt </a>
                                        <p class="mt-2 text-white"><i class="fas fa-map-marker-alt"></i> Edens,Melbourne</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block d-lg-none">
                                <h3 class="text-white text-center">VS</h3>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="club-items d-flex flex-column flex-lg-row flex-lg-row-reverse align-items-start">
                                <figure>
                                    <img src="{{ asset('frontend/images/club3.png') }}" alt="bn" />
                                </figure>
                                <h5>
                                    Roethlon
                                    <span class="d-block">South America</span>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="d-lg-none d-block">
                        <div class="vds-resut text-center my-4">
                            <div class="golas-divb mb-2">
                                <h3>02 : 01</h3>
                            </div>
                            <div class="watch-div">
                                <a href="#" class="btn btn-wtch1"> <i class="fas fa-play"></i> Match Highligt </a>
                                <p class="mt-2 text-white"><i class="fas fa-map-marker-alt"></i> Edens,Melbourne</p>
                            </div>
                        </div>
                    </div>

                    <div class="loction-div text-center"></div>
                </div>

                <div class="comon-results-div">
                    <div class="leag-name text-center">
                        <h4>United FC Cup</h4>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="club-items d-flex flex-column flex-lg-row align-items-start">
                                <figure>
                                    <img src="{{ asset('frontend/images/club1.png') }}" alt="bn" />
                                </figure>
                                <h5>
                                    Roethlon
                                    <span class="d-block">South America</span>
                                </h5>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="d-none d-lg-block">
                                <div class="vds-resut text-center">
                                    <div class="golas-divb mb-2">
                                        <h3>02 : 01</h3>
                                    </div>
                                    <div class="watch-div">
                                        <a href="#" class="btn btn-wtch1"> <i class="fas fa-play"></i> Match Highligt </a>
                                        <p class="mt-2 text-white"><i class="fas fa-map-marker-alt"></i> Edens,Melbourne</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block d-lg-none">
                                <h3 class="text-white text-center">VS</h3>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="club-items d-flex flex-column flex-lg-row flex-lg-row-reverse align-items-start">
                                <figure>
                                    <img src="{{ asset('frontend/images/club3.png') }}" alt="bn" />
                                </figure>
                                <h5>
                                    Roethlon
                                    <span class="d-block">South America</span>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="d-lg-none d-block">
                        <div class="vds-resut text-center my-4">
                            <div class="golas-divb mb-2">
                                <h3>02 : 01</h3>
                            </div>
                            <div class="watch-div">
                                <a href="#" class="btn btn-wtch1"> <i class="fas fa-play"></i> Match Highligt </a>
                                <p class="mt-2 text-white"><i class="fas fa-map-marker-alt"></i> Edens,Melbourne</p>
                            </div>
                        </div>
                    </div>

                    <div class="loction-div text-center"></div>
                </div>

                <div class="comon-results-div">
                    <div class="leag-name text-center">
                        <h4>United FC Cup</h4>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="club-items d-flex flex-column flex-lg-row align-items-start">
                                <figure>
                                    <img src="{{ asset('frontend/images/club1.png') }}" alt="bn" />
                                </figure>
                                <h5>
                                    Roethlon
                                    <span class="d-block">South America</span>
                                </h5>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="d-none d-lg-block">
                                <div class="vds-resut text-center">
                                    <div class="golas-divb mb-2">
                                        <h3>02 : 01</h3>
                                    </div>
                                    <div class="watch-div">
                                        <a href="#" class="btn btn-wtch1"> <i class="fas fa-play"></i> Match Highligt </a>
                                        <p class="mt-2 text-white"><i class="fas fa-map-marker-alt"></i> Edens,Melbourne</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block d-lg-none">
                                <h3 class="text-white text-center">VS</h3>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="club-items d-flex flex-column flex-lg-row flex-lg-row-reverse align-items-start">
                                <figure>
                                    <img src="{{ asset('frontend/images/club3.png') }}" alt="bn" />
                                </figure>
                                <h5>
                                    Roethlon
                                    <span class="d-block">South America</span>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="d-lg-none d-block">
                        <div class="vds-resut text-center my-4">
                            <div class="golas-divb mb-2">
                                <h3>02 : 01</h3>
                            </div>
                            <div class="watch-div">
                                <a href="#" class="btn btn-wtch1"> <i class="fas fa-play"></i> Match Highligt </a>
                                <p class="mt-2 text-white"><i class="fas fa-map-marker-alt"></i> Edens,Melbourne</p>
                            </div>
                        </div>
                    </div>

                    <div class="loction-div text-center"></div>
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
                <h1>Trending <span> Products </span></h1>
            </div>

            <div class="row mt-5">
                <div class="col-lg-5">
                    <div class="comonipro">
                        <figure class="m-0">
                            <img src="{{ asset('frontend/images/shop04.jpg') }}" alt="shop" />
                        </figure>
                        <div class="shop-no-dl">
                            <h3>sports <span class="d-block"> accessories </span></h3>
                            <p>It is a long established fact that</p>
                            <a href="#" class="btn btn-shopi">Shop now <i class="fas fa-angle-double-right"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="comonipro b-g-div">
                        <figure class="m-0">
                            <img src="{{ asset('frontend/images/shop02.jpg') }}" alt="shop" />
                        </figure>
                        <div class="shop-no-dl">
                            <h3>Outdoor <span class="d-block"> Collection </span></h3>
                            <p>It is a long established fact that</p>
                            <a href="#" class="btn btn-shopi">Shop now <i class="fas fa-angle-double-right"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="comonipro b-g-div">
                        <figure class="m-0">
                            <img src="{{ asset('frontend/images/ghbn01.jpg') }}" alt="shop" />
                        </figure>
                        <div class="shop-no-dl">
                            <h3>Fitness <span class="d-block"> Collection </span></h3>
                            <p>It is a long established fact that</p>
                            <a href="#" class="btn btn-shopi">Shop now <i class="fas fa-angle-double-right"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="comonipro shop-bg01">
                        <figure class="m-0">
                            <img src="{{ asset('frontend/images/shuio.jpg') }}" alt="shop" />
                        </figure>
                        <div class="shop-no-dl">
                            <h5>Sale Up to</h5>
                            <h3 class="">Shoes 30% off</h3>
                            <p>It is a long established fact that</p>
                            <a href="#" class="btn btn-shopi">Shop now <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <a href="shop.html" class="btn all-pro-btn mx-auto btn-about">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"></path>
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
            <img src="{{ asset('frontend/images/105418368_1510579202457512_85905419722283172_n.jpg') }}" alt="sportsfbn" />
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
                    <a data-fancybox="wk" href="{{ asset('frontend/images/pexels-photo-2834917.webp') }}" class="comon-links-divb05">
                        <figure>
                            <img src="{{ asset('frontend/images/pexels-photo-2834917.webp') }}" alt="pbnm" />
                            <figcaption>
                                FGC CUP 2022
                            </figcaption>
                        </figure>
                    </a>
                </div>

                <div class="col">
                    <a data-fancybox="wk" href="{{ asset('frontend/images/basketball-professional-action-player-163423.jpg') }}" class="comon-links-divb05">
                        <figure>
                            <img src="{{ asset('frontend/images/basketball-professional-action-player-163423.jpg') }}" alt="pbnm" />
                            <figcaption>
                                FGC CUP 2022
                            </figcaption>
                        </figure>
                    </a>
                </div>

                <div class="col">
                    <a data-fancybox="wk" href="{{ asset('frontend/images/pexels-photo-974502.webp') }}" class="comon-links-divb05">
                        <figure>
                            <img src="{{ asset('frontend/images/pexels-photo-974502.webp') }}" alt="pbnm" />
                            <figcaption>
                                FGC CUP 2022
                            </figcaption>
                        </figure>
                    </a>
                </div>

                <div class="col">
                    <a data-fancybox="wk" href="{{ asset('frontend/images/pexels-photo-2116469.webp') }}" class="comon-links-divb05">
                        <figure>
                            <img src="{{ asset('frontend/images/pexels-photo-2116469.webp') }}" alt="pbnm" />
                            <figcaption>
                                FGC CUP 2022
                            </figcaption>
                        </figure>
                    </a>
                </div>

                <div class="col">
                    <a data-fancybox="wk" href="{{ asset('frontend/images/football-american-football-quarterback-runner-163439.jpg') }}" class="comon-links-divb05">
                        <figure>
                            <img src="{{ asset('frontend/images/football-american-football-quarterback-runner-163439.jpg') }}" alt="pbnm" />
                            <figcaption>
                                FGC CUP 2022
                            </figcaption>
                        </figure>
                    </a>
                </div>

                <div class="col">
                    <a data-fancybox="wk" href="{{ asset('frontend/images/pexels-photo-974501.webp') }}" class="comon-links-divb05">
                        <figure>
                            <img src="{{ asset('frontend/images/pexels-photo-974501.webp') }}" alt="pbnm" />
                            <figcaption>
                                FGC CUP 2022
                            </figcaption>
                        </figure>
                    </a>
                </div>

                <div class="col">
                    <a data-fancybox="wk" href="{{ asset('frontend/images/pexels-photo-934083.webp') }}" class="comon-links-divb05">
                        <figure>
                            <img src="{{ asset('frontend/images/pexels-photo-934083.webp') }}" alt="pbnm" />
                            <figcaption>
                                FGC CUP 2022
                            </figcaption>
                        </figure>
                    </a>
                </div>

                <div class="col">
                    <a data-fancybox="wk" href="{{ asset('frontend/images/pexels-photo-2874717.jpg') }}" class="comon-links-divb05">
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
