@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Event'))

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
    <b class="text-uppercase">{{ __('Add Event') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Add Event') }}</li>
@endsection



@section('content')

<!-- Start row -->
<form action="">
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Event Info *</h5>
                        </div>
                        <div class="card-body inputform">
                            <div class="form-group">
                                <label for="forstatus">Season</label>
                                <select name="status" class="form-control" id="forstatus" required>
                                    <option value="">Select A Option</option>
                                    <option value="">2023-2024 Winter</option>
                                    <option value="">2023</option>
                                    <option value="">2022-2023</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foremail">Season Name</label>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-control">
                                    <option value=""> - </option>
                                    <option value="0">Team</option>
                                    <option value="1">Individual</option>
                                </select>
                                <select class="form-control">
                                    <option value=""> - </option>
                                    <option value="0">Tournament</option>
                                    <option value="1">League</option>
                                    <option value="2">Camp/Clinic</option>
                                    <option value="3">Tryout</option>
                                    <option value="4">Practice</option>
                                </select>
                                <select class="form-control" required>
                                    <option value="">-</option>
                                    <option value="0">Youth</option>
                                    <option value="1">Adult</option>
                                    <option value="2">Adult/Youth</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foremail">Sub Type</label>
                                <select class="form-control" required>
                                    <option value=""> - </option>
                                    <option value="OneDay">1-Day Play™</option>
                                    <option value="ThreeVsThree">3v3</option>
                                    <option value="OneDayThreeVsThree">3v3, 1-Day Play™</option>
                                    <option value="Ladder">Ladder</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foremail">Event Name</label>
                                <input type="text" class="form-control" id="foremail" placeholder="Enter Event Name" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Gender</label>
                                <select name="" id="" class="form-control">
                                    <option value="N">-</option>
                                    <option value="B">Male &amp; Female</option>
                                    <option selected="selected" value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foremail">Start Date</label>
                                <input type="date" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">End Date</label>
                                <input type="date" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Time Zone</label>
                                <select id="TimeZone" name="TimeZone" class="form-control">
                                    <option selected="selected" value="Central Standard Time">(UTC-06:00) Central Time (US &amp; Canada)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foremail">Offical Website</label>
                                <input type="text" class="form-control" id="foremail" placeholder="besomeonesports.com" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Logo (No Flyers)</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Sport Name</label>
                                <input type="text" class="form-control" id="foremail" placeholder="" required />
                            </div>
                            <div class="form-group">
                                <label for="forstatus">Status</label>
                                <select name="status" class="form-control" id="forstatus" required>
                                    <option value="">Select A Option</option>
                                    <option value="">Active</option>
                                    <option value="">In-Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Event Contact *</h5>
                        </div>
                        <div class="card-body inputform">
                            <div class="form-group">
                                <label for="foremail">Contact Name</label>
                                <input type="text" class="form-control" id="foremail" placeholder="Name" value="Steve Passons" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Contact Email</label>
                                <input type="email" class="form-control" id="foremail" placeholder="Email" value="steve.passons@besomeonesports.com" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Contact Phone</label>
                                <input type="email" class="form-control" id="foremail" placeholder="Phone" value="832-421-2895" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Event Status & Social</h5>
                        </div>
                        <div class="card-body inputform">
                            <div class="form-group">
                                <label for="foremail">Status</label>
                                <select name="" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="">Active</option>
                                    <option value="">In-active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foremail">Twitter Handle</label>
                                <input type="text" class="form-control" id="foremail" placeholder="" value="" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Instagram Handle</label>
                                <input type="text" class="form-control" id="foremail" placeholder="" value="" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Facebook Page</label>
                                <input type="text" class="form-control" id="foremail" placeholder="" value="" required />
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
                            <h5 class="card-title">Event Description</h5>
                        </div>
                        <div class="card-body inputform">
                            <div class="form-group">
                                <label for="forstatus">Short Description</label>
                                <textarea name="short_description" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="forstatus">General Information</label>
                                <textarea name="short_description" class="form-control" id="" cols="30" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foremail">Ability</label>
                                <select class="form-control">
                                    <option value=""> - </option>
                                    <option value="1">Elite</option>
                                    <option value="2">Competitive</option>
                                    <option value="3">Developmental</option>
                                    <option value="4">Elite/Competitive</option>
                                    <option value="5">Competitive/Developmental</option>
                                    <option value="6">Elite/Competitive/Developmental</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foremail">Invite Type</label>
                                <select id="InviteType" name="InviteType" class="form-control">
                                    <option selected="selected" value="All">All</option>
                                    <option value="Invite">Invite Only</option>
                                    <option value="Varsity">Varsity</option>
                                    <option value="JuniorVarsity">Junior Varsity</option>
                                    <option value="Freshman">Freshman</option>
                                    <option value="School">School</option>
                                    <option value="HighSchool">High School</option>
                                    <option value="MiddleSchool">Middle School</option>
                                    <option value="ElementarySchool">Elementary School</option>
                                    <option value="Travel">Travel</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foremail">Cost</label>
                                <input type="text" class="form-control" placeholder="Amount(dollar)" />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Game Guaranteed</label>
                                <input type="text" class="form-control" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Age/Grade Groups</label>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="foremail">Male</label>
                                        <select class="select2-multi-select form-control" name="states[]" multiple="multiple">
                                            <option value="N">Adult</option>
                                            <option value="B">12th Grade</option>
                                            <option value="M">11th Grade</option>
                                            <option value="F">10th Grade</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="foremail">Female</label>
                                        <select class="select2-multi-select form-control" name="states[]" multiple="multiple">
                                            <option value="N">Adult</option>
                                            <option value="B">12th Grade</option>
                                            <option value="M">11th Grade</option>
                                            <option value="F">10th Grade</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foremail">Certifications</label>
                                <select class="select2-multi-select form-control" name="states[]" multiple="multiple">
                                    <option value="N"> Planning NCAA Certification</option>
                                    <option value="B"> Pending NCAA Certification</option>
                                    <option value="M"> NCAA Certified</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Event Location *</h5>
                        </div>
                        <div class="card-body inputform">
                            <div class="form-group">
                                <label for="foremail">Location</label>
                                <input type="text" class="form-control" id="foremail" placeholder="Location" value="" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Street Address</label>
                                <input type="text" class="form-control" id="foremail" placeholder="Address" value="" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Extended Address</label>
                                <input type="text" class="form-control" id="foremail" placeholder="Extended Address" value="" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">City</label>
                                <input type="text" class="form-control" id="foremail" placeholder="City" value="" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">State/Region</label>
                                <select name="" id="" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                <label for="foremail">Postal Code</label>
                                <input type="text" class="form-control" id="foremail" placeholder="Postal Code" value="" required />
                            </div>
                            <div class="form-group">
                                <label for="foremail">Other State/Regions</label>
                                <select class="select2-multi-select form-control" name="states[]" multiple="multiple">
                                    <option value="N"> Aargau, Switzerland</option>
                                    <option value="B"> Abu Zaby</option>
                                    <option value="M"> Aguascalientes</option>
                                    <option value="F"> Alaska (AK)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
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
