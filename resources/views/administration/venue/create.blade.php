@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Create New Venue'))

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
    <b class="text-uppercase">{{ __('Create New Venue') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Create New Venue') }}</li>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('administration.venue.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card border m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Create New Venue</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 form-group">
                            <label for="name">Venue Name <span class="required">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required/>
                            @error('name')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
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
                        <div class="col-md-12 form-group">
                            <label for="street">Street <span class="required">*</span></label>
                            <input type="text" name="street" value="{{ old('street') }}" class="form-control @error('street') is-invalid @enderror" placeholder="Street" required/>
                            @error('street')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="city">City <span class="required">*</span></label>
                            <input type="text" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror" placeholder="City" required/>
                            @error('city')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="state">State <span class="required">*</span></label>
                            <input type="text" name="state" value="{{ old('state') }}" class="form-control @error('state') is-invalid @enderror" placeholder="State" required/>
                            @error('state')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="Zip Code">Zip Code <span class="required">*</span></label>
                            <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Zip Code" required/>
                            @error('postal_code')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Create New Venue</span>
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
@endsection
