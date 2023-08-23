@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Product Details'))

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
    <b class="text-uppercase">{{ __('Show Product Details') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Shop') }}</li>
    <li class="breadcrumb-item text-capitalize">{{ __('Products') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.shop.product.index') }}">{{ __('All Products') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.shop.product.edit', ['product' => $product]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-pen"></i>
        <b>Edit Product Info</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header bg-primary-rgba border-bottom">
                                <h5 class="card-title text-primary mb-0">Product's Details</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                {{-- <tr class="text-center">
                                                    <td colspan="2">
                                                        <div class="user-avatar">
                                                            <img src="{{ show_avatar($event->logo) }}" alt="Event Logo" class="img-thumbnail" width="250">
                                                        </div>    
                                                    </td>
                                                </tr> --}}
                                                <tr>
                                                    <th>Product ID</th>
                                                    <td class="text-bold text-primary">{{ $product->product_id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $product->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Purchase Price</th>
                                                    <td>${{ $product->purchase_price }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Selling Price</th>
                                                    <td>${{ $product->price }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Order</th>
                                                    <td>{{ count($product->orders) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{!! status($product->status) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th>Colors</th>
                                                    <td>
                                                        @foreach (json_decode($product->colors) as $color)
                                                            <span class="badge badge-dark-inverse text-bold py-1 px-2">
                                                                {{ $color }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Sizes</th>
                                                    <td>
                                                        @foreach (json_decode($product->sizes) as $size)
                                                            <span class="badge badge-dark-inverse text-bold py-1 px-2">
                                                                {{ $size }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Categories</th>
                                                    <td>
                                                        @foreach ($product->categories as $category)
                                                            <a href="{{ route('administration.shop.category.show', ['category' => $category]) }}" target="_blank" class="badge badge-dark text-bold py-1 px-2" data-toggle="tooltip" data-placement="top" title="Click to see {{ $category->name }} details">
                                                                {{ $category->name }}
                                                            </a>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                @if (!empty($product->description))
                                                    <tr>
                                                        <th>Description</th>
                                                        <td>{!! $product->description !!}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="card border">
                            <div class="card-header bg-primary-rgba border-bottom">
                                <h5 class="card-title text-primary mb-0">Product's Details</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    @foreach ($product->images as  $sl => $image)
                                        <div class="col-md-3">
                                            <div class="product_image">
                                                <img src="{{ asset('storage/' . $image->path) }}" alt="Product Image {{ $sl+1 }}" class="img-thumbnail">
                                                <a href="{{ route('administration.shop.product.destroy.image', ['image' => $image]) }}" class="btn btn-danger btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Delete?') }}" onclick="return confirm('Are You Sure Want To Delete?');" style="position: absolute; right: 20px; top: 5px;">
                                                    <i class="feather icon-trash-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        $('[data-toggle="tooltip"]').tooltip();
    </script>
@endsection
