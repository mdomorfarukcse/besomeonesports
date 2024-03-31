@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Gallery'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        .m-t-20 {
            margin-top: 20px;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Gallery') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Gallery') }}</li>
@endsection

@section('content')

    <section class="float-start w-100">
        <div class="mediasection d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Videos</h5>
                    <h1>Our <span> Latest Video </span></h1>
                </div>
                <div class="row row-cols-2 row-cols-lg-4 mt-0 g-4 mt-3">
                    @foreach ($videos as $key => $video)
                        <div class="col-md-6">
                            <iframe width="100%" height="345" src="{{ $video->youtubeurl }}">
                            </iframe>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Start row -->
    <section class="float-start w-100">
        <div class="mediasection d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Gallery</h5>
                    <h1>Our <span> Latest Media </span></h1>
                </div>
                <!-- Start row -->
                <div class="row">
                    <div class="col-md-12 m-b-20 mt-3 mb-3">
                        <div class="card">
                            <form action="" method="get">
                                <div class="card-body">
                                    <input type="hidden" name="filter" value="true">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="season">Season</label>
                                            <select class="select2-single form-control @error('season') is-invalid @enderror" name="season_id">
                                                <option value="">Select Seasons</option>
                                                @foreach ($seasons as $season)
                                                    <option value="{{ $season->id }}" {{ $request->season == $season->id ? 'selected' : '' }}>{{ $season->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('season')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="sport_id">Sport</label>
                                            <select class="select2-single form-control @error('sport_id') is-invalid @enderror" name="sport_id">
                                                <option value="">Select Sport</option>
                                                @foreach ($sports as $sport)
                                                    <option value="{{ $sport->id }}" {{ $request->sport_id == $sport->id ? 'selected' : '' }}>{{ $sport->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('sport_id')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="name">League Name</label>
                                            <select class="select2-single form-control @error('league_id') is-invalid @enderror" name="league_id" >
                                                <option value="">Select League</option>
                                                @foreach ($leagues as $league)
                                                    <option value="{{ $league->id }}" {{ $request->league_id == $league->id ? 'selected' : '' }}>{{ $league->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('league_id')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-dark btn-custom btn-block m-t-20">
                                                <i class="feather icon-filter mr-1"></i>
                                                <span class="text-bold">Filter</span>
                                            </button>
                                            @if ($request->filter == true) 
                                                <a href="{{ route('frontend.gallery.index') }}" class="btn btn-link text-danger text-bold float-end float-right">
                                                    <i class="icon feather icon-x m-r-1"></i>
                                                    Clear
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-lg-4 mt-0 g-4 mt-3 mb-3">
                    @foreach ($galleries as $keys => $gallery)
                        <div class="col">
                            <a data-fancybox="wk" href="{{ show_image($gallery->path) }}" class="comon-links-divb05">
                                <figure>
                                    <img src="{{ show_image($gallery->path) }}" alt="{{ $gallery->name }}" />
                                    {{-- <figcaption>
                                        {{ $gallery->name }}
                                        @if (!is_null($gallery->league)) 
                                            {{ $gallery->league->name }}
                                        @endif
                                    </figcaption> --}}
                                </figure>
                            </a>
                        </div>
                    @endforeach
    
                </div>
            </div>
        </div>
    </section>
    
    <!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
