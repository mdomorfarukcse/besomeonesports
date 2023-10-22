@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Our Team'))

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
    <b class="text-uppercase">{{ __('Our Team') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Our Team') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 sub-headh-bask body-part pt-0">
        <div class="about-page-main comon-sub-page-main d-inline-block w-100">
            <div class="about-club-top">
                <div class="container">
                    <div class="mindle-heading text-center">
                        <h5>Owner</h5>
                        <h1>Our <span> Owner </span></h1>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 g-lg-5 mt-0 mt-lg-4">
                        <div class="col position-relative">
                            <figure class="big-img">
                                <img src="{{ asset('frontend/images/owner.png') }}" alt="pic" />
                            </figure>
                        </div>
                        <div class="col">
                            <h5 class="samll-sub mb-1 mt-0">Owner</h5>
                            <h2 class="comon-heading m-0">Steven Passons</h2>
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
