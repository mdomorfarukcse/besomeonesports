@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Update League'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    /* Image Upload */
    .logo-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
    }
    .logo-upload .logo-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }
    .logo-upload .logo-edit input {
        display: none;
    }
    .logo-upload .logo-edit input + label {
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
    .logo-upload .logo-edit input + label:hover {
        background: #d8d8d8;
        border-color: #a1a1a1;
    }
    .logo-upload .logo-edit input + label:after {
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
    .logo-upload .logo-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #f8f8f8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .logo-upload .logo-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Update League') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Leagues') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.league.index') }}">{{ __('All Leagues') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.league.show', ['league' => $league]) }}">{{ __('Show Details') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Edit League') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.league.show', ['league' => $league]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection


@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.league.update', ['league' => $league]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card border m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Update League</h5>
                </div>
                <div class="card-body">
                    <div class="row">  
                        <div class="col-md-12">
                            <div class="logo-upload">
                                <div class="logo-edit">
                                    <input type="file" id="leagueLogo" name="logo" accept=".png, .jpg, .jpeg" />
                                    <label for="leagueLogo"></label>
                                </div>
                                <div class="logo-preview">
                                    @if (!empty($league->logo))
                                        <div id="imagePreview" style="background-image: url({{ show_avatar($league->logo) }});"></div>
                                    @else
                                        <div id="imagePreview" style="background-image: url(https://fakeimg.pl/500x500);"></div>
                                    @endif
                                </div>
                            </div>
                        </div>                                      
                        <div class="form-group col-md-4">
                            <label for="season_id">Season <span class="required">*</span></label>
                            <select class="select2-single form-control @error('season_id') is-invalid @enderror" name="season_id" required>
                                <option value="">Select Season</option>
                                @foreach ($seasons as $season)
                                    <option value="{{ $season->id }}" @if ($season->id == $league->season->id) selected @endif>
                                        {{ $season->name }}
                                        ({{ $season->year }})
                                    </option>
                                @endforeach
                            </select>
                            @error('season_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="sport_id">Sport <span class="required">*</span></label>
                            <select class="select2-single form-control @error('sport_id') is-invalid @enderror" name="sport_id" required>
                                <option value="">Select Sport</option>
                                @foreach ($sports as $sport)
                                    <option value="{{ $sport->id }}" @if ($sport->id == $league->sport->id) selected @endif>{{ $sport->name }}</option>
                                @endforeach
                            </select>
                            @error('sport_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="name">Name <span class="required">*</span></label>
                            <input type="text" name="name" value="{{ $league->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Fifa World Club 2023" required/>
                            @error('name')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="start">League Start Date <span class="required">*</span></label>
                            <input type="date" name="start" value="{{ $league->start }}" class="form-control @error('start') is-invalid @enderror" placeholder="2023-01-01" required/>
                            @error('start')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="end">League End Date <span class="required">*</span></label>
                            <input type="date" name="end" value="{{ $league->end }}" class="form-control @error('end') is-invalid @enderror" placeholder="2023-01-01" required/>
                            @error('end')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">Status <span class="required">*</span></label>
                            <select class="select2-single form-control @error('status') is-invalid @enderror" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Active" @if ($league->status === 'Active') selected @endif>Active</option>
                                <option value="Inactive" @if ($league->status === 'Inactive') selected @endif>Inactive</option>
                            </select>
                            @error('status')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="registration_fee">Registration Fee <span class="required">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" min="0" step="0.01" name="registration_fee" value="{{ $league->registration_fee }}" class="form-control @error('registration_fee') is-invalid @enderror" placeholder="99.99" required/>
                                @error('registration_fee')
                                    <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="divisions[]">Divisions <span class="required">*</span></label>
                            <select class="select2-multi-select form-control @error('divisions[]') is-invalid @enderror" name="divisions[]" multiple="multiple" required>
                                <option value="">Select Divisions</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}" @if($league->divisions->contains('id', $division->id)) selected @endif>
                                        {{ $division->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('divisions[]')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="venues[]">Venues <span class="required">*</span></label>
                            <select class="select2-multi-select form-control @error('venues[]') is-invalid @enderror" name="venues[]" multiple="multiple" required>
                                <option value="">Select Venues</option>
                                @foreach ($venues as $venue)
                                    <option value="{{ $venue->id }}" @if($league->venues->contains('id', $venue->id)) selected @endif>
                                        {{ $venue->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('venues[]')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="description">Description</label>
                            <textarea name="description" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="League Description">{{ $league->description }}</textarea>
                            @error('description')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Update League</span>
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
        $("#leagueLogo").change(function() {
            readURL(this);
        });
    </script>
@endsection
