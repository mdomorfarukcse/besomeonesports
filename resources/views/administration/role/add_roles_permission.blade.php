@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Create New Role'))

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
    .custom-checkbox label{
        text-transform: capitalize;
    }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Create New Role') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Create New Role') }}</li>
@endsection



@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.role.store.rolepermission') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Create New Role in Permission</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="role_id">Role Name <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('role_id') is-invalid @enderror" name="role_id" required>
                                                <option value=""  selected>Select Group</option>
                                                @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="allpermission" />
                                                <label class="custom-control-label" for="allpermission">Permission All</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12 form-group">
                                            @foreach ($permission_groups as $group)
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck{{ $group->group_name }}" />
                                                            <label class="custom-control-label" for="customCheck{{ $group->group_name }}">{{ $group->group_name }}</label>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                                    @endphp
                                                    <div class="col-md-9">
                                                        @foreach ($permissions as $permission)
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck{{ $permission->id }}" name="permission[]" value="{{ $permission->id }}"/>
                                                                <label class="custom-control-label" for="customCheck{{ $permission->id }}">{{ $permission->name }}</label>
                                                            </div>
                                                        @endforeach
                                                        <br>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Create New Role</span>
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
        // Custom Script Here
        $('#allpermission').click(function(){
            if($(this).is(':checked')){
                $('input[type=checkbox]').prop('checked',true);
            }else{
                $('input[type=checkbox]').prop('checked',false);
            }
        });
    </script>
@endsection
