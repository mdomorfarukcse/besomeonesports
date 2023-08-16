@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Shop'))

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
    <b class="text-uppercase">{{ __('Product Details') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page">{{ __('Shop') }}</li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Product Details') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part pt-0">
        <div class="products-details-sec py-5">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-6">
                        <div class="products-slide-1">
                            <div id="sync1" class="owl-carousel owl-theme">
                                <div class="item">
                                    <a href="{{ asset('frontend/images/botsman1.png') }}" data-fancybox="" class="mian-ppic">
                                        <img src="{{ asset('frontend/images/botsman1.png') }}" alt="re3" />
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="{{ asset('frontend/images/botsmann1.png') }}" data-fancybox="" class="mian-ppic">
                                        <img src="{{ asset('frontend/images/botsmann1.png') }}" alt="re2" />
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="{{ asset('frontend/images/botsmann2.png') }}" data-fancybox="" class="mian-ppic">
                                        <img src="{{ asset('frontend/images/botsmann2.png') }}" alt="re" />
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="{{ asset('frontend/images/botsmann3.png') }}" data-fancybox="" class="mian-ppic">
                                        <img src="{{ asset('frontend/images/botsmann3.png') }}" alt="re4" />
                                    </a>
                                </div>
                            </div>

                            <div id="sync2" class="owl-carousel owl-theme">
                                <div class="item">
                                    <div class="thum-pic-slide">
                                        <figure>
                                            <img src="{{ asset('frontend/images/botsman1.png') }}" alt="re3" />
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="thum-pic-slide">
                                        <figure>
                                            <img src="{{ asset('frontend/images/botsmann1.png') }}" alt="re2" />
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="thum-pic-slide">
                                        <figure>
                                            <img src="{{ asset('frontend/images/botsmann2.png') }}" alt="re" />
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="thum-pic-slide">
                                        <figure>
                                            <img src="{{ asset('frontend/images/botsmann3.png') }}" alt="re4" />
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="menu-dl-right mt-5 mt-lg-0">
                            <h2 class="comon-heading m-0">New adipiscing Shoes</h2>
                            <h3 class="price-dlm">$ 20.50</h3>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. ipsum primis in faucibus orci luctus et
                                ultricesLorem Ipsum is
                            </p>
                            <h5>Size Of Crust</h5>
                            <ul class="list-unstyled d-flex sixe-menu-q">
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            7cm
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" />
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            8cm
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" />
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            10cm
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            <h5>Quantity</h5>

                            <div class="quantity-control" data-quantity="">
                                <button class="quantity-btn" data-quantity-minus="">
                                    <svg viewBox="0 0 409.6 409.6">
                                        <g>
                                            <g>
                                                <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                                <input type="number" class="quantity-input" data-quantity-target="" value="1" step="0.1" min="1" max="" name="quantity" />
                                <button class="quantity-btn" data-quantity-plus="">
                                    <svg viewBox="0 0 426.66667 426.66667">
                                        <path
                                            d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0"
                                        />
                                    </svg>
                                </button>
                            </div>

                            <h5 class="mt-3">
                                Share This :
                                <ul class="list-unstyled share-links mt-3">
                                    <li class="d-flex">
                                        <a href="#"> <i class="fab fa-facebook-f"></i> </a>
                                        <a href="#"> <i class="fab fa-twitter"></i> </a>
                                        <a href="#"> <i class="fab fa-google-plus-g"></i> </a>
                                    </li>
                                </ul>
                            </h5>

                            <button class="btn crat-btnh mt-5">
                                <span> <i class="fas fa-shopping-cart"></i> </span> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bottom-details mt-5">
                    <h2 class="comon-heading m-0">Description</h2>
                    <hr />
                    <p>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas
                        semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies
                        eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                    </p>
                </div>

                <div class="related-produc d-inline-block w-100">
                    <div class="mindle-heading text-center">
                        <h5>Products</h5>
                        <h1>Related <span> Products </span></h1>
                    </div>
                    <span class="bgi-text light-tsext01"> Products</span>

                    <div class="shop-slider owl-carousel owl-theme mt-5">
                        <div class="comon-section1-shop">
                            <div class="top-imgb-box">
                                <figure>
                                    <img src="images/5888851cbc2fc2ef3a186098.png" alt="shop1" />
                                </figure>
                                <ul class="hover-list2">
                                    <li>
                                        <a href="#" class="btn btn-comnb">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-comnb">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-details-div text-center mt-3">
                                <a href="#" class="titel-text1"> Junior Jusrssy </a>
                                <span class="d-block rat-text">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <h3 class="price-text1"><span class="text-decoration-line-through">$ 20.00 </span> $30.00</h3>
                                <a href="#" class="btn cart-bthn mt-3">
                                    <span> Add to cart </span>
                                    <span class="ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"
                                            />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="comon-section1-shop">
                            <div class="top-imgb-box">
                                <figure>
                                    <img src="images/ballsd.png" alt="shop1" />
                                </figure>
                                <ul class="hover-list2">
                                    <li>
                                        <a href="#" class="btn btn-comnb">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-comnb">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-details-div text-center mt-3">
                                <a href="#" class="titel-text1"> Junior Jusrssy </a>
                                <span class="d-block rat-text">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <h3 class="price-text1"><span class="text-decoration-line-through">$ 20.00 </span> $30.00</h3>
                                <a href="#" class="btn cart-bthn mt-3">
                                    <span> Add to cart </span>
                                    <span class="ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"
                                            />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="comon-section1-shop">
                            <div class="top-imgb-box">
                                <figure>
                                    <img src="images/botsman1.png" alt="shop1" />
                                </figure>
                                <ul class="hover-list2">
                                    <li>
                                        <a href="#" class="btn btn-comnb">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-comnb">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-details-div text-center mt-3">
                                <a href="#" class="titel-text1"> Junior Jusrssy </a>
                                <span class="d-block rat-text">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <h3 class="price-text1"><span class="text-decoration-line-through">$ 20.00 </span> $30.00</h3>
                                <a href="#" class="btn cart-bthn mt-3">
                                    <span> Add to cart </span>
                                    <span class="ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"
                                            />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="comon-section1-shop">
                            <div class="top-imgb-box">
                                <figure>
                                    <img src="images/football_boots_PNG37.png" alt="shop1" />
                                </figure>
                                <ul class="hover-list2">
                                    <li>
                                        <a href="#" class="btn btn-comnb">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-comnb">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-details-div text-center mt-3">
                                <a href="#" class="titel-text1"> Junior Jusrssy </a>
                                <span class="d-block rat-text">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <h3 class="price-text1"><span class="text-decoration-line-through">$ 20.00 </span> $30.00</h3>
                                <a href="#" class="btn cart-bthn mt-3">
                                    <span> Add to cart </span>
                                    <span class="ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"
                                            />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="comon-section1-shop">
                            <div class="top-imgb-box">
                                <figure>
                                    <img src="images/botsman1.png" alt="shop1" />
                                </figure>
                                <ul class="hover-list2">
                                    <li>
                                        <a href="#" class="btn btn-comnb">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-comnb">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-details-div text-center mt-3">
                                <a href="#" class="titel-text1"> Junior Jusrssy </a>
                                <span class="d-block rat-text">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <h3 class="price-text1"><span class="text-decoration-line-through">$ 20.00 </span> $30.00</h3>
                                <a href="#" class="btn cart-bthn mt-3">
                                    <span> Add to cart </span>
                                    <span class="ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"
                                            />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="related-prodcus-slide">
                    <div class="best-sl-m2 mt-4 owl-carousel owl-theme">
                        <div class="produc-div">
                            <figure>
                                <img src="images/s1.html" alt="pic" />
                                <span class="btn cart-bn"> <i class="bi bi-basket2-fill"></i> </span>
                            </figure>
                            <a href="#" class="sm-titel-2">Shoes</a>
                            <a href="products-details-2.html" class="mt-3 pro-titel"> Pineapple Express </a>

                            <h4>$15</h4>
                        </div>

                        <div class="produc-div">
                            <figure>
                                <img src="images/s2.html" alt="pic" />
                                <span class="btn cart-bn"> <i class="bi bi-basket2-fill"></i> </span>
                            </figure>
                            <a href="#" class="sm-titel-2">Shoes</a>
                            <a href="products-details-2.html" class="mt-3 pro-titel"> Pineapple Express </a>

                            <h4>$15</h4>
                        </div>

                        <div class="produc-div">
                            <figure>
                                <img src="images/s3.html" alt="pic" />
                                <span class="btn cart-bn"> <i class="bi bi-basket2-fill"></i> </span>
                            </figure>
                            <a href="#" class="sm-titel-2">Shoes</a>
                            <a href="products-details-2.html" class="mt-3 pro-titel"> Pineapple Express </a>

                            <h4>$15</h4>
                        </div>

                        <div class="produc-div">
                            <figure>
                                <img src="images/s5.html" alt="pic" />
                                <span class="btn cart-bn"> <i class="bi bi-basket2-fill"></i> </span>
                            </figure>
                            <a href="#" class="sm-titel-2">Shoes</a>
                            <a href="products-details-2.html" class="mt-3 pro-titel"> Pineapple Express </a>

                            <h4>$15</h4>
                        </div>
                        <div class="produc-div">
                            <figure>
                                <img src="images/shoes3.html" alt="pic" />
                                <span class="btn cart-bn"> <i class="bi bi-basket2-fill"></i> </span>
                            </figure>
                            <a href="#" class="sm-titel-2">Shoes</a>
                            <a href="products-details-2.html" class="mt-3 pro-titel"> Pineapple Express </a>

                            <h4>$15</h4>
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
        // products slide

        $(document).ready(function () {
            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;

            sync1
                .owlCarousel({
                    items: 1,
                    slideSpeed: 2000,
                    nav: false,
                    autoplay: false,
                    dots: false,
                    loop: true,
                    responsiveRefreshRate: 200,
                })
                .on("changed.owl.carousel", syncPosition);

            sync2
                .on("initialized.owl.carousel", function () {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: true,
                    nav: false,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                })
                .on("changed.owl.carousel", syncPosition2);

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2.find(".owl-item").removeClass("current").eq(current).addClass("current");
                var onscreen = sync2.find(".owl-item.active").length - 1;
                var start = sync2.find(".owl-item.active").first().index();
                var end = sync2.find(".owl-item.active").last().index();

                if (current > end) {
                    sync2.data("owl.carousel").to(current, 100, true);
                }
                if (current < start) {
                    sync2.data("owl.carousel").to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data("owl.carousel").to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data("owl.carousel").to(number, 300, true);
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".shop-slider").owlCarousel({
                loop: true,
                margin: 30,
                autoplay: true,
                nav: false,
                dots: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    667: {
                        items: 2,
                    },
                    1000: {
                        items: 4,
                    },
                },
            });
        });
    </script>

    <script>
        // quantity js

        // quantity
        (function () {
            "use strict";
            var jQueryPlugin = (window.jQueryPlugin = function (ident, func) {
                return function (arg) {
                    if (this.length > 1) {
                        this.each(function () {
                            var $this = $(this);

                            if (!$this.data(ident)) {
                                $this.data(ident, func($this, arg));
                            }
                        });

                        return this;
                    } else if (this.length == 1) {
                        if (!this.data(ident)) {
                            this.data(ident, func(this, arg));
                        }

                        return this.data(ident);
                    }
                };
            });
        })();

        (function () {
            "use strict";
            function Guantity($root) {
                const element = $root;
                const quantity = $root.first("data-quantity");
                const quantity_target = $root.find("[data-quantity-target]");
                const quantity_minus = $root.find("[data-quantity-minus]");
                const quantity_plus = $root.find("[data-quantity-plus]");
                var quantity_ = quantity_target.val();
                $(quantity_minus).click(function () {
                    quantity_target.val(--quantity_);
                });
                $(quantity_plus).click(function () {
                    quantity_target.val(++quantity_);
                });
            }
            $.fn.Guantity = jQueryPlugin("Guantity", Guantity);
            $("[data-quantity]").Guantity();
        })();
    </script>

    <script>
        //  size js
        $(document).ready(function () {
            var selector = ".sixe-menu-q li";

            $(selector).on("click", function () {
                $(selector).removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
@endsection
