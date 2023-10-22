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
        font-family: "Roboto",sans-serif;
        font-size: 16px;
        margin-top: 10px;
        line-height: 30px;
    }
    .advertise_package h2 {
        color: #000;
        font-weight: 600;
        font-family: "Kanit",sans-serif;
        text-transform: uppercase;
        font-style: normal;
        font-size: 24px;
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
                    <h1>ADVERTISEMENT & <span> SPONSORSHIP  </span></h1>
                </div>
        
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 g-lg-5 mt-0 mt-lg-4">
                    <div class="col-md-12 ">
                        <div class="top_image text-center">
                            <img src="{{ asset('frontend/images/advertise_with_us.png') }}" alt="advertise with us" width="60%"/>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="">Packages</h2>
                            <p>
                                Be Someone Sports is a 501c3 nonprofit youth sports organization. We currently host leagues for basketball and volleyball. Our missions is to inspire and empower individuals to achieve their full potential through sports. We Strive to create a positive and inclusive environment where everyone can develop their skills, build confidence, and experience the joys of athletic achievement. Through our programs and activities, we aim to promote physical fitness, teamwork, and sportsmanship, while instilling values as determination, perseverance, and respect. Our ultimate goal is to help individuals become their best selves, both on and off the courts. The cost is $230 - $250 per player which can be out of reach for some families. We offer both anonymous and also a chance to promote a donor’s organization of choice if desired. We thank you for your sponsorship consideration and for assisting us in growing our legacy. Please review the sponsorship benefits for the level that best fits you:

                            </p>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="pcolor">Premier Partner Sponsor - $5000</h2>
                            <p>
                                Sponsorship includes recognition on the organization’s website and social media channels.
                                Your logo will go on all Power ranking fliers posted, league leaders fliers posted, and player of the week fliers posted. Your banner will be on all scorers tables. Shouts outs at all Championship Games. 
                            </p>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="pcolor">Platinum Sponsor - $2500</h2>
                            <p>
                                Sponsorship includes recognition on the organization’s website and social media channels. 
                                Signage at the tournament games gym entrances. Shoutout at the Championship Game.
                            </p>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="pcolor">Gold Sponsor - $1000</h2>
                            <p>
                                Sponsorship includes recognition on the organization’s website and social media channels. 
                                Signage at the Championship games gym entrances Shoutout at the Championship Game.
                            </p>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="pcolor">Silver Sponsor - $500</h2>
                            <p>
                                Sponsorship includes recognition on the organization’s website and social media channels. 
                                Signage at the Championship games gym entrances.
                            </p>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="pcolor">Bronze Sponsor - $275</h2>
                            <p>
                                Sponsorship includes recognition on the organization’s website and social media channels. 
                            </p>
                        </div>
                        <div class="advertise_package mt-3 mt-lg-3">
                            <h2 class="pcolor">Donation - </h2>
                            <p>
                                Sponsorship includes recognition on the organization’s website. 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="contact-use-div mt-3 mt-lg-3 text-center">
                    <h2 class="mt-5">Get In Touch</h2>
                    <h5 class="pcolor mt-3">
                        Advertising and Sponsor Today! Contact us through the form below and a Be Someone Sports representative will assist you.
                    </h5>
                    <form name="fmn" action="" method="post">
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <div class="from-group">
                                    <input type="text" name="firstname" class="form-control" placeholder="First Name" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="from-group">
                                    <input type="text" name="lastname" class="form-control" placeholder="Last Name" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="from-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="from-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone" required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="from-group">
                                    <textarea class="form-control" name="message" placeholder="Fill in the sponsorship package you are interested in or request a custom opportunity." required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="from-group">
                                    <textarea class="form-control" name="notes" placeholder="Other notes" ></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" name="submit" class="btn btn-info" value="Submit" />
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
