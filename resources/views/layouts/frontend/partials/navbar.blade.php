<header class="float-start w-100">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('frontend.homepage.index') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo"  width="200px"/>
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('frontend.homepage.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('about*') || Request::is('mission*') || Request::is('our-team*')  || Request::is('testimonials*') || Request::is('faqs*') || Request::is('app-info*') ? 'active' : '' }}" href="{{ route('frontend.about.index') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> About Us </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('frontend.mission.index') }}">Mission</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.ourteam.index') }}">Team</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.testimonials.index') }}#">Testimonials</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.faqs.index') }}">FAQs</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.appinfo.index') }}">App Info</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('event*') ? 'active' : '' }}" href="{{ route('frontend.event.index') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Leagues </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">City</a></li>
                            <li><a class="dropdown-item" href="#">Sport</a></li>
                            <li><a class="dropdown-item" href="#">Locations</a></li>
                            <li><a class="dropdown-item" href="#">Rules</a></li>
                            <li><a class="dropdown-item" href="#">Standings</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('sponsors') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Partners </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item " href="{{ route('frontend.sponsors.index') }}" >Sponsors</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('press*') || Request::is('blog*') ? 'active' : '' }}"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> News </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('frontend.press.index') }}">Press Releases</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.blog.index') }}">Blogs</a></li>
                            <li><a class="dropdown-item" href="#">Media Inquiries</a></li>
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
                            <a class="nav-link" href="{{ route('administration.dashboard.index') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn join-btn" data-bs-toggle="modal" data-bs-target="#loginModal">join Now</a>
                        </li>
                        
                    @endauth
                </ul>
            </div>
            <div class="right-top">
                <ul class="d-flex align-items-center">
                    <li class="dropdown position-relative">
                        <button type="button" class="btn cart-btn-links" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <span>2</span>
                            <span class="m-0 ion-0">
                                <img src="{{ asset('frontend/images/2832495.png') }}" alt="pnm" />
                            </span>
                        </button>

                        <ul class="dropdown-menu shadow cart-dropdown-ne">
                            <li>
                                <div class="comon-cart-ps">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="#" class="products-sm-pic">
                                            <figure>
                                                <img src="{{ asset('frontend/images/botsman1.png') }}" alt="bn" />
                                            </figure>
                                        </a>
                                        <div class="cart-ps-details">
                                            <a href="#" class="titel-crt-products">
                                                Junior Shoes
                                            </a>
                                            <h6>$10.52</h6>
                                        </div>
                                        <a href="#" class="close-crt"> <i class="fas fa-close"></i> </a>
                                    </div>
                                </div>
                                <div class="comon-cart-ps">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="#" class="products-sm-pic">
                                            <figure>
                                                <img src="{{ asset('frontend/images/127-1276644_american-football-png-picture-american-football-ball-png.png') }}" alt="bn" />
                                            </figure>
                                        </a>
                                        <div class="cart-ps-details">
                                            <a href="#" class="titel-crt-products">
                                                SE Wooden
                                            </a>
                                            <h6>$20.52</h6>
                                        </div>
                                        <a href="#" class="close-crt"> <i class="fas fa-close"></i> </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="sub-total-products d-flex align-items-center justify-content-between">
                                    <h6>Subtotal:</h6>
                                    <h4>$30.52</h4>
                                </div>
                            </li>
                            <li>
                                <a href="#" class="btn cart-drop-bn"> View Cart </a>
                            </li>
                            <li>
                                <a href="#" class="btn check-drop-bn"> Check out </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button type="button" class="btn bar-btn-links" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightmobile">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z"
                                    />
                                </svg>
                            </span>
                        </button>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
</header>
