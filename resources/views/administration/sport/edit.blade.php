@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Update Sport'))

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
    <b class="text-uppercase">{{ __('Update Sport') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Sports') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.sport.index') }}">{{ __('All Sports') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.sport.show', ['sport' => $sport]) }}">{{ __('Show Details') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Edit Sport') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.sport.show', ['sport' => $sport]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection


@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.sport.update', ['sport' => $sport]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Update Sport</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="name">Name <span class="required">*</span></label>
                                            <input type="text" name="name" value="{{ $sport->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Tennies" required/>
                                            @error('name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="status">Status <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('status') is-invalid @enderror" name="status" required>
                                                <option value="" selected disabled>Select Status</option>
                                                <option value="Active" @selected($sport->status)>Active</option>
                                                <option value="Inactive" @selected($sport->status)>Inactive</option>
                                            </select>
                                            @error('status')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="Note">{{ $sport->description }}</textarea>
                                            @error('description')
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
                        <span class="text-bold">Update Sport</span>
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
