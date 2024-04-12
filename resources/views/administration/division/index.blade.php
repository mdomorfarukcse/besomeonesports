@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('All Divisions'))

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
    <b class="text-uppercase">{{ __('All Divisions') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Divisions') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('All Divisions') }}</li>
@endsection

@if (auth()->user()->can('division.create')) 
    @section('breadcrumb_buttons')
        <a href="{{ route('administration.division.create') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
            <i class="feather icon-plus"></i>
            <b>Create New Division</b>
        </a>
    @endsection
@endif


@section('content')

<!-- Start row -->
<div class="row">

    <div class="col-md-12 m-b-20">
        <div class="card">
            <form action="{{ route('administration.division.index') }}" method="get">
                <div class="card-body">
                    <input type="hidden" name="filter" value="true">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="division">Gender</label>
                            <select class="select2-single form-control @error('status') is-invalid @enderror" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ $request->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $request->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Co-Ed" {{ $request->gender === 'Co-Ed' ? 'selected' : '' }}>Co-Ed</option>
                            </select>
                            @error('division')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <label for="status">Status</label>
                                    <select class="select2-single form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="Active" {{ $request->status === 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ $request->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-dark btn-custom btn-block m-t-30">
                                        <i class="feather icon-filter mr-1"></i>
                                        <span class="text-bold">Search</span>
                                    </button>
                                    @if ($request->filter == true) 
                                        <a href="{{ route('administration.division.index') }}" class="btn btn-link text-danger text-bold float-end float-right">
                                            <i class="icon feather icon-x m-r-1"></i>
                                            Clear
                                        </a>
                                    @endif
                                </div>
                            </div>
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
                <h5 class="card-title">{{ __('All Divisions') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Status</th>
                                @if (auth()->user()->can('division.show') || auth()->user()->can('division.destroy')) 
                                    <th class="text-right">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisions as $sl => $division)
                                <tr>
                                    <th class="fw-bold"><b>#{{ serial($divisions, $sl) }}</b></th>
                                    <td>{{ $division->name }}</td>
                                    <td>{{ $division->gender }}</td>
                                    <td>{!! status($division->status) !!}</td>
                                    @if (auth()->user()->can('division.show') || auth()->user()->can('division.destroy')) 
                                        <td class="text-right">
                                            <div class="action-btn-group mr-3">
                                                @if (auth()->user()->can('division.destroy')) 
                                                    <a href="{{ route('administration.division.destroy', ['division' => $division]) }}" class="btn btn-outline-danger btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Delete?') }}" onclick="return confirm('Are You Sure Want To Delete?');">
                                                        <i class="feather icon-trash-2"></i>
                                                    </a>
                                                @endif
                                                @if (auth()->user()->can('division.show')) 
                                                    <a href="{{ route('administration.division.show', ['division' => $division]) }}" class="btn btn-outline-info btn-outline-custom btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('View?') }}">
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
