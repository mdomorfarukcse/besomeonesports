<div class="col-md-12">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
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
                                                <th>Coach ID (PID)</th>
                                                <td class="text-primary text-bold">{{ $profile->coach->coach_id }}</td>
                                            </tr>
                                            @if (!empty($profile->coach->position))
                                                <tr>
                                                    <th>Position</th>
                                                    <td>{{ $profile->coach->position }}</td>
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
                                                <td>{{ $profile->coach->phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>
                                                    <address class="mb-0">
                                                        Post: {{ $profile->coach->postal_code }}
                                                        <br>    
                                                        City: {{ $profile->coach->city }}
                                                        <br>    
                                                        State: {{ $profile->coach->state }}
                                                        <br>
                                                        Street Address: {{ $profile->coach->street_address }}
                                                        @if (!empty($profile->coach->extended_address))
                                                            <br>
                                                            Extended Address: {{ $profile->coach->extended_address }}
                                                        @endif
                                                    </address>    
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>{!! status($profile->coach->status) !!}</td>
                                            </tr>
                                            @if (!empty($profile->coach->note))
                                                <tr>
                                                    <th>Note</th>
                                                    <td>{!! $profile->coach->note !!}</td>
                                                </tr>
                                            @endif
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