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
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Leagues') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Leagues') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part sub-headh-bask basket-match-page pt-0">
        <div class="matches-seduels d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Schedule</h5>
                    <h1>Leagues <span> Schedule </span></h1>
                </div>
                <span class="bgi-text light-tsext01"> Schedule</span>
                <table id="matchess" class="table table-striped dt-responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Sport</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Season</th>
                            <th>Acton</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leagues as $key => $league)
                            <tr>
                                <td>{{ $league->sport->name }}</td>
                                <td>
                                    <a href="{{ route('frontend.league.show', ['league' => $league]) }}"><span class="mx-3 vs-0">{{ $league->name }}</span></a>
                                </td>
                                <td>{{ show_date($league->start) }} - {{ show_date($league->end) }}</td>
                                <td>{{ $league->season->name }}</td>
                                <td><a href="{{ route('frontend.league.show', ['league' => $league]) }}" class="btn btn-info text-white"> Details </a></td>
                            </tr>
                        @endforeach    
                    </tbody>
                </table>
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
