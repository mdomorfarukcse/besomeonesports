@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Player'))

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
    <b class="text-uppercase">{{ __('Show Player') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Players') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.player.index') }}">{{ __('All Players') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@if (auth()->user()->can('player.update')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.player.edit', ['player' => $player]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-pen"></i>
            <b>Edit Player Info</b>
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
                    <div class="col-md-6">
                        <div class="card border">
                            <div class="card-header bg-primary-rgba border-bottom">
                                <h5 class="card-title text-primary mb-0">Player's Information</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr class="text-center">
                                                    <td colspan="2">
                                                        <div class="user-avatar">
                                                            <img src="{{ show_image($player->user->avatar) }}" alt="User Avatar" class="img-thumbnail" width="250">
                                                        </div>    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Player ID (PID)</th>
                                                    <td class="text-primary text-bold">{{ $player->player_id }}</td>
                                                </tr>
                                                @if (!empty($player->position))
                                                    <tr>
                                                        <th>Position</th>
                                                        <td>{{ $player->position }}</td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <th>Division</th>
                                                    <td>
                                                        <a href="{{ route('administration.division.show', ['division' => $player->division]) }}" target="_blank">
                                                            <strong class="text-dark">
                                                                {{ $player->division->name }}
                                                            </strong>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $player->user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $player->user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Contact</th>
                                                    <td>{{ $player->contact_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Grade</th>
                                                    <td>{{ $player->grade }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Shirt Size</th>
                                                    <td>{{ $player->shirt_size }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Short Size</th>
                                                    <td>{{ $player->short_size }}</td>
                                                </tr>                                               
                                                <tr>
                                                    <th>Address</th>
                                                    <td>
                                                        <address class="mb-0">
                                                            Post: {{ $player->postal_code }}
                                                            <br>    
                                                            City: {{ $player->city }}
                                                            <br>    
                                                            State: {{ $player->state }}
                                                            <br>
                                                            Street Address: {{ $player->street_address }}
                                                            @if (!empty($player->extended_address))
                                                                <br>
                                                                Extended Address: {{ $player->extended_address }}
                                                            @endif
                                                        </address>    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{!! status($player->status) !!}</td>
                                                </tr>
                                                @if (!empty($player->note))
                                                    <tr>
                                                        <th>Note</th>
                                                        <td>{!! $player->note !!}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border m-b-30">
                                    <div class="card-header bg-primary-rgba border-bottom">
                                        <h5 class="card-title text-primary mb-0">Guardian's Information</h5>
                                    </div>
                                    <div class="card-body py-2">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th>Guardian #1 Name</th>
                                                            <td>{{ $player->guardian1_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Guardian #1 Email</th>
                                                            <td>{{ $player->guardian1_email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Guardian #1 Contact</th>
                                                            <td>{{ $player->guardian1_contact }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Guardian #1 Relationship</th>
                                                            <td>{{ $player->guardian1_relationship }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Guardian #2 Name</th>
                                                            <td>{{ $player->guardian2_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Guardian #2 Email</th>
                                                            <td>{{ $player->guardian2_email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Guardian #2 Contact</th>
                                                            <td>{{ $player->guardian2_contact }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Guardian #2 Relationship</th>
                                                            <td>{{ $player->guardian2_relationship }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Guardian #3 Name</th>
                                                            <td>{{ $player->guardian3_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Guardian #3 Email</th>
                                                            <td>{{ $player->guardian3_email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Guardian #3 Contact</th>
                                                            <td>{{ $player->guardian3_contact }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Guardian #3 Relationship</th>
                                                            <td>{{ $player->guardian3_relationship }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (!is_null($player->guardian_id)) 
                                <div class="col-md-12">
                                    <div class="card border m-b-30">
                                        <div class="card-header bg-primary-rgba border-bottom">
                                            <h5 class="card-title text-primary mb-0">Guardian's Information</h5>
                                        </div>
                                        <div class="card-body py-2">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th>Guardian Name</th>
                                                                <td>
                                                                    <a href="{{ route('administration.guardian.show', ['guardian' => $player->guardian]) }}" target="_blank" class="text-dark text-bold">
                                                                        {{ $player->guardian->name }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Guardian Relation</th>
                                                                <td>{{ $player->guardian_relation }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Guardian Email</th>
                                                                <td>{{ $player->guardian->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Guardian Contact</th>
                                                                <td>{{ $player->guardian->contact_number }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
                        <h5 class="card-title mb-0">All Teams of <b class="text-info">{{ $player->user->name }}</b></h5>
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
                            @foreach ($player->teams as $key => $team)
                                <tr>
                                    <td class="fw-bold text-dark"><b>#{{ serial($player->teams, $key) }}</b></th>
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
