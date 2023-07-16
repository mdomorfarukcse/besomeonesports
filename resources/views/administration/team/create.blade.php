@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Add Team'))

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
    <b class="text-uppercase">{{ __('Add Team') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Add Team') }}</li>
@endsection



@section('content')

<!-- Start Form -->
<form>
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-8">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Team</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="foremail">Team ID</label>
                        <input type="text" class="form-control" id="foremail" value="33333" readonly />
                    </div>
                    <div class="form-group">
                        <label for="foremail">Event</label>
                        <select name="" id="" class="form-control">
                            <option value="651145">Backourt Alvin Classic</option>
                            <option value="651146"> Be Someone Sports Friendswood Basketball League</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foremail">Division</label>
                        <select name="" id="" class="form-control">
                            <option value="651145">11u (Girls) (Inactive)</option>
                            <option value="651146">12u (Girls) (Inactive)</option>
                            <option value="651147">13u (Girls) (Inactive)</option>
                            <option value="651148">14u (Girls) (Inactive)</option>
                            <option value="651139">10u (Boys)</option>
                            <option selected="selected" value="651141">11u (Boys)</option>
                            <option value="651142">12u (Boys)</option>
                            <option value="651143">13u (Boys)</option>
                            <option value="651144">14u (Boys)</option>
                            <option value="651554">15U Boys</option>
                            <option value="651140">10u (Girls) (Inactive)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foremail">Name</label>
                        <input type="text" class="form-control" id="foremail" />
                    </div>
                    <div class="form-group">
                        <label for="foremail">Age</label>
                        <select name="" id="" class="form-control">
                            <option value=""> - Age - </option>
                            <option value="43">Adult</option>
                            <option value="42">19U</option>
                            <option value="35">18U</option>
                            <option value="12">17U</option>
                            <option value="14">16U</option>
                            <option value="16">15U</option>
                            <option value="18">14U</option>
                            <option value="20">13U</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foremail">Grade</label>
                        <select name="" id="" class="form-control">
                            <option value=""> - No Grade - </option>
                            <option value="1">12th</option>
                            <option value="2">11th</option>
                            <option value="3">10th</option>
                            <option value="4">9th</option>
                            <option value="5">8th</option>
                            <option value="6">7th</option>
                            <option value="7">6th</option>
                            <option value="8">5th</option>
                            <option value="9">4th</option>
                            <option value="10">3rd</option>
                            <option value="31">2nd</option>
                            <option value="32">1st</option>
                            <option value="33">K</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foremail">Gender</label>
                        <select name="" id="" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
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
                        <label for="foremail">Season</label>
                    </div>
                    <div class="input-group mb-3">
                        <select name="start" id="" class="form-control">
                            <option>Start</option>
                            <option>2026</option>
                            <option>2025</option>
                            <option>2024</option>
                            <option selected="selected">2023</option>
                            <option>2022</option>
                            <option>2021</option>
                            <option>2020</option>
                            <option>2019</option>
                            <option>2018</option>
                            <option>2017</option>
                        </select>
                        <span class="input-group-text">-</span>
                        <select name="start" id="" class="form-control">
                            <option>End</option>
                            <option>2026</option>
                            <option>2025</option>
                            <option>2024</option>
                            <option selected="selected">2024</option>
                            <option>2022</option>
                            <option>2021</option>
                            <option>2020</option>
                            <option>2019</option>
                            <option>2018</option>
                            <option>2017</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foremail">Abbreviation</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="foremail">External Team ID</label>
                        <input type="text" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="foremail">Status</label>
                        <select class="form-control">
                            <option selected="selected" value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Archived">Archived</option>
                        </select>
                    </div>
                    <p class="text-red">More info on orginal site</p>
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
</form>



<!-- End Form -->

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
