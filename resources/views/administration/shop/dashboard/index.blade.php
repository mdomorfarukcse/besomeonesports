@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('All Order'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- DataTables css -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('All Order') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Order') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('All Order') }}</li>
@endsection





@section('content')

<!-- Start row -->
<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">All Orders</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Invoice</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Warehouse</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">#o2599</th>
                                <td>11</td>
                                <td>Amy Adams</td>
                                <td>02/06/2019</td>
                                <td>$1,95,000</td>
                                <td>Boston</td>
                                <td><span class="badge badge-primary-inverse">Processing</span></td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                        <a href="#" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">#o2600</th>
                                <td>12</td>
                                <td>Shiva Radharaman</td>
                                <td>01/06/2019</td>
                                <td>$85,000</td>
                                <td>Washington DC</td>
                                <td><span class="badge badge-secondary-inverse">Shipped</span></td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                        <a href="#" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">#o2601</th>
                                <td>13</td>
                                <td>Ryan Smith</td>
                                <td>28/05/2019</td>
                                <td>$70,000</td>
                                <td>San Francisco</td>
                                <td><span class="badge badge-success-inverse">Completed</span></td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                        <a href="#" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">#o2602</th>
                                <td>14</td>
                                <td>James Witherspon</td>
                                <td>21/05/2019</td>
                                <td>$1,25,000</td>
                                <td>Las Vegas</td>
                                <td><span class="badge badge-warning-inverse">Refunded</span></td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                        <a href="#" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
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
