@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Referee'))

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
    <b class="text-uppercase">{{ __('Show Referee') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Referees') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.referee.index') }}">{{ __('All Referees') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.referee.edit', ['referee' => $referee]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-pen"></i>
        <b>Edit Referee Info</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header bg-primary-rgba border-bottom">
                                <h5 class="card-title text-primary mb-0">Referee Information</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr class="text-center">
                                                    <td colspan="2">
                                                        <div class="user-avatar">
                                                            @if (is_null($referee->avatar)) 
                                                                <img src="https://fakeimg.pl/500x500" alt="User Avatar" class="img-thumbnail" width="250">
                                                            @else 
                                                                <img src="{{ show_image($referee->avatar) }}" alt="User Avatar" class="img-thumbnail" width="250">
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $referee->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $referee->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Contact</th>
                                                    <td>{{ $referee->contact_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Birthdate</th>
                                                    <td>{{ show_date($referee->birthdate) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>
                                                        <address class="mb-0">
                                                            Post: {{ $referee->postal_code }}
                                                            <br>    
                                                            City: {{ $referee->city }}
                                                            <br>    
                                                            State: {{ $referee->state }}
                                                            <br>
                                                            Street Address: {{ $referee->address }}
                                                        </address>    
                                                    </td>
                                                </tr>
                                                @if (!is_null($referee->sport_of_interests)) 
                                                    <tr>
                                                        <th>Fields of Interest</th>
                                                        <td>
                                                            <ul class="list-group">
                                                                @foreach (json_decode($referee->sport_of_interests) as $interest) 
                                                                    <li class="list-group-item border-1">{{ $interest }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
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

    <div class="col-lg-7">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-7">
                        <h5 class="card-title mb-0 text-bold">Leagues of <span class="text-bold text-info">{{ $referee->name }}</span></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Status</th>
                                @if (auth()->user()->can('league.show') || auth()->user()->can('league.destroy')) 
                                    <th class="text-right">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($referee->leagues as $key => $league)
                                <tr>
                                    <td class="fw-bold text-dark"><b>#{{ serial($referee->leagues, $key) }}</b></th>
                                    <td>
                                        <img src="{{ show_image($league->logo) }}" class="img-fluid img-thumbnail rounded-circle table-avatar" height="50" width="50" alt="league">
                                    </td>
                                    <td>
                                        {{ $league->name }}
                                    </td>
                                    <td>{!! status($league->status) !!}</td>
                                    @if (auth()->user()->can('league.show') || auth()->user()->can('league.destroy')) 
                                        <td class="text-right">
                                            <div class="action-btn-group mr-3">
                                                @if (auth()->user()->can('league.show')) 
                                                    <a href="{{ route('administration.league.show', ['league' => $league]) }}" class="btn btn-outline-info btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('View?') }}">
                                                        <i class="feather icon-eye"></i>
                                                        Show
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

    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-7">
                        <h5 class="card-title mb-0 text-bold">Schedules of <span class="text-bold text-info">{{ $referee->name }}</span></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="scheduleDatatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>League</th>
                                <th>Teams</th>
                                <th>Venue</th>
                                <th>Time</th>
                                @if (auth()->user()->can('schedule.show') || auth()->user()->can('schedule.destroy')) 
                                    <th class="text-center">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($referee->schedules as $key => $schedule)
                                <tr>
                                    <td class="fw-bold">{{ serial($referee->schedules, $key) }}</td>
                                    <td>
                                        <a href="{{ route('administration.league.show', ['league' => $schedule->league]) }}" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('See League Details') }}">
                                            {{ $schedule->league->name }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('administration.team.show', ['team' => $schedule->teams[0]]) }}" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('See This Team Details') }}">
                                            {{ $schedule->teams[0]->name }}
                                            @if ($schedule->team_id == $schedule->teams[0]->id)
                                                <i class="feather icon-check text-success"></i>
                                            @endif
                                        </a>
                                        <br>
                                        <span class="badge badge-info">VS</span>
                                        <br>
                                        <a href="{{ route('administration.team.show', ['team' => $schedule->teams[1]]) }}" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('See This Team Details') }}">
                                            {{ $schedule->teams[1]->name }}
                                            @if ($schedule->team_id == $schedule->teams[1]->id)
                                                <i class="feather icon-check text-success"></i>
                                            @endif
                                        </a>
                                    </td>
                                    <td>
                                        <small class="text-info text-bold">
                                            Venue:
                                            <a href="{{ route('administration.venue.show', ['venue' => $schedule->venue]) }}" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('See Venue Details') }}">
                                                {{ $schedule->venue->name }}
                                            </a>
                                        </small>
                                        <br>
                                        <small class="text-info text-bold">
                                            Court:
                                            <a href="#" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('See Court Details') }}">
                                                {{ $schedule->court->name }}
                                            </a>
                                        </small>
                                    </td>
                                    <td>
                                        <span class="badge badge-dark">{{ show_date($schedule->date) }}</span>
                                        <br>
                                        <small class="badge badge-dark">{{ show_time($schedule->start) }}</small> 
                                        to
                                        <small class="badge badge-dark">{{ show_time($schedule->end) }}</small>
                                    </td>
                                    @if (auth()->user()->can('schedule.show') || auth()->user()->can('schedule.destroy')) 
                                        <td class="text-right">
                                            <div class="action-btn-group mr-3">
                                                @if (auth()->user()->can('schedule.show')) 
                                                    <a href="{{ route('administration.schedule.show', ['schedule' => $schedule]) }}" class="btn btn-outline-info btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('View?') }}">
                                                        <i class="feather icon-eye"></i>
                                                        Show
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
        $(document).ready(function() {
            /* -- Table - Datatable -- */
            $('#scheduleDatatable').DataTable( {
                responsive: true
            });
        });
    </script>
@endsection
