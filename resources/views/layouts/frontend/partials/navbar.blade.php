<header class="float-start w-100">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="logo" />
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Club</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="matches.html">Matches</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="shop.html">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blog</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="players.html">Players</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
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
                                <a href="cart.html" class="btn cart-drop-bn"> View Cart </a>
                            </li>
                            <li>
                                <a href="checkout.html" class="btn check-drop-bn"> Check out </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn login-btn-links">
                            <span class="m-0 oipn">
                                <img src="{{ asset('frontend/images/747376.png') }}" alt="pnm" />
                            </span>
                        </button>
                    </li>
                    <li class="d-block d-lg-block">
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