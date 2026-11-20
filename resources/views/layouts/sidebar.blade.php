<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- BRAND -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-3"
       href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-microchip"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            GADGET <span style="color:#43d5e8;">STORE</span>
        </div>
    </a>

    <hr class="sidebar-divider my-2">

    <div class="sidebar-heading mt-2">
        MENU UTAMA
    </div>

    <!-- DASHBOARD -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-chart-pie"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- PROFIL TOKO -->
    <li class="nav-item {{ request()->routeIs('store-profile.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('store-profile.index') }}">
            <i class="fas fa-fw fa-store"></i>
            <span>Profil Toko</span>
        </a>
    </li>

    <!-- LOG AKTIVITAS -->
    <li class="nav-item {{ request()->routeIs('activity-logs.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('activity-logs.index') }}">
            <i class="fas fa-fw fa-history"></i>
            <span>Log Aktivitas</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        MANAJEMEN
    </div>

    <!-- KATEGORI -->
    <li class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#"
           data-toggle="collapse"
           data-target="#categoryMenu"
           aria-expanded="{{ request()->routeIs('categories.*') ? 'true' : 'false' }}"
           aria-controls="categoryMenu">
            <i class="fas fa-layer-group"></i>
            <span>Kategori</span>
        </a>

        <div id="categoryMenu"
             class="collapse {{ request()->routeIs('categories.*') ? 'show' : '' }}"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Kategori</h6>

                <a class="collapse-item {{ request()->routeIs('categories.index') ? 'active' : '' }}"
                   href="{{ route('categories.index') }}">
                    Data Kategori
                </a>

                <a class="collapse-item {{ request()->routeIs('categories.create') ? 'active' : '' }}"
                   href="{{ route('categories.create') }}">
                    Tambah Kategori
                </a>
            </div>
        </div>
    </li>

    <!-- PRODUK -->
    <li class="nav-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#"
           data-toggle="collapse"
           data-target="#productMenu"
           aria-expanded="{{ request()->routeIs('products.*') ? 'true' : 'false' }}"
           aria-controls="productMenu">
            <i class="fas fa-box-open"></i>
            <span>Produk</span>
        </a>

        <div id="productMenu"
             class="collapse {{ request()->routeIs('products.*') ? 'show' : '' }}"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Produk</h6>

                <a class="collapse-item {{ request()->routeIs('products.index') ? 'active' : '' }}"
                   href="{{ route('products.index') }}">
                    Data Produk
                </a>

                <a class="collapse-item {{ request()->routeIs('products.create') ? 'active' : '' }}"
                   href="{{ route('products.create') }}">
                    Tambah Produk
                </a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider mt-3">

    <!-- SIDEBAR FOOTER -->
    <div class="text-center d-none d-md-inline mt-auto mb-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- END SIDEBAR -->
