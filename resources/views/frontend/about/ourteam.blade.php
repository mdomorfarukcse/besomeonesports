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
        <div class="palyerspage d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Team</h5>
                    <h1>Our <span> Team </span></h1>
                </div>
        
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 g-lg-5 mt-0 mt-lg-4">
                    <div class="col">
                        <a href="player-details.html" class="crm-teams01">
                            <figure>
                                <img src="{{ asset('frontend/images/owner.png') }}" alt="teams01" />
                            </figure>
                            <div class="design">
                                <h5>Steven Passons</h5>
                                <p>Owner</p>
                            </div>
                        </a>
                    </div>
        
                    <div class="col">
                        <a href="player-details.html" class="crm-teams01">
                            <figure>
                                <img src="{{ asset('frontend/images/team07.jpg') }}" alt="teams01" />
                            </figure>
                            <div class="design">
                                <h5>Baker dane</h5>
                                <p>Manager</p>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="player-details.html" class="crm-teams01">
                            <figure>
                                <img src="{{ asset('frontend/images/team08.jpg') }}" alt="teams01" />
                            </figure>
                            <div class="design">
                                <h5>Clark dane</h5>
                                <p>Manager</p>
                            </div>
                        </a>
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
        <div class="location-div01 d-inline-block w-100">
            <div class="mindle-heading text-center">
                <h5>Map</h5>
                <h1>Office <span> Location </span></h1>
            </div>
            <span class="bgi-text light-tsext01"> Map </span>

            <iframe class="w-100 mt-5"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d444897.3091659081!2d-95.2459789!3d29.4065695!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640859fbe88c531%3A0x32451695f313c938!2sBe%20Someone%20Sports-%20Youth%20Sports%20%7C%20Youth%20Basketball%20%7C%20Youth%20Volleyball%20%7C%20AAU%20Tournaments!5e0!3m2!1sen!2sbd!4v1691411696578!5m2!1sen!2sbd"
                height="450" style="border: 0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
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
