@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Statistics'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        .m-t-20 {
            margin-top: 20px;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Statistics') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Statistics') }}</li>
@endsection

@section('content')
    <!-- Start row -->
    <section class="float-start w-100">
        <div class="mediasection d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Be Someone Sports</h5>
                    <h1>Our <span> Statistics </span></h1>
                </div>
                <!-- Start row -->
                <div class="row">
                    <div class="col-md-12 m-b-20 mt-3 mb-3">
                        <div class="card">
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
