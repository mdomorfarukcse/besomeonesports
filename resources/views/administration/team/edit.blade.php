@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Update Team'))

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
    .input-group-text {
        border: 0px solid #d4d8de;
        background: #f7faff;
        color: #111;
        padding-right: 0;
        font-weight: bold;
    }
    .input-group .form-control[readonly] {
        padding-left: 0;
    }

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
    <b class="text-uppercase">{{ __('Update Team Information') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Teams') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.team.index') }}">{{ __('All Teams') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.team.show', ['team' => $team]) }}">{{ __('Show Details') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Edit Team Info') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.team.show', ['team' => $team]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection



@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.team.update', ['team' => $team]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card border m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Update Team</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="logo-upload">
                                <div class="logo-edit">
                                    <input type="file" id="teamLogo" name="logo" accept=".png, .jpg, .jpeg" />
                                    <label for="teamLogo"></label>
                                </div>
                                <div class="logo-preview">
                                    @if (!empty($team->logo))
                                        <div id="imagePreview" style="background-image: url({{ show_image($team->logo) }});"></div>
                                    @else
                                        <div id="imagePreview" style="background-image: url(https://fakeimg.pl/500x500);"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="league_id">League <span class="required">*</span></label>
                            <select class="select2-single form-control @error('league_id') is-invalid @enderror" name="league_id" required>
                                <option value="" disabled>Select League</option>
                                @foreach ($leagues as $league)
                                    <option value="{{ $league->id }}" @if ($league->id == $team->league_id) selected @endif>{{ $league->name }}</option>
                                @endforeach
                            </select>
                            @error('league_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="division_id">Division <span class="required">*</span></label>
                            <select class="select2-single form-control @error('division_id') is-invalid @enderror" name="division_id" required>
                                <option value="" disabled>Select Division</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}" @if ($division->id == $team->division_id) selected @endif>{{ $division->name }}</option>
                                @endforeach
                            </select>
                            @error('division_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="coach_id">Coach</label>
                            <select class="select2-single form-control @error('coach_id') is-invalid @enderror" name="coach_id">
                                <option value="" disabled>Select Coach</option>
                                @foreach ($coaches as $coach)
                                    <option value="{{ $coach->id }}" @if ($coach->id == $team->coach_id) selected @endif>{{ $coach->user->name }}</option>
                                @endforeach
                            </select>
                            @error('coach_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="name">Name <span class="required">*</span></label>
                            <input type="text" name="name" value="{{ $team->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Chennai Super Kings" required/>
                            @error('name')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="gender">Gender <span class="required">*</span></label>
                            <select class="select2-single form-control @error('gender') is-invalid @enderror" name="gender" required>
                                <option value="" disabled>Select Gender</option>
                                <option value="Male" @if ($team->gender === 'Male') selected @endif>Male</option>
                                <option value="Female" @if ($team->gender === 'Female') selected @endif>Female</option>
                                <option value="Other" @if ($team->gender === 'Other') selected @endif>Other</option>
                            </select>
                            @error('sport_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="maximum_players">Max Players <span class="required">*</span></label>
                            <input type="number" min="1" step="1" name="maximum_players" value="{{ $team->maximum_players }}" class="form-control @error('maximum_players') is-invalid @enderror" placeholder="Ex: 12" required/>
                            @error('maximum_players')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="status">Status <span class="required">*</span></label>
                            <select class="select2-single form-control @error('status') is-invalid @enderror" name="status" required>
                                <option value="" disabled>Select Status</option>
                                <option value="Active" @if ($team->status === 'Active') selected @endif>Active</option>
                                <option value="Inactive" @if ($team->status === 'Inactive') selected @endif>Inactive</option>
                            </select>
                            @error('status')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="description">Description</label>
                            <textarea name="description" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="Team Description">{!! $team->description !!}</textarea>
                            @error('description')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Update Team</span>
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
        $("#teamLogo").change(function() {
            readURL(this);
        });
    </script>
@endsection
