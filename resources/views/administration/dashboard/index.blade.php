@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Dashboard'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Apex css -->
    <link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .tooltip-inner ol {
        padding: 0px 10px 0px 15px;
        margin-bottom: 0px
    }
    .bg-primary-inverse {
        background-color: rgba(0, 128, 255, 0.1);
        color: #0080ff;
    }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Dashboard') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Dashboard') }}</li>
@endsection



@section('content')
    @php
        $badgeType = ['warning', 'success', 'danger', 'dark', 'primary', 'info'];
    @endphp
<!-- Start Section -->
<section class="dashboard-section">
    @role('admin|developer')
        <div class="row">
            <div class="col-md-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <a href="{{ route('administration.team.index') }}" class="media">
                            <span class="align-self-center mr-3 action-icon badge badge-{{ $badgeType[array_rand($badgeType)] }}-inverse">
                                <i class="sl-icon-people"></i>
                            </span>
                            <div class="media-body">
                                <p class="mb-0 text-muted">Active Teams</p>
                                <h5 class="mb-0 text-bold">{{ $total['teams'] }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <a href="{{ route('administration.event.index') }}" class="media">
                            <span class="align-self-center mr-3 action-icon badge badge-{{ $badgeType[array_rand($badgeType)] }}-inverse">
                                <i class="sl-icon-trophy"></i>
                            </span>
                            <div class="media-body">
                                <p class="mb-0 text-muted">Active Events</p>
                                <h5 class="mb-0 text-bold">{{ $total['events'] }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <a href="{{ route('administration.sport.index') }}" class="media">
                            <span class="align-self-center mr-3 action-icon badge badge-{{ $badgeType[array_rand($badgeType)] }}-inverse">
                                <i class="sl-icon-game-controller"></i>
                            </span>
                            <div class="media-body">
                                <p class="mb-0 text-muted">Active Sports</p>
                                <h5 class="mb-0 text-bold">{{ $total['sports'] }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <a href="{{ route('administration.player.index') }}" class="media">
                            <span class="align-self-center mr-3 action-icon badge badge-{{ $badgeType[array_rand($badgeType)] }}-inverse">
                                <i class="sl-icon-user"></i>
                            </span>
                            <div class="media-body">
                                <p class="mb-0 text-muted">Active Players</p>
                                <h5 class="mb-0 text-bold">{{ $total['players'] }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><i class="feather icon-dollar-sign"></i></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Total Registered Amount</h5>
                                <h4 class="mb-0"><span class="text-muted">$</span>{{ $total['registrations'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><i class="feather icon-dollar-sign"></i></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Total Sales From Products</h5>
                                <h4 class="mb-0"><span class="text-muted">$</span>{{ $total['sales'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6 col-lg-9">
                            <h5 class="card-title mb-0">Upcoming Events</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-primary-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Event</th>
                                    <th>Start From</th>
                                    <th>Ends At</th>
                                    <th class="text-center">Teams</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($upcomingEvents as $key => $event)
                                    <tr>
                                        <th class="bg-primary-inverse">{{ serial($upcomingEvents, $key) }}</th>
                                        <td>
                                            <a href="{{ route('administration.event.show', ['event' => $event]) }}" target="_blank" class="text-capitalize">
                                                {{ $event->name }}
                                            </a>
                                            <br>
                                            <small class="text-muted"><b class="text-dark">Season:</b> {{ $event->season->name }} | <b class="text-dark">Sport:</b> {{ $event->sport->name }}</small>
                                        </td>
                                        <td>{{ show_date($event->start) }}</td>
                                        <td>{{ show_date($event->end) }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('administration.event.show', ['event' => $event]) }}" @if($event->teams->count() > 0) data-toggle="tooltip" data-placement="top" data-html="true" title="<ol>@foreach ($event->teams as $team)<li>{{ print_one_line($team->name, 20) }}</li>@endforeach</ol>"@endif>
                                                {{ $event->teams->count() }}
                                            </a>
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
</section>
<!-- End Section -->


@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <!-- Apex js -->
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
    <!-- Custom Dashboard js -->   
    <script src="{{ asset('assets/js/custom/custom-dashboard-school.js') }}"></script>    
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $('[data-toggle="tooltip"]').tooltip();
    </script>
@endsection
