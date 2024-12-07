<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul-halaman') - {{ config('app.name', 'Satu Layanan') }}</title>

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('storage/admin_template/mazer/assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/admin_template/mazer/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/admin_template/mazer/assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('storage/admin_template/mazer/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('storage/admin_template/mazer/assets/css/shared/iconly.css') }}">

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireStyles
    @stack('css')
</head>

<body>
    <div id="app">
        {{-- Sidebar --}}
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('storage/admin_template/mazer/assets/images/logo/logo.svg') }}" alt="Logo">
                            </a>
                        </div>
                        <div class="theme-toggle d-flex align-items-center mt-2 gap-2">
                            {{-- Theme Toggle --}}
                            <input class="form-check-input me-0" type="checkbox" id="toggle-dark">
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x"></i></a>
                        </div>
                    </div>
                </div>

                {{-- Sidebar Menu --}}
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title"><b>Administrator</b></li>

                        {{-- Example Menu Item --}}
                        <li class="sidebar-item has-sub {{ isset($menuActive) && $menuActive == 'dashboard' ? 'active' : '' }}">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-bar-chart-fill"></i>
                                <span>Dashboard</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                    <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                                </li>
                            </ul>
                        </li>

                        {{-- Repeat other menus here --}}
                    </ul>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none"><i class="bi bi-justify fs-3"></i></a>
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-10 order-md-1 order-last">
                                <h3>@yield('judul-halaman')</h3>
                                <p class="text-subtitle text-muted mt-2">@yield('keterangan-halaman')</p>
                                <h5>Hai, {{ Auth::user()->name }}</h5>
                            </div>
                            <div class="col-12 col-md-2 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/logout">Logout</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            @yield('content')

            {{-- Footer --}}
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>Copyright 2023 &copy; Dinas Komunikasi Informatika dan Persandian Kab. Aceh Tamiang</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('storage/admin_template/mazer/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('storage/admin_template/mazer/assets/js/app.js') }}"></script>
    <script src="{{ asset('storage/admin_template/mazer/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('storage/admin_template/mazer/assets/js/pages/form-element-select.js') }}"></script>
    @livewireScripts
    @stack('java-script')
</body>

</html>
