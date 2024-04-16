@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show League'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .team-one, .team-two {
        position: relative;
    }
    .team-one .badge {
        position: absolute;
        right: 0;
        top: 0;
        border-radius: 0px;
        padding: 5px 15px 7px;
        font-weight: bold;
        letter-spacing: 1px;
        background-color: #009f47;
    }
    .team-two .badge {
        position: absolute;
        left: 0;
        top: 0;
        border-radius: 0px;
        padding: 5px 15px 7px;
        font-weight: bold;
        letter-spacing: 1px;
        background-color: #009f47;
    }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Show League') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Leagues') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.league.index') }}">{{ __('All Leagues') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@section('breadcrumb_buttons')
    @if (auth()->user()->can('league.update')) 
        <a href="{{ route('administration.league.edit', ['league' => $league]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-pen"></i>
            <b>Edit League Info</b>
        </a>
    @endif
    @if (auth()->user()->can('league_registration.create'))
        <a href="{{ route('administration.league.registration', ['league' => $league]) }}" class="btn btn-dark btn-outline-custom fw-bolder">
            <i class="la la-check"></i>
            <b>Register Now</b>
        </a>
    @endif
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12 mb-4">
        <div class="card border">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-7">
                        <h5 class="card-title mb-0 text-bold">League's Information</h5>
                    </div>
                </div>
            </div>
            <div class="card-body py-2">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr class="text-center">
                                    <td colspan="2">
                                        <div class="user-avatar">
                                            <img src="{{ show_image($league->logo) }}" alt="League Logo" class="img-thumbnail" width="250">
                                        </div>    
                                    </td>
                                </tr>
                                <tr>
                                    <th>Season</th>
                                    <td>
                                        <a href="{{ route('administration.season.show', ['season' => $league->season]) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Click to see {{ $league->season->name }} details" class="text-dark text-bold">
                                            {{ $league->season->name }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sport</th>
                                    <td>
                                        <a href="{{ route('administration.sport.show', ['sport' => $league->sport]) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Click to see {{ $league->sport->name }} details" class="text-dark text-bold">
                                            {{ $league->sport->name }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $league->name }}</td>
                                </tr>
                                <tr>
                                    <th>Registration Fee</th>
                                    <td class="text-bold text-primary">${{ $league->registration_fee }}</td>
                                </tr>
                                <tr>
                                    <th>League Start Date</th>
                                    <td>{{ $league->start }}</td>
                                </tr>
                                <tr>
                                    <th>League End Date</th>
                                    <td>{{ $league->end }}</td>
                                </tr>
                                @if (auth()->user()->hasRole('developer') || auth()->user()->hasRole('admin'))
                                <tr>
                                    <th>Status</th>
                                    <td>{!! status($league->status) !!}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Referees</th>
                                    <td>
                                        <ol>
                                            @foreach ($league->referees as $referee)
                                                <li>
                                                    <a href="{{ route('administration.referee.show', ['referee' => $referee]) }}" target="_blank" class="text-dark text-bold" data-toggle="tooltip" data-placement="top" title="Click to see {{ $referee->name }} details">
                                                        {{ $referee->name }}
                                                    </a>    
                                                </li>  
                                            @endforeach
                                        </ol>    
                                    </td>
                                </tr>
                                <tr>
                                    <th>Divisions</th>
                                    <td>
                                        <ol>
                                            @foreach ($league->divisions as $division)
                                                <li>
                                                    <a href="{{ route('administration.division.show', ['division' => $division]) }}" target="_blank" class="text-dark text-bold" data-toggle="tooltip" data-placement="top" title="Click to see {{ $division->name }} details">
                                                        {{ $division->name }}
                                                    </a>    
                                                </li>  
                                            @endforeach
                                        </ol>    
                                    </td>
                                </tr>
                                <tr>
                                    <th>Venues</th>
                                    <td>
                                        <ol>
                                            @foreach ($league->venues as $venue)
                                                <li>
                                                    <a href="{{ route('administration.venue.show', ['venue' => $venue]) }}" target="_blank" class="text-dark text-bold" data-toggle="tooltip" data-placement="top" title="Click to see {{ $venue->name }} details">
                                                        {{ $venue->name }}
                                                    </a>    
                                                </li>  
                                            @endforeach
                                        </ol>    
                                    </td>
                                </tr>
                                <tr>
                                    <th>Teams</th>
                                    <td>
                                        <ol>
                                            @foreach ($league->teams as $team)
                                                <li>
                                                    <a href="{{ route('administration.team.show', ['team' => $team]) }}" target="_blank" class="text-dark text-bold" data-toggle="tooltip" data-placement="top" title="Click to see {{ $team->name }} details">
                                                        {{ $team->name }}
                                                    </a>    
                                                </li>  
                                            @endforeach
                                        </ol>    
                                    </td>
                                </tr>
                                @if (!empty($league->description))
                                    <tr>
                                        <th>Description</th>
                                        <td>{!! $league->description !!}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
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
                        <h5 class="card-title mb-0 text-bold">League Rounds</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($league->rounds as $round) 
                    @if ($round->schedules->count() >= 1) 
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-12">
                                <div class="card border">
                                    <div class="card-header bg-primary-rgba border-bottom text-center">
                                        <h5 class="card-title text-primary mb-0 text-uppercase text-bold">{{ $round->name }}</h5>
                                    </div>
                                    <div class="card-body py-2">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <tbody>
                                                        @foreach ($round->schedules as $schedule)
                                                            @php
                                                                $schedule->team_id === $schedule->teams[0]->id ? 'success' : 'denger';
                                                            @endphp
                                                            <tr>
                                                                <td style="width: 48%;" class="team-one text-left @if($schedule->team_id === $schedule->teams[0]->id) bg-success-rgba @endif">
                                                                    <img src="{{ show_image($schedule->teams[0]->logo) }}" class="img-fluid img-thumbnail rounded-circle table-avatar" height="50" width="50" alt="team">
                                                                    <b class="text-dark">{{ $schedule->teams[0]->name }}</b>
                                                                    @if($schedule->team_id === $schedule->teams[0]->id)
                                                                        <span class="badge badge-success">
                                                                            <i class="mdi mdi-crown font-17"></i>
                                                                            WINNER
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <th style="width: 4%;" class="text-center pt-4"><b>VS</b></th>
                                                                <td style="width: 48%;" class="team-two text-right @if($schedule->team_id === $schedule->teams[1]->id) bg-success-rgba @endif">
                                                                    <b class="text-dark">{{ $schedule->teams[1]->name }}</b>
                                                                    <img src="{{ show_image($schedule->teams[1]->logo) }}" class="img-fluid img-thumbnail rounded-circle table-avatar" height="50" width="50" alt="team">
                                                                    @if($schedule->team_id === $schedule->teams[1]->id)
                                                                        <span class="badge badge-success">
                                                                            <i class="mdi mdi-crown font-17"></i>
                                                                            WINNER
                                                                        </span>
                                                                    @endif
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
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @if (auth()->user()->can('league_registration.index')) 
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h5 class="card-title mb-0 text-bold">Registered Players</h5>
                        </div>
                        @if (auth()->user()->can('league_registration.create'))
                            <div class="col-5">
                                <a href="{{ route('administration.league.registration', ['league' => $league]) }}" class="btn btn-dark btn-sm float-right font-13">
                                    <i class="la la-check"></i>
                                    Register Now
                                </a>
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
                                    <th>Registered By</th>
                                    <th>Registered At</th>
                                    <th>Transaction ID</th>
                                    <th>Invoice No</th>
                                    @if (auth()->user()->can('league.show')) 
                                        <th class="text-right">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($league->players as $key => $player)
                                    <tr>
                                        <td class="fw-bold text-dark"><b>#{{ serial($league->players, $key) }}</b></th>
                                        <td>
                                            <a href="{{ route('administration.player.show', ['player' => $player]) }}" target="_blank" class="text-bold text-info">
                                                {{ $player->user->name }}
                                            </a>
                                        </td>
                                        <td>{{ get_user_data($player->pivot->paid_by, 'name') }}</td>
                                        <td>{{ date_time_ago($player->pivot->created_at) }}</td>
                                        @if (auth()->user()->id == $player->user->id || auth()->user()->can('league_registration.update')) 
                                            <td>
                                                <code class="text-dark text-bold">{{ $player->pivot->transaction_id }}</code>
                                            </td>
                                            <td>
                                                <code class="text-dark text-bold">{{ $player->pivot->invoice_number }}</code>
                                            </td>
                                            <td class="text-right">
                                                <div class="action-btn-group mr-3">
                                                    <a href="{{ route('administration.league.invoice.download', ['invoice_number' => $player->pivot->invoice_number]) }}" class="btn btn-outline-primary btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Download Invoice') }}">
                                                        <i class="feather icon-download"></i>
                                                    </a>
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
    @endif
</div>

<!-- End Row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        $('[data-toggle="tooltip"]').tooltip();
    </script>
@endsection
