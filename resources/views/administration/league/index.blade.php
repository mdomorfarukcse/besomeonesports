@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('All Leagues'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
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
    <b class="text-uppercase">{{ __('All Leagues') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Leagues') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('All Leagues') }}</li>
@endsection


@if (auth()->user()->can('league.create')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.league.create') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-plus"></i>
            <b>Create New League</b>
        </a>
    @endsection
@endif



@section('content')

<!-- Start row -->
<div class="row">
    <div class="col-md-12 m-b-20">
        <div class="card">
            <form action="{{ route('administration.league.index') }}" method="get">
                <div class="card-body">
                    <input type="hidden" name="filter" value="true">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="sport_id">Sport <b class="text-danger">*</b></label>
                            <select class="select2-single form-control @error('sport_id') is-invalid @enderror" name="sport_id" id="sport_id" required>
                                <option value="">Select Sport</option>
                                @foreach ($sports as $sport)
                                    <option value="{{ $sport->id }}" {{ $request->sport_id == $sport->id ? 'selected' : '' }}>{{ $sport->name }}</option>
                                @endforeach
                            </select>
                            @error('sport_id')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="division">Divisions</label>
                            <select class="select2-single form-control @error('division') is-invalid @enderror" name="division" id="division_id">
                                <option value="">Select Divisions</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}" {{ $request->division == $division->id ? 'selected' : '' }}>{{ $division->name }} ({{ $division->gender }})</option>
                                @endforeach
                            </select>
                            @error('division')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">League Name</label>
                            <select class="select2-single form-control @error('division') is-invalid @enderror" name="league" id="league_id">
                                <option value="">Select League</option>
                                @foreach ($leagues as $league)
                                    <option value="{{ $league->id }}" {{ $request->league == $league->id ? 'selected' : '' }}>{{ $league->name }}</option>
                                @endforeach
                            </select>
                            @error('name')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">Status</label>
                            <select class="select2-single form-control @error('status') is-invalid @enderror" name="status">
                                <option value="">Select Status</option>
                                <option value="Active" {{ $request->status === 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ $request->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-custom">
                                <i class="feather icon-filter mr-1"></i>
                                <span class="text-bold">Search</span>
                            </button>
                            @if ($request->filter == true) 
                                <a href="{{ route('administration.league.index') }}" class="btn btn-link text-danger text-bold" onclick="return confirm('Are you sure want to clear the filter?');">
                                    <i class="icon feather icon-x m-r-1"></i>
                                    Clear
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">{{ __('All Leagues') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Reg. Fee</th>
                                <th>Divisions</th>
                                <th>Time</th>
                                @if (auth()->user()->hasRole('developer') || auth()->user()->hasRole('admin')) <th>Status</th> @endif
                                @if (auth()->user()->can('league.show') || auth()->user()->can('league.destroy')) 
                                    <th class="text-right">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leagues as $key => $league)
                                <tr>
                                    <td class="fw-bold text-dark"><b>#{{ serial($leagues, $key) }}</b></th>
                                    {{-- <td>
                                        <img src="{{ show_image($league->logo) }}" class="img-fluid img-thumbnail rounded-circle table-avatar" height="50" width="50" alt="league">
                                    </td> --}}
                                    <td>
                                        {{ $league->name }}
                                        <br>
                                        <small class="text-muted">{{ $league->season->name }} ({{ $league->sport->name }})</small>
                                        <br>
                                        <small class="text-muted text-bold">{{ show_date_only($league->start) }} - {{ show_date_only($league->end) }}</small>
                                    </td>
                                    <td class="text-bold text-primary">${{ $league->registration_fee }}</td>
                                    <td>{{ count($league->divisions) }}</td>
                                    <td><span class="badge badge-info badge-sm">{{ $league->start }}</span> To <span class="badge badge-info badge-sm">{{ $league->start }}</span></td>
                                    @if (auth()->user()->hasRole('developer') || auth()->user()->hasRole('admin')) <td>{!! status($league->status) !!}</td> @endif
                                    @if (auth()->user()->can('league.show') || auth()->user()->can('league.destroy')) 
                                        <td class="text-right">
                                            <div class="action-btn-group mr-3">
                                                @if (auth()->user()->can('league.show')) 
                                                    <a href="{{ route('administration.league.registration', ['league' => $league]) }}" class="btn btn-success btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Register Now') }}">
                                                        Register Now
                                                    </a>
                                                    <a href="{{ route('administration.league.show', ['league' => $league]) }}" class="btn btn-outline-info btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('View?') }}">
                                                        <i class="feather icon-eye"></i>
                                                    </a>
                                                @endif
                                                @if (auth()->user()->can('league.destroy')) 
                                                    <a href="{{ route('administration.league.destroy', ['league' => $league]) }}" class="btn btn-outline-danger btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Delete?') }}" onclick="return confirm('Are You Sure Want To Delete?');">
                                                        <i class="feather icon-trash-2"></i>
                                                    </a>
                                                @endif
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
    <!-- End col -->
</div>
<!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>
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
    
    <script>
        $(document).ready(function() {
            // Add an event listener to the sport dropdown
            $('#sport_id').change(function() {
                // Fetch leagues based on the selected sport
                fetchLeagues($(this).val());
            });

            function fetchLeagues(sportId) {
                // Send an AJAX request to fetch leagues based on the selected sport
                $.ajax({
                    url: '/administration/league/filter/by_sport/' + sportId,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Update the league dropdown options
                        updateLeagueOptions(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching leagues:', error);
                    }
                });
            }

            function updateLeagueOptions(leagues) {
                const leagueDropdown = $('[name="league"]');
                // Clear existing options
                leagueDropdown.html('<option value="">Select League</option>');
                // Populate with fetched leagues
                $.each(leagues, function(index, league) {
                    leagueDropdown.append($('<option>', {
                        value: league.id,
                        text: league.name
                    }));
                });
            }
        });
    </script>
@endsection
