@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Update Your Profile'))

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
    <b class="text-uppercase">{{ __('Update Your Profile') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Update Your Profile') }}</li>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.player.new.update', ['user' => $user]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title text-dark mb-0">Update Profile</h5>
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
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Player Info</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="division_id">Division <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('division_id') is-invalid @enderror" name="division_id" required>
                                                <option value="" selected disabled>Select Division</option>
                                                @foreach ($divisions as $division) 
                                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="position">Player Position</label>
                                            <input type="text" name="position" value="{{ old('position') }}" class="form-control @error('position') is-invalid @enderror" placeholder="Ex: Right Hand Batsman"/>
                                            @error('position')
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
                                    <h5 class="card-title mb-0">Personal Infomation</h5>
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
                                            <label for="last_name">Last Name <span class="required">*</span></label>
                                            <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Kerr" required/>
                                            @error('last_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="birthdate">Birthday <span class="required">*</span></label>
                                            <input type="text" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" class="datepicker-here form-control @error('birthdate') is-invalid @enderror" placeholder="yyyy-mm-dd" required/>
                                            @error('birthdate')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="contact_number">Phone Number <span class="required">*</span></label>
                                            <input type="tel" name="contact_number" value="{{ old('contact_number') }}" class="form-control @error('contact_number') is-invalid @enderror" placeholder="+1 (123) 456 -7890" required/>
                                            @error('contact_number')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="city">City <span class="required">*</span></label>
                                            <input type="text" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror" placeholder="City" required/>
                                            @error('city')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="state">State <span class="required">*</span></label>
                                            <input type="text" name="state" value="{{ old('state') }}" class="form-control @error('state') is-invalid @enderror" placeholder="State" required/>
                                            @error('state')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="postal_code">Zip Code <span class="required">*</span></label>
                                            <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control @error('postal_code') is-invalid @enderror" placeholder="20620" required/>
                                            @error('postal_code')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="height">Height</label>
                                            <input type="number" min="0" step="0.01" name="height" value="{{ old('height') }}" class="form-control @error('height') is-invalid @enderror" placeholder="5.6"/>
                                            @error('height')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="weight">Weight</label>
                                            <input type="number" min="0" step="0.01" name="weight" value="{{ old('weight') }}" class="form-control @error('weight') is-invalid @enderror" placeholder="56"/>
                                            @error('weight')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="street_address">Street Address <span class="required">*</span></label>
                                            <input type="text" name="street_address" value="{{ old('street_address') }}" class="form-control @error('street_address') is-invalid @enderror" placeholder="123 Main Street" required/>
                                            @error('street_address')
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
                                        <div class="col-md-3 form-group">
                                            <label for="guardian1_name">Guardian #1 Name <span class="required">*</span></label>
                                            <input type="text" name="guardian1_name" value="{{ old('guardian1_name') }}" class="form-control @error('guardian1_name') is-invalid @enderror" placeholder="Ex: John Doe" required/>
                                            @error('guardian1_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian1_contact">Guardian #1 Contact No.</label>
                                            <input type="tel" name="guardian1_contact" value="{{ old('guardian1_contact') }}" class="form-control @error('guardian1_contact') is-invalid @enderror" placeholder="Ex: +1 (123) 456 -7890"/>
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
                                            <label for="guardian1_name">Guardian #1 Relationship</label>
                                            <input type="text" name="guardian1_relationship" value="{{ old('guardian1_relationship') }}" class="form-control @error('guardian1_relationship') is-invalid @enderror" placeholder="" />
                                            @error('guardian1_relationship')
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
                                            <input type="tel" name="guardian2_contact" value="{{ old('guardian2_contact') }}" class="form-control @error('guardian2_contact') is-invalid @enderror" placeholder="Ex: +1 (123) 456 -7890"/>
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
                                            <label for="guardian2_relationship">Guardian #2 Relationship</label>
                                            <input type="text" name="guardian2_relationship" value="{{ old('guardian2_relationship') }}" class="form-control @error('guardian2_relationship') is-invalid @enderror" placeholder="" />
                                            @error('guardian2_relationship')
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
                                            <input type="tel" name="guardian3_contact" value="{{ old('guardian3_contact') }}" class="form-control @error('guardian3_contact') is-invalid @enderror" placeholder="Ex: +1 (123) 456 -7890"/>
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
                                            <label for="guardian3_relationship">Guardian #3 Relationship</label>
                                            <input type="text" name="guardian3_relationship" value="{{ old('guardian3_relationship') }}" class="form-control @error('guardian3_relationship') is-invalid @enderror" placeholder="" />
                                            @error('guardian3_relationship')
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
                                    <h5 class="card-title mb-0">Local Guardian Info</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="guardian_relation">Relation With Guardian <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('guardian_relation') is-invalid @enderror" name="guardian_relation" required>
                                                <option value="" selected disabled>Select Relation</option>
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
                                        <div class="col-md-6 form-group">
                                            <label for="guardian_name">Guardian Name <span class="required">*</span></label>
                                            <input type="text" name="guardian_name" value="{{ old('guardian_name') }}" class="form-control @error('guardian_name') is-invalid @enderror" placeholder="Ex: John Doe" required/>
                                            @error('guardian_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="guardian_contact">Guardian Contact No. <span class="required">*</span></label>
                                            <input type="tel" name="guardian_contact" value="{{ old('guardian_contact') }}" class="form-control @error('guardian_contact') is-invalid @enderror" placeholder="Ex: +1 (123) 456 -7890" required/>
                                            @error('guardian_contact')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="guardian_email">Guardian Email.</label>
                                            <input type="email" name="guardian_email" value="{{ old('guardian_email') }}" class="form-control @error('guardian_email') is-invalid @enderror" placeholder="Ex: guardian@mail.com"/>
                                            @error('guardian_email')
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
                        <span class="text-bold">Update Profile</span>
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
