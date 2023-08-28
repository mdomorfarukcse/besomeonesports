@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Update Permission'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Update Permission') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Permissions') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.permission.index') }}">{{ __('All Permissions') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.permission.show', ['permission' => $permission]) }}">{{ __('Show Details') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Edit permission') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.permission.show', ['permission' => $permission]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection


@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.permission.update', ['permission' => $permission]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Update permission</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="name">Name <span class="required">*</span></label>
                                            <input type="text" name="name" value="{{ $permission->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Tennies" required/>
                                            @error('name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="group_name">Group Name <span class="required">*</span></label>
                                            <select class="select2-single form-control @error('group_name') is-invalid @enderror" name="group_name" required>
                                                <option value="">Select Group</option>
                                                <option value="chat" @if ($permission->group_name == 'chat') selected @endif>Chat</option>
                                                <option value="coach" @if ($permission->group_name == 'coach') selected @endif>Coach</option>
                                                <option value="dashboard" @if ($permission->group_name == 'dashboard') selected @endif>Dashbaord</option>
                                                <option value="division" @if ($permission->group_name == 'division') selected @endif>Division</option>
                                                <option value="event" @if ($permission->group_name == 'event') selected @endif>Event</option>
                                                <option value="faq" @if ($permission->group_name == 'faq') selected @endif>Faq</option>
                                                <option value="player" @if ($permission->group_name == 'player') selected @endif>Player</option>
                                                <option value="schedule" @if ($permission->group_name == 'schedule') selected @endif>Schedule</option>
                                                <option value="season" @if ($permission->group_name == 'season') selected @endif>Season</option>
                                                <option value="sponsor" @if ($permission->group_name == 'sponsor') selected @endif>Sponsor</option>
                                                <option value="sport" @if ($permission->group_name == 'sport') selected @endif>Sport</option>
                                                <option value="team" @if ($permission->group_name == 'team') selected @endif>Team</option>
                                                <option value="venue" @if ($permission->group_name == 'venue') selected @endif>Venue</option>
                                            </select>
                                            @error('group_name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
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
                        <span class="text-bold">Update permission</span>
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
@endsection
