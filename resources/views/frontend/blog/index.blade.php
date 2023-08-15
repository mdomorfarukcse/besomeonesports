@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Blog'))

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
    <b class="text-uppercase">{{ __('Blog') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Blog') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part pt-0">
        <div class="blogs-page d-inline-block w-100 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h2 class="comon-heading">Our Blogs</h2>
                    </div>
                    <div class="col-lg-7 d-lg-grid justify-content-lg-end">
                        <div class="d-flex align-items-center">
                            <p class="me-3">Showing 1-4 of 13 results</p>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort by Latest
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                    <li><a class="dropdown-item" href="#">A-Z</a></li>
                                    <li><a class="dropdown-item" href="#">Best Selling</a></li>
                                    <li><a class="dropdown-item" href="#">Most Popular</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 mt-0">
                    <div class="col">
                        <a href="{{ route('frontend.press.show') }}" class="comon-posrt w-100 d-inline-block">
                            <div class="img-boxv w-100 d-inline-block">
                                <figure class="w-100 d-inline-block">
                                    <img src="{{ asset('frontend/images/american-football-football-match-sport-team-163449.jpg') }}" alt="pbnm" />
                                </figure>
                                <span class="daet01">
                                    20
                                    <small class="d-block">Mar</small>
                                </span>
                            </div>
                            <div class="parar-delatsy">
                                <h6>Basketball</h6>
                                <h5>Vivamus quis nisi eu nunc</h5>
                                <p class="my-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                
                            </div>
                        </a>
                    </div>
    
                    <div class="col">
                        <a href="{{ route('frontend.press.show') }}" class="comon-posrt w-100 d-inline-block">
                            <div class="img-boxv w-100 d-inline-block">
                                <figure class="w-100 d-inline-block">
                                    <img src="{{ asset('frontend/images/american-football-football-match-sport-team-163449.jpg') }}" alt="pbnm" />
                                </figure>
                                <span class="daet01">
                                    10
                                    <small class="d-block">Jan</small>
                                </span>
                            </div>
                            <div class="parar-delatsy">
                                <h6>Basketball</h6>
                                <h5>Fusce accumsan urna</h5>
                                <p class="my-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                
                            </div>
                        </a>
                    </div>
    
                    <div class="col">
                        <a href="{{ route('frontend.press.show') }}" class="comon-posrt w-100 d-inline-block">
                            <div class="img-boxv w-100 d-inline-block">
                                <figure class="w-100 d-inline-block">
                                    <img src="{{ asset('frontend/images/american-football-football-match-sport-team-163449.jpg') }}" alt="pbnm" />
                                </figure>
                                <span class="daet01">
                                    14
                                    <small class="d-block">Jan</small>
                                </span>
                            </div>
                            <div class="parar-delatsy">
                                <h6>Basketball</h6>
                                <h5>Proin in arcu eu ligula</h5>
                                <p class="my-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                               
                            </div>
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
