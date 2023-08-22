<!-- Start Leftbar -->
<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="#" class="logo logo-large"><img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="logo" /></a>
            <a href="#" class="logo logo-small"><img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="logo" /></a>
            {{-- <a href="#" class="logo logo-large"><img src="{{ asset('assets/images/logo.svg') }}" class="img-fluid" alt="logo" /></a>
            <a href="#" class="logo logo-small"><img src="{{ asset('assets/images/small_logo.svg') }}" class="img-fluid" alt="logo" /></a> --}}
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{ route('administration.dashboard.index') }}">
                        <i class="sl-icon-speedometer"></i>
                        <span>{{ __('Dashboard') }}</span>
                        <span class="badge badge-danger pull-right">{{ __('Remain') }}</span>
                    </a>
                </li>
                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-people"></i>
                        <span>Teams</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.team.index') }}">All Teams</a></li>
                        <li><a href="{{ route('administration.team.create') }}">Create New Team</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-map"></i>
                        <span>Events</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.event.index') }}">All Events</a></li>
                        <li><a href="{{ route('administration.event.create') }}">Create New Event</a></li>
                    
                        <li>
                            <a href="javaScript:void(0);">{{ __('Registration') }}
                                <i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li>
                                    <a href="{{ route('administration.event.registration.index') }}">
                                        {{ __('All Registrations') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('administration.event.registration.create') }}">
                                        {{ __('New Registration') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-layers"></i>
                        <span>Seasons</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.season.index') }}">All Seasons</a></li>
                        <li><a href="{{ route('administration.season.create') }}">Create New Season</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-bag"></i>
                        <span>Divisions</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.division.index') }}">All Divisions</a></li>
                        <li><a href="{{ route('administration.division.create') }}">Add New Division</a></li>
                    </ul>
                </li>
                

                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-user"></i>
                        <span>Players</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.player.index') }}">All Players</a></li>
                        <li><a href="{{ route('administration.player.create') }}">Add New Player</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-user-following"></i>
                        <span>Coaches</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.coach.index') }}">All Coaches</a></li>
                        <li><a href="{{ route('administration.coach.create') }}">Create New Coach</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-grid"></i>
                        <span>Venues</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.venue.index') }}">All Venues</a></li>
                        <li><a href="{{ route('administration.venue.create') }}">Add New Venue</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-layers"></i>
                        <span>Sports</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.sport.index') }}">All Sports</a></li>
                        <li><a href="{{ route('administration.sport.create') }}">Create New Sport</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="sl-icon-basket-loaded"></i>
                        <span>Shop</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="{{ route('administration.shop.dashboard.index') }}">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('administration.shop.order.index') }}">
                                Orders
                            </a>
                        </li>                    
                        <li>
                            <a href="javaScript:void(0);">
                                {{ __('Products') }}
                                <i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li>
                                    <a href="{{ route('administration.shop.product.index') }}">
                                        {{ __('All Products') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('administration.shop.product.create') }}">
                                        {{ __('Add New Product') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void(0);">
                                {{ __('Categories') }}
                                <i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li>
                                    <a href="{{ route('administration.shop.category.index') }}">
                                        {{ __('All Categories') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('administration.shop.category.create') }}">
                                        {{ __('Add New Category') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('administration.chat.index') }}"> 
                        <i class="sl-icon-bubbles"></i>
                        <span>Messaging</span> 
                        <span class="badge badge-danger pull-right">{{ __('Remain') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('administration.schedule.index') }}">
                        <i class="sl-icon-pie-chart"></i>
                        <span>Schedule</span> 
                        <span class="badge badge-danger pull-right">{{ __('Remain') }}</span>
                    </a>
                </li>
                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-layers"></i>
                        <span>Frontend</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.faq.index') }}">Faqs</a></li>
                        <li><a href="{{ route('administration.sponsor.index') }}">Sponsors</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/"> 
                        <i class="sl-icon-home"></i>
                        <span>Website</span> 
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                        <i class="sl-icon-close"></i>
                        <span>Logout</span> 
                    </a>
                </li>
                

                

                {{-- @role('admin')
                    <li>
                        <a href="javaScript:void(0);">
                            <i class="sl-icon-settings"></i>
                            <span>{{ __('Settings') }}</span>
                            <i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li>
                                <a href="javaScript:void(0);">{{ __('Permission') }}
                                    <i class="feather icon-chevron-right pull-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <li>
                                        <a href="{{ route('administration.settings.permission.index') }}">
                                            {{ __('All Permissions') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administration.settings.permission.group.index') }}">
                                            {{ __('Permission Groups') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javaScript:void(0);">{{ __('Role') }}
                                    <i class="feather icon-chevron-right pull-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <li>
                                        <a href="{{ route('administration.settings.role.index') }}">
                                            {{ __('All Roles') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administration.settings.role.create') }}">
                                            {{ __('Create Role') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endrole --}}
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
<!-- End Leftbar -->