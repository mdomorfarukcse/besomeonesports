@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Order'))

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
    <b class="text-uppercase">{{ __('Show Order') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Shop') }}</li>
    <li class="breadcrumb-item text-capitalize">{{ __('Orders') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.shop.order.index') }}">{{ __('All Orders') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.shop.order.show', ['order' => $order]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection


@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-header border-bottom">
                <h4 class="text-dark text-bold mb-0 float-left">Order Details</h4>
                @if (auth()->user()->can('shop_order.update')) 
                    <div class="btn-group float-right">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{ $order->status }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('administration.shop.order.status', ['order' => $order, 'status' => 'Active']) }}" @if ($order->status === 'Active') hidden @endif>Active</a>
                            <a class="dropdown-item" href="{{ route('administration.shop.order.status', ['order' => $order, 'status' => 'Running']) }}" @if ($order->status === 'Running') hidden @endif>Running</a>
                            <a class="dropdown-item" href="{{ route('administration.shop.order.status', ['order' => $order, 'status' => 'Delivery']) }}" @if ($order->status === 'Delivery') hidden @endif>Delivery</a>
                            <a class="dropdown-item" href="{{ route('administration.shop.order.status', ['order' => $order, 'status' => 'Completed']) }}" @if ($order->status === 'Completed') hidden @endif>Completed</a>
                            <a class="dropdown-item" href="{{ route('administration.shop.order.status', ['order' => $order, 'status' => 'Canceled']) }}" @if ($order->status === 'Canceled') hidden @endif>Canceled</a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header bg-primary-rgba border-bottom">
                                <h5 class="card-title text-primary mb-0">Order's Information</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>ORDER-ID</th>
                                                    <td class="text-primary text-bold">{{ $order->order_id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Product</th>
                                                    <td class="text-dark text-bold">
                                                        <ol>
                                                            @foreach ($order->products as $product)
                                                                <li>
                                                                    <a href="{{ route('administration.shop.product.show', ['product' => $product]) }}" class="text-info">
                                                                        <b>{{ $product->name }}</b>
                                                                    </a>
                                                                    <p>
                                                                        <small class="text-muted">
                                                                            <span class="text-bold">Price: </span> {{ $product->pivot->price }}
                                                                        </small>
                                                                        |
                                                                        <small class="text-muted">
                                                                            <span class="text-bold">Quantity: </span> {{ $product->pivot->quantity }}
                                                                        </small>
                                                                        |
                                                                        <small class="text-muted">
                                                                            <span class="text-bold">Color: </span> {{ $product->pivot->color }}
                                                                        </small>
                                                                        |
                                                                        <small class="text-muted">
                                                                            <span class="text-bold">Size: </span> {{ $product->pivot->size }}
                                                                        </small>
                                                                        |
                                                                        <small class="text-muted">
                                                                            <span class="text-bold">Total: </span> {{ $product->pivot->total }}
                                                                        </small>
                                                                    </p>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Total Price</th>
                                                    <td>{{ $order->total_price }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{!! status($order->status) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th>Order Created At</th>
                                                    <td>{{ show_date_time($order->created_at) }}</td>
                                                </tr>
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
                                <h5 class="card-title text-primary mb-0">Customer's Information</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    @auth
                                                        <td class="text-dark text-bold">
                                                            {{ $order->user->name }}
                                                            <br>
                                                            <small class="text-dark text-capitalize">
                                                                Role: {{ $order->user->roles->first()->name }}
                                                            </small>
                                                        </td>
                                                    @else
                                                        <td class="text-dark text-bold">
                                                            {{ $order->name }}
                                                        </td>
                                                    @endauth
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>
                                                        <a href="mailto:{{ $order->email }}" data-toggle="tooltip" data-placement="top" title="{{ __('Click Here To Send Mail') }}">
                                                            {{ $order->email }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Contact Number</th>
                                                    <td>{{ $order->contact_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>
                                                        {!! $order->address !!}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
        // Custom Script Here
        /* -- Bootstrap Tooltip -- */
        $('[data-toggle="tooltip"]').tooltip();
    </script>
@endsection