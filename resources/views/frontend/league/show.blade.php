@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Leagues'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        .next-matches {
            padding: 50px 0;
        }
        ol {
            padding-left: 20px;
        }
        

        

    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Leagues') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Leagues') }}</li>
@endsection

@section('content')

<!-- Start Row -->
    
    <section class="float-start w-100 body-part pt-0 basket-match-page sub-headh-bask">
        <div class="next-matches d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>League</h5>
                    <h1>League <span> Details </span></h1>
                </div>
            </div>
        </div>
        
        <div class="detaisl-matecchs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 mb-4">
                        <div class="card border">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <h5 class="card-title mb-0 text-bold">League's Information</h5>
                                    </div>
                                    <div class="col-5">
                                        <a href="{{ route('administration.league.registration', ['league' => $league]) }}" class="btn btn-dark btn-outline-custom fw-bolder" style="
                                            float: right;">
                                            <i class="la la-check"></i>
                                            <b>Register Now</b>
                                        </a>
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
    </section>
    
    
    
    <!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
