@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('All Gallery'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- DataTables css -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/jquery.fancybox.min.css') }}" type="text/css" rel="stylesheet"/>
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('All Gallery') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Gallery') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('All Gallery') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.gallery.create') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-plus"></i>
        <b>Create New Gallery</b>
    </a>
@endsection


@section('content')


<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">{{ __('All Gallery') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Image</th>
                                <th>Caption</th>
                                <th>Season</th>
                                <th>Sport</th>
                                <th>League</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $key => $gallery)
                                <tr>
                                    <th class="fw-bold"><b>#{{ serial($galleries, $key) }}</b></th>
                                    <td>
                                        <a data-fancybox="wk" href="{{ show_image($gallery->path) }}" class="comon-links-divb05">
                                            <figure>
                                                <img src="{{ show_image($gallery->path) }}" alt="{{ $gallery->name }}" class="img-fluid img-thumbnail rounded-circle table-avatar" height="50" width="50"/>
                                            </figure>
                                        </a>
                                    </td>
                                    <td>{{ $gallery->name }}</td>
                                    <td>
                                        @if(!is_null($gallery->season))
                                            {{ $gallery->season->name }}
                                        @else
                                            <span class="badge badge-dark">No Season</span>
                                        @endif    
                                    </td>
                                    <td>
                                        @if(!is_null($gallery->sport))
                                            {{ $gallery->sport->name }}
                                        @else
                                            <span class="badge badge-dark">No Sport</span>
                                        @endif    
                                    </td>
                                    <td>
                                        @if(!is_null($gallery->league))
                                            {{ $gallery->league->name }}
                                        @else
                                            <span class="badge badge-dark">No League</span>
                                        @endif    
                                    </td>
                                    <td class="text-right">
                                        <div class="action-btn-group mr-3">
                                            <a href="{{ route('administration.gallery.destroy', ['gallery' => $gallery]) }}" class="btn btn-outline-danger btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Delete?') }}" onclick="return confirm('Are You Sure Want To Delete?');">
                                                <i class="feather icon-trash-2"></i>
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
    <script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        /* -- Bootstrap Tooltip -- */
        $('[data-toggle="tooltip"]').tooltip();
    </script>
@endsection


