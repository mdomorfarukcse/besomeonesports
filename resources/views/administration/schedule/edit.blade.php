@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Update Schedule'))

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
    <b class="text-uppercase">{{ __('Update Schedule') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Schedules') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Update Schedule') }}</li>
@endsection



@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-10">
        <form action="{{ route('administration.schedule.update', ['schedule' => $schedule]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Update Schedule</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group  col-md-4">
                            <label for="">Date <span class="required">*</span></label>
                            <input type="date" class="form-control" value="{{ $schedule->date }}" name="date" id="date" required />
                        </div>
                        <div class="form-group  col-md-4">
                            <label for="">Start Time <span class="required">*</span></label>
                            <input type="time" class="form-control" value="{{ $schedule->start }}" name="start" id="start" required />
                        </div>
                        <div class="form-group  col-md-4">
                            <label for="">End Time <span class="required">*</span></label>
                            <input type="time" class="form-control" value="{{ $schedule->end }}" name="end" id="end" />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Choose An Event <span class="required">*</span></label>
                            <select class="select2-single form-control @error('event_id') is-invalid @enderror" name="event_id" required>
                                <option value="">Select Event</option>
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}" @selected($event->id == $schedule->event->id)>
                                        {{ $event->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('event_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
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
                        <span class="text-bold">Update Schedule</span>
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
        // Get references to the event and team dropdowns
        const eventDropdown = $('#event_id');
        const teamDropdown1 = $('#team_one');
        const teamDropdown2 = $('#team_two');
        const venueDropdown = $('#venue_id');
        const courtDropdown = $('#court_id');
    
        // Listen for changes in the event dropdown
        eventDropdown.on('change', function() {
            const selectedEventId = $(this).val();
    
            // Clear the current options in the team dropdown
            teamDropdown1.empty().append('<option value="" selected>Select Team</option>');
            teamDropdown2.empty().append('<option value="" selected>Select Team</option>');
            venueDropdown.empty().append('<option value="" selected>Select Venue</option>');
    
            // Disable the team dropdown if no event is selected
            if (!selectedEventId) {
                teamDropdown1.prop('disabled', true);
                teamDropdown2.prop('disabled', true);
                venueDropdown.prop('disabled', true);
            } else {
                // Enable the team dropdown if an event is selected
                teamDropdown1.prop('disabled', false);
                teamDropdown2.prop('disabled', false);
                venueDropdown.prop('disabled', false);

                // Send an AJAX request to fetch teams for the selected event
                $.ajax({
                    url: `/administration/schedule/teams/${selectedEventId}`,
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

                // Send an AJAX request to fetch venues for the selected event
                $.ajax({
                    url: `/administration/schedule/venues/${selectedEventId}`,
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
    <script>
        $( document ).ready(function(){ 
            // Enable the team dropdown if an event is selected
            teamDropdown1.prop('disabled', false);
            teamDropdown2.prop('disabled', false);
            venueDropdown.prop('disabled', false);

            // Send an AJAX request to fetch teams for the selected event
            $.ajax({
                url: `/administration/schedule/teams/{{ $schedule->event->id }}`,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the team dropdown with the fetched teams
                    $.each(data, function(index, team) {
                        var team1 = $('<option>', {
                            value: team.id,
                            text: team.name
                        });
                        
                        var team2 = $('<option>', {
                            value: team.id,
                            text: team.name
                        });

                        // Check if the team.id matches $schedule->event->id and add "selected" attribute
                        if (team.id == '{{ $schedule->teams[0]->id }}') {
                            team1.attr('selected', 'selected');
                        }
                        if (team.id == '{{ $schedule->teams[1]->id }}') {
                            team2.attr('selected', 'selected');
                        }

                        teamDropdown1.append(team1);
                        teamDropdown2.append(team2);
                    });    
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
            

            // Send an AJAX request to fetch venues for the selected event
            $.ajax({
                url: `/administration/schedule/venues/{{ $schedule->event->id }}`,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the venue dropdown with the fetched venues
                    $.each(data, function(index, venue) {
                        var venue_data = $('<option>', {
                            value: venue.id,
                            text: venue.name
                        });
                        if (venue.id == '{{ $schedule->venue->id }}') {
                            venue_data.attr('selected', 'selected');
                        }
                        venueDropdown.append(venue_data);
                    });
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });

            // Enable the court dropdown if an venues is selected
            courtDropdown.prop('disabled', false);

            // Send an AJAX request to fetch courts for the selected venues
            $.ajax({
                url: `/administration/schedule/venue/courts/{{ $schedule->venue->id }}}`,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the court dropdown with the fetched courts
                    $.each(data, function(index, court) {
                        var court_data = $('<option>', {
                            value: court.id,
                            text: court.name
                        });
                        if (court.id == '{{ $schedule->court->id }}') {
                            court_data.attr('selected', 'selected');
                        }
                        courtDropdown.append(court_data);
                    });
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        })
    </script>
@endsection