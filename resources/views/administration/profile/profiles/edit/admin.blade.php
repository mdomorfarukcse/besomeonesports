<div class="col-md-12">
    <form action="{{ route('administration.profile.admin.update', ['user' => $profile]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="card m-b-30">
            <div class="card-header border-bottom">
                <h5 class="card-title text-dark mb-0">Update Profile</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" id="userAvatar" name="avatar" value="{{ show_avatar($profile->avatar) }}" accept=".png, .jpg, .jpeg" />
                                <label for="userAvatar"></label>
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
                                        <label for="name">Full Name <span class="required">*</span></label>
                                        <input type="text" name="name" value="{{ $profile->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Joseph Sudan" required/>
                                        @error('name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="email">Email <span class="required">*</span></label>
                                        <input type="text" name="email" value="{{ $profile->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="joseph@mail.com" required/>
                                        @error('email')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="birthdate">Birthdate <span class="required">*</span></label>
                                        <input type="date" name="birthdate" value="{{ $profile->birthdate }}" class="form-control @error('birthdate') is-invalid @enderror" placeholder="yyyy-mm-dd" required/>
                                        @error('birthdate')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="contact_number">Contact Number <span class="required">*</span></label>
                                        <input type="tel" name="contact_number" value="{{ $profile->contact_number }}" class="form-control @error('contact_number') is-invalid @enderror" placeholder="+1 505-683-1334" required/>
                                        @error('contact_number')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="city">City <span class="required">*</span></label>
                                        <input type="text" name="city" value="{{ $profile->city }}" class="form-control @error('city') is-invalid @enderror" placeholder="Iris Watson" required/>
                                        @error('city')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="state">State/Province <span class="required">*</span></label>
                                        <input type="text" name="state" value="{{ $profile->state }}" class="form-control @error('state') is-invalid @enderror" placeholder="Frederick Nebraska" required/>
                                        @error('state')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="postal_code">Postal Code <span class="required">*</span></label>
                                        <input type="text" name="postal_code" value="{{ $profile->postal_code }}" class="form-control @error('postal_code') is-invalid @enderror" placeholder="20620" required/>
                                        @error('postal_code')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="address">Street Address <span class="required">*</span></label>
                                        <input type="text" name="address" value="{{ $profile->address }}" class="form-control @error('address') is-invalid @enderror" placeholder="Box 283 8562 Fusce Rd." required/>
                                        @error('address')
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
                <button type="submit" class="btn btn-dark btn-outline-custom float-right">
                    <i class="feather icon-plus mr-1"></i>
                    <span class="text-bold">Update Profile</span>
                </button>
            </div>
        </div>
    </form>
</div>