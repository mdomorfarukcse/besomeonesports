@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Venue'))

@section('css_links')
    {{--  External CSS  --}}
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
    <b class="text-uppercase">{{ __('Show Venue') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Venues') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.venue.index') }}">{{ __('All Venues') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@if (auth()->user()->can('venue.update')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.venue.edit', ['venue' => $venue]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-pen"></i>
            <b>Edit Venue Info</b>
        </a>
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
                                <h5 class="card-title text-primary mb-0">Venue's Information</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Venue Name</th>
                                                    <td>{{ $venue->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Street</th>
                                                    <td>{{ $venue->street }}</td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td>{{ $venue->city }}</td>
                                                </tr>
                                                <tr>
                                                    <th>State</th>
                                                    <td>{{ $venue->state }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Postal Code</th>
                                                    <td>{{ $venue->postal_code }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Latitude</th>
                                                    <td>{{ $venue->latitude }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Longitude</th>
                                                    <td>{{ $venue->longitude }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{!! status($venue->status) !!}</td>
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
        </div>
    </div>
    
    @if (auth()->user()->can('court.index')) 
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h5 class="card-title mb-0 text-bold">Courts of <span class="text-bold text-info">{{ $venue->name }}</span></h5>
                        </div>
                        @if (auth()->user()->can('court.create')) 
                            <div class="col-5">
                                <button class="btn btn-outline-primary btn-sm float-right font-13" data-animation="zoomInRight" data-toggle="modal" data-target="#addCourtModal">
                                    <i class="la la-plus"></i>
                                    Add Court
                                </button>
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
                                    <th>Total Matches</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($venue->courts as $key => $court)
                                    <tr>
                                        <td class="fw-bold text-dark"><b>#{{ serial($venue->courts, $key) }}</b></th>
                                        <td>
                                            <span class="text-dark text-capitalize">{{ $court->name }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark text-capitalize">{{ $court->schedules()->count() }}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="action-btn-group mr-3">
                                                @if (auth()->user()->can('court.destroy')) 
                                                    <a href="{{ route('administration.venue.court.destroy', ['court' => $court]) }}" class="btn btn-outline-danger btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Delete?') }}" onclick="return confirm('Are You Sure Want To Delete?');">
                                                        <i class="feather icon-trash-2"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
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

{{-- ===============< Modals Start >====================== --}}
<!-- Modal -->
<form action="{{ route('administration.venue.court.store') }}" method="post" autocomplete="off">
    <div class="modal fade" id="addCourtModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-dark border-0">
                    <h5 class="modal-title">Assign Court into {{ $venue->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="venue_id" value="{{ $venue->id }}">
                        <div class="col-md-12 form-group">
                            <label for="name">Name <span class="required">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required/>
                            @error('name')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Assign Court</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- ================< Modals End >======================= --}}

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
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
@endsection
