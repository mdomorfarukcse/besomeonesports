@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Create New Sport'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Datepicker css -->
    <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Create New Sport') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Create New Sport') }}</li>
@endsection



@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.sport.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Create New Sport</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group  col-md-4">
                                            <label for="">Date</label>
                                            <input type="date" class="form-control" value="" name="start_date" id="start_date" required />
                                        </div>
                                        <div class="form-group  col-md-4">
                                            <label for="">Start Start</label>
                                            <input type="time" class="form-control" value="" name="start_date" id="start_date" required />
                                        </div>
                                        <div class="form-group  col-md-4">
                                            <label for="">End Time</label>
                                            <input type="time" class="form-control" value="" name="end_date" id="end_date" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Choose A Event</label>
                                            <select class="select2-single form-control" name="event_id" required>
                                                <option value="">Select Status</option>
                                                <option value="Active" selected>Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group  col-md-3">
                                            <label for="">Team 1</label>
                                            <select class="select2-single form-control" name="team_one" required>
                                                <option value="">Select Status</option>
                                                <option value="Active" selected>Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group  col-md-3">
                                            <label for="">Team 2</label>
                                            <select class="select2-single form-control" name="team_two" required>
                                                <option value="">Select Status</option>
                                                <option value="Active" selected>Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <label for="">Venue</label>
                                            <select class="select2-single form-control" name="venue_id" required>
                                                <option value="">Select Status</option>
                                                <option value="Active" selected>Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <label for="">Court</label>
                                            <select class="select2-single form-control" name="court_id" required>
                                                <option value="">Select Status</option>
                                                <option value="Active" selected>Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Create New Sport</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- End Row -->
@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
