@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Gallery'))

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
    <b class="text-uppercase">{{ __('Gallery') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Gallery') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100">
        <div class="mediasection d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Gallery</h5>
                    <h1>Our <span> Latest Media </span></h1>
                </div>
                <div class="row row-cols-2 row-cols-lg-4 mt-0 g-4 mt-3">
                    @foreach ($galleries as $keys => $gallery)
                        <div class="col">
                            <a data-fancybox="wk" href="{{ show_image($gallery->path) }}" class="comon-links-divb05">
                                <figure>
                                    <img src="{{ show_image($gallery->path) }}" alt="{{ $gallery->name }}" />
                                    <figcaption>
                                        {{ $gallery->name }}
                                        @if (!is_null($gallery->league)) 
                                            {{ $gallery->league->name }}
                                        @endif
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    @endforeach
    
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
