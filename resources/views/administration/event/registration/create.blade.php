@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Event Registration'))

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
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Event Registration') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Events') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.event.index') }}">{{ __('All Events') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.event.show', ['event' => $event]) }}">{{ __('Event Details') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Event Registration') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.event.show', ['event' => $event]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection


@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="{{ route('administration.event.registration.store', ['event' => $event]) }}" method="post" class="card-form" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @role('player')
                <input type="hidden" name="player_id" value="{{ encrypt(auth()->user()->player->id) }}">
            @endrole
            <input type="hidden" name="paid_by" value="{{ encrypt(auth()->user()->id) }}">
            <div class="card border m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">New Registration</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @role('admin')
                            <div class="form-group col-md-12">
                                <label for="player_id">Player <span class="required">*</span></label>
                                <select class="select2-single form-control @error('player_id') is-invalid @enderror" name="player_id" required>
                                    <option value="">Select Player</option>
                                    @foreach ($players as $player)
                                        <option value="{{ $player->id }}">{{ $player->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('player_id')
                                    <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                @enderror
                            </div>
                        @endrole
                        
                        @error('event_player_unique')
                            <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class='card-wrapper'></div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cardnumber">Card Number</label>
                                    <input type="text" class="form-control" name="card_number" id="cardnumber">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cardfullname">Full Name</label>
                                    <input type="text" class="form-control" name="card_holder_name" id="cardfullname">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cardexpiry">Expiry Date</label>
                                    <input type="text" class="form-control" name="card_expiry" id="cardexpiry">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cardcvc">CVC</label>
                                    <input type="text" class="form-control" name="card_cvc" id="cardcvc">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-check mr-1"></i>
                        <span class="text-bold">Register Now</span>
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

    <!-- Card js -->
    <script src="{{ asset('assets/plugins/creditcard/card.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-creditcard.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
