@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('All Coach Requests'))

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
    <b class="text-uppercase">{{ __('All Coach Requests') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Coaches') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('All Coach Requests') }}</li>
@endsection


@if (auth()->user()->can('coach.create')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.coach.create') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-plus"></i>
            <b>Create New Coach</b>
        </a>
    @endsection
@endif



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">{{ __('All Coach Requests') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                @if (auth()->user()->role('admin') || auth()->user()->role('developer')) 
                                    <th class="text-center">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coaches as $sl => $coach)
                                <tr>
                                    <th class="fw-bold"><b>#{{ $sl+1 }}</b></th>
                                    <td>
                                        <img src="{{ show_image($coach->avatar) }}" class="img-fluid img-thumbnail rounded-circle table-avatar" height="50" width="50" alt="Coach">
                                    </td>
                                    <td>
                                        {{ $coach->first_name. ' ' . $coach->last_name }}
                                    </td>
                                    <td>{{ $coach->email }}</td>
                                    <td>{{ $coach->phone_number }}</td>
                                    @if (auth()->user()->role('admin') || auth()->user()->role('developer')) 
                                        <td class="text-center">
                                            <div class="action-btn-group mr-3">
                                                @if (auth()->user()->role('admin') || auth()->user()->role('developer')) 
                                                    <a href="{{ route('administration.coach.request.show', ['coach' => $coach]) }}" class="btn btn-primary btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('View?') }}">
                                                        <i class="feather icon-info"></i>
                                                        Show
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
