@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Blog Title'))

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
    <b class="text-uppercase">{{ __('Blog Title') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Blog') }}</li>
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
                                <img src="{{ asset('frontend/images/pexels-photo-2116469.webp') }}" alt="post" />
                            </figure>
                            <div class="d-md-flex justify-content-between share-div">
                                <ul class="list-unstyled d-flex">
                                    <li><i class="far fa-user"></i> By Author</li>
                                    <li><i class="far fa-calendar-alt"></i> Oct 12, 2021</li>
                                    <li><i class="far fa-comment"></i> 2 comments</li>
                                </ul>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-share-alt"></i> Share</a>
                            </div>
                            <h2 class="comon-heading mt-4">France FC Bets 3-1 justo gravida, luctus lacus</h2>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                                it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                            <p class="my-4">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                                it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                            <p>
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
                                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of
                                ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                            </p>
                        </div>
                        <div class="comment-sec-part mt-5">
                            <h2 class="comon-heading mt-0 mb-3">Comments</h2>
                            <div class="comon-com-div mt-4">
                                <div class="d-md-flex justify-content-between">
                                    <figure>
                                        <img src="images/manages-st2.jpg" alt="user-pic" />
                                    </figure>
                                    <div class="comment-text">
                                        <div class="d-flex align-items-center">
                                            <h5 class="m-0">Jone due</h5>
                                            <span class="d-inline ms-3"> Oct 12 ,2021 </span>
                                        </div>
    
                                        <p class="mt-2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="comon-com-div mt-4">
                                <div class="d-md-flex justify-content-between">
                                    <figure>
                                        <img src="images/manages-st.jpg" alt="user-pic" />
                                    </figure>
                                    <div class="comment-text">
                                        <div class="d-flex align-items-center">
                                            <h5 class="m-0">John due</h5>
                                            <span class="d-inline ms-3"> Oct 12 ,2021 </span>
                                        </div>
    
                                        <p class="mt-2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="leave-sec-part mt-5">
                            <h2 class="comon-heading mt-0 mb-3">Leave a Comment</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Full Name" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn subimt-comment" value="Post Comment" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                        <div class="category-div">
                            <h2 class="comon-heading m-0">Categories</h2>
                            <ul class="list-unstyled mt-4">
                                <li>
                                    <a href="#"> <i class="fas fa-caret-right"></i> tincidunt condimentum</a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fas fa-caret-right"></i> porttitor velit </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fas fa-caret-right"></i> popular belief</a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fas fa-caret-right"></i> nisl porttitor</a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fas fa-caret-right"></i> adipiscing elit</a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fas fa-caret-right"></i> scelerisque felis </a>
                                </li>
                            </ul>
                        </div>
                        <div class="recent-post-div mt-5">
                            <h2 class="mb-4 comon-heading">Recent Post</h2>
                            <div class="recent-post-div-insiide">
                                <a href="#" class="d-flex w-100 justify-content-between align-items-center">
                                    <figure>
                                        <img src="images/pexels-photo-2874717.jpg" alt="post" />
                                    </figure>
                                    <h5>scelerisque felis viverra</h5>
                                </a>
                                <a href="#" class="d-flex w-100 justify-content-between align-items-center">
                                    <figure>
                                        <img src="images/pexels-photo-2834917.webp" alt="post" />
                                    </figure>
                                    <h5>auctor sapien non metus posuere</h5>
                                </a>
                                <a href="#" class="d-flex w-100 justify-content-between align-items-center">
                                    <figure>
                                        <img src="images/pexels-photo-6249668.webp" alt="post" />
                                    </figure>
                                    <h5>egestas lorem feugiat, mattis nunc</h5>
                                </a>
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
