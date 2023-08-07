<header class="float-start w-100">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('frontend.homepage.index') }}">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="logo" />
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('frontend.homepage.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Club</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Matches</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Players</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('administration.dashboard.index') }}">Dashboard</a>
                        </li>
                    @else
                        <li>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn login-btn-links">
                                <span class="m-0 oipn">
                                    <img src="{{ asset('frontend/images/747376.png') }}" alt="pnm" />
                                </span>
                            </button>
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
                </ul>
            </div>
        </div>
    </nav>
</header>
