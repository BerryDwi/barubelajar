<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu"></div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>

            <li class="nav-item">
                <a class="nav-link menu-link {{ request()->is('dashboard') ? 'active' : '' }}"
                    href="{{ Route('tabelmahasiswa') }}">
                    <i class="ri-home-4-line"></i> <span data-key="t-dashboards">Dashboards</span>
                </a>
            </li>

            <li class="menu-title"><i class="ri-file-list-3-line"></i> <span data-key="t-pages">Pages</span></li>


            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ url('logout') }}">
                    <i class="ri-logout-box-r-line"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
