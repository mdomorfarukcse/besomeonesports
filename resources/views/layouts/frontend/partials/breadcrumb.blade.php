<section class="banner-part sub-main-banner float-start w-100 breadcrumb-section">

    <div class="baner-imghi">
        @switch(request()->path())
            @case('about')
            @case('mission')
            @case('our-team')
            @case('testimonials')
            @case('app-info')
                <img src="{{ asset('frontend/images/breadcrumb_banners/about_us.png') }}" alt="sub-banner" />
                @break

            @case('league')
            @case('coach/create')
            @case('stats')
                <img src="{{ asset('frontend/images/breadcrumb_banners/leagues.png') }}" alt="sub-banner" />
                @break

            @case('sponsors')
            @case('advertise-with-us')
            @case('partners')
                <img src="{{ asset('frontend/images/breadcrumb_banners/our_sponsors.png') }}" alt="sub-banner" />
                @break
                
            @default
                <img src="{{ asset('frontend/images/breadcrumb_banners/leagues.png') }}" alt="sub-banner" />
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
