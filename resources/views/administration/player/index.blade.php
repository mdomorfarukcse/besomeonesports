@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('All Players'))

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
    <b class="text-uppercase">{{ __('All Players') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Players') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('All Players') }}</li>
@endsection


@if (auth()->user()->can('player.create'))
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.player.create') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-plus"></i>
            <b>Create New Player</b>
        </a>
        <a href="{{ route('administration.league.index') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-plus"></i>
            <b>Register League</b>
        </a>
    @endsection
@endif

@section('content')

    <!-- Start row -->
    <div class="row">

        @if (Session::has('playeradd'))
            <!-- Start col -->
            <div class="col-md-12">
                <div class="alert-list">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Welcome to Be Someone Sports!</h4>
                        <p>Thank you for adding your children.</p>
                        <hr>
                        <p class="mb-1">Check out our active League. Register and Pay League for your children. 
                            <a href="{{ route('administration.league.index') }}" class="btn btn-theme btn-sm"> Register League</a>
                        </p>
                        <p class="mt-1">Check out our store and order your children Jersey, Shirt, Shorts etc. 
                            <a href="{{ route('frontend.shop.index') }}" class="btn btn-theme btn-sm"> Shop Now</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- End col -->
        @endif
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">{{ __('All Players') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable" class="display table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    @if (auth()->user()->hasRole('developer') || auth()->user()->hasRole('admin')) <th>Status</th> @endif
                                    @if (auth()->user()->can('player.show') || auth()->user()->can('player.destroy'))
                                        <th class="text-right">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($players as $sl => $player)
                                    <tr>
                                        <th class="fw-bold"><b>#{{ $sl + 1 }}</b></th>
                                        <td>
                                            {{ $player->user->name }}
                                        </td>
                                        <td>{{ $player->user->email }}</td>
                                        <td>{{ $player->contact_number }}</td>
                                        @if (auth()->user()->hasRole('developer') || auth()->user()->hasRole('admin')) <td>{!! status($player->status) !!}</td> @endif
                                        @if (auth()->user()->can('player.show') || auth()->user()->can('player.destroy'))
                                            <td class="text-right">
                                                <div class="action-btn-group mr-3">
                                                    @if (auth()->user()->can('player.show'))
                                                        <a href="{{ route('administration.league.index') }}"
                                                            class="btn btn-success btn-outline-custom btn-sm mb-1"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{ __('Register League?') }}">
                                                            Register League
                                                        </a>
                                                        <a href="{{ route('administration.player.show', ['player' => $player]) }}"
                                                            class="btn btn-outline-info btn-outline-custom btn-sm mb-1"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{ __('View?') }}">
                                                            <i class="feather icon-eye"></i>
                                                        </a>
                                                    @endif
                                                    @if (auth()->user()->can('player.destroy'))
                                                        <a href="{{ route('administration.player.destroy', ['player' => $player]) }}"
                                                            class="btn btn-outline-danger btn-outline-custom btn-sm mb-1"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{ __('Delete?') }}"
                                                            onclick="return confirm('Are You Sure Want To Delete?');">
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
