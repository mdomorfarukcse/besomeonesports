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
                            <form name="fmn" action="{{ route('frontend.contact.store') }}" method="post" autocomplete="off">
                                @csrf
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <input type="text" name="first_name" class="form-control"
                                                placeholder="First Name*" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <input type="text" name="last_name" class="form-control"
                                                placeholder="Last Name*" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <input type="text" name="email" class="form-control" placeholder="Email*"
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
                                        <input type="checkbox" id="referee" name="interested_in[]" value="Referee"> Referee<br>
                                        <input type="checkbox" id="team_mom" name="interested_in[]" value="Team Mom"> Team Mom<br>
                                        <input type="checkbox" id="coach" name="interested_in[]" value="Coach"> Coach<br>
                                        <input type="checkbox" id="join_league" name="interested_in[]" value="Joining the League"> Joining the League<br>
                                        <input type="checkbox" id="more_info" name="interested_in[]" value="More Info about Be Someone Sports League"> More Info about Be Someone Sports League<br><br>
                                    </div>
                                    <div class="col-lg-12">    
                                        <label for="location"><strong>Select Location:</strong></label><br>
                                        <input type="checkbox" id="pearland" name="location[]" value="Pearland"> Pearland<br>
                                        <input type="checkbox" id="friendswood" name="location[]" value="Friendswood"> Friendswood<br><br>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn comon-btn">Send Message</button>
                                    </div>
                                </div>
                            </form>
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
