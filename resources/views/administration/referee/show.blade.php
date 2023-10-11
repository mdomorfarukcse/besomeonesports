@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Referee'))

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
    <b class="text-uppercase">{{ __('Show Referee') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Referees') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.referee.index') }}">{{ __('All Referees') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.referee.edit', ['referee' => $referee]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-pen"></i>
        <b>Edit Referee Info</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header bg-primary-rgba border-bottom">
                                <h5 class="card-title text-primary mb-0">Referee Information</h5>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr class="text-center">
                                                    <td colspan="2">
                                                        <div class="user-avatar">
                                                            @if (is_null($referee->avatar)) 
                                                                <img src="https://fakeimg.pl/500x500" alt="User Avatar" class="img-thumbnail" width="250">
                                                            @else 
                                                                <img src="{{ show_image($referee->avatar) }}" alt="User Avatar" class="img-thumbnail" width="250">
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $referee->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $referee->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Contact</th>
                                                    <td>{{ $referee->contact_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Birthdate</th>
                                                    <td>{{ show_date($referee->birthdate) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>
                                                        <address class="mb-0">
                                                            Post: {{ $referee->postal_code }}
                                                            <br>    
                                                            City: {{ $referee->city }}
                                                            <br>    
                                                            State: {{ $referee->state }}
                                                            <br>
                                                            Street Address: {{ $referee->address }}
                                                        </address>    
                                                    </td>
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
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
@endsection
