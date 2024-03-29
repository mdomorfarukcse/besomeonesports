<div class="col-md-12">
    <form action="{{ route('administration.profile.player.update', ['player' => $profile->player]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <input type="hidden" name="position" value="{{ $profile->player->position }}">
        <input type="hidden" name="status" value="{{ $profile->player->status }}">
        <div class="card m-b-30">
            <div class="card-header border-bottom">
                <h5 class="card-title text-dark mb-0">Update Profile</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @if ($errors->any())
                        <div class="col-12">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <b class="text-danger">
                                            <i class="feather icon-info mr-1"></i>
                                            {{ $error }}
                                        </b>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" id="playerAvatar" name="avatar" value="{{ show_image($profile->avatar) }}" accept=".png, .jpg, .jpeg" />
                                <label for="playerAvatar"></label>
                            </div>
                            <div class="avatar-preview">
                                @if (is_null($profile->avatar))
                                    <div id="imagePreview" style="background-image: url('https://fakeimg.pl/500x500');"></div>
                                @else
                                    <div id="imagePreview" style="background-image: url({{ show_image($profile->avatar) }});"></div>
                                @endif
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
                                        <input type="text" name="first_name" value="{{ $profile->player->first_name }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Joseph" required/>
                                        @error('first_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="last_name">Last Name <span class="required">*</span></label>
                                        <input type="text" name="last_name" value="{{ $profile->player->last_name }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Kerr" required/>
                                        @error('last_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="birthdate">Birthdate <span class="required">*</span></label>
                                        <input type="date" name="birthdate" value="{{ $profile->player->birthdate }}" class="form-control @error('birthdate') is-invalid @enderror" placeholder="yyyy-mm-dd" required/>
                                        @error('birthdate')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="contact_number">Contact Number <span class="required">*</span></label>
                                        <input type="tel" name="contact_number" value="{{ $profile->player->contact_number }}" class="form-control @error('contact_number') is-invalid @enderror" placeholder="+1 505-683-1334" required/>
                                        @error('contact_number')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="city">City <span class="required">*</span></label>
                                        <input type="text" name="city" value="{{ $profile->player->city }}" class="form-control @error('city') is-invalid @enderror" placeholder="Iris Watson" required/>
                                        @error('city')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="state">State/Province <span class="required">*</span></label>
                                        <input type="text" name="state" value="{{ $profile->player->state }}" class="form-control @error('state') is-invalid @enderror" placeholder="Frederick Nebraska" required/>
                                        @error('state')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="postal_code">Postal Code <span class="required">*</span></label>
                                        <input type="text" name="postal_code" value="{{ $profile->player->postal_code }}" class="form-control @error('postal_code') is-invalid @enderror" placeholder="20620" required/>
                                        @error('postal_code')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="height">Height</label>
                                        <input type="number" min="0" step="0.01" name="height" value="{{ $profile->player->height }}" class="form-control @error('height') is-invalid @enderror" placeholder="Frederick Nebraska"/>
                                        @error('height')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="weight">Weight</label>
                                        <input type="number" min="0" step="0.01" name="weight" value="{{ $profile->player->weight }}" class="form-control @error('weight') is-invalid @enderror" placeholder="Frederick Nebraska"/>
                                        @error('weight')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="street_address">Street Address <span class="required">*</span></label>
                                        <input type="text" name="street_address" value="{{ $profile->player->street_address }}" class="form-control @error('street_address') is-invalid @enderror" placeholder="Box 283 8562 Fusce Rd." required/>
                                        @error('street_address')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="extended_address">Extended Address <span class="required">*</span></label>
                                        <input type="text" name="extended_address" value="{{ $profile->player->extended_address }}" class="form-control @error('extended_address') is-invalid @enderror" placeholder="Box 283 8562 Fusce Rd." required/>
                                        @error('extended_address')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="note">Note</label>
                                        <textarea name="note" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="Note">{{ $profile->player->note }}</textarea>
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
                                <h5 class="card-title mb-0">Guardian's Info</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="guardian1_name">Guardian #1 Name <span class="required">*</span></label>
                                        <input type="text" name="guardian1_name" value="{{ $profile->player->guardian1_name }}" class="form-control @error('guardian1_name') is-invalid @enderror" placeholder="Ex: John Doe" required/>
                                        @error('guardian1_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="guardian1_contact">Guardian #1 Contact No.</label>
                                        <input type="text" name="guardian1_contact" value="{{ $profile->player->guardian1_contact }}" class="form-control @error('guardian1_contact') is-invalid @enderror" placeholder="Ex: +03 234234 23423"/>
                                        @error('guardian1_contact')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="guardian1_email">Guardian #1 Email.</label>
                                        <input type="text" name="guardian1_email" value="{{ $profile->player->guardian1_email }}" class="form-control @error('guardian1_email') is-invalid @enderror" placeholder="Ex: father@mail.com"/>
                                        @error('guardian1_email')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="guardian1_relationship">Guardian #1 Relationship.</label>
                                        <input type="text" name="guardian1_relationship" value="{{ $profile->player->guardian1_relationship }}" class="form-control @error('guardian1_relationship') is-invalid @enderror" />
                                        @error('guardian1_email')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="guardian2_name">Guardian #2 Name <span class="required">*</span></label>
                                        <input type="text" name="guardian2_name" value="{{ $profile->player->guardian2_name }}" class="form-control @error('guardian2_name') is-invalid @enderror" placeholder="Ex: John Doe" required/>
                                        @error('guardian2_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="guardian2_contact">Guardian #2 Contact No.</label>
                                        <input type="text" name="guardian2_contact" value="{{ $profile->player->guardian2_contact }}" class="form-control @error('guardian2_contact') is-invalid @enderror" placeholder="Ex: +03 234234 23423"/>
                                        @error('guardian2_contact')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="guardian2_email">Guardian #2 Email.</label>
                                        <input type="text" name="guardian2_email" value="{{ $profile->player->guardian2_email }}" class="form-control @error('guardian2_email') is-invalid @enderror" placeholder="Ex:"/>
                                        @error('guardian2_email')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="guardian2_relationship">Guardian #2 Relationship.</label>
                                        <input type="text" name="guardian2_relationship" value="{{ $profile->player->guardian2_relationship }}" class="form-control @error('guardian2_relationship') is-invalid @enderror" />
                                        @error('guardian2_relationship')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="guardian3_name">Guardian #3 Name <span class="required">*</span></label>
                                        <input type="text" name="guardian3_name" value="{{ $profile->player->guardian3_name }}" class="form-control @error('guardian3_name') is-invalid @enderror" placeholder="Ex: John Doe" required/>
                                        @error('guardian3_name')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="guardian3_contact">Guardian #3 Contact No.</label>
                                        <input type="text" name="guardian3_contact" value="{{ $profile->player->guardian3_contact }}" class="form-control @error('guardian3_contact') is-invalid @enderror" placeholder="Ex: +03 234234 23423"/>
                                        @error('guardian3_contact')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="guardian3_email">Guardian #3 Email.</label>
                                        <input type="text" name="guardian3_email" value="{{ $profile->player->guardian3_email }}" class="form-control @error('guardian3_email') is-invalid @enderror" placeholder="Ex:"/>
                                        @error('guardian3_email')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="guardian3_relationship">Guardian #3 Relationship.</label>
                                        <input type="text" name="guardian3_relationship" value="{{ $profile->player->guardian3_relationship }}" class="form-control @error('guardian3_relationship') is-invalid @enderror" />
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
                                            <option value="">Select Relation</option>
                                            <option value="Father" @selected($profile->player->guardian_relation === 'Father')>Father</option>
                                            <option value="Mother" @selected($profile->player->guardian_relation === 'Mother')>Mother</option>
                                            <option value="Brother" @selected($profile->player->guardian_relation === 'Brother')>Brother</option>
                                            <option value="Sister" @selected($profile->player->guardian_relation === 'Sister')>Sister</option>
                                            <option value="Uncle" @selected($profile->player->guardian_relation === 'Uncle')>Uncle</option>
                                            <option value="Aunty" @selected($profile->player->guardian_relation === 'Aunty')>Aunty</option>
                                        </select>
                                        @error('guardian_relation')
                                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="guardian_id">Select Guardian <span class="required">*</span></label>
                                        <select class="select2-single form-control @error('guardian_id') is-invalid @enderror" name="guardian_id" required>
                                            <option value="">Select Guardian</option>
                                            @foreach ($guardians as $guardian) 
                                                <option value="{{ $guardian->id }}" @selected($guardian->id === $profile->player->guardian_id)>
                                                    {{ $guardian->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('guardian_id')
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