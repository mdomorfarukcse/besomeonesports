@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('All Categories'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
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
    <b class="text-uppercase">{{ __('All Categories') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Shop') }}</li>
    <li class="breadcrumb-item text-capitalize">{{ __('Category') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('All Categories') }}</li>
@endsection

@if (auth()->user()->can('shop_category.create')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.shop.category.create') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-plus"></i>
            <b>Create New Category</b>
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
                <h5 class="card-title">{{ __('All Categories') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Total Products</th>
                                @if (auth()->user()->hasRole('developer') || auth()->user()->hasRole('admin')) <th>Status</th> @endif
                                @if (auth()->user()->can('shop_category.show') || auth()->user()->can('shop_category.destroy')) 
                                    <th class="text-right">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $sl => $category)
                                <tr>
                                    <th class="fw-bold"><b>#{{ serial($categories, $sl) }}</b></th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ count($category->products) }}</td>
                                    @if (auth()->user()->hasRole('developer') || auth()->user()->hasRole('admin')) <td>{!! status($category->status) !!}</td> @endif
                                    @if (auth()->user()->can('shop_category.show') || auth()->user()->can('shop_category.destroy')) 
                                        <td class="text-right">
                                            <div class="action-btn-group mr-3">
                                                @if (auth()->user()->can('shop_category.destroy')) 
                                                    <a href="{{ route('administration.shop.category.destroy', ['category' => $category]) }}" class="btn btn-outline-danger btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Delete?') }}" onclick="return confirm('Are You Sure Want To Delete?');">
                                                        <i class="feather icon-trash-2"></i>
                                                    </a>
                                                @endif
                                                @if (auth()->user()->can('shop_category.show')) 
                                                    <a href="{{ route('administration.shop.category.show', ['category' => $category]) }}" class="btn btn-outline-info btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('View?') }}">
                                                        <i class="feather icon-eye"></i>
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
