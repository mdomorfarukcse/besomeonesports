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
                                <img src="{{ asset('frontend/images/team06.jpg') }}" alt="teams01" />
                            </figure>
                            <div class="design">
                                <h5>Adams dane</h5>
                                <p>Director</p>
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
