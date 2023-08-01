@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Event'))

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
    <b class="text-uppercase">{{ __('Show Event') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Events') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.coach.index') }}">{{ __('All Events') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.event.edit', ['event' => $event]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-pen"></i>
        <b>Edit Event Info</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.event.update', ['event' => $event]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card border">
                                <div class="card-header bg-primary-rgba border-bottom">
                                    <h5 class="card-title text-primary mb-0">Event's Information</h5>
                                </div>
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td colspan="2">
                                                            <div class="user-avatar">
                                                                <img src="{{ show_avatar($event->logo) }}" alt="Event Logo" class="img-thumbnail" width="250">
                                                            </div>    
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Season</th>
                                                        <td>
                                                            <a href="{{ route('administration.season.show', ['season' => $event->season]) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Click to see {{ $event->season->name }} details" class="text-dark text-bold">
                                                                {{ $event->season->name }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sport</th>
                                                        <td>
                                                            <a href="{{ route('administration.sport.show', ['sport' => $event->sport]) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Click to see {{ $event->sport->name }} details" class="text-dark text-bold">
                                                                {{ $event->sport->name }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td>{{ $event->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Event Start Date</th>
                                                        <td>{{ $event->start }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Event End Date</th>
                                                        <td>{{ $event->end }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td>{!! status($event->status) !!}</td>
                                                    </tr>
                                                    @if (!empty($event->description))
                                                        <tr>
                                                            <th>Description</th>
                                                            <td>{!! $event->description !!}</td>
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
    <script>
        $('[data-toggle="tooltip"]').tooltip();
    </script>
@endsection
