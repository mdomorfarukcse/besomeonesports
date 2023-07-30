@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Create New Season'))

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
    <b class="text-uppercase">{{ __('Create New Season') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Create New Season') }}</li>
@endsection



@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.season.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Create New Season</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="name">Name <span class="required">*</span></label>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Exp. 2022-2023" required/>
                                            @error('name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="year">Year <span class="required">*</span></label>
                                            <input type="text" name="year" value="{{ old('year') }}" class="form-control @error('year') is-invalid @enderror" placeholder="Exp. 2022" required/>
                                            @error('year')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="start">Start <span class="required">*</span></label>
                                            <input type="text" id="start" name="start" value="{{ old('start') }}" class="datepicker-here form-control @error('start') is-invalid @enderror" placeholder="yyyy-mm-dd" required/>
                                            @error('start')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="end">end <span class="required">*</span></label>
                                            <input type="text" id="end" name="end" value="{{ old('end') }}" class="datepicker-here form-control @error('end') is-invalid @enderror" placeholder="yyyy-mm-dd" required/>
                                            @error('end')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
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
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Create New Season</span>
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
            $('#start').datepicker({
                language: 'en',
                autoClose: true,
                dateFormat: 'yyyy-mm-dd',
            });
            $('#end').datepicker({
                language: 'en',
                autoClose: true,
                dateFormat: 'yyyy-mm-dd',
            });
        });
    </script>

   
@endsection
