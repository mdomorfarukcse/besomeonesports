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
    <div class="col-md-6">
        <div class="card border">
            <div class="card-header bg-primary-rgba border-bottom">
                <h5 class="card-title text-primary mb-0">My Profile</h5>
            </div>
            <div class="card-body py-2">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr class="text-center">
                                    <td colspan="2">
                                        <div class="user-avatar">
                                            @if (is_null($profile->avatar)) 
                                                <img src="https://fakeimg.pl/500x500" alt="User Avatar" class="img-thumbnail" width="250">
                                            @else 
                                                <img src="{{ show_avatar($profile->avatar) }}" alt="User Avatar" class="img-thumbnail" width="250">
                                            @endif
                                        </div>    
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $profile->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $profile->email }}</td>
                                </tr>

                                @if ($profile->roles->first()->name === 'coach')
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{ $profile->coach->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Birthdate</th>
                                        <td>{{ show_date($profile->coach->birthdate) }}</td>
                                    </tr>
                                @elseif ($profile->roles->first()->name === 'player')
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{ $profile->player->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Birthdate</th>
                                        <td>{{ show_date($profile->player->birthdate) }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
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
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
@endsection
