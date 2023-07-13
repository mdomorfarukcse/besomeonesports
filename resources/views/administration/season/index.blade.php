@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Dashboard'))

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
    <b class="text-uppercase">{{ __('Dashboard') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Dashboard') }}</li>
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
                        <h5 class="card-title mb-0">All Season</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Sport</th>
                                <th>Status</th>
                                <th>Season</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Basketball</td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Active</span>
                                    <span class="badge badge-secondary badge-info"><span class="fa fa-xs fa-check"></span> Default</span>
                                </td>
                                <td><a href="#">2023-2024 Winter</a></td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba" title="Details"><i class="feather icon-file"></i></a>
                                        <a href="add_season.html" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Football</td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Active</span>
                                </td>
                                <td><a href="#">2023 2023</a></td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba" title="Details"><i class="feather icon-file"></i></a>
                                        <a href="add_season.html" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Basketball</td>
                                <td>
                                    <span class="badge badge-secondary badge-success"><span class="fa fa-xs fa-check"></span> Active</span>
                                </td>
                                <td><a href="#">2023</a></td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba" title="Details"><i class="feather icon-file"></i></a>
                                        <a href="add_season.html" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
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
