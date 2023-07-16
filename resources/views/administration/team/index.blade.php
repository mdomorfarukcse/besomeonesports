@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Team'))

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
    <b class="text-uppercase">{{ __('Team') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Team') }}</li>
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
                        <h5 class="card-title mb-0">All Team</h5>
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
                                <th>Name</th>
                                <th>Event</th>
                                <th>Division</th>
                                <th>Payment</th>
                                <th>Credit</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Basketball</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>Heat (Maupin)</td>
                                <td>Be Someone Sports Summer Basketball League</td>
                                <td>Kinder - 1st grade boys</td>
                                <td><span class="badge badge-warning">None</span></td>
                                <td>
                                    <span class="badge"><i class="feather icon-circle"></i></span>
                                </td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                        <a href="add_team.html" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Basketball</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>1 Nation</td>
                                <td>Backourt Alvin Classic</td>
                                <td>11u (Boys)</td>
                                <td><span class="badge badge-warning">None</span></td>
                                <td>
                                    <span class="badge badge-info-inverse"><i class="feather icon-circle"></i></span>
                                </td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                        <a href="add_team.html" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Basketball</td>
                                <td><span class="badge badge-danger">Inactive</span></td>
                                <td>Molly Johnson</td>
                                <td>Be Someone Sports Summer Basketball League</td>
                                <td>3rd - 4th grade girls</td>
                                <td><span class="badge badge-success">Paid</span></td>
                                <td>
                                    <span class="badge"><i class="feather icon-circle"></i></span>
                                </td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                        <a href="add_team.html" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
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
