<!-- Start js -->        
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/js/detect.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/js/vertical-menu.js') }}"></script>
<!-- Switchery js -->
{{-- <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script> --}}

@yield('script_links')

<!-- Core js -->
<script src="{{ asset('assets/js/core.js') }}"></script>

{{-- Custom Main JS --}}
<script src="{{ asset('assets/js/main.js') }}"></script>


@yield('custom_script')
<!-- End js -->