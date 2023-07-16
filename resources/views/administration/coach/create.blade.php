@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Add Coach'))

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
    <b class="text-uppercase">{{ __('Add Coach') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Add Coach') }}</li>
@endsection



@section('content')

<!-- Start Row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-8">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Add Coach</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="foremail">Coach ID</label>
                        <input type="text" class="form-control mb-3" id="foremail" value="33333" disabled />
                    </div>
                    <div class="form-group">
                        <label for="foremail">Role</label>
                        <select name="" id="" class="form-control">
                            <option value="Coach">Coach</option>
                            <option value="HeadCoach">Head Coach</option>
                            <option selected="selected" value="AssistantCoach">Assistant Coach</option>
                            <option value="BenchCoach">Bench Coach</option>
                            <option value="Administrator">Administrator</option>
                            <option value="AdministratorHeadCoach">Administrator/Head Coach</option>
                            <option value="AdministratorCoach">Administrator/Coach</option>
                            <option value="Manager">Manager</option>
                            <option value="Guardian">Parent/Guardian</option>
                            <option value="Player">Player</option>
                            <option value="Other">Other</option>
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
                        <label for="foremail">USAB License Number</label>
                        <input type="text" class="form-control" id="foremail" required />
                    </div>
                    <div class="form-group">
                        <label for="foremail">Notes</label>
                        <textarea name="Notes" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="foremail">Status</label>
                        <select class="form-control">
                            <option selected="selected" value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Archived">Archived</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Row -->

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
