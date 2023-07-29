@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('All Venues'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
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
    <b class="text-uppercase">{{ __('All Venues') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Venues') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('All Venues') }}</li>
@endsection

@section('breadcrumb_buttons')
    <a href="{{ route('administration.venue.create') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-plus"></i>
        <b>Create New Venue</b>
    </a>
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
                                <th>Name</th>
                                <th>Courts</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($venues as $sl => $venue)
                                <tr>
                                    <th class="fw-bold"><b>#{{ $sl+1 }}</b></th>
                                    <td>{{ $venue->name }}</td>
                                    <td></td>
                                    <td>{{ $venue->street }} {{ $venue->city }} {{ $venue->state }} {{ $venue->postal_code }}</td>
                                    <td>{!! status($venue->status) !!}</td>
                                    <td class="text-right">
                                        <div class="action-btn-group mr-3">
                                            <a href="#" class="btn btn-outline-danger btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Delete?') }}" onclick="return confirm('Are You Sure Want To Delete?');">
                                                <i class="feather icon-trash-2"></i>
                                            </a>
                                            <a href="#" class="btn btn-outline-info btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('View?') }}">
                                                <i class="feather icon-info"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
