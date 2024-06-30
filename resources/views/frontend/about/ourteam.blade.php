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

        .about-club-top .row>* {
            padding-right: 0px !important;
        }
        blockquote {
            font-weight: 100;
            font-size: 2rem;
            max-width: 100%;
            line-height: 1.4;
            position: relative;
            margin: 0;
            padding: .5rem;
        }

        blockquote:before,
        blockquote:after {
            position: absolute;
            color: #00aaf087;
            font-size: 8rem;
            width: 4rem;
            height: 4rem;
        }

        blockquote:before {
            content: '“';
            left: -3rem;
            top: -2rem;
        }

        blockquote:after {
            content: '”';
            right: -4rem;
            bottom: 1rem;
        }

        cite {
            line-height: 3;
            text-align: left;
            font-size: 18px;
            font-weight: 600;
        }
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
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="samll-sub mb-1 mt-0">Founder</h5>
                            <h2 class="comon-heading m-0">About Our Founder</h2>
                            <p class="mt-3 mb-3">
                                Be Someone Sports was founded in 2020 by Steve Passons, a military veteran and dedicated
                                husband and father with a background in project management and operations. After making his
                                new home in Friendswood, TX, Steve realized something was missing in the local sports
                                landscape, and he was inspired to offer something truly special for children in the area. He
                                saw the need for a youth sports league that didn’t award every player a trophy, but instead
                                offered opportunities to grow, learn and thrive as athletes and as individuals.
                            </p>
                        </div>
                        <div class="col-md-5 img-container mb-1">
                            <a data-fancybox="wk"
                                href="{{ asset('frontend/images/399574686_831379125658489_3281076801928611589_n-min.jpg') }}">
                                <img src="{{ asset('frontend/images/399574686_831379125658489_3281076801928611589_n-min.jpg') }}"
                                    alt="pic2" />
                            </a>
                        </div>
                        <div class="col-md-3 img-container mb-1">
                            <a data-fancybox="wk"
                                href="{{ asset('frontend/images/399907775_828842799245455_5408226389578645788_n-min.jpg') }}">
                                <img src="{{ asset('frontend/images/399907775_828842799245455_5408226389578645788_n-min.jpg') }}"
                                    alt="pic2" />
                            </a>
                        </div>
                        <div class="col-md-4 img-container mb-1">
                            <a data-fancybox="wk"
                                href="{{ asset('frontend/images/402866285_838494524946949_2171351561660342628_n-min.jpg') }}">
                                <img src="{{ asset('frontend/images/402866285_838494524946949_2171351561660342628_n-min.jpg') }}"
                                    alt="pic2" />
                            </a>
                        </div>
                        <div class="col-md-12 mt-3 mb-3">
                            <p>
                                What started as a grassroots basketball league, spearheaded by Steve, quickly grew into a
                                new league of its own, attracting hundreds of children eager to participate. The
                                overwhelming response from the community led Steve to develop a one-of-a-kind youth sports
                                experience for school-aged kids in the Friendswood, Pearland, Alvin, League City, and
                                surrounding areas. The league encourages “city pride” and friendly competition among friends
                                within the same city and across city lines. With each season, Be Someone Sports continues to
                                expand its reach and impact, guided by Steve's dedication and commitment to creating an
                                environment where every child has the chance to Be Someone remarkable, both in sports and in
                                life.
                            </p>
                        </div>
                        <div class="col-md-12">
                            <blockquote>We want to create something special for the kids, An opportunity for them to Be Someone in sports and in life.</blockquote>
                            <cite>Steve Passons, Owner of Be Someone Sports</cite>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="float-start w-100">
            <div class="mediasection d-inline-block w-100">
                <div class="container">
                    <div class="mindle-heading text-center">
                        <h5>Video</h5>
                        <h1>Our <span> CEO Videos </span></h1>
                    </div>
                    <div class="row row-cols-2 row-cols-lg-4 mt-0 g-4 mt-3">
                        <div class="col-md-12">
                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/-H2GTIv9ZK8"
                                title="Be Someone Sports empowers young athletes and gives back to the community"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
