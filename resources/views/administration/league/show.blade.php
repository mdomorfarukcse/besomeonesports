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


@if (auth()->user()->can('league.update')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.league.edit', ['league' => $league]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-pen"></i>
            <b>Edit League Info</b>
        </a>
        @if (auth()->user()->can('league_registration.create'))
            <a href="{{ route('administration.league.registration', ['league' => $league]) }}" class="btn btn-dark btn-outline-custom fw-bolder">
                <i class="la la-check"></i>
                <b>Register Now</b>
            </a>
        @endif
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
                                <h5 class="card-title text-primary mb-0">League's Information</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr class="text-center">
                                                    <td colspan="2">
                                                        <div class="user-avatar">
                                                            <img src="{{ show_avatar($league->logo) }}" alt="League Logo" class="img-thumbnail" width="250">
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
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{!! status($league->status) !!}</td>
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
                </div>
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
