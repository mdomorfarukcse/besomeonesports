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
