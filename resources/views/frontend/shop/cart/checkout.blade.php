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
            font-weight: 500;
            height: auto;
            color: #000;
            background-color: #fefefe;
            border: 1px solid #aaa;
        }

        .ad-fm .form-control::placeholder {
            color: #dddddd; /* Replace with your desired color code */
            /* Vendor-specific prefixes */
            -webkit-text-fill-color: #dddddd; /* For Chrome, Safari, and Opera */
            -moz-placeholder: #dddddd; /* For Firefox 18-28 */
            -ms-input-placeholder: #dddddd; /* For IE 10+ */
            placeholder: #dddddd; /* Standard property */
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
                                                        <input type="text" name="name" class="form-control" required value="@auth{{ auth()->user()->name }}@else{{ old('name') }}@endauth" placeholder="Full Name"/>
                                                        @error('name')
                                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Email <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" class="form-control" required value="@auth{{ auth()->user()->email }}@else{{ old('email') }}@endauth" placeholder="Email Address"/>
                                                        @error('email')
                                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Contact Number <span class="text-danger">*</span></label>
                                                        <input type="tel" name="contact_number" class="form-control" required value="{{ old('contact_number') }}" placeholder="Phone Number"/>
                                                        @error('contact_number')
                                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Full Address <span class="text-danger">*</span></label>
                                                        <small>(Country, City, Road No, House No, Flat No etc.)</small>
                                                        <textarea name="address" name="address" rows="4" class="form-control" required placeholder="Write your full shipping address">{{ old('address') }}</textarea>
                                                        @error('address')
                                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="paymeny comon-steps-div mt-5">
                                            
                                            <div class="account-page-n" id="ac-1">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-12">
                                                            <div class="card border border-gray rounded-lg">
                                                                <div class="card-body">
                                                                    <h2 class="comon-heading m-0">Payment method</h2>
                                                                    <div class="d-flex align-items-center justify-content-between mt-4">
                                                                        <figure class="m-0">
                                                                            <img src="{{ asset('frontend/images/visag01.jpg') }}" alt="Payments" />
                                                                        </figure>
                                                                    </div>
                                                                    <br>
                                                                    <div class="mb-4">
                                                                        <label for="cc-name" class="form-label text-xs fw-bold">Name On Card</label>
                                                                        <input id="cc-name" type="text" name="card_holder_name" value="{{ old('card_holder_name') }}" class="form-control" placeholder="e.g. John E Cash">
                                                                    </div>
                                                
                                                                    <div class="mb-4">
                                                                        <label for="cc-number" class="form-label text-xs fw-bold">Credit Card Number</label>
                                                                        <input id="cc-number" type="text" name="card_number" value="{{ old('card_number') }}" class="form-control" placeholder="16-digit card number" maxlength="19" required>
                                                                    </div>
                                                
                                                                    <div class="mb-4">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <label for="cc-expiry" class="form-label text-xs fw-bold">Card Expiry</label>
                                                                                <input type="text" id="cc-expiry" name="card_expiry" value="{{ old('card_expiry') }}" class="form-control" placeholder="MM/YY" maxlength="7" required>
                                                                            </div>
                                                
                                                                            <div class="col">
                                                                                <label for="cc-cvv" class="form-label text-xs fw-bold">CVV/CVC</label>
                                                                                <input type="text" id="cc-cvv" name="card_cvc" value="{{ old('card_cvc') }}" class="form-control text-dark text-bold" maxlength="3" required placeholder="123">
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
        $(document).ready(function () {
            $('#cc-number').on('input', function () {
                var inputValue = $(this).val().replace(/\D/g, ''); // Remove non-numeric characters
                var formattedValue = '';
        
                for (var i = 0; i < inputValue.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        formattedValue += ' ';
                    }
                    formattedValue += inputValue[i];
                }
        
                $(this).val(formattedValue);
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#cc-expiry').on('input', function () {
                var inputValue = $(this).val().replace(/\D/g, ''); // Remove non-numeric characters

                // Ensure that the input for MM does not exceed 12
                if (inputValue.length > 2) {
                    var month = inputValue.substring(0, 2);
                    if (parseInt(month) > 12) {
                        month = '12';
                    }
                    inputValue = month + inputValue.substring(2);
                }

                // Format the input as MM / YYYY
                if (inputValue.length > 2) {
                    inputValue = inputValue.substring(0, 2) + ' / ' + inputValue.substring(2);
                }

                $(this).val(inputValue);
            });
        });
    </script>
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
