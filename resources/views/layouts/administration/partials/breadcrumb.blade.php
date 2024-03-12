<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-6 col-lg-6">
            <h4 class="page-title">
                @yield('page_name')
            </h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/" target="_blank">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    @yield('breadcrumb')
                </ol>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="widgetbar">
                <button class="btn btn-outline-dark btn-outline-custom fw-bolder mr-2" onclick="window.location.reload();">
                    <i class="feather icon-refresh-ccw"></i>
                    {{-- <b>Reload</b> --}}
                </button>
                @yield('breadcrumb_buttons')
            </div>
        </div>
    </div>          
</div>