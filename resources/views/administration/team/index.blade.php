@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('All Teams'))

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
    <b class="text-uppercase">{{ __('All Teams') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Teams') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('All Teams') }}</li>
@endsection


@if (auth()->user()->can('team.create')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.team.create') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-plus"></i>
            <b>Create New Team</b>
        </a>
    @endsection
@endif



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title float-left">{{ __('All Teams') }}</h5>
                <div class="float-right ">
                    <a href="{{ route('administration.team.import') }}" class="btn btn-theme btn-sm font-13" data-toggle="tooltip" data-placement="top" title="Import Teams">
                        <i class="la la-download"></i>
                        Import Teams
                    </a>
                    <a href="{{ route('administration.team.export') }}" class="btn btn-dark btn-sm font-13" data-toggle="tooltip" data-placement="top" title="Download as CSV format">
                        <i class="la la-upload"></i>
                        Download Teams
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>Team Name</th>
                                <th>League</th>
                                <th class="text-center">Players</th>
                                @if (auth()->user()->hasRole('developer') || auth()->user()->hasRole('admin')) <th class="text-center">Status</th> @endif
                                @if (auth()->user()->can('team.show') || auth()->user()->can('team.destroy')) 
                                    <th class="text-right">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $key => $team)
                                <tr>
                                    <td class="fw-bold text-dark"><b>#{{ serial($teams, $key) }}</b></th>
                                    <td>
                                        <img src="{{ show_image($team->logo) }}" class="img-fluid img-thumbnail rounded-circle table-avatar" height="50" width="50" alt="team">
                                    </td>
                                    <td>
                                        <span class="text-dark text-capitalize">{{ $team->name }}</span>
                                        <br>
                                        <small class="text-muted">
                                            <b>Division:</b>
                                            <a href="{{ route('administration.division.show', ['division' => $team->division]) }}" target="_blank" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('Click to see '.$team->division->name.'\'s Details') }}">
                                                {{ $team->division->name }}
                                            </a>
                                        </small>
                                    </td>
                                    <td>
                                        @if ($team->league)
                                            <a href="{{ route('administration.league.show', ['league' => $team->league]) }}" target="_blank" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('Click to see '.$team->league->name.'\'s Details') }}">
                                                {{ $team->league->name }}
                                            </a>
                                            <br>
                                            <small class="text-muted">
                                                <b>Total Teams:</b>
                                                {{ $team->league->teams->count() }}
                                            </small>
                                        @else
                                            <span>No League</span>
                                        @endif
                                    </td>                                    
                                    <td class="text-center">
                                        <span class="text-success text-bold">
                                            {{ count($team->players) }}
                                        </span>
                                        {{-- / <span class="text-dark text-bold">
                                            {{ $team->maximum_players }}
                                        </span> --}}
                                    </td>
                                    @if (auth()->user()->hasRole('developer') || auth()->user()->hasRole('admin')) <td class="text-center">{!! status($team->status) !!}</td> @endif
                                    @if (auth()->user()->can('team.show') || auth()->user()->can('team.destroy')) 
                                        <td class="text-right">
                                            <div class="action-btn-group mr-3">
                                                @if (auth()->user()->can('team.destroy')) 
                                                    <a href="javascript:void(0);" class="btn btn-outline-danger btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Delete?') }}" onclick="return confirm('Are You Sure Want To Delete?');">
                                                        <i class="feather icon-trash-2"></i>
                                                    </a>
                                                @endif
                                                @if (auth()->user()->can('team.show')) 
                                                    <a href="{{ route('administration.team.show', ['team' => $team]) }}" class="btn btn-outline-info btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('View?') }}">
                                                        <i class="feather icon-eye"></i>
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
    <!-- End col -->
</div>

<!-- End row -->

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
