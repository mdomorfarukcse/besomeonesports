@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Schedule'))

@section('css_links')
    {{--  External CSS  --}}
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
    .select2-container {
        z-index: 9999; /* Use a high value to ensure it's above the modal */
    }
    .select2-container--open .select2-dropdown {
        z-index: 9999; /* Use a high value to ensure it's above other elements */
    }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Show Schedule') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Schedules') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.schedule.index') }}">{{ __('All Schedules') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@if (auth()->user()->can('schedule.update')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.schedule.edit', ['schedule' => $schedule]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-pen"></i>
            <b>Edit Schedule Info</b>
        </a>
    @endsection
@endif



@section('content')

<!-- Start Row -->
<div class="row justify-content-center mb-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 text-bold float-left text-capitalize">
                    {{ $schedule->teams[0]->name }}
                    <span class="text-info">VS</span>
                    {{ $schedule->teams[1]->name }}
                </h4>
                @if (auth()->user()->can('court.create')) 
                    <button class="btn btn-dark float-right text-bold" data-animation="zoomInRight" data-toggle="modal" data-target="#updateResultModal">
                        <i class="sl-icon-trophy"></i>
                        Update Result
                    </button>
                @endif
            </div>
            <div class="card-body py-2">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th>League</th>
                                    <td>
                                        <a href="{{ route('administration.league.show', ['league' => $schedule->league]) }}" target="_blank" class="text-dark text-bold">
                                            {{ $schedule->league->name }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Team 1</th>
                                    <td>
                                        <a href="{{ route('administration.team.show', ['team' => $schedule->teams[0]]) }}" target="_blank" class="text-dark text-bold">
                                            {{ $schedule->teams[0]->name }}
                                            @if ($schedule->team_id == $schedule->teams[0]->id)
                                                <sup class="badge badge-success text-bold px-1 pt-1">Winner</sup>
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Team 2</th>
                                    <td>
                                        <a href="{{ route('administration.team.show', ['team' => $schedule->teams[1]]) }}" target="_blank" class="text-dark text-bold">
                                            {{ $schedule->teams[1]->name }}
                                            @if ($schedule->team_id == $schedule->teams[1]->id)
                                                <sup class="badge badge-success text-bold px-1 pt-1">Winner</sup>
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Referee</th>
                                    <td>
                                        <a href="{{ route('administration.referee.show', ['referee' => $schedule->referee]) }}" target="_blank" class="text-dark text-bold">
                                            {{ $schedule->referee->name }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Venue</th>
                                    <td>
                                        <a href="{{ route('administration.venue.show', ['venue' => $schedule->venue]) }}" target="_blank" class="text-dark text-bold">
                                            {{ $schedule->venue->name }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Court</th>
                                    <td>
                                        {{ $schedule->court->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>{{ $schedule->date }}</td>
                                </tr>
                                <tr>
                                    <th>Start Time</th>
                                    <td>{{ $schedule->start }}</td>
                                </tr>
                                <tr>
                                    <th>End Time </th>
                                    <td>{{ $schedule->end }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

{{-- ===============< Modals Start >====================== --}}
<form action="{{ route('administration.schedule.result.update', ['schedule' => $schedule]) }}" method="post" autocomplete="off">
    <div class="modal fade" id="updateResultModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-dark border-0">
                    <h5 class="modal-title">Update Result</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="feather icon-x text-white"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                        <div class="col-md-6 form-group">
                            <label><b>{{ $schedule->teams[0]->name }}</b> Score <span class="required">*</span></label>
                            <input type="number" min="0" name="score[{{ $schedule->teams[0]->id }}]" class="form-control @error('score[{{ $schedule->teams[0]->id }}]') is-invalid @enderror" placeholder="Team-1 Socre" required/>
                            @error('score[{{ $schedule->teams[0]->id }}]')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label><b>{{ $schedule->teams[1]->name }}</b> Score <span class="required">*</span></label>
                            <input type="number" min="0" name="score[{{ $schedule->teams[1]->id }}]" class="form-control @error('score[{{ $schedule->teams[1]->id }}]') is-invalid @enderror" placeholder="Team-2 Socre" required/>
                            @error('score[{{ $schedule->teams[1]->id }}]')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="winner">Winner <span class="required">*</span></label>
                            <select class="select2-single form-control" name="winner" id="winnerId" required>
                                <option value="" selected disabled>Select Winner</option>
                                <option value="{{ $schedule->teams[0]->id }}">Team-1: {{ $schedule->teams[0]->name }}</option>
                                <option value="{{ $schedule->teams[1]->id }}">Team-2: {{ $schedule->teams[1]->name }}</option>
                                <option value="Draw">Match Draw</option>
                            </select>
                            @error('winner')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark text-bold float-right">
                        <i class="feather icon-check"></i>
                        Update Result
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- ================< Modals End >======================= --}}

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
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        $('[data-toggle="tooltip"]').tooltip();

        $('#updateResultModal').on('shown.bs.modal', function () {
            $('.select2-single').select2({
                minimumResultsForSearch: Infinity
            });
        });
    </script>
@endsection
