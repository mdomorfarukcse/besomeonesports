@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('All Schedules'))

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
    <b class="text-uppercase">{{ __('All Schedules') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Schedules') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('All Schedules') }}</li>
@endsection

@section('breadcrumb_buttons')
    <a href="{{ route('administration.schedule.create') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-plus"></i>
        <b>Assign New Schedule</b>
    </a>
@endsection


@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">{{ __('All Schedules') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Event</th>
                                <th>Teams</th>
                                <th>Venue</th>
                                <th>Time</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $key => $schedule)
                                <tr>
                                    <th class="fw-bold"><b>#{{ serial($schedules, $key) }}</b></th>
                                    <td>
                                        <a href="{{ route('administration.event.show', ['event', $schedule->event]) }}" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('See Event Details') }}">
                                            {{ $schedule->event->name }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('administration.team.show', ['team', $schedule->teams[0]]) }}" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('See This Team Details') }}">
                                            {{ $schedule->teams[0]->name }}
                                        </a>
                                        <br>
                                        <span class="badge badge-info">VS</span>
                                        <br>
                                        <a href="{{ route('administration.team.show', ['team', $schedule->teams[1]]) }}" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('See This Team Details') }}">
                                            {{ $schedule->teams[1]->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <small class="text-info text-bold">
                                            Venue:
                                            <a href="{{ route('administration.venue.show', ['venue', $schedule->venue]) }}" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('See Venue Details') }}">
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
