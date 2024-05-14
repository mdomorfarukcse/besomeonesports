<!-- Start css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Select2 css -->
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">

@yield('css_links')

<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
<style>
    .role-select .select2-container {
        min-width: 200px !important;
    }
    .theme_bg,.btn-theme{
        background-color: #01aeed;
        color: #ffffff ;
    }
    .text-theme{
        color:  #01aeed;
    }
    .btn-theme:hover{
        background-color: #1491be;
        color: #ffffff ;
    }
</style>

{{-- Custom Main CSS --}}
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />

@yield('custom_css')
<!-- End css -->