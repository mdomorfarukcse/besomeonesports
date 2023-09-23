@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Registration'))

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
    <b class="text-uppercase">{{ __('Show Registrations') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Leagues') }}</li>
    <li class="breadcrumb-item text-capitalize">{{ __('Registrations') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.league.registration.index') }}">
            {{ __('All Registrations') }}
        </a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Registrations') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.league.registration.index') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">
                    {{ __('Show Registrations of') }} 
                    <span class="text-primary text-bold">{{ $league->name }}</span>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Avatar</th>
                                <th>Player</th>
                                <th>Paid By</th>
                                <th>Registered At</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $key => $registration)
                                <tr>
                                    <td class="fw-bold text-dark"><b>#{{ serial($registrations, $key) }}</b></th>
                                    <td>
                                        <a href="{{ route('administration.player.show', ['player' => $registration->player->id]) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ __('Click to see '.$registration->player->user->name.'\'s Details') }}">
                                            <img src="{{ show_image($registration->player->user->avatar) }}" class="img-fluid img-thumbnail rounded-circle table-avatar" height="50" width="50" alt="Coach">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('administration.player.show', ['player' => $registration->player->id]) }}" target="_blank" class="text-bold text-dark" data-toggle="tooltip" data-placement="top" title="{{ __('Click to see '.$registration->player->user->name.'\'s Details') }}">
                                            {{ $registration->player->user->name }}
                                        </a>
                                    </td>
                                    <td>{{ $registration->paidBy->name }}</td>
                                    <td>{{ date_time_ago($registration->created_at) }}</td>
                                    <td class="text-right">
                                        <div class="action-btn-group mr-3">
                                            <a href="#" class="btn btn-outline-danger btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Delete?') }}" onclick="return confirm('Are You Sure Want To Delete?');">
                                                <i class="feather icon-trash-2"></i>
                                            </a>
                                            <a href="#" class="btn btn-outline-info btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('View?') }}">
                                                <i class="feather icon-info"></i>
                                            </a>
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
    <!-- End col -->
</div>
<!-- End row -->

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