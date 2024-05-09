@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Referee'))

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

        .list-group-item:hover {
            cursor: pointer !important;
        }
        .list-group-item label:hover {
            cursor: pointer !important;
        }
        .list-group-item input:hover {
            cursor: pointer !important;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Referee') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Become a Referee') }}</li>
@endsection

@section('content')

<section class="float-start w-100">
    <div class="mediasection d-inline-block w-100">
        <div class="container">
            <div class="mindle-heading text-center">
                <h5>Referee Request</h5>
                <h1>Want to be a <span> Referee? </span></h1>
            </div>
            <div class="row justify-content-center mt-2 mb-5">
                @if ($errors->any())
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @foreach ($errors->all() as $error) 
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ $error }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="col-md-8">
                    <div class="contact-use-div">
                        <form action="{{ route('frontend.referee.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="row mt-4">
                                {{-- <div class="col-md-12">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file" id="refereeAvatar" name="avatar" accept=".png, .jpg, .jpeg" />
                                            <label for="refereeAvatar"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url(https://fakeimg.pl/500x500);"></div>
                                        </div>
                                    </div>
                                </div> --}}
                                
                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <label for="email" class="text-capitalize">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email *" required />
                                        @error('email')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <label for="password" class="text-capitalize">Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password *" required />
                                        @error('password')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <label for="first_name" class="text-capitalize">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="First Name *" required />
                                        @error('first_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <label for="last_name" class="text-capitalize">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Last Name *" required />
                                        @error('last_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <label for="birthday" class="text-capitalize">Birthday <span class="text-danger">*</span></label>
                                        <input type="date" name="birthdate" value="{{ old('birthdate') }}" class="form-control" placeholder="Birthdate *" required />
                                        @error('birthdate')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <label for="contact_number" class="text-capitalize">Phone Number <span class="text-danger">*</span></label>
                                        <input type="tel" name="contact_number" value="{{ old('contact_number') }}" class="form-control" placeholder="+1 (123) 456 -7890" required />
                                        @error('contact_number')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="from-group">
                                        <label for="address" class="text-capitalize">Address <span class="text-danger">*</span></label>
                                        <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Address *" required />
                                        @error('address')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <label for="city" class="text-capitalize">City <span class="text-danger">*</span></label>
                                        <input type="text" name="city" value="{{ old('city') }}" class="form-control" placeholder="City *" required />
                                        @error('city')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <label for="state" class="text-capitalize">State <span class="text-danger">*</span></label>
                                        <input type="text" name="state" value="{{ old('state') }}" class="form-control" placeholder="State *" required />
                                        @error('state')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <label for="postal_code" class="text-capitalize">Zip Code <span class="text-danger">*</span></label>
                                        <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control" placeholder="Zip Code *" required />
                                        @error('postal_code')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="from-group">
                                        <label for="sport_of_interests[]" class="text-capitalize">Fields Of Interest <span class="text-danger">*</span></label>
                                        <br>
                                        <ul class="list-group d-inline-block">
                                            <li class="list-group-item d-inline-block border-1">
                                                <input class="form-check-input me-1" type="checkbox" value="Basketball" name="sport_of_interests[]" id="checkbox1">
                                                <label class="form-check-label" for="checkbox1">Basketball</label>
                                            </li>
                                            <li class="list-group-item d-inline-block border-1">
                                                <input class="form-check-input me-1" type="checkbox" value="Flag Football" name="sport_of_interests[]" id="checkbox2">
                                                <label class="form-check-label" for="checkbox2">Flag Football</label>
                                            </li>
                                            <li class="list-group-item d-inline-block border-1">
                                                <input class="form-check-input me-1" type="checkbox" value="Volleyball" name="sport_of_interests[]" id="checkbox3">
                                                <label class="form-check-label" for="checkbox3">Volleyball</label>
                                            </li>
                                        </ul>
                                        @error('sport_of_interests[]')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-dark btn-lg float-end">Submit Request</button>
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
        $("#refereeAvatar").change(function() {
            readURL(this);
        });
    </script>
@endsection
