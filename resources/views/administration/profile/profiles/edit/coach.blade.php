<div class="col-md-12">
    <form action="{{ route('administration.profile.coach.update', ['coach' => $profile->coach]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <input type="hidden" name="position" value="{{ $profile->coach->position }}">
        <input type="hidden" name="status" value="{{ $profile->coach->status }}">
        <div class="card m-b-30">
            <div class="card-header border-bottom">
                <h5 class="card-title text-dark mb-0">Update Coach</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" id="coachAvatar" name="avatar" value="{{ show_avatar($profile->avatar) }}" accept=".png, .jpg, .jpeg" />
                                <label for="coachAvatar"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url({{ show_avatar($profile->avatar) }});"></div>
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
                                        <input type="text" name="first_name" value="{{ $profile->coach->first_name }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Joseph" required/>
                                        @error('first_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input type="text" name="middle_name" value="{{ $profile->coach->middle_name }}" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Roberts"/>
                                        @error('middle_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="last_name">Last Name <span class="required">*</span></label>
                                        <input type="text" name="last_name" value="{{ $profile->coach->last_name }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Kerr" required/>
                                        @error('last_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="birthdate">Birthdate <span class="required">*</span></label>
                                        <input type="date" name="birthdate" value="{{ $profile->coach->birthdate }}" class="datepicker-here form-control @error('birthdate') is-invalid @enderror" placeholder="yyyy-mm-dd" required/>
                                        @error('birthdate')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="phone_number">Phone Number <span class="required">*</span></label>
                                        <input type="tel" name="phone_number" value="{{ $profile->coach->phone_number }}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="+1 505-683-1334" required/>
                                        @error('phone_number')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="usab_license_no">USAB License No. <span class="required">*</span></label>
                                        <input type="text" name="usab_license_no" value="{{ $profile->coach->usab_license_no }}" class="form-control @error('usab_license_no') is-invalid @enderror" placeholder="88941AE1611" required/>
                                        @error('usab_license_no')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="city">City <span class="required">*</span></label>
                                        <input type="text" name="city" value="{{ $profile->coach->city }}" class="form-control @error('city') is-invalid @enderror" placeholder="Iris Watson" required/>
                                        @error('city')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="state">State/Province <span class="required">*</span></label>
                                        <input type="text" name="state" value="{{ $profile->coach->state }}" class="form-control @error('state') is-invalid @enderror" placeholder="Frederick Nebraska" required/>
                                        @error('state')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="postal_code">Postal Code <span class="required">*</span></label>
                                        <input type="text" name="postal_code" value="{{ $profile->coach->postal_code }}" class="form-control @error('postal_code') is-invalid @enderror" placeholder="20620" required/>
                                        @error('postal_code')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="street_address">Street Address <span class="required">*</span></label>
                                        <input type="text" name="street_address" value="{{ $profile->coach->street_address }}" class="form-control @error('street_address') is-invalid @enderror" placeholder="Box 283 8562 Fusce Rd." required/>
                                        @error('street_address')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="extended_address">Extended Address</label>
                                        <input type="text" name="extended_address" value="{{ $profile->coach->extended_address }}" class="form-control @error('extended_address') is-invalid @enderror" placeholder="Box 283 8562 Fusce Rd."/>
                                        @error('extended_address')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="note">Note</label>
                                        <textarea name="note" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="Note">{{ $profile->coach->note }}</textarea>
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
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                    <i class="feather icon-plus mr-1"></i>
                    <span class="text-bold">Update Coach</span>
                </button>
            </div>
        </div>
    </form>
</div>