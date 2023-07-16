@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Add Player'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Add Player') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Add Player') }}</li>
@endsection



@section('content')

<!-- Start row -->
<form>
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Add Players</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="foremail">Player ID</label>
                                <input type="text" class="form-control mb-3" id="foremail" value="33333" disabled />
                            </div>
                            <div class="form-group">
                                <label for="foremail">First Name</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Last Name</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Birthdate</label>
                                <input type="date" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Email</label>
                                <input type="email" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Home Phone</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Street Address</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Extended Address</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">City</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">State/Region</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Postal Code</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Roster Status</label>
                                <select class="form-control">
                                    <option selected="selected" value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Archived">Archived</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">PLAYER ACADEMICS</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="foremail">School</label>
                                <input type="text" class="form-control" placeholder=" " />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Grade</label>
                                <input type="text" class="form-control" id="foremail" placeholder="i.e. 6-4" />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Graduation Year</label>
                                <input type="text" class="form-control" id="foremail" placeholder="lbs" />
                            </div>
                            <div class="form-group">
                                <label for="foremail">ACT Score</label>
                                <input type="text" class="form-control" id="foremail" />
                            </div>
                            <div class="form-group">
                                <label for="foremail">SAT Score</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">G.P.A.</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">PLAYER INFO</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="foremail">Position</label>
                                <input type="text" class="form-control" placeholder=" i.e. PG" />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Height</label>
                                <input type="text" class="form-control" id="foremail" placeholder="i.e. 6-4" />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Weight</label>
                                <input type="text" class="form-control" id="foremail" placeholder="lbs" />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Travel Team</label>
                                <input type="text" class="form-control" id="foremail" />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Number</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">GUARDIAN</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="foremail">Role</label>
                                <select name="" id="" class="form-control">
                                    <option selected="selected" value="Other">Other</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Grandparent">Grandparent</option>
                                    <option value="Aunt">Aunt</option>
                                    <option value="Uncle">Uncle</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foremail">First Name</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Last Name</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Email</label>
                                <input type="email" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Phone</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">SOCIAL</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="foremail">Website</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Twitter Handle</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Instagram Handle</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Facebook Page</label>
                                <input type="text" class="form-control" id="foremail" required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <!-- End row -->
</form>

<!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}   
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
