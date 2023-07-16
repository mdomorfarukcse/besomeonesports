<!-- Start Leftbar -->
<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="#" class="logo logo-large"><img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="logo" /></a>
            <a href="#" class="logo logo-small"><img src="{{ asset('assets/images/small_logo.svg') }}" class="img-fluid" alt="logo" /></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{ route('administration.dashboard.index') }}">
                        <i class="sl-icon-speedometer"></i>
                        <span>{{ __('Dashboard') }}</span>
                        <span class="badge badge-success pull-right">{{ __('New') }}</span>
                    </a>
                </li>

                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-layers"></i>
                        <span>Seasons</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.season.index') }}">Seasons</a></li>
                        <li><a href="{{ route('administration.season.create') }}">Add Seasons</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-map"></i>
                        <span>Events</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.event.index') }}">Events</a></li>
                        <li><a href="{{ route('administration.event.create') }}">Add Event</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-bag"></i>
                        <span>Divisions</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.division.index') }}">Divisions</a></li>
                        <li><a href="{{ route('administration.division.create') }}">Add Division</a></li>
                    </ul>
                </li>
                

                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-user"></i>
                        <span>Players</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.player.index') }}">Players</a></li>
                        <li><a href="{{ route('administration.player.create') }}">Add Player</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-user-following"></i>
                        <span>Coaches</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.coach.index') }}">Coaches</a></li>
                        <li><a href="{{ route('administration.coach.create') }}">Add Coach</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-people"></i>
                        <span>Teams</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.team.index') }}">Teams</a></li>
                        <li><a href="{{ route('administration.team.create') }}">Add Team</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-grid"></i>
                        <span>Venues</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.venue.index') }}">Venues</a></li>
                        <li><a href="{{ route('administration.venue.create') }}">Add Venue</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('administration.schedule.index') }}">
                        <i class="sl-icon-pie-chart"></i>
                        <span>Schedule</span> 
                    </a>
                </li>

                <li>
                    <a href="{{ route('administration.chat.index') }}"> 
                        <i class="sl-icon-bubbles"></i>
                        <span>Messaging</span> 
                    </a>
                </li>

                <li>
                    <a href="javaScript:void();"> 
                        <i class="sl-icon-layers"></i>
                        <span>Sports</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('administration.sport.index') }}">Sports</a></li>
                        <li><a href="{{ route('administration.sport.create') }}">Add Sports</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javaScript:void();">
                        <i class="sl-icon-basket-loaded"></i>
                        <span>Shop</span>
                        <i class="feather icon-chevron-right pull-right"></i> 
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="{{ route('administration.product.create') }}">Product</a></li>
                        <li><a href="{{ route('administration.order.create') }}">Orders</a></li>
                    </ul>
                </li>

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

                <li>
                    <a href="#"> 
                        <i class="sl-icon-close"></i>
                        <span>Logout</span> 
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
<!-- End Leftbar -->