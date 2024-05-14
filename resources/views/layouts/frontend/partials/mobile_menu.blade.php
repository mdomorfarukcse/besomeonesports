<div class="offcanvas offcanvas-end" id="offcanvasRightmobile">
    <div class="offcanvas-header py-0">
        <button type="button" class="close-menu mt-4" data-bs-dismiss="offcanvas">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
            </svg>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="head-contact d-none d-lg-block">
            <a href="index.html" class="logo-side">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="logo">
            </a>
            <p class="mt-4"> Be Someone Sports was created to upgrade every aspect of youth sports and to provide a
                fun family friendly environment for everyone to enjoy. We offer Recreational Basketball and Volleyball
                leagues for kids of all school ages in the Friendswood and Pearland areas. We host Select tournaments
                and sports camps.
            </p>
            <div class="quick-link my-4">
                <ul>
                    <li> <i class="fas fa-map-marker-alt"></i> <span> Friendswood, Texas, United States</span>
                    </li>
                    <li> <i class="fab fa-whatsapp"></i> <span> 409-270-6115 </span> </li>
                    <li> <i class="fas fa-envelope"></i> <span> Info@besomeonesports.com </span> </li>
                </ul>
            </div>
            <ul class="side-media">
                <li> <a href="https://www.facebook.com/Besomeonesports/"> <i class="fab fa-facebook-f"></i> </a> </li>
                <li> <a href="https://www.youtube.com/channel/UC5g7c2iTr6Kj3iHsFJs4hRQ"> <i class="fab fa-youtube"></i>
                    </a> </li>
                <li> <a href="https://www.instagram.com/be_someonesports/"> <i class="fab fa-instagram"></i> </a> </li>
            </ul>
        </div>

        <div class="head-contact d-block d-lg-none">
            <a href="index.html" class="logo-side">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="logo">
            </a>
            {{-- mobile-menu-sec  --}}
            <div class="mobile-menu mt-3">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('frontend.homepage.index') }}">Home</a>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('about*') || Request::is('mission*') || Request::is('our-team*') || Request::is('testimonials*') || Request::is('faqs*') || Request::is('app-info*') ? 'active' : '' }}"
                            href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> About Us </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('frontend.mission.index') }}">Mission</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.ourteam.index') }}">About Our Founder</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.testimonials.index') }}">Testimonials</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.faqs.index') }}">FAQs</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.appinfo.index') }}">App Info</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('about*') || Request::is('mission*') || Request::is('our-team*') || Request::is('testimonials*') || Request::is('faqs*') || Request::is('app-info*') ? 'active' : '' }}"
                            href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> Leagues </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('frontend.schedule.index') }}">Schedule</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.coach.create') }}">Become a Coach</a></li>
                            {{-- <li><a class="dropdown-item" href="{{ route('frontend.referee.create') }}">Become a Referee</a></li> --}}
                            <li><a class="dropdown-item" href="#">Stats</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('league*') ? 'active' : '' }}" href="{{ route('frontend.league.index') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Leagues </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">City</a></li>
                            <li><a class="dropdown-item" href="#">Sport</a></li>
                            <li><a class="dropdown-item" href="#">Locations</a></li>
                            <li><a class="dropdown-item" href="#">Rules</a></li>
                            <li><a class="dropdown-item" href="#">Standings</a></li>
                        </ul>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('sponsors') ? 'active' : '' }}"
                            href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> OUR SPONSORS  </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('frontend.sponsors.index') }}">Sponsors</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.partners.index') }}">Partners</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.advertise.index') }}">Become a Sponsor</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('press*') || Request::is('blog*') ? 'active' : '' }}"
                            href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> News </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('frontend.blog.index') }}">Blogs</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.media-inquiries.index') }}">Media Inquiries</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('gallery*') ? 'active' : '' }}"
                            href="{{ route('frontend.gallery.index') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('shop*') ? 'active' : '' }}"
                            href="{{ route('frontend.shop.index') }}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}"
                            href="{{ route('frontend.contact.index') }}">Contact</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link dashboardlink btn"
                                href="{{ route('administration.dashboard.index') }}">Dashboard</a>
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
            <div class="quick-link">
                <ul>
                    <li> <i class="fab fa-whatsapp"></i> <span> 180-250-9625 </span> </li>
                    <li> <i class="fas fa-envelope"></i> <span> example@gmail.com</span> </li>
                </ul>
            </div>
            <ul class="side-media">
                <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-twitter"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-google-plus-g"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-instagram"></i> </a> </li>
            </ul>
        </div>
    </div>
</div>
