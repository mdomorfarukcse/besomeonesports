<div class="col-md-12">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border">
                        <div class="card-header bg-primary-rgba border-bottom">
                            <h5 class="card-title text-primary mb-0">Personal Information</h5>
                        </div>
                        <div class="card-body py-2">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <tbody>
                                            <tr class="text-center">
                                                <td colspan="2">
                                                    <div class="user-avatar">
                                                        @if (is_null($profile->avatar)) 
                                                            <img src="https://fakeimg.pl/500x500" alt="User Avatar" class="img-thumbnail" width="250">
                                                        @else 
                                                            <img src="{{ show_image($profile->avatar) }}" alt="User Avatar" class="img-thumbnail" width="250">
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Player ID (PID)</th>
                                                <td class="text-primary text-bold">{{ $profile->player->player_id }}</td>
                                            </tr>
                                            @if (!empty($profile->player->position))
                                                <tr>
                                                    <th>Position</th>
                                                    <td>{{ $profile->player->position }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th>Name</th>
                                                <td>{{ $profile->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $profile->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Contact</th>
                                                <td>{{ $profile->player->contact_number }}</td>
                                            </tr>
                                            @if (!empty($profile->player->height))
                                                <tr>
                                                    <th>Height</th>
                                                    <td>{!! show_height($profile->player->height) !!}</td>
                                                </tr>
                                            @endif
                                            @if (!empty($profile->player->weight))
                                                <tr>
                                                    <th>Weight</th>
                                                    <td>{!! show_weight($profile->player->weight) !!}</td>
                                                </tr>
                                            @endif                                                    
                                            <tr>
                                                <th>Address</th>
                                                <td>
                                                    <address class="mb-0">
                                                        Post: {{ $profile->player->postal_code }}
                                                        <br>    
                                                        City: {{ $profile->player->city }}
                                                        <br>    
                                                        State: {{ $profile->player->state }}
                                                        <br>
                                                        Street Address: {{ $profile->player->street_address }}
                                                        @if (!empty($profile->player->extended_address))
                                                            <br>
                                                            Extended Address: {{ $profile->player->extended_address }}
                                                        @endif
                                                    </address>    
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>{!! status($profile->player->status) !!}</td>
                                            </tr>
                                            @if (!empty($profile->player->note))
                                                <tr>
                                                    <th>Note</th>
                                                    <td>{!! $profile->player->note !!}</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header bg-primary-rgba border-bottom">
                                    <h5 class="card-title text-primary mb-0">Guardian's Information</h5>
                                </div>
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Guardian #1 Name</th>
                                                        <td>{{ $player->guardian1_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Guardian #1 Email</th>
                                                        <td>{{ $player->guardian1_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Guardian #1 Contact</th>
                                                        <td>{{ $player->guardian1_contact }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Guardian #1 Relationship</th>
                                                        <td>{{ $player->guardian1_relationship }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Guardian #2 Name</th>
                                                        <td>{{ $player->guardian2_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Guardian #2 Email</th>
                                                        <td>{{ $player->guardian2_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Guardian #2 Contact</th>
                                                        <td>{{ $player->guardian2_contact }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Guardian #2 Relationship</th>
                                                        <td>{{ $player->guardian2_relationship }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Guardian #3 Name</th>
                                                        <td>{{ $player->guardian3_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Guardian #3 Email</th>
                                                        <td>{{ $player->guardian3_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Guardian #3 Contact</th>
                                                        <td>{{ $player->guardian3_contact }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Guardian #3 Relationship</th>
                                                        <td>{{ $player->guardian3_relationship }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header bg-primary-rgba border-bottom">
                                    <h5 class="card-title text-primary mb-0">Guardian's Information</h5>
                                </div>
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td colspan="2">
                                                            <div class="user-avatar">
                                                                @if (is_null($profile->player->guardian->avatar)) 
                                                                    <img src="https://fakeimg.pl/200x200" alt="User Avatar" class="img-thumbnail" width="150">
                                                                @else 
                                                                    <img src="{{ show_image($profile->player->guardian->avatar) }}" alt="User Avatar" class="img-thumbnail" width="150">
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td>{{ $profile->player->guardian->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Relation</th>
                                                        <td>{{ $profile->player->guardian_relation }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>{{ $profile->player->guardian->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Contact</th>
                                                        <td>{{ $profile->player->guardian->contact_number }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
</div>