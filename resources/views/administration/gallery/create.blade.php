@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Add New Gallery'))

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

    /* Image Upload */
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
    <b class="text-uppercase">{{ __('Add New Gallery') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Add New Gallery') }}</li>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.gallery.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title text-dark mb-0">Create New Gallery</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-image-upload form-group">
                                <label for="images">Upload Gallery Images <span class="required">*</span></label>
                                <input type="file" accept="image/jpeg,image/png,image/gif" multiple id="images" name="images[]" class="form-control file-uploader" placeholder="Ex: Upload Images" required>
                                @error('images[]')
                                    <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="name">Caption <span class="required">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="" required/>
                            @error('name')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="league_id">League </label>
                            <select class="select2-single form-control @error('league_id') is-invalid @enderror" name="league_id" >
                                <option value="">Select League</option>
                                @foreach ($leagues as $league)
                                    <option value="{{ $league->id }}">{{ $league->name }}</option>
                                @endforeach
                            </select>
                            @error('league_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Create New Image</span>
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
        
    </script>
@endsection
