
<style>
    /* Custom CSS Here */
    .dashboardlink{
        background-color: #00AAF0;
        color: #fff !important;
        border-radius: 5px;
    }
    .dashboardlink:hover {
        background: #E62DBE
;
    }
</style>

<header class="float-start w-100">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('frontend.homepage.index') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo"  width="200px"/>
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('frontend.homepage.index') }}">Home</a>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('about*') || Request::is('mission*') || Request::is('our-team*')  || Request::is('testimonials*') || Request::is('faqs*') || Request::is('app-info*') ? 'active' : '' }}" href="{{ route('frontend.about.index') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> About Us </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('frontend.mission.index') }}">Mission</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.ourteam.index') }}">About Our Founder</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.testimonials.index') }}">Testimonials</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.faqs.index') }}">FAQs</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.appinfo.index') }}">App Info</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link  {{ Request::is('league*') ? 'active' : '' }}" href="{{ route('frontend.league.index') }}">Leagues</a>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a href="{{ route('frontend.league.index') }}" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Leagues </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('frontend.schedule.index') }}">Schedule</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.coach.create') }}">Become a Coach</a></li>
                            {{-- <li><a class="dropdown-item" href="{{ route('frontend.referee.create') }}">Become a Referee</a></li> --}}
                            <li><a class="dropdown-item" href="#">Stats</a></li>
                        </ul>
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('sponsors') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> OUR SPONSORS  </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('frontend.sponsors.index') }}">Sponsors</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.partners.index') }}">Partners</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.advertise.index') }}">Become a Sponsor</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('press*') || Request::is('blog*') ? 'active' : '' }}"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> News </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('frontend.blog.index') }}">Blogs</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.media-inquiries.index') }}">Media Inquiries</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('gallery*') ? 'active' : '' }}" href="{{ route('frontend.gallery.index') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('shop*') ? 'active' : '' }}" href="{{ route('frontend.shop.index') }}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ route('frontend.contact.index') }}">Contact</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link dashboardlink btn" href="{{ route('administration.dashboard.index') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item button">
                            {{-- <a class="nav-link btn join-btn" data-bs-toggle="modal" data-bs-target="#loginModal">Register Now</a> --}}
                            <a href="/login" class="nav-link btn login-btn">Login</a>
                        </li>
                        <li class="nav-item button">
                            {{-- <a class="nav-link btn join-btn" data-bs-toggle="modal" data-bs-target="#loginModal">Register Now</a> --}}
                            <a href="/register" class="nav-link btn join-btn">Register</a>
                        </li>
                        
                    @endauth
                </ul>
            </div>
            <div class="right-top">
                <ul class="d-flex align-items-center">
                    <li class="position-relative">
                        <a href="{{ route('frontend.shop.cart.index') }}" class="btn cart-btn-links">
                            <span>{{ count(session('cart', [])) }}</span>
                            <span class="m-0 ion-0">
                                <img src="{{ asset('frontend/images/2832495.png') }}" alt="pnm" />
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
    .mobilenav{
        display: none;
    }
    .mobilenav ul {
        background: #01aeed;
        color: #fff;
        padding: 5px 10px;
    }
    .mobilenav li {
        display: inline-block;
    }
    .mobilenav ul li:first-child {
        margin-left: 5%;
    }
    .mobilenav ul li:nth-child(2) {
        margin-left: 65%;
    }
    .mobilenav ul li:nth-child(2) i {
        color: #fff;
        font-size: 22px;
    }
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .mobilenav{
            display: block;
        }
    }
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (max-width: 985px) {
        .mobilenav{
            display: block;
        }
        .mobilenav ul li:nth-child(2) {
            margin-left: 65%;
        }
    }
    </style>
    <div class="mobilenav">
        <ul>
            <li>
                <h5>Menu</h5>
            </li>
            <li>
                <button type="button" class="btn bar-btn-links" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightmobile">
                    <i class="fas fa-bars" aria-hidden="true"></i>
                </button>
            </li>
        </ul>
        
    </div>
</header>

