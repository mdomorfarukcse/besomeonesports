<!-- Start Leftbar -->
<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{ route('administration.dashboard.index') }}" class="logo logo-large"><img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="logo" /></a>
            <a href="{{ route('administration.dashboard.index') }}" class="logo logo-small"><img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="logo" /></a>
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
                
                @if (auth()->user()->can('team.index') || auth()->user()->can('team.create'))
                    <li>
                        <a href="javaScript:void();"> 
                            <i class="sl-icon-people"></i>
                            <span>Teams</span>
                            <i class="feather icon-chevron-right pull-right"></i> 
                        </a>
                        <ul class="vertical-submenu">
                            @if (auth()->user()->can('team.index'))
                                <li><a href="{{ route('administration.team.index') }}">All Teams</a></li>
                            @endif
                            @if (auth()->user()->hasRole('player') || auth()->user()->hasRole('coach'))
                                <li><a href="{{ route('administration.team.my') }}">My Teams</a></li>
                            @endif
                            @if (auth()->user()->can('team.create'))
                                <li><a href="{{ route('administration.team.create') }}">Create New Team</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->can('event.index') || auth()->user()->can('event.create'))
                    <li>
                        <a href="javaScript:void();"> 
                            <i class="sl-icon-map"></i>
                            <span>Events</span>
                            <i class="feather icon-chevron-right pull-right"></i> 
                        </a>
                        <ul class="vertical-submenu">
                            @if (auth()->user()->can('event.index'))
                                <li><a href="{{ route('administration.event.index') }}">All Events</a></li>
                            @endif
                            @if (auth()->user()->hasRole('player') || auth()->user()->hasRole('coach'))
                                <li><a href="{{ route('administration.event.my') }}">My Events</a></li>
                            @endif
                            @if (auth()->user()->can('event.create'))
                                <li><a href="{{ route('administration.event.create') }}">Create New Event</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->can('season.index') || auth()->user()->can('season.create'))
                    <li>
                        <a href="javaScript:void();"> 
                            <i class="sl-icon-layers"></i>
                            <span>Seasons</span>
                            <i class="feather icon-chevron-right pull-right"></i> 
                        </a>
                        <ul class="vertical-submenu">
                            @if (auth()->user()->can('season.index'))
                                <li><a href="{{ route('administration.season.index') }}">All Seasons</a></li>
                            @endif
                            @if (auth()->user()->can('season.create'))
                                <li><a href="{{ route('administration.season.create') }}">Create New Season</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
                
                @if (auth()->user()->can('division.index') || auth()->user()->can('division.create'))
                    <li>
                        <a href="javaScript:void();"> 
                            <i class="sl-icon-bag"></i>
                            <span>Divisions</span>
                            <i class="feather icon-chevron-right pull-right"></i> 
                        </a>
                        <ul class="vertical-submenu">
                            @if (auth()->user()->can('division.index'))
                                <li><a href="{{ route('administration.division.index') }}">All Divisions</a></li>
                            @endif
                            @if (auth()->user()->can('division.create'))
                                <li><a href="{{ route('administration.division.create') }}">Add New Division</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
                
                @if (auth()->user()->can('player.index') || auth()->user()->can('player.create'))
                    <li>
                        <a href="javaScript:void();"> 
                            <i class="sl-icon-user"></i>
                            <span>Players</span>
                            <i class="feather icon-chevron-right pull-right"></i> 
                        </a>
                        <ul class="vertical-submenu">
                            @if (auth()->user()->can('player.index'))
                                <li><a href="{{ route('administration.player.index') }}">All Players</a></li>
                            @endif
                            @if (auth()->user()->hasRole('coach'))
                                <li><a href="{{ route('administration.player.my') }}">My Players</a></li>
                            @endif
                            @if (auth()->user()->can('player.create'))
                                <li><a href="{{ route('administration.player.create') }}">Add New Player</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->can('coach.index') || auth()->user()->can('coach.create'))
                    <li>
                        <a href="javaScript:void();"> 
                            <i class="sl-icon-user-following"></i>
                            <span>Coaches</span>
                            <i class="feather icon-chevron-right pull-right"></i> 
                        </a>
                        <ul class="vertical-submenu">
                            @if (auth()->user()->can('coach.index'))
                                <li><a href="{{ route('administration.coach.index') }}">All Coaches</a></li>
                            @endif
                            @if (auth()->user()->hasRole('player'))
                                <li><a href="{{ route('administration.coach.my') }}">My Coaches</a></li>
                            @endif
                            @if (auth()->user()->can('coach.create'))
                                <li><a href="{{ route('administration.coach.create') }}">Create New Coach</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->can('venue.index') || auth()->user()->can('venue.create'))
                    <li>
                        <a href="javaScript:void();"> 
                            <i class="sl-icon-grid"></i>
                            <span>Venues</span>
                            <i class="feather icon-chevron-right pull-right"></i> 
                        </a>
                        <ul class="vertical-submenu">
                            @if (auth()->user()->can('venue.index'))
                                <li><a href="{{ route('administration.venue.index') }}">All Venues</a></li>
                            @endif
                            @if (auth()->user()->can('venue.create'))
                                <li><a href="{{ route('administration.venue.create') }}">Add New Venue</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->can('sport.index') || auth()->user()->can('sport.create'))
                    <li>
                        <a href="javaScript:void();"> 
                            <i class="sl-icon-layers"></i>
                            <span>Sports</span>
                            <i class="feather icon-chevron-right pull-right"></i> 
                        </a>
                        <ul class="vertical-submenu">
                            @if (auth()->user()->can('sport.index'))
                                <li><a href="{{ route('administration.sport.index') }}">All Sports</a></li>
                            @endif
                            @if (auth()->user()->can('sport.create'))
                                <li><a href="{{ route('administration.sport.create') }}">Create New Sport</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->can('shop_dashboard.index') || auth()->user()->can('shop_order.index') || auth()->user()->can('shop_product.index') || auth()->user()->can('shop_category.index'))
                    <li>
                        <a href="javaScript:void();">
                            <i class="sl-icon-basket-loaded"></i>
                            <span>Shop</span>
                            <i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            @if (auth()->user()->can('shop_dashboard.index'))
                                <li>
                                    <a href="{{ route('administration.shop.dashboard.index') }}">
                                        Dashboard
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->can('shop_order.index'))
                                <li>
                                    <a href="javaScript:void(0);">
                                        {{ __('Orders') }}
                                        <i class="feather icon-chevron-right pull-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                        @if (auth()->user()->can('shop_order.index'))
                                            <li>
                                                <a href="{{ route('administration.shop.order.index') }}">
                                                    {{ __('All Orders') }}
                                                </a>
                                            </li>
                                        @endif
                                        
                                        @if (auth()->user()->hasRole('player') || auth()->user()->hasRole('coach'))
                                            <li>
                                                <a href="#">
                                                    {{ __('My Orders') }}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            
                            @if (auth()->user()->can('shop_product.index'))
                                <li>
                                    <a href="javaScript:void(0);">
                                        {{ __('Products') }}
                                        <i class="feather icon-chevron-right pull-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                        @if (auth()->user()->can('shop_product.index'))
                                            <li>
                                                <a href="{{ route('administration.shop.product.index') }}">
                                                    {{ __('All Products') }}
                                                </a>
                                            </li>
                                        @endif
                                        
                                        @if (auth()->user()->can('shop_product.create'))
                                            <li>
                                                <a href="{{ route('administration.shop.product.create') }}">
                                                    {{ __('Add New Product') }}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            
                            @if (auth()->user()->can('shop_category.index'))
                                <li>
                                    <a href="javaScript:void(0);">
                                        {{ __('Categories') }}
                                        <i class="feather icon-chevron-right pull-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                        @if (auth()->user()->can('shop_category.index'))
                                            <li>
                                                <a href="{{ route('administration.shop.category.index') }}">
                                                    {{ __('All Categories') }}
                                                </a>
                                            </li>
                                        @endif

                                        @if (auth()->user()->can('shop_category.create'))
                                            <li>
                                                <a href="{{ route('administration.shop.category.create') }}">
                                                    {{ __('Add New Category') }}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <li>
                    <a href="{{ route('administration.chat.index') }}"> 
                        <i class="sl-icon-bubbles"></i>
                        <span>Messaging</span> 
                        <span class="badge badge-danger pull-right">{{ __('Remain') }}</span>
                    </a>
                </li>

                @if (auth()->user()->can('schedule.index') || auth()->user()->can('schedule.create'))
                    <li>
                        <a href="javaScript:void();"> 
                            <i class="sl-icon-pie-chart"></i>
                            <span>Schedules</span>
                            <i class="feather icon-chevron-right pull-right"></i> 
                        </a>
                        <ul class="vertical-submenu">
                            @if (auth()->user()->can('schedule.index'))
                                <li><a href="{{ route('administration.schedule.calender') }}">Schedule Calender</a></li>
                            @endif
                            @if (auth()->user()->can('schedule.index'))
                                <li><a href="{{ route('administration.schedule.index') }}">All Schedules</a></li>
                            @endif
                            @if (auth()->user()->can('schedule.create'))
                                <li><a href="{{ route('administration.schedule.create') }}">Assign New Schedule</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @role ('developer|admin') 
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
                @endrole
                

                @if (auth()->user()->can('role.index') || auth()->user()->can('role.create') || auth()->user()->can('permission.index') || auth()->user()->can('permission.create'))
                    <li>
                        <a href="javaScript:void();"> 
                            <i class="sl-icon-layers"></i>
                            <span>Role & Permission</span>
                            <i class="feather icon-chevron-right pull-right"></i> 
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{ route('administration.permission.index') }}">All Permission</a></li>
                            <li><a href="{{ route('administration.role.index') }}">Roles</a></li>
                            <li><a href="{{ route('administration.role.add.rolepermission') }}">Role in Permission</a></li>
                            <li><a href="{{ route('administration.role.all.rolepermission') }}">All Roles in Permission</a></li>
                        </ul>
                    </li>
                @endif

                @role ('developer|admin') 
                    <li>
                        <a href="javaScript:void();"> 
                            <i class="sl-icon-layers"></i>
                            <span>Manage User</span>
                            <i class="feather icon-chevron-right pull-right"></i> 
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="#">All Admin</a></li>
                            <li><a href="#">Create New Admin</a></li>
                        </ul>
                    </li>
                @endrole


                <li>
                    <a href="/" target="_blank"> 
                        <i class="sl-icon-home"></i>
                        <span>Website</span> 
                    </a>
                </li>


                {{-- @role('developer')
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