@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Show Ad'))

@section('css_links')
    {{--  External CSS  --}}
    
    <link href="{{ asset('frontend/css/jquery.fancybox.min.css') }}" type="text/css" rel="stylesheet"/>
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Show Ad') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Ads') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.ads.index') }}">{{ __('All Ads') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Show Details') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.ads.edit', ['ads' => $ads]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-pen"></i>
        <b>Edit Ads Info</b>
    </a>
@endsection



@section('content')

<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.ads.update', ['ads' => $ads]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card border">
                                <div class="card-header bg-primary-rgba border-bottom">
                                    <h5 class="card-title text-primary mb-0">Ads Information</h5>
                                </div>
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Ad Bannger</th>
                                                        <td><a data-fancybox="wk" href="{{ show_avatar($ads->avatar) }}" class="comon-links-divb05">
                                                            <figure>
                                                                <img src="{{ show_avatar($ads->avatar) }}" alt="{{ $ads->name }}" class="img-fluid " width="600"/>
                                                            </figure>
                                                        </a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td>{{ $ads->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>URL</th>
                                                        <td>{{ $ads->url }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Start Date</th>
                                                        <td>{{ $ads->startdate }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>End Date</th>
                                                        <td>{{ $ads->enddate }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Position</th>
                                                        <td>{{ $ads->position }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Description</th>
                                                        <td>{{ $ads->description }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td>{!! status($ads->status) !!}</td>
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
        </form>
    </div>
</div>

<!-- End Row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
@endsection
