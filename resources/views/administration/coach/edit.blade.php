@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Update Coach'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .input-group-text {
        border: 0px solid #d4d8de;
        background: #f7faff;
        color: #111;
        padding-right: 0;
        font-weight: bold;
    }
    .input-group .form-control[readonly] {
        padding-left: 0;
    }

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
    <b class="text-uppercase">{{ __('Update Coach') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Coaches') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.coach.index') }}">{{ __('All Coaches') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.coach.show', ['coach' => $coach]) }}">{{ __('Show Details') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Edit Coach') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.coach.show', ['coach' => $coach]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection

@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.coach.update', ['coach' => $coach]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title text-dark mb-0">Update Coach</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type="file" id="coachAvatar" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <label for="coachAvatar"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url({{ show_image($coach->user->avatar) }});"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Coach Info</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="position">Position <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('position') is-invalid @enderror" name="position" required>
                                                <option value="">Select Position</option>
                                                <option value="Main Coach" @selected($coach->position === 'Main Coach')>Main Coach</option>
                                                <option value="Assistant Coach" @selected($coach->position === 'Assistant Coach')>Assistant Coach</option>
                                            </select>
                                            @error('position')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="status">Status <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('status') is-invalid @enderror" name="status" required>
                                                <option value="">Select Status</option>
                                                <option value="Active" @selected($coach->status === 'Active')>Active</option>
                                                <option value="Inactive" @selected($coach->status === 'Inactive')>Inactive</option>
                                            </select>
                                            @error('status')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Personal Infomation</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label for="first_name">First Name <span class="required">*</span></label>
                                            <input type="text" name="first_name" value="{{ $coach->first_name }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Joseph" required/>
                                            @error('first_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" name="middle_name" value="{{ $coach->middle_name }}" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Roberts"/>
                                            @error('middle_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="last_name">Last Name <span class="required">*</span></label>
                                            <input type="text" name="last_name" value="{{ $coach->last_name }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Kerr" required/>
                                            @error('last_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="birthdate">Birthdate <span class="required">*</span></label>
                                            <input type="date" name="birthdate" value="{{ $coach->birthdate }}" class="datepicker-here form-control @error('birthdate') is-invalid @enderror" placeholder="yyyy-mm-dd" required/>
                                            @error('birthdate')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="phone_number">Phone Number <span class="required">*</span></label>
                                            <input type="tel" name="phone_number" value="{{ $coach->phone_number }}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="+1 505-683-1334" required/>
                                            @error('phone_number')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="usab_license_no">Drivers License No. <span class="required">*</span></label>
                                            <input type="text" name="usab_license_no" value="{{ $coach->usab_license_no }}" class="form-control @error('usab_license_no') is-invalid @enderror" placeholder="88941AE1611" required/>
                                            @error('usab_license_no')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="city">City <span class="required">*</span></label>
                                            <input type="text" name="city" value="{{ $coach->city }}" class="form-control @error('city') is-invalid @enderror" placeholder="Iris Watson" required/>
                                            @error('city')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="state">State/Province <span class="required">*</span></label>
                                            <input type="text" name="state" value="{{ $coach->state }}" class="form-control @error('state') is-invalid @enderror" placeholder="Frederick Nebraska" required/>
                                            @error('state')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="postal_code">Postal Code <span class="required">*</span></label>
                                            <input type="text" name="postal_code" value="{{ $coach->postal_code }}" class="form-control @error('postal_code') is-invalid @enderror" placeholder="20620" required/>
                                            @error('postal_code')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="street_address">Street Address <span class="required">*</span></label>
                                            <input type="text" name="street_address" value="{{ $coach->street_address }}" class="form-control @error('street_address') is-invalid @enderror" placeholder="Box 283 8562 Fusce Rd." required/>
                                            @error('street_address')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="extended_address">Extended Address</label>
                                            <input type="text" name="extended_address" value="{{ $coach->extended_address }}" class="form-control @error('extended_address') is-invalid @enderror" placeholder="Box 283 8562 Fusce Rd."/>
                                            @error('extended_address')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="note">Note</label>
                                            <textarea name="note" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="Note">{{ $coach->note }}</textarea>
                                            @error('note')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Update Coach</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- End Row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
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
