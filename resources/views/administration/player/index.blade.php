@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Player'))

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
    <b class="text-uppercase">{{ __('Player') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Player') }}</li>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">All Player</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Parent Name</th>
                                <th>Parent Phone</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Aaron Williams</td>
                                <td>2816872404</td>
                                <td></td>
                                <td></td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                        <a href="add_player.html" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Test Williams</td>
                                <td>2816872404</td>
                                <td></td>
                                <td></td>
                                <td><span class="badge badge-danger">In-Active</span></td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                        <a href="add_player.html" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Aaron Tests</td>
                                <td>2816872404</td>
                                <td></td>
                                <td></td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                        <a href="add_player.html" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
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
