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
        background: #E62DBE;
        padding: 5px 17px !important;
        color: #fff !important;
        transition: all 0.5s;
        border: 2px solid #E62DBE !important;
    }
    .login-btn {
        background: #01aeed;
        padding: 5px 17px !important;
        color: #fff !important;
        transition: all 0.5s;
        border: 2px solid #01aeed !important;
    }
    .join-btn:hover {
        background: #c531a5;
    }
    .login-btn:hover {
        background: #1d9ac7;
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
    
    footer .comon-news {
        display: inline-block !important;
    }
    .ads-all-list {
        padding: 0px 0px;
        position: relative;
        float: left;
        width: 100%;
        margin: 10px 0px;
    }
    .ads-box span, .ban-ati-com span {
        position: absolute;
        background: #E62DBE;
        color: #fff;
        font-size: 10px;
        padding: 1px 3px;
        border-radius: 2px;
    }
    .ban-ati-com a img {
        width: 100%;
    }
    .scolor{
        color: #E62DBE !important;
    }
    .pcolor{
        color: #00AAF0 !important;
    }
    .dropdown-item:focus, .dropdown-item:hover {
        color: #ffffff !important;
        background-color: #00aaf0ba !important;
    }
    .our-spocerder .leaguebtn {
        background: #FF9906 !important;
    }
    .our-spocerder .btn:hover {
        background: #E62DBE !important;
    }
    .mobile-menu .nav-link {
        font-family: "Roboto",sans-serif;
        text-transform: uppercase;
        font-weight: 500;
        font-size: 15px;
        color: #1f1f26;
    }
</style>
<link href="{{ asset('frontend/css/style.min.css') }}" rel="stylesheet"/>

@yield('custom_css')