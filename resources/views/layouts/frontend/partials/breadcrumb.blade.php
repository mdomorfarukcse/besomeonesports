<section class="banner-part sub-main-banner float-start w-100 breadcrumb-section">
    <div class="baner-imghi">
        <img src="{{ asset('frontend/images/images/sub-banner01.jpg') }}" alt="sub-banner" />
    </div>

    <div class="sub-banner">
        <div class="container">
            <h1 class="text-center">@yield('page_name')</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    @yield('breadcrumb')
                </ol>
            </nav>
        </div>
    </div>
</section>
