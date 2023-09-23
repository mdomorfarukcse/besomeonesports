@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Blog'))

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
    <b class="text-uppercase">{{ __('Show Blog') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Blogs') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.blog.index') }}">{{ __('All Blogs') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@if (auth()->user()->can('blog.update')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.blog.edit', ['blog' => $blog]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-pen"></i>
            <b>Edit Blog Info</b>
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
                                <h5 class="card-title text-primary mb-0">Blog's Information</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr >
                                                    <th>Blog Image</th>
                                                    <td >
                                                        <div class="user-avatar">
                                                            @if (is_null($blog->avatar)) 
                                                                <img src="https://fakeimg.pl/500x500" alt="BLog Image" class="img-thumbnail" width="250">
                                                            @else 
                                                                <img src="{{ show_image($blog->avatar) }}" alt="BLog Image" class="img-thumbnail" width="250">
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Blog Title</th>
                                                    <td>{{ $blog->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description</th>
                                                    <td>{{ $blog->description }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{!! status($blog->status) !!}</td>
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

</div>

<!-- End Row -->

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
