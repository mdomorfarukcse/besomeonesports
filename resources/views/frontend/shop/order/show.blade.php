@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Track Order'))

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
    <b class="text-uppercase">{{ __('Track Order') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page">
        <a href="{{ route('frontend.shop.index') }}">{{ __('Shop') }}</a>
    </li>
    <li class="breadcrumb-item" aria-current="page">{{ __('Order') }}</li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Track Cart') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part pt-0">
        <div class="cart-page-div pt-5 d-inline-block w-100">
            <div class="container">
                <div class="row gx-lg-5">
                    {{-- {{ dd($order) }} --}}
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
        // Custom Scripts
    </script>
@endsection
