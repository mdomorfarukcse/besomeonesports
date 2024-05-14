@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Update Ads'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Image Upload */
        .avatar-upload {
            position: relative;
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
            width: 1100px;
            height: 100px;
            position: relative;
            border: 6px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Update Ads') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Ads') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.ads.index') }}">{{ __('All Ads') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.ads.show', ['ads' => $ads]) }}">{{ __('Show Details') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Edit Ads') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.ads.show', ['ads' => $ads]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection


@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.ads.update', ['ads' => $ads]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Update Ads</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type="file" id="adsAvatar" name="avatar" value="{{ show_image($ads->avatar) }}" accept=".png, .jpg, .jpeg" />
                                                    <label for="adsAvatar"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    @if (is_null($ads->avatar))
                                                        <div id="imagePreview" style="background-image: url('https://fakeimg.pl/1100x100');"></div>
                                                    @else
                                                        <div id="imagePreview" style="background-image: url({{ show_image($ads->avatar) }});"></div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="name">Company Name <span class="required">*</span></label>
                                            <input type="text" name="name" value="{{ $ads->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Company Name" required/>
                                            @error('name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="url">URL <span class="required">*</span></label>
                                            <input type="text" name="url" value="{{ $ads->url }}" class="form-control @error('url') is-invalid @enderror" placeholder="Ad URL" required/>
                                            @error('url')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="status">Status <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('status') is-invalid @enderror" name="status" required>
                                                <option value="">Select Status</option>
                                                <option value="Active" @if ($ads->status === 'Active') selected @endif>Active</option>
                                                <option value="Inactive" @if ($ads->status === 'Inactive') selected @endif>Inactive</option>
                                            </select>
                                            @error('status')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="position">Position <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('position') is-invalid @enderror" name="position" required>
                                                <option value="" selected>Select Position</option>
                                                <option value="Homepage Top" @if ($ads->position === 'Homepage Top') selected @endif>Homepage Top</option>
                                                <option value="Homepage Bottom" @if ($ads->position === 'Homepage Bottom') selected @endif>Homepage Bottom</option>
                                                <option value="All About Pages Bottom" @if ($ads->position === 'All About Pages Bottom') selected @endif>All About Pages Bottom</option>
                                                <option value="Sponsor Page Bottom" @if ($ads->position === 'Sponsor Page Bottom') selected @endif>Sponsor Page Bottom</option>
                                                <option value="Blog Pages Bottom" @if ($ads->position === 'Blog Pages Bottom') selected @endif>Blog Pages Bottom</option>
                                                <option value="News Pages Bottom" @if ($ads->position === 'News Pages Bottom') selected @endif>News Pages Bottom</option>
                                                <option value="Product Pages Bottom" @if ($ads->position === 'Product Pages Bottom') selected @endif>Product Pages Bottom</option>
                                            </select>
                                            @error('position')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="startdate">Start Date <span class="required">*</span></label>
                                            <input type="date" id="startdate" name="startdate" value="{{ $ads->startdate }}" class="addate datepicker-here form-control @error('startdate') is-invalid @enderror" placeholder="yyyy-mm-dd" required/>
                                            @error('startdate')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="enddate">End Date <span class="required">*</span></label>
                                            <input type="date" id="enddate" name="enddate" value="{{ $ads->enddate }}" class="addate datepicker-here form-control @error('enddate') is-invalid @enderror" placeholder="yyyy-mm-dd" required/>
                                            @error('enddate')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="Note">{{ $ads->description }}</textarea>
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
                        <span class="text-bold">Update Ads</span>
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
        $("#adsAvatar").change(function() {
            readURL(this);
        });
    </script>
@endsection