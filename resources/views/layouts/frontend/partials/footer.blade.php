<footer class="float-start w-100">
    <div class="container">
        <div class="row g-lg-5 mt-0">
            <div class="col-lg-4">
                <div class="logo-about mt-3 mt-lg-0 d-md-flex align-items-start justify-content-between">
                    <a href="#" class="col-lg-5 col-lg-offset-2">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo" />
                    </a>
                    <p class="col-lg-8 ms-md-4 mt-4 mt-md-0 text-white spt"> At Be Someone Sports, our missions is to
                        inspire and empower individuals to achieve their full potential through sports</p>
                </div>
                <div class="support-section mt-4">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-2 g-4 g-lg-5">
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <figure class="m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                        <path
                                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z">
                                        </path>
                                    </svg>
                                </figure>
                                <div class="comnlink ms-3">
                                    <h6 class="m-0">Call Us</h6>
                                    <a href="#"> 832-421-2895 </a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="d-flex align-items-center">
                                <figure class="m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-envelope-paper" viewBox="0 0 16 16">
                                        <path
                                            d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z">
                                        </path>
                                    </svg>
                                </figure>
                                <div class="comnlink ms-3">
                                    <h6 class="m-0">CONTACT US</h6>
                                    <a href="mailto:Info@besomeonesports.com"> Info@besomeonesports.com </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="get-intouch-div mt-4 d-flex align-items-center justify-content-between">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/Besomeonesports/" class="btn btn-socal-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.youtube.com/channel/UC5g7c2iTr6Kj3iHsFJs4hRQ" class="btn btn-socal-1">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="https://www.instagram.com/be_someonesports/" class="btn btn-socal-1">
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
                                    <a href="{{ route('frontend.homepage.index') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.about.index') }}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.testimonials.index') }}">Testimonials</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.press.index') }}">News</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.contact.index') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="right-fgo">
                            <iframe class="instagram-media" id="instagram-embed-0"
                                src="https://www.instagram.com/be_someonesports/embed/?cr=1&amp;v=13&amp;wp=356&amp;rd=http%3A%2F%2Fbesomeonesports.test&amp;rp=%2Four-team#%7B%22ci%22%3A0%2C%22os%22%3A505.80000001192093%2C%22ls%22%3A298.40000000596046%2C%22le%22%3A396.5%7D"
                                allowtransparency="true" allowfullscreen="true" frameborder="0" height="200"
                                data-instgrm-payload-id="instagram-media-payload-0" scrolling="no"
                                style="background-color: white; border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px; min-width: 326px; padding: 0px; position: absolute;"></iframe>


                            {{-- @foreach ($galleries as $key => $gallery)
                                @if ($key < 6)
                                    <div class="comon-news mt-2">
                                        <figure class="m-0">
                                            <img src="{{ show_avatar($gallery->avatar) }}" alt="pbn" />
                                        </figure>
                                        
                                    </div>
                                @endif
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-div1 mt-4">
        <div class="container">
            <div
                class="row row-cols-1 row-cols-lg-2 text-center text-lg-start gy-4 gy-lg-0 justify-content-center justify-content-lg-between">
                <div class="col">
                    <p class="text-white">©2023, Be Someone Sports All Rights Reserved. Developed by SpaceCenterSystems
                    </p>
                </div>
                <div class="col d-grid justify-content-lg-end">
                    <ul>
                        <li>
                            <a href="{{ route('frontend.privacy.index') }}"> Privacy Policy </a>
                            <a href="{{ route('frontend.term.index') }}"> Term Of Service </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
