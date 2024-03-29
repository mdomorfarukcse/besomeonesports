@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Add New Player'))

@section('css_links')
    {{--  External CSS  --}}
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
    <b class="text-uppercase">{{ __('Edit Player') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Players') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.player.index') }}">{{ __('All Players') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.player.show', ['player' => $player]) }}">{{ __('Show Details') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Edit Player') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.player.show', ['player' => $player]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.player.update', ['player' => $player]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title text-dark mb-0">Update Player</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    {{-- {{ dd($player->user->avatar) }} --}}
                                    <input type="file" id="playerAvatar" name="avatar" accept=".png, .jpg, .jpeg"/>
                                    <label for="playerAvatar"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url({{ show_image($player->user->avatar) }});"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Player Info</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <label for="division_id">Division <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('division_id') is-invalid @enderror" name="division_id" required>
                                                <option value="" selected disabled>Select Division</option>
                                                @foreach ($divisions as $division) 
                                                    <option value="{{ $division->id }}" @selected($division->id === $player->division_id)>{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group col-md-8">
                                            <label for="position">Player Position</label>
                                            <input type="text" name="position" value="{{ $player->position }}" class="form-control @error('position') is-invalid @enderror" placeholder="Ex: Right Hand Batsman"/>
                                            @error('position')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div> --}}
                                        <div class="form-group col-md-4">
                                            <label for="status">Status <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('status') is-invalid @enderror" name="status" required>
                                                <option value="">Select Status</option>
                                                <option value="Active" @if ($player->status === 'Active') selected @endif>Active</option>
                                                <option value="Inactive" @if ($player->status === 'Inactive') selected @endif>Inactive</option>
                                            </select>
                                            @error('status')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                                <label for="guardian_id">Guardian</label>
                                                <select class="select2-single form-control @error('guardian_id') is-invalid @enderror" name="guardian_id">
                                                    <option value="" selected disabled>Select Guardian</option>
                                                    @foreach ($guardians as $guardian) 
                                                        <option value="{{ $guardian->id }}" @selected($guardian->id === $player->guardian_id)>{{ $guardian->name }}</option>
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
                                                <option value="Father" @selected($player->guardian_relation === 'Father')>Father</option>
                                                <option value="Mother" @selected($player->guardian_relation === 'Mother')>Mother</option>
                                                <option value="Brother" @selected($player->guardian_relation === 'Brother')>Brother</option>
                                                <option value="Sister" @selected($player->guardian_relation === 'Sister')>Sister</option>
                                                <option value="Uncle" @selected($player->guardian_relation === 'Uncle')>Uncle</option>
                                                <option value="Aunty" @selected($player->guardian_relation === 'Aunty')>Aunty</option>
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
                                    <h5 class="card-title mb-0">Personal Infomation</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="first_name">First Name <span class="required">*</span></label>
                                            <input type="text" name="first_name" value="{{ $player->first_name }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Joseph" required/>
                                            @error('first_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="last_name">Last Name <span class="required">*</span></label>
                                            <input type="text" name="last_name" value="{{ $player->last_name }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Kerr" required/>
                                            @error('last_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="contact_number">Contact Number <span class="required">*</span></label>
                                            <input type="tel" name="contact_number" value="{{ $player->contact_number }}" class="form-control @error('contact_number') is-invalid @enderror" placeholder="+1 505-683-1334" required/>
                                            @error('contact_number')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="birthdate">Birthdate <span class="required">*</span></label>
                                            <input type="date" name="birthdate" value="{{ $player->birthdate }}" class="form-control @error('birthdate') is-invalid @enderror" placeholder="yyyy-mm-dd" required/>
                                            @error('birthdate')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="grade">Grade <span class="required">*</span></label>
                                            <input type="text" name="grade" value="{{ $player->grade }}" class="form-control @error('grade') is-invalid @enderror" placeholder="Grade" required/>
                                            @error('grade')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="shirt_size">Shirt Size <span class="required">*</span></label>
                                            <input type="text" name="shirt_size" value="{{ $player->shirt_size }}" class="form-control @error('shirt_size') is-invalid @enderror" placeholder="Shirt Size" required/>
                                            @error('shirt_size')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="short_size">Short Size <span class="required">*</span></label>
                                            <input type="text" name="short_size" value="{{ $player->short_size }}" class="form-control @error('short_size') is-invalid @enderror" placeholder="Short Size" required/>
                                            @error('short_size')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <label for="street_address">Street Address <span class="required">*</span></label>
                                            <input type="text" name="street_address" value="{{ $player->street_address }}" class="form-control @error('street_address') is-invalid @enderror" placeholder="Box 283 8562 Fusce Rd." required/>
                                            @error('street_address')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="city">City <span class="required">*</span></label>
                                            <input type="text" name="city" value="{{ $player->city }}" class="form-control @error('city') is-invalid @enderror" placeholder="Iris Watson" required/>
                                            @error('city')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="state">State/Province <span class="required">*</span></label>
                                            <input type="text" name="state" value="{{ $player->state }}" class="form-control @error('state') is-invalid @enderror" placeholder="Frederick Nebraska" required/>
                                            @error('state')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="postal_code">Postal Code <span class="required">*</span></label>
                                            <input type="text" name="postal_code" value="{{ $player->postal_code }}" class="form-control @error('postal_code') is-invalid @enderror" placeholder="20620" required/>
                                            @error('postal_code')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="extended_address">Extended Address</label>
                                            <input type="text" name="extended_address" value="{{ $player->extended_address }}" class="form-control @error('extended_address') is-invalid @enderror" placeholder="Box 283 8562 Fusce Rd."/>
                                            @error('extended_address')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="note">Note</label>
                                            <textarea name="note" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="Note">{{ $player->note }}</textarea>
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
                                            <input type="text" name="guardian1_name" value="{{ $player->guardian1_name }}" class="form-control @error('guardian1_name') is-invalid @enderror" placeholder="Ex: John Doe" required/>
                                            @error('guardian1_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian1_contact">Guardian #1 Contact No.</label>
                                            <input type="text" name="guardian1_contact" value="{{ $player->guardian1_contact }}" class="form-control @error('guardian1_contact') is-invalid @enderror" placeholder="Ex: +03 234234 23423"/>
                                            @error('guardian1_contact')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian1_email">Guardian #1 Email.</label>
                                            <input type="text" name="guardian1_email" value="{{ $player->guardian1_email }}" class="form-control @error('guardian1_email') is-invalid @enderror" placeholder=""/>
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
                                            <label for="guardian2_name">Guardian #2 Name </label>
                                            <input type="text" name="guardian2_name" value="{{ $player->guardian2_name }}" class="form-control @error('guardian2_name') is-invalid @enderror" placeholder="Ex: John Doe" />
                                            @error('guardian2_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian2_contact">Guardian #2 Contact No.</label>
                                            <input type="text" name="guardian2_contact" value="{{ $player->guardian2_contact }}" class="form-control @error('guardian2_contact') is-invalid @enderror" placeholder="Ex: +03 234234 23423"/>
                                            @error('guardian2_contact')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian2_email">Guardian #2 Email.</label>
                                            <input type="text" name="guardian2_email" value="{{ $player->guardian2_email }}" class="form-control @error('guardian2_email') is-invalid @enderror" placeholder="Ex: mother@mail.com"/>
                                            @error('guardian2_email')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian2_name">Guardian #2 Relationship</label>
                                            <input type="text" name="guardian2_relationship" value="{{ old('guardian2_relationship') }}" class="form-control @error('guardian2_relationship') is-invalid @enderror" placeholder="" />
                                            @error('guardian2_relationship')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian3_name">Guardian #3 Name </label>
                                            <input type="text" name="guardian3_name" value="{{ $player->guardian3_name }}" class="form-control @error('guardian3_name') is-invalid @enderror" placeholder="Ex: John Doe" />
                                            @error('guardian3_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian3_contact">Guardian #3 Contact No.</label>
                                            <input type="text" name="guardian3_contact" value="{{ $player->guardian3_contact }}" class="form-control @error('guardian3_contact') is-invalid @enderror" placeholder="Ex: +03 234234 23423"/>
                                            @error('guardian3_contact')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian3_email">Guardian #3 Email.</label>
                                            <input type="text" name="guardian3_email" value="{{ $player->guardian3_email }}" class="form-control @error('guardian3_email') is-invalid @enderror" placeholder=""/>
                                            @error('guardian3_email')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="guardian3_name">Guardian #3 Relationship</label>
                                            <input type="text" name="guardian3_relationship" value="{{ old('guardian3_relationship') }}" class="form-control @error('guardian3_relationship') is-invalid @enderror" placeholder="" />
                                            @error('guardian3_relationship')
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
                        <span class="text-bold">Update Player</span>
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
        $("#playerAvatar").change(function() {
            readURL(this);
        });
    </script>
@endsection
