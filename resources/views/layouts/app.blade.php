<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Gadget Store Inventory Management System">
    <meta name="author" content="Abila Safina">

    <title>@yield('title', 'Dashboard') - Gadget Store</title>

    {{-- FONT --}}
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- SB ADMIN --}}
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- ICON --}}
    <link rel="icon" type="image/png"
        href="https://www.bing.com/th/id/OIP.tdLWAGWKacE3cK2MgiASLgHaHa?w=193&h=193&c=8&rs=1&qlt=90&o=6&dpr=1.5&pid=ImgAns&rm=2">

    @stack('styles')

    {{-- MIDNIGHT TECH THEME --}}
    <style>
        :root {
            --tech-navy: #17243b;
            --tech-navy-light: #223653;
            --tech-blue: #4778e6;
            --tech-cyan: #39c6d8;
            --tech-bg: #f4f7fc;
            --tech-text: #29384d;
            --tech-muted: #8b98aa;
        }

        * {
            font-family: 'Nunito', sans-serif;
        }

        body {
            background: var(--tech-bg);
            color: var(--tech-text);
        }

        /* BACKGROUND */
        #content-wrapper {
            background: var(--tech-bg);
        }

        #content {
            min-height: 100vh;
        }

        .container-fluid {
            padding: 25px 28px;
        }

        /* PAGE HEADING */
        .container-fluid h1 {
            font-weight: 800;
            color: var(--tech-navy);
            letter-spacing: -.5px;
        }

        /* SIDEBAR */
        #accordionSidebar {
            background: var(--tech-navy) !important;
            background-image: none !important;
        }

        .sidebar {
            background: var(--tech-navy) !important;
        }

        .sidebar .nav-item {
            margin: 4px 12px;
        }

        .sidebar .nav-item .nav-link {
            border-radius: 11px;
            margin-bottom: 4px;
            transition: .25s ease;
        }

        .sidebar .nav-item .nav-link:hover {
            background: rgba(255,255,255,.09);
            color: #fff;
        }

        .sidebar .nav-item.active .nav-link {
            background: linear-gradient(135deg, var(--tech-blue), var(--tech-cyan));
            box-shadow: 0 5px 15px rgba(57,198,216,.18);
        }

        .sidebar-brand {
            height: 90px;
        }

        .sidebar-brand-text {
            letter-spacing: 1px;
            font-weight: 800 !important;
        }

        .sidebar-divider {
            border-color: rgba(255,255,255,.10) !important;
        }

        .sidebar-heading {
            color: #8499b9 !important;
            letter-spacing: 1px;
        }

        /* TOPBAR */
        .topbar {
            background: #fff !important;
            box-shadow: 0 2px 15px rgba(23,36,59,.035);
            height: 75px;
        }

        .topbar .nav-link {
            color: var(--tech-text);
        }

        .topbar .dropdown-menu {
            border: 1px solid #edf1f7;
            border-radius: 13px;
            box-shadow: 0 10px 35px rgba(23,36,59,.08);
        }

        /* CARD */
        .card,
        .dashboard-panel {
            border-radius: 18px !important;
        }

        .card {
            border-color: #edf0f6 !important;
        }

        .shadow-sm {
            box-shadow: 0 4px 16px rgba(23,36,59,.05) !important;
        }

        /* BUTTON */
        .btn {
            border-radius: 10px;
            font-weight: 700;
            transition: all .2s ease;
        }

        .btn-primary {
            background: var(--tech-blue);
            border-color: var(--tech-blue);
        }

        .btn-primary:hover {
            background: #315fc5;
            border-color: #315fc5;
            transform: translateY(-1px);
        }

        .btn-outline-primary {
            color: var(--tech-blue);
            border-color: var(--tech-blue);
        }

        .btn-outline-primary:hover {
            background: var(--tech-blue);
            border-color: var(--tech-blue);
        }

        /* FORM */
        .form-control,
        .form-select {
            border: 1px solid #e4eaf3;
            border-radius: 10px;
            min-height: 42px;
        }

        .form-control:focus {
            border-color: #83a9f4;
            box-shadow: 0 0 0 3px rgba(71,120,230,.10);
        }

        label {
            font-weight: 700;
            color: #44536a;
            margin-bottom: 8px;
        }

        /* TABLE */
        .table {
            color: var(--tech-text);
        }

        .table thead th {
            background: #f7f9fc;
            border-bottom: 0;
            color: #8390a3;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .table tbody tr {
            transition: .2s;
        }

        .table tbody tr:hover {
            background: #f8faff;
        }

        /* BADGE */
        .badge {
            border-radius: 7px;
            padding: 6px 10px;
        }

        /* ALERT */
        .alert {
            border: 0;
            border-radius: 12px;
        }

        /* FOOTER */
        footer {
            background: #fff !important;
            border-top: 1px solid #edf0f6;
        }

        /* SCROLL TO TOP */
        .scroll-to-top {
            background: var(--tech-blue);
            border-radius: 12px !important;
        }

        /* ANIMATION */
        .card,
        .dashboard-panel {
            transition: box-shadow .25s ease, transform .25s ease;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .container-fluid {
                padding: 18px 15px;
            }

            .topbar {
                height: 65px;
            }

            .container-fluid h1 {
                font-size: 22px;
            }
        }


/* SIDEBAR BRAND */
.sidebar .sidebar-brand {
    min-height: 85px;
}

.sidebar .sidebar-brand-icon {
    font-size: 22px;
    color: #42d2e5;
    transform: none !important;
}

.sidebar .sidebar-brand-text {
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 1.2px;
}

/* SIDEBAR MENU */
.sidebar .nav-item .nav-link {
    padding: 13px 15px;
    font-size: 13px;
    font-weight: 700;
    color: #aabbd4;
}

.sidebar .nav-item .nav-link i {
    font-size: 15px;
    margin-right: 8px;
    color: #8ea8ca;
}

.sidebar .nav-item.active .nav-link,
.sidebar .nav-item.active .nav-link i {
    color: #ffffff;
}

.sidebar .nav-item.active .nav-link {
    background: linear-gradient(135deg, #4778e6, #39c6d8);
    border-radius: 11px;
}

/* SUBMENU */
.sidebar .collapse-inner {
    border-radius: 10px !important;
    margin: 5px 0;
}

.sidebar .collapse-item {
    border-radius: 7px;
    font-size: 12px;
    transition: .2s;
}

.sidebar .collapse-item:hover {
    background: #edf4ff;
    color: #4778e6;
}

.sidebar .collapse-item.active {
    background: #e8f0ff;
    color: #4778e6;
    font-weight: 800;
}

/* SIDEBAR DIVIDER */
.sidebar hr.sidebar-divider {
    border-top: 1px solid rgba(255,255,255,.09);
}

    </style>
</head>

<body id="page-top">

    <div id="wrapper">

        {{-- SIDEBAR --}}
        @include('layouts.sidebar')

        {{-- CONTENT WRAPPER --}}
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                {{-- TOPBAR --}}
                @include('layouts.topbar')

                {{-- MAIN CONTENT --}}
                <div class="container-fluid">

                    {{-- PAGE HEADER --}}
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <h1 class="h3 mb-0">
                            @yield('page_heading', 'Dashboard')
                        </h1>

                        <div>
                            @yield('action-button')
                        </div>

                    </div>

                    {{-- ERROR MESSAGE --}}
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ session('error') }}

                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    {{-- SUCCESS MESSAGE --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('success') }}

                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    {{-- PAGE CONTENT --}}
                    @yield('content')

                </div>

            </div>

            {{-- FOOTER --}}
            @include('layouts.footer')

        </div>

    </div>

    {{-- SCROLL TO TOP --}}
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- LOGOUT MODAL --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
        aria-labelledby="logoutModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content border-0 shadow" style="border-radius: 18px;">

                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="logoutModalLabel">
                        Keluar dari Gadget Store?
                    </h5>

                    <button class="close" type="button" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body text-secondary">
                    Apakah kamu yakin ingin mengakhiri sesi sekarang?
                </div>

                <div class="modal-footer">

                    <button class="btn btn-light" type="button" data-dismiss="modal">
                        Batal
                    </button>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            Logout
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>

    {{-- JAVASCRIPT --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    @stack('scripts')

</body>
</html>
