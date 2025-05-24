<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu"></div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <i class="ri-dashboard-line"></i> <span data-key="t-dashboards">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ request()->is('tabel-mahasiswa') ? 'active' : '' }}"
                    href="{{ Route('tabelmahasiswa') }}">
                    <i class="ri-table-line"></i> <span data-key="t-dashboards">Tabel Mahasiswa</span>
                </a>
            </li>
        </ul>
    </div>
</div>
