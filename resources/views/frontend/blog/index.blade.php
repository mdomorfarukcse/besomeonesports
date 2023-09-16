@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Blog'))

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
    <b class="text-uppercase">{{ __('Blog') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Blog') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part pt-0">
        <div class="blogs-page d-inline-block w-100 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h2 class="comon-heading">Our Blogs</h2>
                    </div>
                </div>
    
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 mt-0">

                    @foreach ($blogs as $key => $blog)
                        <div class="col">
                            <a href="{{ route('frontend.blog.show', ['blog' => $blog]) }}" class="comon-posrt w-100 d-inline-block">
                                <div class="img-boxv w-100 d-inline-block">
                                    <figure class="w-100 d-inline-block">
                                        <img src="{{ show_avatar($blog->avatar) }}" alt="{{ $blog->name }}" />
                                    </figure>
                                    <span class="daet01">
                                        {{ date('d', strtotime($blog->created_at)) }}
                                        <small class="d-block">{{ date('M', strtotime($blog->created_at)) }}</small>
                                    </span>
                                </div>
                                <div class="parar-delatsy">
                                    <h6>Blog</h6>
                                    <h5>{{ $blog->name }}</h5>
                                    <p class="my-2">{{ print_one_line($blog->description) }}</p>
                                    
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {{ $blogs->links('pagination::bootstrap-4') }}
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
