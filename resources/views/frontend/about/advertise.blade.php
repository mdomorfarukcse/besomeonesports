@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Advertise With Us'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        .advertise_package p {
            font-family: "Roboto", sans-serif;
            font-size: 16px;
            margin-top: 10px;
            line-height: 30px;
        }

        .advertise_package h2 {
            color: #000;
            font-weight: 600;
            font-family: "Kanit", sans-serif;
            text-transform: uppercase;
            font-style: normal;
            font-size: 24px;
        }

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

        .palyerspage .row>* {
            padding-right: 0px !important;
        }
        .packageUl{
            padding-left: 2rem !important;
        }
        .packageUl li {
            list-style: initial;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Advertise With Us') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Advertise With Us') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 sub-headh-bask body-part pt-0">
        <div class="palyerspage d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>OPPORTUNITIES</h5>
                    <h1>ADVERTISEMENT & <span> SPONSORSHIP </span></h1>
                </div>

                <div class="row  g-4  mt-0 mt-lg-4">
                    <div class="col-md-12">
                        <p>
                            Are you passionate about promoting youth development? Fostering teamwork and leadership skills?
                            Encouraging healthy lifestyles? At Be Someone Sports, we welcome partnerships with businesses,
                            organizations, and individuals who share our commitment to youth sports and character growth.
                            Becoming a sponsor for Be Someone Sports is an excellent opportunity to support local youth
                            while making a meaningful, direct impact in the community. As a sponsor, you have the chance to
                            align your brand with our mission of inspiring and empowering youth through a better sports
                            experience, while also gaining exposure to our large audience of local parents and community
                            members.
                        </p>
                    </div>
                    <div class="col-md-3 img-container mb-1">
                        <img src="{{ asset('frontend/images/421449507_880275670768834_7445506420641986119_n-min.jpg') }}"
                            alt="pic2" />
                    </div>
                    <div class="col-md-6 img-container mb-1">
                        <img src="{{ asset('frontend/images/423671500_885890126874055_724417257425006733_n-min.jpg') }}"
                            alt="pic2" />
                    </div>
                    <div class="col-md-3 img-container mb-1">
                        <img src="{{ asset('frontend/images/402861834_838495108280224_6478563944881123419_n-min.jpg') }}"
                            alt="pic2" />
                    </div>
                    <div class="col-md-12">
                        <p>
                            There are several ways to become a sponsor for Be Someone Sports. You can explore our <a
                                href="#advertise_package"><b>Sponsorship
                                    Package</b></a>, which offers various levels of involvement and benefits based
                            on your goals and budget. Whether you're interested in premier branding opportunities, event
                            sponsorships, or supporting specific programs, we have several options available for your
                            business
                            or organization. Additionally, we welcome custom sponsorships that allow you to further tailor
                            your
                            support. We can work together to create a personalized sponsorship package that aligns with your
                            values, objectives, and brand.
                        </p>
                    </div>
                    <div class="col-md-3 img-container mb-1">
                        <img src="{{ asset('frontend/images/5qTy9e7B-min.jpeg') }}" alt="pic2" />
                    </div>
                    <div class="col-md-6 img-container mb-1">
                        <img src="{{ asset('frontend/images/399866368_831379008991834_6990134224307206616_n-min.jpg') }}"
                            alt="pic2" />
                    </div>
                    <div class="col-md-3 img-container mb-1">
                        <img src="{{ asset('frontend/images/Be Someone Winter Basketball 01-27-24 (232)-min.jpg') }}"
                            alt="pic2" />
                    </div>
                    <p class="mt-1 mb-1">
                        Our sponsors’ support enables us to maximize the experience for our athletes, secure additional
                        facilities, expand program offerings, and provide financial assistance to ensure that every child
                        has the opportunity to participate, regardless of personal circumstances.
                    </p>
                    <p class="mt-1 mb-1"><b>Thank you for your sponsorship consideration and for assisting us in growing our legacy. </b></p>
                    <div class="col-md-12 " id="advertise_package">
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="">Packages</h2>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="pcolor">TITLE SPONSOR - $5000</h2>
                            <p><b>Sponsorship includes the following recognition : </b></p>
                            <ul class="packageUl">
                                <li>Recognition on the Be Someone website</li>
                                <li>Recognition on Be Someone social media channels</li>
                                <li>Two Company specific social media postings
                                    highlighting our partnership</li>
                                <li>Company name displayed on the Be Someone Sports
                                    App.
                                    </li>
                                <li>Branded table cloth with company logo (displayed at
                                    all games score table)
                                    </li>
                                <li>Company logo on prime location across all divisions
                                    jerseys</li>
                            </ul>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="pcolor">COURTSIDE SPONSOR - $2500</h2>
                            <p><b>Sponsorship includes the following recognition : </b></p>
                            <ul class="packageUl">
                                <li>Recognition on the organization’s website</li>
                                <li>Social media channels.</li>
                                <li>Logo will be placed on table cloths at scorers tables</li>
                                <li>Shoutout will be given at Championship Games</li>
                                <li>Two Company specific social media postingshighlighting our partnership</li>
                            </ul>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="pcolor">OFFICIAL TEAM SPONSOR - $1000</h2>
                            <p><b>Sponsorship includes recognition </b> on the organization’s website and
                                social media channels. All Team players will recieve team official
                                backpacks and warm up shirts with your logo.</p>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="pcolor">OFFICIAL SPONSOR - $500</h2>
                            <p><b>Sponsorship includes recognition </b> on the organization’s website and social media channels. </p>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="pcolor">PLAYER SPONSOR - $275</h2>
                            <p>Be Someone Sports Leagues are growing and have players of all income levels. We
                                have never turned a player away due to a lack of resources. With the growing cost of
                                everyday life, we are receiving more and more requests for financial assistance. If you
                                are interested in helping us give players the opportunity to play sports this would be
                                a great way to give back.</p>
                        </div>
                        <div class="mindle-heading text-center">
                            <h1>CHAMPIONSHIP OR <span> ALL STAR GAMES </span></h1>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h5  class="pcolor">CHAMPIONSHIP OR ALL-STAR GAMES</h5>
                            <h2 class="pcolor">TITLE SPONSOR - $3000</h2>
                            <p><b>Sponsorship includes the following benefits : </b></p>
                            <ul class="packageUl">
                                <li>Naming rights for Championship game</li>
                                <li>Recognition in all Championship activities &
                                    communications</li>
                                <li>Branded Photo backdrop where all team photos are
                                    taken</li>
                                <li>Recognition on the Be Someone Sports website</li>
                                <li>Recognition on Be Someone social media channels</li>
                                <li>Signage with company logo throughout
                                    Championship venue</li>
                            </ul>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h5  class="pcolor">ALL-STAR GAMES</h5>
                            <h2 class="pcolor">TEAM NAME - $2500</h2>
                            <p><b>Sponsorship includes the following benefits : </b></p>
                            <ul class="packageUl">
                                <li>Naming Rights to Half the teams playing in the AllStar Games</li>
                                <li>Customized All-Star Uniform for all teams to wear</li>
                                <li>Team Logo on Score Table cloth.</li>
                                <li>Recognition on the Be Someone Sports website</li>
                                <li>Recognition on Be Someone social media channels</li>
                                <li>Recognition during Championship games</li>
                            </ul>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h5  class="pcolor">ALL-STAR GAMES</h5>
                            <h2 class="pcolor">SKILLS CHALLEGE - $1,500</h2>
                            <p><b>Sponsorship includes the following benefits : </b></p>
                            <ul class="packageUl">
                                <li>Naming Rights to the skills Challenge</li>
                                <li>Skills challenge winners receive prizes branded by
                                    your company.</li>
                                <li>Back drop in gym for photo opportunities.</li>
                                <li>Recognition on the Be Someone Sports website</li>
                                <li>Recognition on Be Someone social media channels</li>
                                <li>Recognition on Be Someone social media channels</li>
                                <li>Recognition during Championship games Skills challenge will be played by division games included</li>
                                <li>Knockout</li>
                                <li>Free throw</li>
                                <li>3 - point contest</li>
                                <li>Dribbling Contest</li>
                            </ul>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h5 class="pcolor">CHAMPIONSHIP GAMES</h5>
                            <h2 class="pcolor">ENTERTAINMENT SPONSOR - $1,250</h2>
                            <p><b>Sponsorship includes the following benefits : </b></p>
                            <ul class="packageUl">
                                <li>Signage at DJ booth</li>
                                <li>Recognition on the Be Someone Sports website</li>
                                <li>Recognition on Be Someone social media channels</li>
                                <li>Recognition during Championship games</li>
                                <li>Logo on G.O.A.T. mascot uniform</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="contact-use-div mt-3 mt-lg-3 text-center">
                    <h2 class="mt-5">Get In Touch</h2>
                    <h5 class="pcolor mt-3">
                        Advertising and Sponsor Today! Contact us through the form below and a Be Someone Sports
                        representative will assist you.
                    </h5>
                    <form name="fmn" action="{{ route('frontend.contact.store') }}" method="post" autocomplete="off">
                        @csrf
                        <input type="text" name="form_type" value="sponsor" />
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <div class="from-group">
                                    <input type="text" name="firstname" class="form-control" placeholder="First Name"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="from-group">
                                    <input type="text" name="lastname" class="form-control" placeholder="Last Name"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="from-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email*"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="from-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="from-group">
                                    <textarea class="form-control" name="message"
                                        placeholder="Fill in the sponsorship package you are interested in or request a custom opportunity." required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" name="submit" class="btn btn-info" value="Submit" disabled/>
                            </div>
                        </div>
                    </form>
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
