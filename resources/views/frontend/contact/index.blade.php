@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Contact'))

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
    <b class="text-uppercase">{{ __('Contact') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Contact') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part sub-headh-bask pt-0">
        <div class="contact-page d-inline-block w-100">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 g-5">
                    <div class="col">
                        <div class="faq-section1 text-center">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo"  width="100%"/>
                            <h5 class="mt-3" style="text-align: initial;line-height: 30px;">
                                Welcome to Be Someone Sports' contact page! If you have any questions, inquiries, or are interested in getting involved with our sports programs, please don't hesitate to reach out. We've made it easy for you to connect with us. Simply fill out the form below with your name, email, and phone number. You can also let us know your specific interests, whether it's becoming a referee, a team mom, a coach, or joining our exciting league. We offer opportunities in both Pearland and Friendswood, so be sure to check the location that suits you best. We'll get back to you promptly with the information you need to get started on your sports journey with Be Someone Sports.
                            </h5>

                        </div>
                    </div>
                    <div class="col">
                        <div class="contact-use-div">
                            <h2>Contact Details</h2>
                            <ul class="list-untyled list-phone mt-4">
                                <li>
                                    <span class="d-block"> E-MAIL </span>
                                    <span> <i class="fas fa-envelope"></i> Info@besomeonesports.com</span>
                                </li>
                                <li>
                                    <span class="d-block"> ADDRESS </span>
                                    <span> <i class="fas fa-map-marker-alt"></i> Friendswood, Texas, United States </span>
                                </li>
                                <li>
                                    <span class="d-block"> PHONE </span>
                                    <span> <i class="fas fa-phone-alt"></i> 832-421-2895</span>
                                </li>
                            </ul>
                            <h2 class="mt-5">Get In Touch</h2>
                            <form name="fmn" action="" method="post">
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <input type="text" name="firstname" class="form-control"
                                                placeholder="First Name" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <input type="text" name="lastname" class="form-control"
                                                placeholder="Last Name" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <input type="text" name="email" class="form-control" placeholder="Email"
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
                                            <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label><strong>Interested in:</strong></label><br>
                                        <input type="checkbox" id="referee" name="interests[]" value="Referee"> Referee<br>
                                        <input type="checkbox" id="team_mom" name="interests[]" value="Team Mom"> Team Mom<br>
                                        <input type="checkbox" id="coach" name="interests[]" value="Coach"> Coach<br>
                                        <input type="checkbox" id="join_league" name="interests[]" value="Joining the League"> Joining the League<br>
                                        <input type="checkbox" id="more_info" name="interests[]" value="More Info about Be Someone Sports League"> More Info about Be Someone Sports League<br><br>
                                    </div>
                                    <div class="col-lg-12">    
                                        <label for="location"><strong>Select Location:</strong></label><br>
                                        <input type="checkbox" id="pearland" name="locations[]" value="Pearland"> Pearland<br>
                                        <input type="checkbox" id="friendswood" name="locations[]" value="Friendswood"> Friendswood<br><br>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="submit" name="submit" class="btn comon-btn" value="Submit" />
                                    </div>
                                </div>
                            </form>
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
