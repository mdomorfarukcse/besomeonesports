<footer class="float-start w-100">
    <div class="container">
        <div class="row g-lg-5 mt-0">
            <div class="col-lg-4">
                <div class="logo-about mt-3 mt-lg-0 d-md-flex align-items-start justify-content-between">
                    <a href="#" class="col-lg-5 col-lg-offset-2">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo"/>
                    </a>
                </div>
                <div class="support-section mt-4">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-2 g-4 g-lg-5">
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <figure class="m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                        <path
                                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"
                                        ></path>
                                    </svg>
                                </figure>
                                <div class="comnlink ms-3">
                                    <h6 class="m-0">JOIN OUR TEAM</h6>
                                    <a href="#"> example@gmail.org </a>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>

                <div class="get-intouch-div mt-4 d-flex align-items-center justify-content-between">
                    <ul>
                        <li>
                            <a href="#" class="btn btn-socal-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-socal-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-socal-1">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                            <a href="#" class="btn btn-socal-1">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row row-cols-1 row-cols-sm-2 mt-4 mt-lg-0">
                    <div class="col d-grid justify-content-lg-center">
                        <div class="right-fgo mt-0">
                            <h4 class="text-white">Quick Links</h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="index.html"> Home </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.homepage.index') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.about.index') }}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.about.index') }}">Events</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.shop.index') }}">Shop</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.contact.index') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="right-fgo">
                            <h4 class="text-white mt-0">
                                Twitter Feed
                            </h4>
                            <div class="comon-news mt-4">
                                <figure class="m-0">
                                    <img src="{{ asset('frontend/images/pexels-photo-974502.webp') }}" alt="pbn" />
                                </figure>
                                <div class="left-divbn">
                                    <a href="#" class="btn tg-btn"> Basketball </a>
                                    <a href="#" class="titel-text1 my-2 d-block">
                                        Lorem Ipsum is simply dummy
                                    </a>
                                    <p><i class="far fa-clock"></i> APRIL 15, 2022</p>
                                </div>
                            </div>

                            <div class="comon-news mt-4">
                                <figure class="m-0">
                                    <img src="{{ asset('frontend/images/pexels-photo-934083.webp') }}" alt="pbn" />
                                </figure>
                                <div class="left-divbn">
                                    <a href="#" class="btn tg-btn"> Basketball </a>
                                    <a href="#" class="titel-text1 my-2 d-block">
                                        Lorem Ipsum is simply dummy
                                    </a>
                                    <p><i class="far fa-clock"></i> APRIL 15, 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-div1 mt-4">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 text-center text-lg-start gy-4 gy-lg-0 justify-content-center justify-content-lg-between">
                <div class="col">
                    <p class="text-white">Copyright © 2023.All Rights Reserved</p>
                </div>
                <div class="col d-grid justify-content-lg-end">
                    <ul>
                        <li>
                            <a href="#"> Privacy Policy </a>
                            <a href="#"> Term Of Service </a>
                            <a href="#">Disclaimer </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>