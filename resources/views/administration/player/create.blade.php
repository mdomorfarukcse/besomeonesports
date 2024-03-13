@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Add New Player'))

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
                        <div class="col-md-12 form-group">
                            <label for="player_id">Player ID (CID) <span class="required">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">BSPLAYER</span>
                                </div>
                                <input type="text" name="player_id" value="{{ $player_id }}" readonly class="form-control text-bold @error('player_id') is-invalid @enderror" placeholder="BSPLAYER202302011235" required/>
                            </div>
                            @error('player_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type="file" id="playerAvatar" name="avatar" accept=".png, .jpg, .jpeg"/>
                                    <label for="playerAvatar"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(https://fakeimg.pl/500x500);"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Credentials</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="email">Email <span class="required">*</span></label>
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="player@mail.com" required/>
                                            @error('email')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="password">Password <span class="required">*</span></label>
                                            <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Co@cH2023#" required/>
                                            @error('password')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Player Info</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="division_id">Division <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('division_id') is-invalid @enderror" name="division_id" required>
                                                <option value="" selected disabled>Select Division</option>
                                                @foreach ($divisions as $division) 
                                                    <option value="{{ $division->id }}">{{ $division->name }} ({{ $division->gender }})</option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group col-md-12">
                                            <label for="position">Player Position</label>
                                            <input type="text" name="position" value="{{ old('position') }}" class="form-control @error('position') is-invalid @enderror" placeholder="Ex: Right Hand Batsman"/>
                                            @error('position')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div> --}}
                                        <input type="hidden" name="position" value="" class="form-control" />

                                        <input type="hidden" name="status" value="Active" required>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                <option value="Aunty">Aunty</option>
                                            </select>
                                            @error('guardian_relation')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Player's Personal Infomation</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label for="first_name">First Name <span class="required">*</span></label>
                                            <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Joseph" required/>
                                            @error('first_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" name="middle_name" value="{{ old('middle_name') }}" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Roberts"/>
                                            @error('middle_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="last_name">Last Name <span class="required">*</span></label>
                                            <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Kerr" required/>
                                            @error('last_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="contact_number">Contact Number <span class="required">*</span></label>
                                            <input type="tel" name="contact_number" value="{{ old('contact_number') }}" class="form-control @error('contact_number') is-invalid @enderror" placeholder="+1 505-683-1333" required/>
                                            @error('contact_number')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="birthdate">Birthdate</label>
                                            <input type="text" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" class="datepicker-here form-control @error('birthdate') is-invalid @enderror" placeholder="yyyy-mm-dd"/>
                                            @error('birthdate')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="grade">Grade <span class="required">*</span></label>
                                            <input type="text" name="grade" value="{{ old('grade') }}" class="form-control @error('grade') is-invalid @enderror" placeholder="Grade" required/>
                                            @error('grade')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="shirt_size">Shirt Size <span class="required">*</span></label>
                                            <input type="text" name="shirt_size" value="{{ old('shirt_size') }}" class="form-control @error('shirt_size') is-invalid @enderror" placeholder="Shirt Size" required/>
                                            @error('shirt_size')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="short_size">Short Size <span class="required">*</span></label>
                                            <input type="text" name="short_size" value="{{ old('short_size') }}" class="form-control @error('short_size') is-invalid @enderror" placeholder="Short Size" required/>
                                            @error('short_size')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-7 form-group">
                                            <label for="street_address">Street Address <span class="required">*</span></label>
                                            <input type="text" name="street_address" value="{{ old('street_address') }}" class="form-control @error('street_address') is-invalid @enderror" placeholder="123 Main Street, Anytown, USA 12345" required/>
                                            @error('street_address')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <label for="city">City <span class="required">*</span></label>
                                            <input type="text" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror" placeholder="Iris Watson" required/>
                                            @error('city')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="state">State/Province <span class="required">*</span></label>
                                            <input type="text" name="state" value="{{ old('state') }}" class="form-control @error('state') is-invalid @enderror" placeholder="Frederick Nebraska" required/>
                                            @error('state')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="postal_code">Postal Code <span class="required">*</span></label>
                                            <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control @error('postal_code') is-invalid @enderror" placeholder="20620" required/>
                                            @error('postal_code')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <label for="extended_address">Extended Address</label>
                                            <input type="text" name="extended_address" value="{{ old('extended_address') }}" class="form-control @error('extended_address') is-invalid @enderror" placeholder="Box 283 8562 Fusce Rd."/>
                                            @error('extended_address')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="note">Note</label>
                                            <textarea name="note" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="Note">{{ old('note') }}</textarea>
                                            @error('note')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Parents Info</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label for="father_name">Guardian #1 Name <span class="required">*</span></label>
                                            <input type="text" name="father_name" value="{{ old('father_name') }}" class="form-control @error('father_name') is-invalid @enderror" placeholder="Ex: John Doe" required/>
                                            @error('father_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="father_contact">Guardian #1 Contact No.</label>
                                            <input type="tel" name="father_contact" value="{{ old('father_contact') }}" class="form-control @error('father_contact') is-invalid @enderror" placeholder="Ex: +03 234234 23423"/>
                                            @error('father_contact')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="father_email">Guardian #1 Email.</label>
                                            <input type="email" name="father_email" value="{{ old('father_email') }}" class="form-control @error('father_email') is-invalid @enderror" placeholder="Ex: father@mail.com"/>
                                            @error('father_email')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="mother_name">Guardian #2 Name <span class="required">*</span></label>
                                            <input type="text" name="mother_name" value="{{ old('mother_name') }}" class="form-control @error('mother_name') is-invalid @enderror" placeholder="Ex: John Doe" required/>
                                            @error('mother_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="mother_contact">Guardian #2 Contact No.</label>
                                            <input type="tel" name="mother_contact" value="{{ old('mother_contact') }}" class="form-control @error('mother_contact') is-invalid @enderror" placeholder="Ex: +03 234234 23423"/>
                                            @error('mother_contact')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="mother_email">Guardian #2 Email.</label>
                                            <input type="email" name="mother_email" value="{{ old('mother_email') }}" class="form-control @error('mother_email') is-invalid @enderror" placeholder="Ex: mother@mail.com"/>
                                            @error('mother_email')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="father_name">Guardian Relationship <span class="required">*</span></label>
                                            <input type="text" name="father_name" value="{{ old('father_name') }}" class="form-control @error('father_name') is-invalid @enderror" placeholder="Ex: John Doe" required/>
                                            @error('father_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
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
                                <span class="text-bold">Create New Player</span>
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
            $('#birthdate').datepicker({
                language: 'en',
                autoClose: true,
                dateFormat: 'yyyy-mm-dd',
            });
        });
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
@endsection
