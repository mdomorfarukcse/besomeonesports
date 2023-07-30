@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Add New Player'))

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
    <b class="text-uppercase">{{ __('All Players') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Players') }}</li>
    <li class="breadcrumb-item text-capitalize active">{{ __('All Players') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.player.create') }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-pen"></i>
        <b>Edit Player Info</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.player.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card border">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Player Info</h5>
                                </div>
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td colspan="2">
                                                            <div class="user-avatar">
                                                                <img src="{{ show_avatar($player->user->avatar) }}" alt="User Avatar" class="img-thumbnail" width="250">
                                                            </div>    
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Player ID (PID)</th>
                                                        <td class="text-primary text-bold">{{ $player->player_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td>{{ $player->user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>{{ $player->user->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Contact</th>
                                                        <td>{{ $player->contact_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Height</th>
                                                        <td>{!! show_height($player->height) !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Weight</th>
                                                        <td>{!! show_weight($player->weight) !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td>
                                                            <address class="mb-0">
                                                                Post: {{ $player->postal_code }}
                                                                <br>    
                                                                City: {{ $player->city }}
                                                                <br>    
                                                                State: {{ $player->state }}
                                                                <br>
                                                                Street Address: {{ $player->street_address }}
                                                                <br>
                                                                Extended Address: {{ $player->extended_address }}
                                                            </address>    
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td>{!! status($player->status) !!}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card border m-b-30">
                                        <div class="card-header border-bottom">
                                            <h5 class="card-title mb-0">Parents Info</h5>
                                        </div>
                                        <div class="card-body py-2">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th>Father Name</th>
                                                                <td>{{ $player->father_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Father Email</th>
                                                                <td>{{ $player->father_email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Father Contact</th>
                                                                <td>{{ $player->father_contact }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mother Name</th>
                                                                <td>{{ $player->mother_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mother Email</th>
                                                                <td>{{ $player->mother_email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mother Contact</th>
                                                                <td>{{ $player->mother_contact }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card border m-b-30">
                                        <div class="card-header border-bottom">
                                            <h5 class="card-title mb-0">Guardian Info</h5>
                                        </div>
                                        <div class="card-body py-2">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th>Guardian Name</th>
                                                                <td>{{ $player->guardian_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Guardian Relation</th>
                                                                <td>{{ $player->guardian_relation }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Guardian Email</th>
                                                                <td>{{ $player->guardian_email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Guardian Contact</th>
                                                                <td>{{ $player->guardian_contact }}</td>
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
