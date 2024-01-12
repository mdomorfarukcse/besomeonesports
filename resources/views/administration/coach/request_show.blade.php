@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Coach Request Details'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .btn-success {
        background-color: #00893d;
        border-color: #00893d;
    }
    .btn-success:focus,
    .btn-success:active,
    .btn-success:hover {
        background-color: #014e24;
        border-color: #014e24;
    }
    
    .btn-danger {
        background-color: #b80600;
        border-color: #b80600;
    }
    .btn-danger:focus,
    .btn-danger:active,
    .btn-danger:hover {
        background-color: #970500;
        border-color: #970500;
    }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Coach Request Details') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Coaches') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.coach.request') }}">{{ __('All Coach Requests') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.coach.request') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header">
                                <h5 class="card-title mb-0 text-bold float-left">Coach Request</h5>
                                <a href="{{ route('administration.coach.request.update', ['coach' => $coach, 'status' => encrypt('Approve')]) }}" class="btn btn-success btn-sm float-right font-13" onclick="return confirm('Are You Sure Want To Approve?');">
                                    <i class="la la-check"></i>
                                    Approve
                                </a>
                                <a href="{{ route('administration.coach.request.update', ['coach' => $coach, 'status' => encrypt('Reject')]) }}" class="btn btn-danger btn-sm float-right font-13 mr-2" onclick="return confirm('Are You Sure Want To Reject?');">
                                    <i class="la la-times"></i>
                                    Reject
                                </a>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                {{-- <tr class="text-center">
                                                    <td colspan="2">
                                                        <div class="user-avatar">
                                                            <img src="{{ show_image($coach->avatar) }}" alt="User Avatar" class="img-thumbnail" width="250">
                                                        </div>    
                                                    </td>
                                                </tr> --}}
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $coach->first_name }} {{ $coach->last_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $coach->email }}</td>
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
                                                    <th>Fields of Interest</th>
                                                    <td>
                                                        <ul class="list-group d-inline-block">
                                                            @foreach (json_decode($coach->sport_of_interests) as $interest) 
                                                                <li class="list-group-item d-inline-block border-1">{{ $interest }}</li>
                                                            @endforeach
                                                        </ul>
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
    <script>
        // Custom Script Here
        /* -- Bootstrap Tooltip -- */
        $('[data-toggle="tooltip"]').tooltip();
    </script>
@endsection