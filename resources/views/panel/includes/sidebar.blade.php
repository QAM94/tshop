<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="{{ route('dashboard') }}" class="aside-logo">
            <img src="{{ asset('assets/img/new-white-logo.png') }}" alt=""></a>
        <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body">
        <div class="aside-loggedin">
            <div class="d-flex align-items-center justify-content-start">
                <a href="javascript:;" class="avatar">
                    <img src="{{ asset(isset(auth()->user()->avatar->source) ? auth()->user()->avatar->source : 'assets/img/img1.png') }}"
                         class="rounded-circle"/>
                </a>
            </div>
            <div class="aside-loggedin-user">
                <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2 collapsed"
                   data-toggle="collapse" aria-expanded="false">
                    <h6 class="tx-semibold mg-b-0">{{ Auth::user()->name }}</h6>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <p class="tx-color-03 tx-12 mg-b-0">{{ setText(Auth::user()->role) }}</p>
            </div>
            <div class="collapse" id="loggedinMenu" style="">
                <ul class="nav nav-aside mg-b-0">
                    <li class="nav-item"><a href="{{ route('user.profile_edit') }}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-edit">
                                <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                                <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                            </svg>
                            <span>Edit Profile</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" data-toggle="modal" data-target="#changePasswordModal" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-edit">
                                <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                                <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                            </svg>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li class="nav-item"><a href="" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span>Sign Out</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
              style="display: none;">{{ csrf_field() }}</form>
        <ul class="nav nav-aside">
            @foreach($modules as $module)
                @if(hasRoleInChild($module['children'],'is_visible') || hasRole($module['slug'] , 'is_visible') || $module['route_name'] == 'dashboard')
                    <li class="nav-item {{ $module['class'] }}
                    {{ checkInMultiDeminsionalArray($module['children'], 'route_name' , $current_route_name) ? 'show' : '' }}">
                        <a href="{{ !empty($module['route_name']) ? route($module['route_name']) : 'javascript:;' }}"
                           class="nav-link {{ $current_route_name == $module['route_name'] ? 'active' : '' }}">
                            <i data-feather="{{ $module['icon'] }}"></i>
                            <span>{{ $module['title'] }}</span>
                        </a>
                        @if(!empty($module['children']))
                            <ul>
                                @foreach($module['children'] as $children)
                                    @if(hasRole($children['slug'] , 'is_visible'))
                                        <li>
                                            <a href="{{ route($children['route_name']) }}"
                                               class="{{ $current_route_name == $children['route_name'] ? 'active' : '' }}">
                                                {{ $children['title'] }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                                @if(auth()->user()->role == 'store')
                                    <li><a href="{{ route('cashier.logout') }}">Logout of All Sessions</a></li>
                                @endif
                            </ul>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</aside>

