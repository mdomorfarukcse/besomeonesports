<div class="topbar">
    <!-- Start row -->
    <div class="row align-items-center">
        <!-- Start col -->
        <div class="col-md-12 align-self-center">
            <div class="togglebar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <div class="menubar">
                            <a class="menu-hamburger" href="javascript:void();">
                                <img src="{{ asset('assets/images/svg-icon/collapse.svg') }}" class="img-fluid menu-hamburger-collapse" alt="collapse" />
                                <img src="{{ asset('assets/images/svg-icon/close.svg') }}" class="img-fluid menu-hamburger-close" alt="close" />
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="infobar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mt-2">
                        <div class="languagebar">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag flag-icon-us flag-icon-squared"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink">
                                    <a class="dropdown-item" href="#"><i class="flag flag-icon-us flag-icon-squared"></i>English</a>
                                    {{-- <a class="dropdown-item" href="#"><i class="flag flag-icon-de flag-icon-squared"></i>German</a>
                                    <a class="dropdown-item" href="#"><i class="flag flag-icon-bl flag-icon-squared"></i>France</a>
                                    <a class="dropdown-item" href="#"><i class="flag flag-icon-ru flag-icon-squared"></i>Russian</a> --}}
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="profilebar">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if (is_null(auth()->user()->avatar)) 
                                        <img src="{{ asset('assets/images/users/men.svg') }}" class="img-fluid rounded-circle" alt="profile" />
                                    @else
                                        <img src="{{ show_image(auth()->user()->avatar) }}" class="img-fluid rounded-circle" style="height: 30px; width: 30px;" alt="profile" />
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                    <div class="dropdown-item">
                                        <div class="profilename pt-3">
                                            @if (is_null(auth()->user()->avatar)) 
                                                <img src="{{ asset('assets/images/users/men.svg') }}" class="img-fluid rounded-circle" alt="profile" />
                                            @else
                                                <img src="{{ show_image(auth()->user()->avatar) }}" class="img-fluid rounded-circle" style="height: 30px; width: 30px;" alt="profile" />
                                            @endif
                                            <h5>{{ Auth::user()->name }}</h5>
                                            <small class="text-muted text-capitalize">{{ Auth::user()->roles[0]->name }}</small>
                                        </div>
                                    </div>
                                    <div class="userbox">
                                        <ul class="list-unstyled mb-0">
                                            <li class="media dropdown-item">
                                                <a href="{{ route('administration.profile.index') }}" class="profile-icon">
                                                    <i class="feather icon-user"></i>
                                                    My Profile
                                                </a>
                                            </li>
                                            <li class="media dropdown-item">
                                                <a href="{{ route('administration.profile.security') }}" class="profile-icon">
                                                    <i class="feather icon-lock"></i>
                                                    Security
                                                </a>
                                            </li>
                                            <li class="media dropdown-item">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="profile-icon">
                                                    <i class="feather icon-log-out"></i>
                                                    <span>Logout</span>
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>