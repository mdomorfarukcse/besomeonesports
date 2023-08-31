@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Import New Permission'))

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
        
        /* File Upload */
        .file-area {
            width: 100%;
            position: relative;
        }
        .file-area input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            cursor: pointer;
        }
        .file-area .file-dummy {
            width: 100%;
            padding: 30px;
            background: rgba(255, 255, 255, 0.2);
            border: 2px dashed rgba(255, 255, 255, 0.2);
            text-align: center;
            transition: background 0.3s ease-in-out;
        }
        .file-area .file-dummy .success {
            display: none;
        }
        .file-area:hover .file-dummy {
            background: rgba(255, 255, 255, 0.1);
        }
    
        .file-area input[type="file"]:valid + .file-dummy .success {
            display: inline-block;
        }
        .file-area input[type="file"]:valid + .file-dummy .default {
            display: none;
        }
        .file-uploader {
            padding: 30px 30px 50px;
            height: 30px;
            background: #f0f0ff;
            cursor: pointer;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Import New Permission') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Import New Permission') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.permission.export') }}" class="btn btn-outline-success btn-outline-custom fw-bolder">
        <i class="feather icon-plus"></i>
        <b>Export</b>
    </a>
@endsection


@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.permission.import_permission') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Import Permission</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="import_file">Xlsx File Import <span class="required">*</span></label>
                                            <input type="file" name="import_file" class="form-control file-uploader @error('import_file') is-invalid @enderror" placeholder="Permission" required/>
                                            @error('import_file')
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
                        <span class="text-bold">Upload New Permission</span>
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
