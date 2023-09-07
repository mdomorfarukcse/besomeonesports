@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Schedule'))

@section('css_links')
    {{--  External CSS  --}}
    <link href="{{ asset("assets/plugins/fullcalendar/css/fullcalendar.min.css") }}" rel="stylesheet" />
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .hover-end{padding:0;margin:0;font-size:75%;text-align:center;position:absolute;bottom:0;width:100%;opacity:.8}

    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Schedule') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Schedule') }}</li>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-12">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>

<!-- End row -->

{{-- ===============< Modals Start >====================== --}}
<!-- Modal -->
<div class="modal fade" id="event_detail_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        @csrf
        <div class="modal-content">
            <div class="modal-header bg-dark border-0">
                <h5 class="modal-title">Schedule Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <th>Event</th>
                                        <td><span id="event_title"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Team</th>
                                        <td><span id="team_name"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Venue</th>
                                        <td><span id="venue_name"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Court</th>
                                        <td><span id="court_name"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Start Time</th>
                                        <td><span id="event_start"></span></td>
                                    </tr>
                                    <tr>
                                        <th>End Time </th>
                                        <td><span id="event_end"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @if (auth()->user()->can('schedule.update') || auth()->user()->can('schedule.destroy')) 
                <div class="modal-footer">
                    @if (auth()->user()->can('schedule.update')) 
                        <a href="" class="btn btn-primary" id="editlink" data-route="{{ route('administration.schedule.edit', ['schedule' => ':scheduleId']) }}">Edit</a>
                    @endif
                    @if (auth()->user()->can('schedule.destroy')) 
                        <a href="" class="btn btn-danger" id="deletelink" data-route="{{ route('administration.schedule.destroy', ['schedule' => ':scheduleId']) }}">Delete</a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
{{-- ================< Modals End >======================= --}}
@endsection


@section('script_links')
    {{--  External Javascript Links --}}   
     <!-- jQuery UI -->
     <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>   
    <!-- Events js -->
    <script src='{{  asset("assets/plugins/fullcalendar/js/fullcalendar.min.js") }}'></script>
    <script src="{{  asset("assets/js/custom/custom-calender.js") }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
