@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Coach'))

@section('css_links')
    {{--  External CSS  --}}
<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        /* Image Upload */
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #ffffff;
            border: 1px solid;
            border-color: #a1a1a1;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #d8d8d8;
            border-color: #a1a1a1;
        }
        .avatar-upload .avatar-edit input + label:after {
            content: "\f040";
            font-family: "FontAwesome";
            color: #757575;
            position: absolute;
            top: 5px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Coach') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Become a Coach') }}</li>
@endsection

@section('content')

<section class="float-start w-100">
    <div class="mediasection d-inline-block w-100">
        <div class="container">
            <div class="mindle-heading text-center">
                <h5>Coach Request</h5>
                <h1>Want to be a <span> Coach? </span></h1>
            </div>
            <div class="row  justify-content-center mt-2 mb-5">
                <div class="col-md-8">
                    <div class="contact-use-div">
                        <form action="{{ route('frontend.coach.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file" id="coachAvatar" name="avatar" accept=".png, .jpg, .jpeg" />
                                            <label for="coachAvatar"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url(https://fakeimg.pl/500x500);"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email *" required />
                                        @error('email')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password *" required />
                                        @error('password')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="First Name *" required />
                                        @error('first_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <input type="text" name="middle_name" value="{{ old('middle_name') }}" class="form-control" placeholder="Middle Name" />
                                        @error('middle_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Last Name *" required />
                                        @error('last_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <input type="date" name="birthdate" value="{{ old('birthdate') }}" class="form-control" placeholder="Birthdate *" required />
                                        @error('birthdate')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <input type="tel" name="phone_number" value="{{ old('phone_number') }}" class="form-control" placeholder="Contact Number *" required />
                                        @error('phone_number')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <input type="text" name="usab_license_no" value="{{ old('usab_license_no') }}" class="form-control" placeholder="USAB License No. *" required />
                                        @error('usab_license_no')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <input type="text" name="city" value="{{ old('city') }}" class="form-control" placeholder="City *" required />
                                        @error('city')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <input type="text" name="state" value="{{ old('state') }}" class="form-control" placeholder="State/Province *" required />
                                        @error('state')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control" placeholder="Postal Code *" required />
                                        @error('postal_code')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <input type="text" name="street_address" value="{{ old('street_address') }}" class="form-control" placeholder="Street Address *" required />
                                        @error('street_address')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <input type="text" name="extended_address" value="{{ old('extended_address') }}" class="form-control" placeholder="Extended Address *" required />
                                        @error('extended_address')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" name="submit" class="btn btn-dark btn-lg float-end">Submit Request</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
    <script>
        // File Uploder
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#coachAvatar").change(function() {
            readURL(this);
        });
    </script>
@endsection
