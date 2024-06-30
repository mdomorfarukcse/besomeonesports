@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Import Sports'))

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
    .file-uploader {
		padding: 30px 30px 55px;
		height: 30px;
		background: #f0f0ff;
		cursor: pointer;
	}
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Import Sports') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Import Sports') }}</li>
@endsection



@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.sport.import.csv') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title float-left mb-0">Import Sports</h5>
                                    <a href="{{ asset('csv_import_templates/sports_import_template.csv') }}" target="_blank" class="btn btn-link btn-sm float-right font-13" data-toggle="tooltip" data-placement="top" title="Download the .csv formatted template for sport import.">
                                        <i class="feather icon-download"></i>
                                        <span class="text-bold">Download Formatted Template</span>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="csv_file">Upload Sports CSV File <span class="required">*</span></label>
                                                <input type="file" accept=".csv" id="csv_file" name="csv_file" class="form-control file-uploader" placeholder="Upload Sports CSV File" required>
                                                @error('csv_file')
                                                    <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark float-right">
                        <i class="feather icon-upload mr-1"></i>
                        <span class="text-bold">Upload</span>
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
        // Custom Script Here
    </script>
@endsection
