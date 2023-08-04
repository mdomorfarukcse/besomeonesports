@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('New Registration'))

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
    <b class="text-uppercase">{{ __('New Registration') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Events') }}</li>
    <li class="breadcrumb-item text-capitalize">{{ __('Registrations') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('New Registration') }}</li>
@endsection



@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="{{ route('administration.event.registration.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card border m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">New Registration</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="event_id">Event <span class="required">*</span></label>
                            <select class="select2-single form-control @error('event_id') is-invalid @enderror" name="event_id" required>
                                <option value="">Select Event</option>
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                            @error('event_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>                        
                        <div class="form-group col-md-12">
                            <label for="player_id">Player <span class="required">*</span></label>
                            <select class="select2-single form-control @error('player_id') is-invalid @enderror" name="player_id" required>
                                <option value="">Select Player</option>
                                @foreach ($players as $player)
                                    <option value="{{ $player->id }}">{{ $player->user->name }}</option>
                                @endforeach
                            </select>
                            @error('player_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>                        
                        
                        @error('event_player_unique')
                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-check mr-1"></i>
                        <span class="text-bold">Register Now</span>
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
        $("#eventLogo").change(function() {
            readURL(this);
        });
    </script>
@endsection
