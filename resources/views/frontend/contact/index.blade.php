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
                        <div class="contact-use-div">
                            <h2 class="">Get In Touch</h2>
                            <form name="fmn" action="{{ route('frontend.contact.store') }}" method="post" autocomplete="off">
                                @csrf
                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <div class="from-group">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Name*" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="from-group">
                                            <input type="text" name="email" class="form-control" placeholder="Email*"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="from-group">
                                            <input type="text" name="phone" class="form-control" placeholder="Phone*"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="from-group">
                                            <textarea class="form-control" name="message" placeholder="Message*" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-1">
                                        <label class="mb-1"><strong>Interested in:</strong></label><br>
                                        <input type="checkbox" id="Joining_League" name="interested_in[]" value="Joining a League"> Joining a League<br>
                                        <input type="checkbox" id="Becoming_Sponsor" name="interested_in[]" value="Becoming a Sponsor"> Becoming a Sponsor<br>
                                        <input type="checkbox" id="Becoming_Volunteer" name="interested_in[]" value="Becoming a Volunteer"> Becoming a Volunteer (Ref or Coach)<br>
                                        <input type="checkbox" id="General_Inquiry" name="interested_in[]" value="General Inquiry"> General Inquiry<br>
                                    </div>
                                    <div class="col-lg-12 mt-1">    
                                        <label for="location" class="mb-1"><strong>Sport of Interest</strong></label><br>
                                        <input type="checkbox" id="Basketball" name="location[]" value="Basketball"> Basketball<br>
                                        <input type="checkbox" id="Volleyball" name="location[]" value="Volleyball"> Volleyball<br>
                                        <input type="checkbox" id="FlagFootball" name="location[]" value="Flag Football"> Flag Football<br><br>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="button" class="btn comon-btn" disabled>Send Message</button>
                                    </div>
                                </div>
                            </form>
                            
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
                                    <span> <i class="fas fa-map-marker-alt"></i> 1620 S. Friendswood Drive, MBO #118 Friendswood, TX 77546 </span>
                                </li>
                                <li>
                                    <span class="d-block"> PHONE </span>
                                    <span> <i class="fas fa-phone-alt"></i> 409-270-6115</span>
                                </li>
                            </ul>
                            
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
