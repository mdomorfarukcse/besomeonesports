@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Shop'))

@section('css_links')
    {{--  External CSS  --}}
    <link rel="stylesheet" href="https://thdoan.github.io/magnify/css/magnify.css">
    
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        .item {
            margin: 0 5px;
        }
        .thum-pic-slide figure {
            height: 150px;
        }
        .owl-carousel .owl-item img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .comon-section1-shop {
            height: 350px;
        }
        .sixe-menu-q .form-check{
            width: auto !important;
        }
        .sixe-menu-q .form-check .form-check-input,.sixe-menu-q .form-check .form-check-label  {
            width: auto !important;
        }
        p, .owl-carousel .owl-item {
            text-align: center;
        }
        .zoom {
            width: auto !important;
            height: 400px;
            display: inline-block !important;
        }
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
                                @foreach ($product->images as $sl => $image)
                                    <div class="item">
                                        <a href="{{ show_image($image->path) }}" data-fancybox="" class="mian-ppic">
                                            <img src="{{ show_image($image->path) }}" alt="Product Image {{ $sl+1 }}" class="zoom" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <div id="sync2" class="owl-carousel owl-theme mt-3 mb-3 mr-3">
                                @foreach ($product->images as $sl => $image)
                                    <div class="item">
                                        <div class="thum-pic-slide">
                                            <figure>
                                                <img src="{{ show_image($image->path) }}" alt="Product Image {{ $sl+1 }}" />
                                            </figure>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{ route('frontend.shop.add_to_cart', ['product' => $product]) }}" method="post">
                            @csrf
                            <div class="menu-dl-right mt-5">
                                <h2 class="comon-heading m-0">{{ $product->name }}</h2>
                                <h3 class="price-dlm">${{ $product->price }}</h3>
                                <h5>Size <sup class="text-danger">*</sup></h5>
                                <ul class="list-unstyled d-flex sixe-menu-q size-checkbox">
                                    @foreach (json_decode($product->sizes) as $key => $size)
                                        <li class="mb-2 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="product_size" id="product_size_{{ $key }}" value="{{ $size }}" required/>
                                                <label class="form-check-label" for="product_size_{{ $key }}">{{ $size }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <h5>Color <sup class="text-danger">*</sup></h5>
                                <ul class="list-unstyled d-flex sixe-menu-q color-checkbox">
                                    @foreach (json_decode($product->colors) as $key => $color)
                                        <li class="mb-2 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="product_color" id="product_color_{{ $key }}" value="{{ $color }}" required/>
                                                <label class="form-check-label" for="product_color_{{ $key }}">{{ $color }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <h5>Quantity <sup class="text-danger">*</sup></h5>
    
                                <div class="quantity-control" data-quantity="">
                                    <button type="button" class="quantity-btn" data-quantity-minus="">
                                        <div class="fa fa-minus text-dark"></div>
                                    </button>
                                    <input type="number" class="quantity-input" data-quantity-target="" value="1" step="1" min="1" max="{{ $product->quantity }}" name="porduct_quantity" required/>
                                    <button type="button" class="quantity-btn" data-quantity-plus="">
                                        <div class="fa fa-plus text-dark"></div>
                                    </button>
                                </div>

                                @if ($product->need_note == true) 
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="from-group">
                                                <h5>Note <sup class="text-danger">*</sup></h5>
                                                @php
                                                    $note = 'Player Name: ' . "\n" .
                                                            '| Jersey Numbers: ' . "\n" .
                                                            '| Division: ';
                                                @endphp
                                                
                                                <textarea rows="4" class="form-control border" name="note" placeholder="Ex: Player Name, Number or any instruction" required>{!! $note !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endif
    
                                <button class="btn btn-info btn-lg mt-4" type="submit">
                                    <span>
                                        <i class="fas fa-shopping-cart"></i>
                                    </span>
                                    Add to Cart
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="bottom-details mt-5">
                    <h2 class="comon-heading m-0">Description</h2>
                    <hr />
                    <p>{!! $product->description !!}</p>
                </div>

                <div class="related-produc d-inline-block w-100">
                    <div class="mindle-heading text-center">
                        <h5>Products</h5>
                        <h1>Related <span> Products </span></h1>
                    </div>
                    <span class="bgi-text light-tsext01"> Products</span>

                    <div class="shop-slider owl-carousel owl-theme mt-5">
                        @foreach ($products as $key => $data) 
                            <div class="comon-section1-shop">
                                <div class="top-imgb-box">
                                    <figure>
                                        @if ($data->images->count() > 0)
                                            <img src="{{ show_image($data->images->first()->path) }}" alt="shop1" />
                                        @else
                                            <p>No images available</p>
                                        @endif
                                    </figure>
                                </div>
                                <div class="text-details-div text-center mt-3">
                                    <a href="{{ route('frontend.shop.show', ['product' => $data]) }}" class="titel-text1">{{ print_one_line($data->name, 30) }}</a>
                                    <h3 class="price-text1">${{ $data->price }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ads">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ban-ati-com ads-all-list">
                        @if (!is_null($bottom_ad)) 
                            <a href="{{ $bottom_ad->url }}">
                                <span>Ad</span>
                                <img src="{{ show_image($bottom_ad->avatar) }}" height="100" alt="" />
                            </a>
                        @else
                            <a href="/contact">
                                <span>Ad</span>
                                <img src="{{ asset('frontend/images/ad.png') }}" height="100" alt="" />
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <script src="https://thdoan.github.io/magnify/js/jquery.magnify.js"></script>
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
                    slideSpeed: 5000,
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
                    smartSpeed: 500,
                    slideSpeed: 1000,
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
                    } else if (this.length === 1) {
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

            function Guantity($root, maxQuantity) {
                const quantity_target = $root.find("[data-quantity-target]");
                const quantity_minus = $root.find("[data-quantity-minus]");
                const quantity_plus = $root.find("[data-quantity-plus]");
                var quantity_ = parseInt(quantity_target.val());

                $(quantity_minus).click(function () {
                    if (quantity_ > 1) {
                        quantity_--;
                        quantity_target.val(quantity_);
                    }
                });

                $(quantity_plus).click(function () {
                    if (quantity_ < maxQuantity) {
                        quantity_++;
                        quantity_target.val(quantity_);
                    }
                });
            }

            // Assuming $product is a JavaScript object containing the product details.
            var maxQuantity = parseInt("{{ $product->quantity }}");

            $.fn.Guantity = jQueryPlugin("Guantity", function ($root) {
                return Guantity($root, maxQuantity);
            });

            $("[data-quantity]").Guantity();
        })();
    </script>

    <script>
        //  size js
        $(document).ready(function () {
            var sizeSelector = ".size-checkbox li";

            $(sizeSelector).on("click", function () {
                $(sizeSelector).removeClass("active");
                $(this).addClass("active");
            });
        });
        $(document).ready(function () {
            var colorSelector = ".color-checkbox li";

            $(colorSelector).on("click", function () {
                $(colorSelector).removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
    <script>
        $(function() {
  // Initiate carousel
  $('.owl-carousel').owlCarousel({
    items: 1,
    afterMove: function() {
      setTimeout(function() {
        // Update Magnify when slide changes
        $zoom.destroy().magnify();
      }, 800); // This number should match paginationSpeed option
    }
  });
  // Initiate zoom
  var $zoom = $('.zoom').magnify();
});
    </script>
@endsection
