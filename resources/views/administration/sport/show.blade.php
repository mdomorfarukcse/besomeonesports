@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Sport Details'))

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
    <b class="text-uppercase">{{ __('Sport Details') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Sports') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Sport Details') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.sport.edit',$sport) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <b>Edit Sport Info</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-header border-bottom">
                <h5 class="card-title text-dark mb-0">Sports Details</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border">
                            <div class="card-header border-bottom">
                                <h5 class="card-title mb-0">Sport Info</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $sport->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description</th>
                                                    <td>{{ $sport->discription }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{{ $sport->status }}</td>
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