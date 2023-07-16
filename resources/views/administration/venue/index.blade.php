@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Venue'))

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
    <b class="text-uppercase">{{ __('Venue') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Venue') }}</li>
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
                        <h5 class="card-title mb-0">All Venue</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Abbr</th>
                                <th>Name</th>
                                <th>Courts</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>FHS</td>
                                <td><a href="#">Friendswood High School</a></td>
                                <td>Boys Gym Goal 1, Boys Gym goal 2, Boys Gym Goal 3, Boys Gym Goal 4</td>
                                <td>Friendswood , TX</td>
                                <td>
                                    <div class="button-list">
                                        <a href="courts.html" class="btn btn-primary-rgba" title="court"><i class="feather icon-award"></i></a>
                                        <a href="add_venue.html" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>OJH</td>
                                <td><a href="#">Old Jr High</a></td>
                                <td>Boys Gym Goal 1, Boys Gym goal 2, Boys Gym Goal 3, Boys Gym Goal 4</td>
                                <td>Friendswood , TX</td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                        <a href="add_venue.html" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>FWJH</td>
                                <td><a href="#"> Friendswood Jr High</a></td>
                                <td>Boys Gym Goal 1, Boys Gym goal 2, Boys Gym Goal 3, Boys Gym Goal 4</td>
                                <td>Friendswood , TX</td>
                                <td>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                        <a href="add_venue.html" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
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
