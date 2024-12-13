<header class="app-header"><a class="app-header__logo" href="{{Url('/admin/home')}}">Ananda Park Resort</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="#"><i class="fa fa-hand-grab-o fa-lg"></i> {{auth('admin')->user()->name}}</a></li>
                <li><a class="dropdown-item" href="{{route('admin.profile')}}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li>
                    <a class="dropdown-item" href=""
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">  <i class="fa fa-sign-out fa-lg"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{route('admin.logout')}}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</header>
