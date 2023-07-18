@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Add Venue'))

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
    <b class="text-uppercase">{{ __('Add Venue') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Add Venue') }}</li>
@endsection



@section('content')

<!-- Start row -->
<form>
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-8">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Venue</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="foremail">Name</label>
                        <input type="text" class="form-control mb-3" id="foremail" value="" />
                    </div>
                    <div class="form-group">
                        <label for="foremail">Abbreviation</label>
                        <input type="text" class="form-control mb-3" id="foremail" value="" />
                    </div>
                    <div class="form-group">
                        <label for="foremail">Default Time Increment</label>
                        <input type="text" class="form-control mb-3" id="foremail" value="" />
                    </div>
                    <div class="form-group">
                        <label for="foremail">Time Zone</label>
                        <select id="TimeZone" name="TimeZone" class="form-control">
                            <option selected="selected" value="Central Standard Time">(UTC-06:00) Central Time (US &amp; Canada)</option>
                        </select>
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
                        <label for="foremail">Latitude</label>
                        <input type="text" class="form-control" id="foremail" required />
                    </div>
                    <div class="form-group">
                        <label for="foremail">Longitude</label>
                        <input type="text" class="form-control" id="foremail" required />
                    </div>

                    <div class="form-group">
                        <label for="foremail">Status</label>
                        <select class="form-control">
                            <option selected="selected" value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </div>
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
