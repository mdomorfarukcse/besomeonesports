@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Shop'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        figure {
            width: 100% !important;
            height: auto !important;
            overflow: hidden;
        }
        
        figure img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .comon-items-d1 h6 {
            color: #00aeee;
            font-size: 14px;
        }
        .comon-items-d1 h6 .category {
            color: #ffffff;
            background-color: #00aeee;
            padding: 3px;
            margin: 0 3px;
            font-size: 12px;
            font-weight: 500;
            line-height: 30px;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Shop') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Shop') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part pt-0">
        <div class="discover-details-page listing-details-adds py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-12">
                        <div id="products" class="mt-4">
                            <div class="d-none d-md-block">
                                <div class="row g-lg-4">
                                    @foreach ($products as $product) 
                                        <div class="item list-item col-md-4 view-group grid-group-item collist text-center">
                                            <div class="comon-items-d1">
                                                <a href="{{ route('frontend.shop.show', ['product' => $product]) }}" class="left-div-list">
                                                    <figure class="mb-0">
                                                        @if ($product->images->count() > 0)
                                                            <img src="{{ show_image($product->images->first()->path) }}" alt="sm" />
                                                        @else
                                                            <p>No images available</p>
                                                        @endif
                                                    </figure>
                                                </a>
        
                                                <div class="right-list-div">
                                                    <div class="d-flex mb-1 justify-content-between align-items-center">
                                                        <h6 class="locations-ts">
                                                            <i class="fas fa-tags"></i> 
                                                            @foreach ($product->categories as $category) 
                                                                <a href="#" class="category">
                                                                    {{ $category->name }}
                                                                </a>
                                                            @endforeach
                                                        </h6>
                                                    </div>
                                                    <a href="{{ route('frontend.shop.show', ['product' => $product]) }}" target="_blank" class="titel-product">
                                                        {{ print_one_line($product->name) }}
                                                    </a>
        
                                                    <p>
                                                        {{ print_one_line($product->description, 110) }}
                                                    </p>
                                                    <h2>${{ $product->price }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="d-flex justify-content-center">
                                        {{ $products->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
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
