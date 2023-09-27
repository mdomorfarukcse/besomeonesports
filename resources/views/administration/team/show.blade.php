@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Team'))

@section('css_links')
    {{--  External CSS  --}}<!-- Animate css -->
    <link href="{{ asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">
    <!-- DataTables css -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .select2-search__field {
        width: auto !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        border: 1px solid #999;
    }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Show Team') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Teams') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.team.index') }}">{{ __('All Teams') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@if (auth()->user()->can('team.update')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.team.edit', ['team' => $team]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-pen"></i>
            <b>Edit Team Info</b>
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
                                <h5 class="card-title text-primary mb-0">Team's Information</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr class="text-center">
                                                    <td colspan="2">
                                                        <div class="user-avatar">
                                                            <img src="{{ show_image($team->logo) }}" alt="team Logo" class="img-thumbnail" width="250">
                                                        </div>    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Team ID</th>
                                                    <td class="text-info text-bold">{{ $team->team_id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $team->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>League</th>
                                                    <td>
                                                        <a href="{{ route('administration.league.show', ['league' => $team->league]) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Click to see {{ $team->league->name }} details" class="text-dark text-bold">
                                                            {{ $team->league->name }}
                                                        </a>
                                                        <small>
                                                            <a href="{{ route('administration.sport.show', ['sport' => $team->league->sport]) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Click to see {{ $team->league->sport->name }} details" class="text-dark text-bold">
                                                                ({{ $team->league->sport->name }})
                                                            </a>
                                                        </small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Division</th>
                                                    <td>
                                                        <a href="{{ route('administration.division.show', ['division' => $team->division]) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Click to see {{ $team->division->name }} details" class="text-dark text-bold">
                                                            {{ $team->division->name }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Coach</th>
                                                    <td>
                                                        <a href="{{ route('administration.coach.show', ['coach' => $team->coach]) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Click to see {{ $team->coach->user->name }} details" class="text-dark text-bold">
                                                            {{ $team->coach->user->name }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Gender</th>
                                                    <td>{{ $team->gender }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Maximum Players</th>
                                                    <td>{{ $team->maximum_players }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Assigned Players</th>
                                                    <td>{{ count($team->players) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{!! status($team->status) !!}</td>
                                                </tr>
                                                @if (!empty($team->description))
                                                    <tr>
                                                        <th>Description</th>
                                                        <td>{!! $team->description !!}</td>
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
                    <div class="col-7">
                        <h5 class="card-title mb-0 text-bold">Players of <span class="text-bold text-info">{{ $team->name }}</span></h5>
                    </div>
                    @if (auth()->user()->can('team.update')) 
                        <div class="col-5">
                            <button class="btn btn-outline-primary btn-sm float-right font-13" data-animation="zoomInRight" data-toggle="modal" data-target="#addPlayersModal">
                                <i class="la la-plus"></i>
                                Add Players
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($team->players as $key => $player)
                                <tr>
                                    <td class="fw-bold text-dark"><b>#{{ serial($team->players, $key) }}</b></th>
                                    <td>
                                        <span class="text-dark text-capitalize">{{ $player->user->name }}</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="action-btn-group mr-3">
                                            @if (auth()->user()->can('team.update')) 
                                                <a href="{{ route('administration.team.destroy.player', ['team' => $team, 'player' => $player]) }}" class="btn btn-outline-danger btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Delete?') }}" onclick="return confirm('Are You Sure Want To Delete?');">
                                                    <i class="feather icon-trash-2"></i>
                                                </a>
                                            @endif
                                            @if (auth()->user()->can('player.show')) 
                                                <a href="{{ route('administration.player.show', ['player' => $player]) }}" class="btn btn-outline-info btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('View?') }}">
                                                    <i class="feather icon-info"></i>
                                                </a>
                                            @endif
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
</div>

<!-- End Row -->
{{-- {{ dd($team->players) }} --}}

{{-- ===============< Modals Start >====================== --}}
<!-- Modal -->
<form action="{{ route('administration.team.assign', ['team' => $team]) }}" method="post">
    <div class="modal fade" id="addPlayersModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-dark border-0">
                    <h5 class="modal-title">Assign Player(s) for {{ $team->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="players[]">Players <span class="required">*</span></label>
                                <select class="select2-multi-select form-control @error('players[]') is-invalid @enderror" name="players[]" multiple="multiple" id="playerSelect" required>
                                    <option value="" disabled>Select Players</option>
                                    @foreach ($players as $player)
                                        @php
                                            $isSelected = in_array($player->id, $teamPlayers) ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $player->id }}" {{ $isSelected }}>{{ $player->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('players[]')
                                    <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Assign Players</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- ================< Modals End >======================= --}}

@endsection


@section('script_links')
    {{--  External Javascript Links --}}<!-- Model js -->
    <script src="{{ asset('assets/js/custom/custom-model.js') }}"></script>
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
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        /* -- Bootstrap Tooltip -- */
        $('[data-toggle="tooltip"]').tooltip();
    </script>

    <script>
        $(document).ready(function() {
            $("#playerSelect").select2({
                placeholder: "Select Players",
                maximumSelectionLength: {{ $team->maximum_players }}
            });
        });
    </script>
@endsection
