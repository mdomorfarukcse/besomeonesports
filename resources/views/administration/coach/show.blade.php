@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Coach'))

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
    <b class="text-uppercase">{{ __('Show Coach') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Coaches') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.coach.index') }}">{{ __('All Coaches') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@if (auth()->user()->can('coach.update')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.coach.edit', ['coach' => $coach]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-pen"></i>
            <b>Edit Coach Info</b>
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
                                <h5 class="card-title text-primary mb-0">Coach's Information</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr class="text-center">
                                                    <td colspan="2">
                                                        <div class="user-avatar">
                                                            <img src="{{ show_image($coach->user->avatar) }}" alt="User Avatar" class="img-thumbnail" width="250">
                                                        </div>    
                                                    </td>
                                                </tr>
                                                @if (!empty($coach->position))
                                                    <tr>
                                                        <th>Position</th>
                                                        <td>{{ $coach->position }}</td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $coach->user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $coach->user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Contact</th>
                                                    <td>{{ $coach->phone_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>
                                                        <address class="mb-0">
                                                            Street Address: {{ $coach->street_address }}
                                                            <br>
                                                            State: {{ $coach->state }}
                                                            <br>   
                                                            City: {{ $coach->city }}
                                                            <br>   
                                                            Zip Code: {{ $coach->postal_code }}
                                                        </address>    
                                                    </td>
                                                </tr>                                                
                                                @if (!is_null($coach->user->sport_of_interests)) 
                                                    <tr>
                                                        <th>Fields of Interest</th>
                                                        <td>
                                                            <ul class="list-group">
                                                                @foreach (json_decode($coach->user->sport_of_interests) as $interest) 
                                                                    <li class="list-group-item border-1">{{ $interest }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (!is_null($coach->user->grade_of_interests)) 
                                                    <tr>
                                                        <th>Fields of Interest</th>
                                                        <td>
                                                            <ul class="list-group">
                                                                @foreach (json_decode($coach->user->grade_of_interests) as $interest) 
                                                                    <li class="list-group-item border-1">{{ $interest }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{!! status($coach->status) !!}</td>
                                                </tr>
                                                @if (!empty($coach->note))
                                                    <tr>
                                                        <th>Note</th>
                                                        <td>{!! $coach->note !!}</td>
                                                    </tr>
                                                @endif
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
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">All Teams of <b class="text-info">{{ $coach->user->name }}</b></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>League</th>
                                <th>Players</th>
                                <th>Status</th>
                                @if (auth()->user()->can('team.show') || auth()->user()->can('team.destroy')) 
                                    <th class="text-right">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coach->teams as $key => $team)
                                <tr>
                                    <td class="fw-bold text-dark"><b>#{{ serial($coach->teams, $key) }}</b></th>
                                    <td>
                                        <span class="text-dark text-capitalize">{{ $team->name }}</span>
                                        <br>
                                        <small class="text-muted">{{ $team->division->name }}</small>
                                    </td>
                                    <td>
                                        <a href="{{ route('administration.league.show', ['league' => $team->league]) }}" target="_blank" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('Click to see '.$team->league->name.'\'s Details') }}">
                                            {{ $team->league->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="text-success text-bold">
                                            {{ count($team->players) }}
                                        </span>
                                        / 
                                        <span class="text-dark text-bold">
                                            {{ $team->maximum_players }}
                                        </span>
                                    </td>
                                    <td>{!! status($team->status) !!}</td>
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