<link rel="preconnect" href="https://fonts.googleapis.com/" />
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Anton&amp;family=Barlow+Condensed:wght@700;800&amp;family=Covered+By+Your+Grace&amp;family=Jost:wght@200;300;400;500;600;700;800;900&amp;family=Kanit:wght@300;400;500;600;700&amp;family=Kaushan+Script&amp;family=Open+Sans:wght@300;400;500;800&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,500&amp;family=Rajdhani:wght@400;500;600&amp;family=Raleway:wght@300;400;500;600;700;800&amp;family=Roboto+Condensed:wght@300;400;700&amp;family=Roboto:wght@300;400;500;700&amp;family=Saira+Extra+Condensed:wght@400;500&amp;family=Signika:wght@300;400;500;600;700&amp;display=swap"
    rel="stylesheet"
/>

<link href="{{ asset('frontend/css/animate.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('frontend/css/jquery.fancybox.min.css') }}" type="text/css" rel="stylesheet"/>
<link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet"/>

<link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('frontend/css/all.min.css') }}" rel="stylesheet"/>

@yield('css_links')
<style>
    .join-btn {
        background: #ee1d36;
        padding: 5px 17px !important;
        color: #fff !important;
        margin: 0 15px !important;
        transition: all 0.5s;
        border: solid 2px #ee1d36 !important;
    }
    .navbar-nav li:hover > ul.dropdown-menu {
        display: block;
    }
    .dropdown-submenu {
        position:relative;
    }
    .dropdown-submenu > .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top:-6px;
    }

    /* rotate caret on hover */
    .dropdown-menu > li > a:hover:after {
        text-decoration: underline;
        transform: rotate(-90deg);
    } 
    

</style>
<link href="{{ asset('frontend/css/style.min.css') }}" rel="stylesheet"/>

@yield('custom_css')