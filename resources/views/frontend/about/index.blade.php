@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('About Us'))

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
    <b class="text-uppercase">{{ __('About Us') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('About Us') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 sub-headh-bask body-part pt-0">
        <div class="about-page-main comon-sub-page-main d-inline-block w-100">
            <div class="about-club-top">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-2 g-lg-5">
                        <div class="col position-relative">
                            <figure class="big-img">
                                <img src="{{ asset('frontend/images/about.webp') }}" alt="pic" />
                            </figure>
                            <figure class="small-img">
                                <img src="{{ asset('frontend/images/pexels-photo-5586481.webp') }}" alt="pic2" />
                            </figure>
                        </div>
                        <div class="col">
                            <h5 class="samll-sub mb-1 mt-0">Our Story</h5>
                            <h2 class="comon-heading m-0">About Us</h2>
                            <p class="mt-3">
                                Be Someone Sports was created to upgrade every aspect of youth sports and to provide a fun
                                family friendly environment for everyone to enjoy. We offer Recreational Basketball and
                                Volleyball leagues for kids of all school ages in the Friendswood and Pearland areas. We
                                host Select tournaments and sports camps.
                            </p>
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
