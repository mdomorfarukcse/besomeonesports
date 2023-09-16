@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('App Info'))

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
    <b class="text-uppercase">{{ __('App Info') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('App Info') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 sub-headh-bask body-part pt-0 mb-4">
        <div class="about-page-main comon-sub-page-main ">
            <div class="about-club-top">
                <div class="container">
                    <div class="mindle-heading text-center">
                        <h5>App</h5>
                        <h1>Coming Soon....</h1>
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
