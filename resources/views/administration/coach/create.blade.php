@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Add New Coach'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Datepicker css -->
    <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Add New Coach') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Add New Coach') }}</li>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="#" method="post" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title text-dark mb-0">Create New Coach</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="coach_id">Coach ID (CID) <span class="required">*</span></label>
                            <input type="text" name="coach_id" value="BSCOACH202302011235" readonly class="form-control @error('coach_id') is-invalid @enderror" placeholder="BSCOACH202302011235" required/>
                            @error('coach_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Credentials</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="email">Email <span class="required">*</span></label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="coach@mail.com" required/>
                                            @error('email')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="password">Password <span class="required">*</span></label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Co@cH2023#" required/>
                                            @error('password')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Coach Info</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="position">Position <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('position') is-invalid @enderror" name="position" required>
                                                <option value="">Select Position</option>
                                                <option value="Main Coach">Main Coach</option>
                                                <option value="Assistant Coach">Assistant Coach</option>
                                            </select>
                                            @error('position')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="status">Status <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('status') is-invalid @enderror" name="status" required>
                                                <option value="">Select Status</option>
                                                <option value="Active" selected>Active</option>
                                                <option value="Inactive">Inactive</option>
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
                                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Joseph" required/>
                                            @error('first_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Roberts"/>
                                            @error('middle_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="last_name">Last Name <span class="required">*</span></label>
                                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Kerr" required/>
                                            @error('last_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="birthdate">Birthdate <span class="required">*</span></label>
                                            <input type="text" id="birthdate" name="birthdate" class="datepicker-here form-control @error('birthdate') is-invalid @enderror" placeholder="dd/mm/yyyy" required/>
                                            @error('birthdate')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="phone_number">Phone Number <span class="required">*</span></label>
                                            <input type="tel" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="+1 505-683-1334" required/>
                                            @error('phone_number')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="usab_license_no">USAB License No. <span class="required">*</span></label>
                                            <input type="text" name="usab_license_no" class="form-control @error('usab_license_no') is-invalid @enderror" placeholder="88941AE1611" required/>
                                            @error('usab_license_no')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="city">City <span class="required">*</span></label>
                                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="Iris Watson" required/>
                                            @error('city')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="state">State/Province <span class="required">*</span></label>
                                            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" placeholder="Frederick Nebraska" required/>
                                            @error('state')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="postal_code">Postal Code <span class="required">*</span></label>
                                            <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" placeholder="20620" required/>
                                            @error('postal_code')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="street_address">Street Address <span class="required">*</span></label>
                                            <input type="text" name="street_address" class="form-control @error('street_address') is-invalid @enderror" placeholder="Box 283 8562 Fusce Rd." required/>
                                            @error('street_address')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="extended_address">Extended Address</label>
                                            <input type="text" name="extended_address" class="form-control @error('extended_address') is-invalid @enderror" placeholder="Box 283 8562 Fusce Rd."/>
                                            @error('extended_address')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="note">Note</label>
                                            <textarea name="note" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="Note"></textarea>
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
                        <span class="text-bold">Create New Coach</span>
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
    <!-- Datepicker JS -->
    <script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datepicker/i18n/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-datepicker.js') }}"></script>
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $(document).ready(function() {
            /* --- Form - Datepicker -- */
            $('#birthdate').datepicker({
                language: 'en',
                autoClose: true,
                dateFormat: 'dd/mm/yyyy',
            });
        });
    </script>
@endsection
