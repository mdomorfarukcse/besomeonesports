@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __( $blog->name ))

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
    <b class="text-uppercase">{{ $blog->name }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Blogs') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part pt-0">
        <div class="blogs-details-page comon-services-pge py-5">
            <div class="container">
                <div class="row gx-lg-5">
                    <div class="col-lg-7 col-xl-8">
                        <div class="blog-post">
                            <figure>
                                <img src="{{ show_image($blog->avatar) }}" alt="post" />
                            </figure>
                            <div class="d-md-flex justify-content-between share-div">
                                <ul class="list-unstyled d-flex">
                                    {{-- <li><i class="far fa-user"></i> By Author</li> --}}
                                    <li><i class="far fa-calendar-alt"></i> {{ show_date($blog->created_at) }}</li>
                                </ul>
                                {{-- <a data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-share-alt"></i> Share</a> --}}
                            </div>
                            <h2 class="comon-heading mt-4">{{ $blog->name }}</h2>
                            {{ $blog->description }}
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                        <div class="recent-post-div mt-5">
                            <h2 class="mb-4 comon-heading">Recent News</h2>
                            <div class="recent-post-div-insiide">
                                @foreach ($all_blog as $keys => $single_blog)
                                    <a href="{{ route('frontend.press.show', ['press' => $single_blog]) }}" class="d-flex w-100 justify-content-between align-items-center">
                                        <figure>
                                            <img src="{{ show_image($single_blog->avatar) }}" alt="post" />
                                        </figure>
                                        <h5>{{ $single_blog->name }}</h5>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
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
