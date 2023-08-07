@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Shop'))

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
    <b class="text-uppercase">{{ __('Shop') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Shop') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part pt-0">
        <div class="discover-details-page listing-details-adds py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-12">
                        <div id="products" class="mt-4">
                            <div class="d-none d-md-block">
                                <div class="row g-lg-4 justify-content-between">
                                    <div class="item list-item col-md-6 col-lg-6 col-xl-4 view-group grid-group-item collist">
                                        <div class="comon-items-d1">
                                            <a href="products-details.html" class="left-div-list">
                                                <figure class="mb-0">
                                                    <img src="{{ asset('frontend/images/football_boots_PNG37.png') }}" alt="sm" />
                                                    <span class="btn-sm strat-r"> 4.5 <i class="fas fa-star"></i> </span>
                                                </figure>
                                            </a>
    
                                            <div class="right-list-div">
                                                <div class="d-flex mb-1 justify-content-between align-items-center">
                                                    <h6 class="locations-ts"><i class="fas fa-tags"></i> shoes</h6>
                                                </div>
                                                <a href="#" class="titel-product"> Donec quis felis eu massa iaculis auctor et non nulla </a>
    
                                                <p>It is a long established fact that a reader will be distracted by the readable content ..</p>
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
                                                    <ul class="list-unstyled m-0">
                                                        <li>
                                                            <a class="btn comon-likke fv-list-n" data-bs-toggle="tooltip" data--bs-placement="top" title="Click to Shortlist">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a class="share-bn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="fas fa-share-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item list-item col-md-6 col-lg-6 col-xl-4 view-group grid-group-item collist">
                                        <div class="comon-items-d1">
                                            <a href="products-details.html" class="left-div-list">
                                                <figure class="mb-0">
                                                    <img src="{{ asset('frontend/images/football_boots_PNG37.png') }}" alt="sm" />
                                                    <span class="btn-sm strat-r"> 4.5 <i class="fas fa-star"></i> </span>
                                                </figure>
                                            </a>
    
                                            <div class="right-list-div">
                                                <div class="d-flex mb-1 justify-content-between align-items-center">
                                                    <h6 class="locations-ts"><i class="fas fa-tags"></i> shoes</h6>
                                                </div>
                                                <a href="#" class="titel-product"> Donec quis felis eu massa iaculis auctor et non nulla </a>
    
                                                <p>It is a long established fact that a reader will be distracted by the readable content ..</p>
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
                                                    <ul class="list-unstyled m-0">
                                                        <li>
                                                            <a class="btn comon-likke fv-list-n" data-bs-toggle="tooltip" data--bs-placement="top" title="Click to Shortlist">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a class="share-bn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="fas fa-share-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item list-item col-md-6 col-lg-6 col-xl-4 view-group grid-group-item collist">
                                        <div class="comon-items-d1">
                                            <a href="products-details.html" class="left-div-list">
                                                <figure class="mb-0">
                                                    <img src="{{ asset('frontend/images/football_boots_PNG37.png') }}" alt="sm" />
                                                    <span class="btn-sm strat-r"> 4.5 <i class="fas fa-star"></i> </span>
                                                </figure>
                                            </a>
    
                                            <div class="right-list-div">
                                                <div class="d-flex mb-1 justify-content-between align-items-center">
                                                    <h6 class="locations-ts"><i class="fas fa-tags"></i> shoes</h6>
                                                </div>
                                                <a href="#" class="titel-product"> Donec quis felis eu massa iaculis auctor et non nulla </a>
    
                                                <p>It is a long established fact that a reader will be distracted by the readable content ..</p>
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
                                                    <ul class="list-unstyled m-0">
                                                        <li>
                                                            <a class="btn comon-likke fv-list-n" data-bs-toggle="tooltip" data--bs-placement="top" title="Click to Shortlist">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a class="share-bn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="fas fa-share-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item list-item col-md-6 col-lg-6 col-xl-4 view-group grid-group-item collist">
                                        <div class="comon-items-d1">
                                            <a href="products-details.html" class="left-div-list">
                                                <figure class="mb-0">
                                                    <img src="{{ asset('frontend/images/football_boots_PNG37.png') }}" alt="sm" />
                                                    <span class="btn-sm strat-r"> 4.5 <i class="fas fa-star"></i> </span>
                                                </figure>
                                            </a>
    
                                            <div class="right-list-div">
                                                <div class="d-flex mb-1 justify-content-between align-items-center">
                                                    <h6 class="locations-ts"><i class="fas fa-tags"></i> shoes</h6>
                                                </div>
                                                <a href="#" class="titel-product"> Donec quis felis eu massa iaculis auctor et non nulla </a>
    
                                                <p>It is a long established fact that a reader will be distracted by the readable content ..</p>
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
                                                    <ul class="list-unstyled m-0">
                                                        <li>
                                                            <a class="btn comon-likke fv-list-n" data-bs-toggle="tooltip" data--bs-placement="top" title="Click to Shortlist">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a class="share-bn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="fas fa-share-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item list-item col-md-6 col-lg-6 col-xl-4 view-group grid-group-item collist">
                                        <div class="comon-items-d1">
                                            <a href="products-details.html" class="left-div-list">
                                                <figure class="mb-0">
                                                    <img src="{{ asset('frontend/images/football_boots_PNG37.png') }}" alt="sm" />
                                                    <span class="btn-sm strat-r"> 4.5 <i class="fas fa-star"></i> </span>
                                                </figure>
                                            </a>
    
                                            <div class="right-list-div">
                                                <div class="d-flex mb-1 justify-content-between align-items-center">
                                                    <h6 class="locations-ts"><i class="fas fa-tags"></i> shoes</h6>
                                                </div>
                                                <a href="#" class="titel-product"> Donec quis felis eu massa iaculis auctor et non nulla </a>
    
                                                <p>It is a long established fact that a reader will be distracted by the readable content ..</p>
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
                                                    <ul class="list-unstyled m-0">
                                                        <li>
                                                            <a class="btn comon-likke fv-list-n" data-bs-toggle="tooltip" data--bs-placement="top" title="Click to Shortlist">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a class="share-bn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="fas fa-share-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item list-item col-md-6 col-lg-6 col-xl-4 view-group grid-group-item collist">
                                        <div class="comon-items-d1">
                                            <a href="products-details.html" class="left-div-list">
                                                <figure class="mb-0">
                                                    <img src="{{ asset('frontend/images/football_boots_PNG37.png') }}" alt="sm" />
                                                    <span class="btn-sm strat-r"> 4.5 <i class="fas fa-star"></i> </span>
                                                </figure>
                                            </a>
    
                                            <div class="right-list-div">
                                                <div class="d-flex mb-1 justify-content-between align-items-center">
                                                    <h6 class="locations-ts"><i class="fas fa-tags"></i> shoes</h6>
                                                </div>
                                                <a href="#" class="titel-product"> Donec quis felis eu massa iaculis auctor et non nulla </a>
    
                                                <p>It is a long established fact that a reader will be distracted by the readable content ..</p>
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
                                                    <ul class="list-unstyled m-0">
                                                        <li>
                                                            <a class="btn comon-likke fv-list-n" data-bs-toggle="tooltip" data--bs-placement="top" title="Click to Shortlist">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a class="share-bn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="fas fa-share-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item list-item col-md-6 col-lg-6 col-xl-4 view-group grid-group-item collist">
                                        <div class="comon-items-d1">
                                            <a href="products-details.html" class="left-div-list">
                                                <figure class="mb-0">
                                                    <img src="{{ asset('frontend/images/football_boots_PNG37.png') }}" alt="sm" />
                                                    <span class="btn-sm strat-r"> 4.5 <i class="fas fa-star"></i> </span>
                                                </figure>
                                            </a>
    
                                            <div class="right-list-div">
                                                <div class="d-flex mb-1 justify-content-between align-items-center">
                                                    <h6 class="locations-ts"><i class="fas fa-tags"></i> shoes</h6>
                                                </div>
                                                <a href="#" class="titel-product"> Donec quis felis eu massa iaculis auctor et non nulla </a>
    
                                                <p>It is a long established fact that a reader will be distracted by the readable content ..</p>
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
                                                    <ul class="list-unstyled m-0">
                                                        <li>
                                                            <a class="btn comon-likke fv-list-n" data-bs-toggle="tooltip" data--bs-placement="top" title="Click to Shortlist">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a class="share-bn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="fas fa-share-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
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
