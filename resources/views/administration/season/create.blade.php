@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Season'))

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
    <b class="text-uppercase">{{ __('Add Season') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Add Season') }}</li>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Add Season</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="forsport">Sports</label>
                        <select name="status" class="form-control" id="forsport" required>
                            <option value="">Select A Sport</option>
                            <option value="5">Baseball</option>
                            <option value="1">Basketball</option>
                            <option value="18">Bocce</option>
                            <option value="19">Bowling</option>
                            <option value="14">Cornhole</option>
                            <option value="15">Dodgeball</option>
                            <option value="41">Dominoes</option>
                            <option value="13">Field Hockey</option>
                            <option value="20">Floor Hockey</option>
                            <option value="2">Football</option>
                            <option value="9">Futsal</option>
                            <option value="21">Golf</option>
                            <option value="4">Hockey</option>
                            <option value="10">Kickball</option>
                            <option value="6">Lacrosse</option>
                            <option value="25">Pickleball</option>
                            <option value="23">Rugby</option>
                            <option value="7">Soccer</option>
                            <option value="8">Softball</option>
                            <option value="26">Spikeball</option>
                            <option value="22">Swimming</option>
                            <option value="16">Tennis</option>
                            <option value="17">Track &amp; Field</option>
                            <option value="24">Ultimate</option>
                            <option value="3">Volleyball</option>
                            <option value="11">Water Polo</option>
                            <option value="12">Wrestling</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="forstatus">Type</label>
                        <select name="status" class="form-control" id="forstatus" required>
                            <option value="">Select A Option</option>
                            <option value="">New</option>
                            <option value="">Copy</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foremail">Season Name</label>
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
                        <div class="input-group-append">
                            <input type="text" class="form-control" placeholder="Session (Spring, Fall)" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foremail">Date Range</label>
                    </div>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="start_date" />
                        <span class="input-group-text">-</span>
                        <input type="date" class="form-control" name="end_date" />
                    </div>
                    <div class="form-group">
                        <label for="forstatus">Status</label>
                        <select name="status" class="form-control" id="forstatus" required>
                            <option value="">Select A Option</option>
                            <option value="">Active</option>
                            <option value="">In-Active</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="forstatus">Default</label>
                        <select name="status" class="form-control" id="forstatus" required>
                            <option value="">Select A Option</option>
                            <option value="">Yes</option>
                            <option value="">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>

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
