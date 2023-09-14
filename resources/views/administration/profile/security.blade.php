@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Security'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Security') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Profile') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Security') }}</li>
@endsection


@section('content')

<!-- Start Row -->
<div class="row justify-content-center mb-5">
    <div class="col-md-5">
        <form action="{{ route('administration.profile.security.password.update', ['user' => Auth::user()]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card border m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Update Password</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="old_password">Old Password <span class="required">*</span></label>
                            <input type="password" name="old_password" value="{{ old('old_password') }}" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password" required/>
                            @error('old_password')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-12 form-group">
                            <label for="new_password">New Password <span class="required">*</span></label>
                            <input type="password" name="new_password" value="{{ old('new_password') }}" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password" required/>
                            @error('new_password')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-12 form-group">
                            <label for="new_password_confirmation">Confirm New Password <span class="required">*</span></label>
                            <input type="password" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}" class="form-control @error('new_password_confirmation') is-invalid @enderror" placeholder="Confirm New Password" required/>
                            @error('new_password_confirmation')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Update Password</span>
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
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
@endsection
