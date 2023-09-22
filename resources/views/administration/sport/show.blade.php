@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Sport'))

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
    <b class="text-uppercase">{{ __('Show Sport') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Sports') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.sport.index') }}">{{ __('All Sports') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@if (auth()->user()->can('sport.update')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.sport.edit', ['sport' => $sport]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-pen"></i>
            <b>Edit Sport Info</b>
        </a>
    @endsection
@endif



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header bg-primary-rgba border-bottom">
                                <h5 class="card-title text-primary mb-0">Sports's Information</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Sport Name</th>
                                                    <td>{{ $sport->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description</th>
                                                    <td>{{ $sport->description }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{!! status($sport->status) !!}</td>
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

    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">{{ __('All Leagues Under ') }} <span class="text-bold text-info">{{ $sport->name }}</span></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Reg. Fee</th>
                                <th>Divisions</th>
                                <th>Venues</th>
                                <th>Status</th>
                                @if (auth()->user()->can('league.show') || auth()->user()->can('league.destroy')) 
                                    <th class="text-right">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sport->leagues as $key => $league)
                                <tr>
                                    <td class="fw-bold text-dark"><b>#{{ serial($sport->leagues, $key) }}</b></th>
                                    <td>
                                        <img src="{{ show_avatar($league->logo) }}" class="img-fluid img-thumbnail rounded-circle table-avatar" height="50" width="50" alt="league">
                                    </td>
                                    <td>
                                        {{ $league->name }}
                                        <br>
                                        <small class="text-muted">{{ $league->season->name }} ({{ $league->sport->name }})</small>
                                    </td>
                                    <td class="text-bold text-primary">${{ $league->registration_fee }}</td>
                                    <td>{{ count($league->divisions) }}</td>
                                    <td>{{ count($league->venues) }}</td>
                                    <td>{!! status($league->status) !!}</td>
                                    @if (auth()->user()->can('league.show') || auth()->user()->can('league.destroy')) 
                                        <td class="text-right">
                                            <div class="action-btn-group mr-3">
                                                @if (auth()->user()->can('league.destroy')) 
                                                    <a href="{{ route('administration.league.destroy', ['league' => $league]) }}" class="btn btn-outline-danger btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Delete?') }}" onclick="return confirm('Are You Sure Want To Delete?');">
                                                        <i class="feather icon-trash-2"></i>
                                                    </a>
                                                @endif
                                                @if (auth()->user()->can('league.show')) 
                                                    <a href="{{ route('administration.league.show', ['league' => $league]) }}" class="btn btn-outline-info btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('View?') }}">
                                                        <i class="feather icon-info"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <!-- Datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-table-datatable.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        /* -- Bootstrap Tooltip -- */
        $('[data-toggle="tooltip"]').tooltip();
    </script>
@endsection
