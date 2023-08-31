@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Permission'))

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
    <b class="text-uppercase">{{ __('Show Permission') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('permissions') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.permission.index') }}">{{ __('All Permissions') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.permission.edit', ['permission' => $permission]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-pen"></i>
        <b>Edit Permission Info</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.permission.update', ['permission' => $permission]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card border">
                                <div class="card-header bg-primary-rgba border-bottom">
                                    <h5 class="card-title text-primary mb-0">Permission's Information</h5>
                                </div>
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Permission Name</th>
                                                        <td>{{ $permission->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Permission Group Name</th>
                                                        <td>{{ $permission->group_name }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- End Row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
@endsection
