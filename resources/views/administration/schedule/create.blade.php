@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Create New Schedule'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Datepicker css -->
    <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Create New Schedule') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Schedules') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Create New Schedule') }}</li>
@endsection



@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-10">
        <form action="{{ route('administration.schedule.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Create New Schedule</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group  col-md-4">
                            <label for="">Date <span class="required">*</span></label>
                            <input type="date" class="form-control" value="" name="date" id="date" required />
                        </div>
                        <div class="form-group  col-md-4">
                            <label for="">Start Time <span class="required">*</span></label>
                            <input type="time" class="form-control" value="" name="start" id="start" required />
                        </div>
                        <div class="form-group  col-md-4">
                            <label for="">End Time <span class="required">*</span></label>
                            <input type="time" class="form-control" value="" name="end" id="end" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Choose An League <span class="required">*</span></label>
                            <select class="select2-single form-control" name="league_id" id="league_id" required>
                                <option value="" selected>Select League</option>
                                @foreach ($leagues as $league)
                                    <option value="{{ $league->id }}">{{ $league->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-bold text-dark">
                                <span class="text-danger">Note: </span>
                                You can select only those league which have at least Two teams.
                            </small>
                        </div>
                        <input type="hidden" value="4" name="referee_id" id="referee_id">
                        <div class="form-group col-md-6">
                            <label for="">Select Round <span class="required">*</span></label>
                            <select class="select2-single form-control" name="round_id" id="round_id" required disabled>
                                <option value="" selected>Select Round</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Team 1 <span class="required">*</span></label>
                            <select class="select2-single form-control" name="teams[]" id="team_one" required disabled>
                                <option value="" selected>Select Team</option>
                            </select>
                        </div>
                        
                        <div class="form-group  col-md-6">
                            <label for="">Team 2 <span class="required">*</span></label>
                            <select class="select2-single form-control" name="teams[]" id="team_two" required disabled>
                                <option value="" selected>Select Team</option>
                            </select>
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="">Venue <span class="required">*</span></label>
                            <select class="select2-single form-control" name="venue_id" id="venue_id" required disabled>
                                <option value="" selected>Select Venue</option>
                            </select>
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="">Court <span class="required">*</span></label>
                            <select class="select2-single form-control" name="court_id" id="court_id" required disabled>
                                <option value="" selected>Select Court</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Create New Schedule</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- End Row -->
@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Get references to the league and team dropdowns
        const leagueDropdown = $('#league_id');
        const refereeDropdown = $('#referee_id');
        const roundDropdown = $('#round_id');
        const teamDropdown1 = $('#team_one');
        const teamDropdown2 = $('#team_two');
        const venueDropdown = $('#venue_id');
        const courtDropdown = $('#court_id');
    
        // Listen for changes in the league dropdown
        leagueDropdown.on('change', function() {
            const selectedLeagueId = $(this).val();
    
            // Clear the current options in the team dropdown
            refereeDropdown.empty().append('<option value="" selected>Select Referee</option>');
            roundDropdown.empty().append('<option value="" selected>Select Round</option>');
            teamDropdown1.empty().append('<option value="" selected>Select Team</option>');
            teamDropdown2.empty().append('<option value="" selected>Select Team</option>');
            venueDropdown.empty().append('<option value="" selected>Select Venue</option>');
    
            // Disable the team dropdown if no league is selected
            if (!selectedLeagueId) {
                refereeDropdown.prop('disabled', true);
                roundDropdown.prop('disabled', true);
                teamDropdown1.prop('disabled', true);
                teamDropdown2.prop('disabled', true);
                venueDropdown.prop('disabled', true);
            } else {
                // Enable the team dropdown if an league is selected
                refereeDropdown.prop('disabled', false);
                roundDropdown.prop('disabled', false);
                teamDropdown1.prop('disabled', false);
                teamDropdown2.prop('disabled', false);
                venueDropdown.prop('disabled', false);

                // Send an AJAX request to fetch referees for the selected league
                $.ajax({
                    url: `/administration/schedule/referees/${selectedLeagueId}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Populate the referee dropdown with the fetched referees
                        $.each(data, function(index, referee) {
                            refereeDropdown.append($('<option>', {
                                value: referee.id,
                                text: referee.name
                            }));
                        });
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });

                // Send an AJAX request to fetch rounds for the selected league
                $.ajax({
                    url: `/administration/schedule/rounds/${selectedLeagueId}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Populate the round dropdown with the fetched rounds
                        $.each(data, function(index, round) {
                            roundDropdown.append($('<option>', {
                                value: round.id,
                                text: round.name
                            }));
                        });
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });

                // Send an AJAX request to fetch teams for the selected league
                $.ajax({
                    url: `/administration/schedule/teams/${selectedLeagueId}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Populate the team dropdown with the fetched teams
                        $.each(data, function(index, team) {
                            teamDropdown1.append($('<option>', {
                                value: team.id,
                                text: team.name
                            }));
                            teamDropdown2.append($('<option>', {
                                value: team.id,
                                text: team.name
                            }));
                        });
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });

                // Send an AJAX request to fetch venues for the selected league
                $.ajax({
                    url: `/administration/schedule/venues/${selectedLeagueId}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Populate the venue dropdown with the fetched venues
                        $.each(data, function(index, venue) {
                            venueDropdown.append($('<option>', {
                                value: venue.id,
                                text: venue.name
                            }));
                        });
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }
        });
    
        // Listen for changes in the venue dropdown
        venueDropdown.on('change', function() {
            const selectedVenueId = $(this).val();
    
            // Clear the current options in the court dropdown
            courtDropdown.empty().append('<option value="" selected>Select Court</option>');
    
            // Disable the court dropdown if no venues is selected
            if (!selectedVenueId) {
                courtDropdown.prop('disabled', true);
            } else {
                // Enable the court dropdown if an venues is selected
                courtDropdown.prop('disabled', false);

                // Send an AJAX request to fetch courts for the selected venues
                $.ajax({
                    url: `/administration/schedule/venue/courts/${selectedVenueId}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Populate the court dropdown with the fetched courts
                        $.each(data, function(index, court) {
                            courtDropdown.append($('<option>', {
                                value: court.id,
                                text: court.name
                            }));
                        });
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }
        });
    </script>  
@endsection
