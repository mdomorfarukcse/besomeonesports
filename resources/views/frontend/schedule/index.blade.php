@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Schedule'))

@section('css_links')
    <link href="{{ asset("assets/plugins/fullcalendar/css/fullcalendar.min.css") }}" rel="stylesheet" />
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Schedule') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Schedule') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part sub-headh-bask basket-match-page pt-0">
        <div class="matches-seduels d-inline-block w-100">
            <div class="container">
                <div id="calendar"></div>
            </div>
        </div>
    </section>
    {{-- ===============< Modals Start >====================== --}}
<!-- Modal -->
<div class="modal fade" id="league_detail_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <th>League</th>
                                        <td><span id="league_title"></span></td>
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
                                        <td><span id="league_start"></span></td>
                                    </tr>
                                    <tr>
                                        <th>End Time </th>
                                        <td><span id="league_end"></span></td>
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
{{-- ================< Modals End >======================= --}}
    
    
    <!-- End row -->

@endsection


@section('script_links')
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
