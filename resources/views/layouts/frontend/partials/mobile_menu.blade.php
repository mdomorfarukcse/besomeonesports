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
                    <li> <i class="fab fa-whatsapp"></i> <span> 832-421-2895 </span> </li>
                    <li> <i class="fas fa-envelope"></i> <span> Info@besomeonesports.com </span> </li>
                </ul>
            </div>
            <ul class="side-media">
                <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-twitter"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-google-plus-g"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-instagram"></i> </a> </li>
            </ul>
        </div>

        <div class="head-contact d-block d-lg-none">
            <a href="index.html" class="logo-side">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="logo">
            </a>

            <div class="mobile-menu-sec mt-3">
                <ul>
                    <li class="active-m">
                        <a href="{{ route('frontend.homepage.index') }}"> Home </a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.about.index') }}"> About Us </a>
                    </li>

                    <li>
                        <a href="{{ route('frontend.event.index') }}"> Events </a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.shop.index') }}"> Shop </a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.contact.index') }}"> Contact </a>
                    </li>
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
