@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Profile'))

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
    <b class="text-uppercase">{{ __('Profile') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Profile') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="#" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-pen"></i>
        <b>Edit Profile</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center mb-5">
    @if ($profile->roles->first()->name === 'coach')
        @include('administration.profile.profiles.coach')
    @elseif ($profile->roles->first()->name === 'player')
        @include('administration.profile.profiles.player')
    @elseif ($profile->roles->first()->name === 'user')
        @include('administration.profile.profiles.user')
    @else
        @include('administration.profile.profiles.admin')
    @endif
</div>

<!-- End Row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
@endsection
