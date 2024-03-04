@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Create New League'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Datepicker css -->
    <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Tagsinput css -->
    <link href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css">
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
    <b class="text-uppercase">{{ __('Create New League') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Leagues') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Create New League') }}</li>
@endsection



@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.league.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card border m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Create New League</h5>
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
                                    <div id="imagePreview" style="background-image: url(https://fakeimg.pl/500x500);"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="season_id">Season <span class="required">*</span></label>
                            <select class="select2-single form-control @error('season_id') is-invalid @enderror" name="season_id" required>
                                <option value="">Select Season</option>
                                @foreach ($seasons as $season)
                                    <option value="{{ $season->id }}">
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
                                    <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                                @endforeach
                            </select>
                            @error('sport_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="name">Name <span class="required">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Fifa World Club 2023" required/>
                            @error('name')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="start">League Start Date <span class="required">*</span></label>
                            <input type="date" name="start" value="{{ old('start') }}" class="form-control @error('start') is-invalid @enderror" placeholder="2023-01-01" required/>
                            @error('start')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="end">League End Date <span class="required">*</span></label>
                            <input type="date" name="end" value="{{ old('end') }}" class="form-control @error('end') is-invalid @enderror" placeholder="2023-01-01" required/>
                            @error('end')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
                            <label for="registration_fee">Registration Fee <span class="required">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" min="0" step="0.01" name="registration_fee" value="{{ old('registration_fee') }}" class="form-control @error('registration_fee') is-invalid @enderror" placeholder="99.99" required/>
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
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
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
                                    <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                                @endforeach
                            </select>
                            @error('venues[]')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-md-12">
                            <label for="referees[]">League Referees <span class="required">*</span></label>
                            <select class="select2-multi-select form-control @error('referees[]') is-invalid @enderror" name="referees[]" multiple="multiple" required>
                                <option value="">Select Referees</option>
                                @foreach ($referees as $referee)
                                    <option value="{{ $referee->id }}">{{ $referee->name }}</option>
                                @endforeach
                            </select>
                            @error('referees[]')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div> --}}
                        <div class="form-group col-md-12">
                            <label for="rounds">League Rounds <span class="required">*</span></label>
                            <select name="rounds[]" id="rounds" class="form-control @error('rounds') is-invalid @enderror" multiple="multiple" required>
                                @foreach (old('rounds', []) as $selectedRound)
                                    <option value="{{ $selectedRound }}" selected>{{ $selectedRound }}</option>
                                @endforeach
                            </select>
                            @error('rounds')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="description">Description <span class="required">*</span></label>
                            <textarea name="description" rows="5" id="textarea_editor"  class="form-control  @error('note') is-invalid @enderror" placeholder="League Description">{{ old('description') }}</textarea>
                            @error('description')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Create New League</span>
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
    <!-- Tagsinput js -->
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/typeahead.bundle.js') }}"></script>
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>
    <!-- Wysiwig js -->
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
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

    <script>
        // Apply Select2 to the rounds input field
        $(document).ready(function() {
            $('#rounds').select2({
                tags: true, // Allow creating new tags
                tokenSeparators: [','], // Allow multiple tags separated by commas
            });
        });
    </script>
    <script>
        // Apply Select2 to the rounds input field
        $(document).ready(function() {
            tinymce.init({
                selector: "textarea#textarea_editor",
                theme: "modern",
                height:320,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
        });
    </script>
@endsection
