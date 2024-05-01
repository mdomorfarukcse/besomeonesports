@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Add New Player'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Datepicker css -->
    {{-- <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
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
    .avatar-upload {
        position: relative;
        max-width: 205px;
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
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #f8f8f8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview > div {
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
    <b class="text-uppercase">{{ __('Add New Player') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Players') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Add New Player') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.player.index') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-user"></i>
        <b>All Players</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.player.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title text-dark mb-0">Create New Player</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="player_id" value="{{ $player_id }}" readonly class="form-control text-bold @error('player_id') is-invalid @enderror" placeholder="BSPLAYER202302011235" required/>
                        
                        {{-- Player Basic Info --}}
                        <div class="col-md-8">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Player Info</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="division_id">Division <span class="required">*</span></label>
                                            <select class="form-control" id="division_gender" required>
                                                <option value="">Choose a Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            <select id="division" name="division_id" class="form-control mt-3" required style="display: none;"></select>
                                            @error('division_id')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="grade">Grade <span class="required">*</span></label>
                                            <select class="form-control" id="grade_gender" required>
                                                <option value="">Choose a Grade</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            <select id="grade" name="grade" class="form-control mt-3" required style="display: none;"></select>
                                            @error('grade')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <input type="hidden" name="position" value="" class="form-control" />

                                        <input type="hidden" name="status" value="Active" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Player Basic Info --}}
                        {{-- Guardian Information --}}
                        <div class="col-md-4">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom" style="padding: 12px 20px;">
                                    <h5 class="card-title float-left mb-0" style="margin-top: 4px;">Guardian Info</h5>
                                    @role ('developer|admin') 
                                        <a href="{{ route('administration.guardian.create') }}" class="btn btn-dark btn-sm float-right font-13">
                                            <i class="la la-plus"></i>
                                            Add New
                                        </a>
                                    @endrole
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @role ('developer|admin') 
                                            <div class="form-group col-md-12">
                                                <label for="guardian_id">Guardian <span class="required">*</span></label>
                                                <select class="select2-single form-control @error('guardian_id') is-invalid @enderror" name="guardian_id" required>
                                                    <option value="" selected disabled>Select Guardian</option>
                                                    @foreach ($guardians as $guardian) 
                                                        <option value="{{ $guardian->id }}">{{ $guardian->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('guardian_id')
                                                    <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                @enderror
                                            </div>
                                        @endrole
                                        <div class="col-md-12 form-group">
                                            <label for="guardian_relation">Relation With Guardian @role('guardian') <span class="required">*</span> @endrole</label>
                                            <select class="select2-single form-control @error('guardian_relation') is-invalid @enderror" name="guardian_relation" @role('guardian') required @endrole>
                                                <option value="" selected disabled>Select Relation</option>
                                                <option value="Legal Guardian">Legal Guardian</option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Uncle">Uncle</option>
                                                <option value="Aunt">Aunt</option>
                                            </select>
                                            @error('guardian_relation')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Parents Information --}}
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Parents Info</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label for="guardian1_name">Guardian #1 Name <span class="required">*</span></label>
                                            <input type="text" name="guardian1_name" value="{{ old('guardian1_name') }}" class="form-control @error('guardian1_name') is-invalid @enderror" placeholder="Ex: John Doe" required/>
                                            @error('guardian1_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian1_contact">Guardian #1 Contact No.</label>
                                            <input type="tel" name="guardian1_contact" value="{{ old('guardian1_contact') }}" class="form-control @error('guardian1_contact') is-invalid @enderror" placeholder="Ex: +03 234234 23423"/>
                                            @error('guardian1_contact')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian1_email">Guardian #1 Email.</label>
                                            <input type="email" name="guardian1_email" value="{{ old('guardian1_email') }}" class="form-control @error('guardian1_email') is-invalid @enderror" placeholder="Ex: father@mail.com"/>
                                            @error('guardian1_email')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian1_relationship">Guardian #3 Relationship </label>
                                            <select class="select2-single form-control @error('guardian1_relationship') is-invalid @enderror" name="guardian1_relationship">
                                                <option value="" selected disabled>Select Relation</option>
                                                <option value="Legal Guardian">Legal Guardian</option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Uncle">Uncle</option>
                                                <option value="Aunt">Aunt</option>
                                            </select>
                                            @error('guardian_relation')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian2_name">Guardian #2 Name</label>
                                            <input type="text" name="guardian2_name" value="{{ old('guardian2_name') }}" class="form-control @error('guardian2_name') is-invalid @enderror" placeholder="Ex: John Doe" />
                                            @error('guardian2_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian2_contact">Guardian #2 Contact No.</label>
                                            <input type="tel" name="guardian2_contact" value="{{ old('guardian2_contact') }}" class="form-control @error('guardian2_contact') is-invalid @enderror" placeholder="Ex: +03 234234 23423"/>
                                            @error('guardian2_contact')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian2_email">Guardian #2 Email.</label>
                                            <input type="email" name="guardian2_email" value="{{ old('guardian2_email') }}" class="form-control @error('guardian2_email') is-invalid @enderror" placeholder=""/>
                                            @error('guardian2_email')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian2_relationship">Guardian #3 Relationship </label>
                                            <select class="select2-single form-control @error('guardian2_relationship') is-invalid @enderror" name="guardian2_relationship">
                                                <option value="" selected disabled>Select Relation</option>
                                                <option value="Legal Guardian">Legal Guardian</option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Uncle">Uncle</option>
                                                <option value="Aunt">Aunt</option>
                                            </select>
                                            @error('guardian_relation')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian3_name">Guardian #3 Name</label>
                                            <input type="text" name="guardian3_name" value="{{ old('guardian3_name') }}" class="form-control @error('guardian3_name') is-invalid @enderror" placeholder="Ex: John Doe" />
                                            @error('guardian3_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian3_contact">Guardian #3 Contact No.</label>
                                            <input type="tel" name="guardian3_contact" value="{{ old('guardian3_contact') }}" class="form-control @error('guardian3_contact') is-invalid @enderror" placeholder="Ex: +03 234234 23423"/>
                                            @error('guardian3_contact')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian3_email">Guardian #3 Email.</label>
                                            <input type="email" name="guardian3_email" value="{{ old('guardian3_email') }}" class="form-control @error('guardian3_email') is-invalid @enderror" placeholder=""/>
                                            @error('guardian3_email')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian3_relationship">Guardian #3 Relationship </label>
                                            <select class="select2-single form-control @error('guardian3_relationship') is-invalid @enderror" name="guardian3_relationship">
                                                <option value="" selected disabled>Select Relation</option>
                                                <option value="Legal Guardian">Legal Guardian</option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Uncle">Uncle</option>
                                                <option value="Aunt">Aunt</option>
                                            </select>
                                            @error('guardian_relation')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Players Information --}}
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom" style="padding: 12px 20px;">
                                    <h5 class="card-title float-left mb-0" style="margin-top: 4px;">Player's Personal Infomation</h5>
                                    <a href="javascript:void(0);" id="add_new_player" class="btn btn-dark btn-sm float-right font-13">
                                        <i class="la la-plus"></i>
                                        Add Player
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="row player-list-row">
                                        <div class="col-md-6 player-list">
                                            <div class="card border m-b-10">
                                                <div class="card-header border-bottom bg-dark-rgba" style="padding: 8px 16px;">
                                                    <h5 class="card-title float-left mb-0" style="margin-top: 4px;">Player #1</h5>
                                                    <a href="javascript:void(0);" id="remove_player" class="btn btn-danger btn-sm float-right font-13 remove-player" onclick="return confirm('Are you sure?');">
                                                        <i class="la la-remove"></i>
                                                        Remove
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 form-group">
                                                            <label for="first_name">First Name <span class="required">*</span></label>
                                                            <input type="text" name="players[0][first_name]" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Joseph" required/>
                                                            @error('first_name')
                                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="last_name">Last Name <span class="required">*</span></label>
                                                            <input type="text" name="players[0][last_name]" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Kerr" required/>
                                                            @error('last_name')
                                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="contact_number">Phone Number <span class="required">*</span></label>
                                                            <input type="tel" name="players[0][contact_number]" value="{{ old('contact_number') }}" class="form-control @error('contact_number') is-invalid @enderror" placeholder="+1 505-683-1333" required/>
                                                            @error('contact_number')
                                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="jersey_number">Jersey Number</label>
                                                            <input type="text" name="players[0][jersey_number]" value="{{ old('jersey_number') }}" class="form-control @error('jersey_number') is-invalid @enderror" placeholder="+1 505-683-1333" required/>
                                                            @error('jersey_number')
                                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="birthdate">Birthday</label>
                                                            <input type="date" id="birthdate" name="players[0][birthdate]" value="{{ old('birthdate') }}" class="datepicker-here birthdate form-control @error('birthdate') is-invalid @enderror" placeholder="yyyy-mm-dd"/>
                                                            @error('birthdate')
                                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="shirt_size">Shirt Size <span class="required">*</span></label>
                                                            <select class="select2-single form-control @error('shirt_size') is-invalid @enderror" name="players[0][shirt_size]" required>
                                                                <option value="" >Select Shirt Size</option>
                                                                <option value="Youth Xsmall">Youth Xsmall</option>
                                                                <option value="Youth Small">Youth Small</option>
                                                                <option value="Youth Medium">Youth Medium</option>
                                                                <option value="Youth Large">Youth Large</option>
                                                                <option value="Youth XL">Youth XL</option>
                                                                <option value="Adult Small">Adult Small</option>
                                                                <option value="Adult Medium">Adult Medium</option>
                                                                <option value="Adult Large">Adult Large</option>
                                                                <option value="Adult XL">Adult XL</option>
                                                                <option value="Adult 2XL">Adult 2XL</option>
                                                                <option value="Adult 3XL">Adult 3XL</option>
                                                            </select>
                                                            @error('shirt_size')
                                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="short_size">Short Size <span class="required">*</span></label>
                                                            <select class="select2-single form-control @error('short_size') is-invalid @enderror" name="players[0][short_size]" required>
                                                                <option value="" >Select Short Size</option>
                                                                <option value="Youth Xsmall">Youth Xsmall</option>
                                                                <option value="Youth Small">Youth Small</option>
                                                                <option value="Youth Medium">Youth Medium</option>
                                                                <option value="Youth Large">Youth Large</option>
                                                                <option value="Youth XL">Youth XL</option>
                                                                <option value="Adult Small">Adult Small</option>
                                                                <option value="Adult Medium">Adult Medium</option>
                                                                <option value="Adult Large">Adult Large</option>
                                                                <option value="Adult XL">Adult XL</option>
                                                                <option value="Adult 2XL">Adult 2XL</option>
                                                                <option value="Adult 3XL">Adult 3XL</option>
                                                            </select>
                                                            @error('short_size')
                                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label for="street_address">Street Address <span class="required">*</span></label>
                                                            <input type="text" name="players[0][street_address]" value="{{ old('street_address') }}" class="form-control @error('street_address') is-invalid @enderror" placeholder="123 Main Street" required/>
                                                            @error('street_address')
                                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="city">City <span class="required">*</span></label>
                                                            <input type="text" name="players[0][city]" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror" placeholder="City" required/>
                                                            @error('city')
                                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="state">State <span class="required">*</span></label>
                                                            <input type="text" name="players[0][state]" value="{{ old('state') }}" class="form-control @error('state') is-invalid @enderror" placeholder="State" required/>
                                                            @error('state')
                                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="postal_code">Zip Code <span class="required">*</span></label>
                                                            <input type="text" name="players[0][postal_code]" value="{{ old('postal_code') }}" class="form-control @error('postal_code') is-invalid @enderror" placeholder="20620" required/>
                                                            @error('postal_code')
                                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label for="note">Note</label>
                                                            <textarea name="players[0][note]" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="Note">{{ old('note') }}</textarea>
                                                            @error('note')
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
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark btn-outline-custom float-right">
                                <i class="feather icon-plus mr-1"></i>
                                <span class="text-bold">Create Now</span>
                            </button>
                        </div>
                    </div>
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
    {{-- <script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datepicker/i18n/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-datepicker.js') }}"></script> --}}
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        // $(document).ready(function() {
        //     /* --- Form - Datepicker -- */
        //     $('.birthdate').datepicker({
        //         language: 'en',
        //         autoClose: true,
        //         dateFormat: 'yyyy-mm-dd',
        //     });
        // });
    </script>

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
        $("#playerAvatar").change(function() {
            readURL(this);
        });
    </script>

    <script>
        $(document).ready(function(){
            // Counter for player number
            var playerCount = 1;

            // Function to add a new player
            $('#add_new_player').on('click', function(){
                playerCount++; // Increment player count
                var newPlayer = $('.player-list:first').clone(); // Clone the first player list
                newPlayer.find('.card-title').text('Player #' + playerCount); // Update player number
                newPlayer.find('.remove-player').show(); // Show remove button for cloned player list
                newPlayer.find('input, select, textarea').val(''); // Clear input values
                newPlayer.find('.select2-container').remove(); // Remove select2 container from cloned player list
                newPlayer.appendTo('.player-list-row'); // Append cloned player list to card body

                // Update names of inputs
                newPlayer.find('input, select, textarea').each(function() {
                    var oldName = $(this).attr('name');
                    var newName = oldName.replace('[0]', '[' + playerCount + ']');
                    $(this).attr('name', newName);
                });

                // Reinitialize select2 for the new player
                initializeSelect2(newPlayer);
            });

            // Initially hide remove button for the first default player list
            $('.player-list:first').find('.remove-player').hide();

            // Remove player function
            $(document).on('click', '.remove-player', function(){
                $(this).closest('.player-list').remove(); // Remove the player list
                playerCount--; // Decrement player count
            });

            // Initialize select2 for the default player list
            initializeSelect2($('.player-list:first'));
        });

        // Function to initialize select2 for the new player
        function initializeSelect2(element) {
            element.find('.select2-single').select2(); // Initialize select2
        }
    </script>
    <script>
        $(document).ready(function(){
            $('#division_gender').change(function(){
                var gender = $(this).val();
                $.ajax({
                    url: '{{ route("administration.player.get-divisions") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        gender: gender
                    },
                    success: function(data){
                        $('#division').html('');
                        $.each(data, function(index, division){
                            $('#division').append('<option value="'+division.id+'">'+division.name+'</option>');
                        });
                        $('#division').show();
                    }
                });
            });
            $('#grade_gender').change(function(){
                var grade = $(this).val();
                $.ajax({
                    url: '{{ route("administration.player.get-divisions") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        gender: grade
                    },
                    success: function(data){
                        $('#grade').html('');
                        $.each(data, function(index, division){
                            $('#grade').append('<option value="'+division.id+'">'+division.name+'</option>');
                        });
                        $('#grade').show();
                    }
                });
            });
        });
    </script>
@endsection