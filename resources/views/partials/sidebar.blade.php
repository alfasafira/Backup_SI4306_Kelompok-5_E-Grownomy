<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <p></p>
                    <a href="/">
                        <span style="color: #25396f">E-Grownomy Admin Panel</span>
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ $active === 'dashboard' ? 'active' : '' }}">
                    <a href="/admin/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub {{ $active === 'data' ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Data</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/data_lahan/show">Data Lahan</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/data_user/show">Data User</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
