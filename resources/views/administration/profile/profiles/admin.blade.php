<div class="col-md-6">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card border">
                        <div class="card-header bg-primary-rgba border-bottom">
                            <h5 class="card-title text-primary mb-0">Profile Information</h5>
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
                                                <th>Name</th>
                                                <td>{{ $profile->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $profile->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Contact</th>
                                                <td>{{ $profile->contact_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>Birthdate</th>
                                                <td>{{ show_date($profile->birthdate) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>
                                                    <address class="mb-0">
                                                        Zip Code: {{ $profile->postal_code }}
                                                        <br>    
                                                        City: {{ $profile->city }}
                                                        <br>    
                                                        State: {{ $profile->state }}
                                                        <br>
                                                        Street Address: {{ $profile->address }}
                                                    </address>    
                                                </td>
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