@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Update Venue'))

@section('css_links')
    {{--  External CSS  --}}
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
    <b class="text-uppercase">{{ __('Update Venue') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Venues') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.venue.index') }}">{{ __('All Venues') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.venue.show', ['venue' => $venue]) }}">{{ __('Show Details') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Edit Venue') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.venue.show', ['venue' => $venue]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('administration.venue.update', ['venue' => $venue]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card border m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Update Venue</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 form-group">
                            <label for="name">Name <span class="required">*</span></label>
                            <input type="text" name="name" value="{{ $venue->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required/>
                            @error('name')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status <span class="required">*</span></label>
                            <select class="select2-single form-control @error('status') is-invalid @enderror" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Active" @if ($venue->status === 'Active') selected @endif>Active</option>
                                <option value="Inactive" @if ($venue->status === 'Inactive') selected @endif>Inactive</option>
                            </select>
                            @error('status')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="street">Street <span class="required">*</span></label>
                            <input type="text" name="street" value="{{ $venue->street }}" class="form-control @error('street') is-invalid @enderror" placeholder="Street" required/>
                            @error('street')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="city">City <span class="required">*</span></label>
                            <input type="text" name="city" value="{{ $venue->city }}" class="form-control @error('city') is-invalid @enderror" placeholder="City" required/>
                            @error('city')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="state">State <span class="required">*</span></label>
                            <input type="text" name="state" value="{{ $venue->state }}" class="form-control @error('state') is-invalid @enderror" placeholder="State" required/>
                            @error('state')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="Zip Code">Zip Code <span class="required">*</span></label>
                            <input type="text" name="postal_code" value="{{ $venue->postal_code }}" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Zip Code" required/>
                            @error('postal_code')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Update Venue</span>
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
