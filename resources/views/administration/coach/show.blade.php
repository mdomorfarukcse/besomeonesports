@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Coach'))

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
    <b class="text-uppercase">{{ __('Show Coach') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Coaches') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.coach.index') }}">{{ __('All Coaches') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.coach.edit', ['coach' => $coach]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-pen"></i>
        <b>Edit Coach Info</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.coach.update', ['coach' => $coach]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card border">
                                <div class="card-header bg-primary-rgba border-bottom">
                                    <h5 class="card-title text-primary mb-0">Coach's Information</h5>
                                </div>
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td colspan="2">
                                                            <div class="user-avatar">
                                                                <img src="{{ show_avatar($coach->user->avatar) }}" alt="User Avatar" class="img-thumbnail" width="250">
                                                            </div>    
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Coach ID (PID)</th>
                                                        <td class="text-primary text-bold">{{ $coach->coach_id }}</td>
                                                    </tr>
                                                    @if (!empty($coach->position))
                                                        <tr>
                                                            <th>Position</th>
                                                            <td>{{ $coach->position }}</td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <th>Name</th>
                                                        <td>{{ $coach->user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>{{ $coach->user->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Contact</th>
                                                        <td>{{ $coach->phone_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td>
                                                            <address class="mb-0">
                                                                Post: {{ $coach->postal_code }}
                                                                <br>    
                                                                City: {{ $coach->city }}
                                                                <br>    
                                                                State: {{ $coach->state }}
                                                                <br>
                                                                Street Address: {{ $coach->street_address }}
                                                                @if (!empty($coach->extended_address))
                                                                    <br>
                                                                    Extended Address: {{ $coach->extended_address }}
                                                                @endif
                                                            </address>    
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td>{!! status($coach->status) !!}</td>
                                                    </tr>
                                                    @if (!empty($coach->note))
                                                        <tr>
                                                            <th>Note</th>
                                                            <td>{!! $coach->note !!}</td>
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
