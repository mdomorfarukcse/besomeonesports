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
        .form-control {
            padding: 1rem;
            font-size: 1.25rem;
            font-weight: 500;
        }
        .btn:focus, .form-control:focus, .resizeselect:focus {
            box-shadow: none;
            border: 1px solid;
            outline: 0;
        }
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
                    <div class="col-lg-4 mb-5">
                        <form action="{{ route('frontend.shop.order.track') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="total-count-div">
                                <h4>Track Order</h4>
                                <hr class="my-2" />
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" name="order_id" class="form-control text-bold" required value="@if(!is_null($order)){{ $order->order_id }}@endif" placeholder="ORDER ID"/>
                                        @error('order_id')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btncheck-btn mt-4">Track Order Details</button>
                            </div>
                        </form>
                    </div>
                    @if (!is_null($order))
                        <div class="col-lg-8 mb-5">
                            <div class="total-count-div">
                                <h4>Order Details Summary</h4>
                                <hr class="my-2" />
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <td>
                                                        <b class="text-dark">
                                                            {{ $order->order_id }}
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <td>
                                                        <b class="text-dark">
                                                            {{ $order->transaction_id }}
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Invoice ID</th>
                                                    <td>
                                                        <b class="text-dark">
                                                            {{ $order->invoice_number }}
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{{ $order->status }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Order Placed At</th>
                                                    <td>{{ date_time_ago($order->created_at) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Cutomer Info</th>
                                                    <td>
                                                        <p>
                                                            <b>Name:</b>
                                                            <span>{{ $order->name }}</span>
                                                        </p>
                                                        <p>
                                                            <b>Email:</b>
                                                            <span>{{ $order->email }}</span>
                                                        </p>
                                                        <p>
                                                            <b>Phone:</b>
                                                            <span>{{ $order->contact_number }}</span>
                                                        </p>
                                                        <p>
                                                            <b>Address:</b>
                                                            <span>{{ $order->address }}</span>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Products</th>
                                                    <td>
                                                        <ol style="margin-left: 15px;">
                                                            @foreach ($order->products as $product)
                                                                <li>
                                                                    <a href="{{ route('frontend.shop.show', ['product' => $product]) }}" class="text-info">
                                                                        <b>{{ $product->name }}</b>
                                                                    </a>
                                                                    <p>
                                                                        <span>
                                                                            <b>Price: </b> {{ $product->pivot->price }}
                                                                        </span>
                                                                        |
                                                                        <span>
                                                                            <b>Quantity: </b> {{ $product->pivot->quantity }}
                                                                        </span>
                                                                        |
                                                                        <span>
                                                                            <b>Color: </b> {{ $product->pivot->color }}
                                                                        </span>
                                                                        |
                                                                        <span>
                                                                            <b>Size: </b> {{ $product->pivot->size }}
                                                                        </span>
                                                                        |
                                                                        <span>
                                                                            <b>Total: </b> {{ $product->pivot->total }}
                                                                        </span>
                                                                    </p>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Sub Total</th>
                                                    <td>{{ $order->total_price }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
