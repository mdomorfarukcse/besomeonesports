@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Checkout'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        .ad-fm .form-control {
            height: auto;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Checkout') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page">
        <a href="{{ route('frontend.shop.index') }}">{{ __('Shop') }}</a>
    </li>
    <li class="breadcrumb-item" aria-current="page">
        <a href="{{ route('frontend.shop.cart.index') }}">{{ __('Cart') }}</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Checkout') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part pt-0">
        <div class="checkout-page-main-div my-5">
            <div class="container">
                <div class="form-wizard">
                    <form action="{{ route('frontend.shop.cart.checkout.store') }}" method="post" autocomplete="off">
                        @csrf
                        <fieldset class="wizard-fieldset show">
                            <div class="row g-lg-5">
                                <div class="col-lg-8">
                                    <div class="ad-fm">
                                        <div class="comon-steps-div mt-4">
                                            <h2 class="comon-heading m-0">Shipping Address</h2>
                                            <div class="row mt-3">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Full Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="name" class="form-control" required value="@auth{{ auth()->user()->name }}@endauth" placeholder="Full Name"/>
                                                        @error('name')
                                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Email <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" class="form-control" required value="@auth{{ auth()->user()->email }}@endauth" placeholder="Email Address"/>
                                                        @error('email')
                                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Contact Number <span class="text-danger">*</span></label>
                                                        <input type="tel" name="contact_number" class="form-control" required value="@auth{{ auth()->user()->contact_number }}@endauth" placeholder="Phone Number"/>
                                                        @error('contact_number')
                                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Full Address <span class="text-danger">*</span></label>
                                                        <small>(Country, City, Road No, House No, Flat No etc.)</small>
                                                        <textarea name="address" name="address" rows="4" class="form-control" required placeholder="Write your full shipping address"></textarea>
                                                        @error('address')
                                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="paymeny comon-steps-div mt-5">
                                            <h2 class="comon-heading m-0">Payment method</h2>
                                            <div class="d-flex align-items-center justify-content-between mt-4">
                                                <figure class="m-0">
                                                    <img src="{{ asset('frontend/images/visag01.jpg') }}" alt="Payments" />
                                                </figure>
                                            </div>

                                            <div class="account-page-n" id="ac-1">
                                                <div class="row row-cols-1 row-cols-lg-1">
                                                    <div class="col">
                                                        <div class="form-group mt-3">
                                                            <label> Cardholder Name </label>
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group mt-3">
                                                            <label> Card Number </label>
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex mt-3">
                                                    <div class="left-sec-d1">
                                                        <h4>End Date</h4>
                                                        <div class="end-date">
                                                            <select class="form-select">
                                                                <option selected>MM</option>
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                            </select>

                                                            <select class="form-select">
                                                                <option selected>YYYY</option>
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="left-sec-d2">
                                                        <h4>CVV</h4>
                                                        <div class="cvv">
                                                            <input type="text" class="form-control" />
                                                            <span> <i class="fas fa-exclamation-circle"></i> 3 digits</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="ceck-out-right-div new-checkout">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="page-titel comon-heading m-0">Your Order</h2>
                                        </div>

                                        <div class="oder-summary-item mt-4">
                                            <table class="table checkout-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cart_items as $itemKey => $item)
                                                        @php
                                                            $product = product_info($item['product_id']);

                                                            $subtotal += $item['total'];
                                                        @endphp
                                                        <tr>
                                                            <td>
                                                                <b>{{ print_one_line($product->name, 20) }}</b>
                                                                <br>
                                                                <b>Size:</b> {{ $item['size'] }} | <b>Color:</b> {{ $item['color'] }}
                                                            </td>
                                                            <td>x {{ $item['quantity'] }}</td>
                                                            <td>${{ $item['total'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="oder-right-details-new">
                                            <div class="price-sec-order">
                                                <p class="price-am">Price ({{ count(session('cart', [])) }} Items) <span> ${{ $subtotal }} </span></p>
                                                <p class="delivery-am">Delivery charges <span> Free </span></p>
                                                <div class="total-price p-0">
                                                    <p class="discount-am mb-lg-0">Total Amount <span> ${{ $subtotal }} </span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ============< Hidden Values >==================== --}}
                                    <input type="hidden" name="sub_total" value="{{ $subtotal }}">
                                    @auth
                                        <input type="hidden" name="user_id" value="{{ encrypt(auth()->user()->id) }}">
                                    {{-- @else
                                        <input type="hidden" name="user_id" value="{{ NULL }}"> --}}
                                    @endauth
                                    {{-- ============< Hidden Values >==================== --}}

                                    <button type="submit" class="form-wizard-next-btn btn w-100 text-center mt-3">Pay & Confirm Now</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
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
            const numberInput = button.parentElement.querySelector(".number-input");
            var value = parseInt(numberShowingDiv.innerHTML, 10);
            if (isNaN(value)) value = 0;
            if (limit && value >= limit) return;
            numberShowingDiv.innerHTML = value + 1;
            numberInput.value = value + 1;
        }

        function decreaseValue(button) {
            const numberShowingDiv = button.parentElement.querySelector(".number");
            const numberInput = button.parentElement.querySelector(".number-input");
            var value = parseInt(numberShowingDiv.innerHTML, 10);
            if (isNaN(value)) value = 0;
            if (value > 0) {
                numberShowingDiv.innerHTML = value - 1;
                numberInput.value = value - 1;
            }
        }
    </script>
@endsection
