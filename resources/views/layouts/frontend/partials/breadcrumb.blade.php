<section class="banner-part sub-main-banner float-start w-100 breadcrumb-section">

    <div class="baner-imghi">
        @switch(request()->path())
            @case('about')
                <img src="{{ asset('frontend/images/breadcrumb_banners/about_us.png') }}" alt="sub-banner" />
                @break

            @case('league')
                <img src="{{ asset('frontend/images/breadcrumb_banners/leagues.png') }}" alt="sub-banner" />
                @break

            @case('gallery')
                <img src="{{ asset('frontend/images/breadcrumb_banners/gallery.png') }}" alt="sub-banner" />
                @break

            @case('sponsors')
                <img src="{{ asset('frontend/images/breadcrumb_banners/our_sponsors.png') }}" alt="sub-banner" />
                @break

            @case('blog')
                <img src="{{ asset('frontend/images/breadcrumb_banners/news.jpg') }}" alt="sub-banner" />
                @break
                
            @case('contact')
                <img src="{{ asset('frontend/images/breadcrumb_banners/contact.png') }}" alt="sub-banner" />
                @break
                
            @case('shop')
                <img src="{{ asset('frontend/images/breadcrumb_banners/shop.png') }}" alt="sub-banner" />
                @break
            
            @default
                <img src="{{ asset('frontend/images/breadcrumb_banners/about_us.png') }}" alt="default-banner" />
        @endswitch
    </div>
    <style>
        .sub-main-banner .baner-imghi img {
            object-position: center !important;
        }
    </style>
    <div class="sub-banner">
        <div class="container">
            <h1 class="text-center">@yield('page_name')</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    @yield('breadcrumb')
                </ol>
            </nav>
        </div>
    </div>
</section>
