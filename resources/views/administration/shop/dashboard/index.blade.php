@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', 'Shop | Dashboard')

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
    <b class="text-uppercase">{{ __('Shop Dashboard') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Shop') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Dashboard') }}</li>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12 col-xl-12">
        <!-- Start row -->
        <div class="row">
            <div class="col-lg-4">
                <a href="{{ route('administration.shop.order.index') }}">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-primary-inverse mr-0">
                                        <i class="feather icon-feather"></i>
                                    </span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Total Orders</h5>
                                    <h4 class="mb-0">{{ $dashboard['total_orders'] }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Today's Orders</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-primary">
                                        <i class="feather icon-feather mr-1"></i>{{ $dashboard['today_orders'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4">
                <a href="{{ route('administration.shop.order.index') }}">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-success-inverse mr-0">
                                        <i class="feather icon-dollar-sign"></i>
                                    </span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Total Sale</h5>
                                    <h4 class="mb-0">${{ $dashboard['total_sale'] }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Today's Sale</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-success">
                                        <i class="feather icon-dollar-sign mr-1"></i>{{ $dashboard['today_sale'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4">
                <a href="{{ route('administration.shop.product.index') }}">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-warning-inverse mr-0">
                                        <i class="feather icon-umbrella"></i>
                                    </span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Total Products</h5>
                                    <h4 class="mb-0">{{ $dashboard['total_products'] }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Total Categories</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-warning">
                                        <i class="feather icon-tag mr-1"></i>{{ $dashboard['total_categories'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- End row -->
    </div>
    

    {{-- <div class="col-12">
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
    </div> --}}
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