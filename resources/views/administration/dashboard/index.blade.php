@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Dashboard'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Apex css -->
    <link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Dashboard') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Dashboard') }}</li>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12 col-xl-12">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-user"></i></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">PAID</h5>
                                <h4 class="mb-0">2585</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13">Updated Today</span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>289</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-user"></i></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">PAID</h5>
                                <h4 class="mb-0">2585</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13">Updated Today</span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>289</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-user"></i></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">PAID</h5>
                                <h4 class="mb-0">2585</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13">Updated Today</span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>289</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-user"></i></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">PAID</h5>
                                <h4 class="mb-0">2585</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13">Updated Today</span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>289</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End col -->
    <!-- Start col -->
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h5 class="card-title mb-0">Annual Revenue</h5>
                    </div>
                    <div class="col-3">
                        <div class="dropdown">
                            <button class="btn btn-link p-0 font-18 float-right" type="button" id="widgetStudent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal-"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetStudent">
                                <a class="dropdown-item font-13" href="#">Refresh</a>
                                <a class="dropdown-item font-13" href="#">Export</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body py-0 pl-0 pr-2">
                <div id="apex-area-chart"></div>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>
<!-- End row -->


<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12 col-xl-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6 col-lg-9">
                        <h5 class="card-title mb-0">Upcoming Events</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sport</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Team</th>
                                <th>Status</th>
                                <th>Publishing</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Basketball</td>
                                <td>Be Someone Sports Summer Basketball League</td>
                                <td>Jun 5 - Aug 14, 2023</td>
                                <td>Alvin, TX</td>
                                <td>52</td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Active</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> App</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Marketing</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Registration</span>
                                </td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Teams</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Standings</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Brackets</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Schedule</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Dodgeball</td>
                                <td>Be Someone Dodgeball Tournament</td>
                                <td>Jul 29-30, 2023</td>
                                <td>Friendswood , TX</td>
                                <td>1</td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Active</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> App</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Marketing</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Registration</span>
                                </td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Teams</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Standings</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Brackets</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Schedule</span>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Volleyball</td>
                                <td>Be Someone Sports Friendswood Volleyball League</td>
                                <td>Sep 4 - Nov 11, 2023</td>
                                <td>Alvin, TX</td>
                                <td>6</td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Active</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> App</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Marketing</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Registration</span>
                                </td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Teams</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Standings</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Brackets</span>
                                    <span class="badge badge-primary badge-success"><span class="fa fa-xs fa-check"></span> Schedule</span>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Volleyball</td>
                                <td>Be Someone Sports Pearland Volleyball League</td>
                                <td>Sep 4 - Nov 11, 2023</td>
                                <td>Pearland, TX</td>
                                <td>0</td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Active</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> App</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Marketing</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Registration</span>
                                </td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Teams</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Standings</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Brackets</span>
                                    <span class="badge badge-primary badge-success"><span class="fa fa-xs fa-check"></span> Schedule</span>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Basketball</td>
                                <td>Be Someone Sports Friendswood Basketball League</td>
                                <td>Dec 4 - Feb 17, 2024</td>
                                <td>Alvin, TX</td>
                                <td>0</td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Active</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> App</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Marketing</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Registration</span>
                                </td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Teams</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Standings</span>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Brackets</span>
                                    <span class="badge badge-primary badge-success"><span class="fa fa-xs fa-check"></span> Schedule</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>
<!-- End row -->


@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <!-- Apex js -->
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
    <!-- Custom Dashboard js -->   
    <script src="{{ asset('assets/js/custom/custom-dashboard-school.js') }}"></script>    
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
