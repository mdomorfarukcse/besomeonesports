@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Update Season'))

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
    <b class="text-uppercase">{{ __('Update Season') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Seasons') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.season.index') }}">{{ __('All Seasons') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.season.show', ['season' => $season]) }}">{{ __('Show Details') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Edit Season') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.season.show', ['season' => $season]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection



@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('administration.season.update', ['season' => $season]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card border m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Update Season</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 form-group">
                            <label for="name">Name <span class="required">*</span></label>
                            <input type="text" name="name" value="{{ $season->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Exp. 2022-2023" required/>
                            @error('name')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="year">Year <span class="required">*</span></label>
                            <input type="number" minlength="4" maxlength="4" min="{{ date('Y') }}" step="1" value="{{ date('Y') }}" name="year" value="{{ $season->year }}" class="form-control @error('year') is-invalid @enderror" placeholder="Exp. 2022" required/>
                            @error('year')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="start">Season Started At <span class="required">*</span></label>
                            <input type="date" id="start" name="start" value="{{ $season->start }}" class="datepicker-here form-control @error('start') is-invalid @enderror" placeholder="yyyy-mm-dd" required/>
                            @error('start')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="end">Season Ends At <span class="required">*</span></label>
                            <input type="date" id="end" name="end" value="{{ $season->end }}" class="datepicker-here form-control @error('end') is-invalid @enderror" placeholder="yyyy-mm-dd" required/>
                            @error('end')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status <span class="required">*</span></label>
                            <select class="select2-single form-control @error('status') is-invalid @enderror" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Active" @if ($season->status === 'Active') selected @endif>Active</option>
                                <option value="Inactive" @if ($season->status === 'Inactive') selected @endif>Inactive</option>
                            </select>
                            @error('status')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Update Season</span>
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
