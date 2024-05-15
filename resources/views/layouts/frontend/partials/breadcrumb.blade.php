<section class="banner-part sub-main-banner float-start w-100 breadcrumb-section">

    <div class="baner-imghi">
        {{request()->path()}}
        @switch(request()->path())
            @case('league')
                <img src="{{ asset('frontend/images/breadcrumb_banners/breadcrumb_banner3.png') }}" alt="sub-banner" />
                @break

            @case('our-team')
                <img src="{{ asset('frontend/images/breadcrumb_banners/breadcrumb_banner6.png') }}" alt="sub-banner" />
                @break

            @default
                <img src="{{ asset('frontend/images/breadcrumb_banners/breadcrumb_banner2.png') }}" alt="default-banner" />
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
