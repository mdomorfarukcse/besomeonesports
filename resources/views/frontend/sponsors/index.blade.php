@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Sponsors'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        .single_sponsor{
            background: #fff;
            display: inline-block;
            width: 100%;
            padding: 15px;
            height: 150px;
            border-radius: 10px;
            border: 1px solid #333;
            margin-bottom: 20px;
        }
        .single_sponsor img{
            height: 120px;
            width: 100%;
        }
        .mb-50{
            margin-bottom: 50px;
        }
        .mb-100{
            margin-bottom: 100px;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Sponsors') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Sponsors') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 sub-headh-bask body-part pt-0 mb-50">
        <div class="about-page-main comon-sub-page-main d-inline-block w-100">
            <div class="about-club-top">
                <div class="container">
                    <div class="row ">
                        <div class="text-center mb-50">
                            <h5 class="samll-sub mb-1 mt-0">Be Someone Sports</h5>
                            <h2 class="comon-heading m-0">Sponsors</h2>
                        </div>
                        @foreach ($sponsors as $key => $sponsor)
                            <div class="col-md-2">
                                <a href="{{ $sponsor->url }}">
                                    <div class="single_sponsor">
                                        <img src="{{ show_image($sponsor->avatar) }}" alt="{{ $sponsor->name }}"/>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ads">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="carouselads" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active ">
                                <div class="ban-ati-com ads-all-list">
                                    <a href="/contact">
                                        <span>Ad</span>
                                        <img src="{{ asset('frontend/images/register.png') }}" height="100" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="carousel-item  ">
                                <div class="ban-ati-com ads-all-list">
                                    <a href="">
                                        <span>Ad</span>
                                        <img src="{{ asset('frontend/images/ad.png') }}" height="100" alt="" />
                                    </a>
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
