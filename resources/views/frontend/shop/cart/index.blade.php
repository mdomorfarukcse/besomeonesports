@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Cart'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        .btn-clear-cart {
            font-weight: bold;
            margin-top: 15px !important;
            display: block;
            text-align: right;
            color: rgb(182, 0, 0);
            text-decoration: underline;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Cart') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page">
        <a href="{{ route('frontend.shop.index') }}">{{ __('Shop') }}</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Cart') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part pt-0">
        <div class="cart-page-div pt-5 d-inline-block w-100">
            <div class="container">
                <div class="row gx-lg-5">
                    <div class="col-lg-8">
                        <div class="cart-haedeing">
                            <h2 class="d-flex align-items-center justify-content-between mb-4">
                                My Cart
                                <span class="ms-lg-auto">
                                    {{ count(session('cart', [])) }} Items
                                </span>
                            </h2>


                            @foreach ($cart_items as $itemKey => $item)
                                @php
                                    $product = product_info($item['product_id']);

                                    $subtotal += $item['total'];
                                @endphp
                                <div class="comon-items-cart">
                                    <div class="left-section-div">
                                        <figure>
                                            @if ($product->images->count() > 0)
                                                <img src="{{ asset('storage/' . $product->images->first()->path) }}" alt="sm" />
                                            @else
                                                <p>No images available</p>
                                            @endif
                                        </figure>
                                        <div class="products-cart1">
                                            <h5>{{ print_one_line($product->name, 20) }}</h5>
                                            <ul>
                                                @if (!is_null($item['color']))
                                                    <li>
                                                        <span>
                                                            Color:
                                                        </span>
                                                        <span>
                                                            {{ $item['color'] }}
                                                        </span>
                                                    </li>
                                                @endif
                                                @if (!is_null($item['size']))
                                                    <li>
                                                        <span>
                                                            Size:
                                                        </span>
                                                        <span>
                                                            {{ $item['size'] }}
                                                        </span>
                                                    </li>
                                                @endif
                                                <li>
                                                    <span>
                                                        Price:
                                                    </span>
                                                    <span>
                                                        ${{ $item['price'] }}
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        Quantity
                                                    </span>
                                                    <span>
                                                        {{ $item['quantity'] }}
                                                    </span>
                                                </li>
                                            </ul>

                                            <a href="{{ route('frontend.shop.cart.clear.item', ['itemKey' => $itemKey]) }}" onclick="return confirm('Are you sure want to remove the item from cart?');" class="btn remove-btn p-0 mt-2 text-danger">
                                                <span> <i class="fas fa-trash"></i> </span> Remove
                                            </a>
                                        </div>
                                    </div>

                                    <div class="crat-linl-pay">
                                        <h4>${{ $item['total'] }}</h4>

                                        <div class="quantity-field">
                                            <button class="value-button decrease-button" onclick="decreaseValue(this)" title="Decrease Item">-</button>
                                            <div class="number">0</div>
                                            <button class="value-button increase-button" onclick="increaseValue(this, {{ $product->quantity }})" title="Increase Item">+</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="total-count-div">
                            <h4>Order Summary</h4>
                            <hr class="my-2" />
                            <ul class="pay-listy mt-4">
                                <li>
                                    <span class="list-payt">Subtotal <b>({{ count(session('cart', [])) }} Items)</b></span>
                                    <span class="price-bn">${{ $subtotal }}</span>
                                </li>
                                <li>
                                    <span class="list-payt">Delivery charges</span>
                                    <span class="price-bn">Free</span>
                                </li>
                            </ul>
                            <hr />
                            <h3><span>Total Cost</span> <span>${{ $subtotal }}</span></h3>
                            <a href="{{ route('frontend.shop.cart.checkout') }}" class="btn btncheck-btn mt-4">Checkout</a>
                            <a href="{{ route('frontend.shop.cart.clear') }}" onclick="return confirm('Are you sure want to clear the cart items?');" class="btn-clear-cart">
                                <i class="fas fa-times"></i>
                                Clear Cart
                            </a>
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
        function increaseValue(button, limit) {
            const numberShowingDiv = button.parentElement.querySelector(".number");
            var value = parseInt(numberShowingDiv.innerHTML, 10);
            if (isNaN(value)) value = 0;
            if (limit && value >= limit) return;
            numberShowingDiv.innerHTML = value + 1;
        }

        function decreaseValue(button) {
            const numberShowingDiv = button.parentElement.querySelector(".number");
            var value = parseInt(numberShowingDiv.innerHTML, 10);
            if (isNaN(value)) value = 0;
            if (value > 0) {
                numberShowingDiv.innerHTML = value - 1;
            }
        }
    </script>
@endsection
