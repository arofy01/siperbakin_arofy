<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('judul-halaman') - {{ config('app.name', 'Satu Layanan') }}</title>



    <link rel="stylesheet"
        href="{{ asset('') }}storage/admin_template/mazer/assets/extensions/choices.js/public/assets/styles/choices.css">
    <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/main/app.css">
    <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/favicon.svg"
        type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/favicon.png"
        type="image/png">
    <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/shared/iconly.css">

    {{-- <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet"> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @livewireStyles

    @stack('css')

</head>

<body>

    <div id="app">
        <div id="sidebar" class="active">

            <div class="sidebar-wrapper">

                <div class="sidebar-header position-relative">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html"><img
                                    src="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/logo.svg"
                                    alt="Logo" srcset=""></a>
                        </div>

                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>

                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>

                    </div>
                </div>


                <div class="sidebar-menu">
                    <ul class="menu">

                        {{-- -------------------Menu Admin--------------------------- --}}

                        <li class="sidebar-title"><b>Administrator</b></li>


                        {{-- -------------------Dashboard--------------------------- --}}

                        <li class="sidebar-item  has-sub {{ isset($menuActive) && $menuActive == 'dashboard' ? 'active' : '' }}"
                            id="dashboard-menu">

                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-bar-chart-fill"></i>
                                <span>Dashboard</span>
                            </a>

                            <ul class="submenu {{ isset($menuActive) && $menuActive == 'dashboard' ? 'active' : '' }}">
                                <li class="submenu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                    <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                                </li>
                            </ul>
                        </li>

                        {{-- -------------------Penduduk--------------------------- --}}

                        <li class="sidebar-item  has-sub {{ isset($menuActive) && $menuActive == 'penduduk' ? 'active' : '' }}"
                            id="penduduk-menu">

                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-bar-chart-fill"></i>
                                <span>Penduduk</span>
                            </a>

                            <ul class="submenu {{ isset($menuActive) && $menuActive == 'penduduk' ? 'active' : '' }}">
                                <li class="submenu-item {{ request()->is('admin/penduduk') ? 'active' : '' }}">
                                    <a href="/admin/penduduk">Penduduk</a>
                                </li>

                            </ul>
                        </li>



                        {{-- -------------------Lembaga---------------------------- --}}

                        <li class="sidebar-item  has-sub {{ isset($menuActive) && $menuActive == 'lembaga' ? 'active' : '' }}"
                            id="lembaga-menu">

                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Lembaga</span>
                            </a>

                            <ul class="submenu {{ isset($menuActive) && $menuActive == 'lembaga' ? 'active' : '' }}">


                                <li class="submenu-item {{ request()->is('admin/lembaga') ? 'active' : '' }}">
                                    <a href="/admin/lembaga">Lembaga</a>
                                </li>


                            </ul>
                        </li>



                        {{-- -------------------Aparatur------------------------------ --}}

                        <li class="sidebar-item  has-sub {{ isset($menuActive) && $menuActive == 'aparatur' ? 'active' : '' }}"
                            id="aparatur-menu">

                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-journal-check"></i>
                                <span>Aparatur</span>
                            </a>

                            <ul class="submenu {{ isset($menuActive) && $menuActive == 'aparatur' ? 'active' : '' }}">
                                <li class="submenu-item {{ request()->is('admin/aparatur') ? 'active' : '' }}">
                                    <a href="/admin/aparatur">Aparatur</a>
                                </li>
                            </ul>
                        </li>



                        {{-- -------------------Wilayah------------------------------ --}}

                        <li class="sidebar-item  has-sub {{ isset($menuActive) && $menuActive == 'wilayah' ? 'active' : '' }}"
                            id="pengguna-menu">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Wilayah</span>
                            </a>
                            <ul class="submenu {{ isset($menuActive) && $menuActive == 'wilayah' ? 'active' : '' }}">

                                <li
                                    class="submenu-item {{ request()->is('admin/wilayah/provinsi') ? 'active' : '' }}">
                                    <a href="/admin/wilayah/provinsi">Provinsi</a>
                                </li>

                                <li
                                    class="submenu-item {{ request()->is('admin/wilayah/kabupaten') ? 'active' : '' }}">
                                    <a href="/admin/wilayah/kabupaten">Kabupaten</a>
                                </li>

                                <li
                                    class="submenu-item {{ request()->is('admin/wilayah/kecamatan') ? 'active' : '' }}">
                                    <a href="/admin/wilayah/kecamatan">Kecamatan</a>
                                </li>


                                <li class="submenu-item {{ request()->is('admin/wilayah/mukim') ? 'active' : '' }}">
                                    <a href="/admin/wilayah/mukim">Mukim</a>
                                </li>



                                <li class="submenu-item {{ request()->is('admin/wilayah/desa') ? 'active' : '' }}">
                                    <a href="/admin/wilayah/desa">Desa</a>
                                </li>



                                <li class="submenu-item {{ request()->is('admin/wilayah/dusun') ? 'active' : '' }}">
                                    <a href="/admin/wilayah/dusun">Dusun</a>
                                </li>

                            </ul>
                        </li>



                        {{-- -------------------Jabatan------------------------------ --}}

                        <li class="sidebar-item  has-sub {{ isset($menuActive) && $menuActive == 'pangkatjabatan' ? 'active' : '' }}"
                            id="pengguna-menu">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <span>Pangkat & Jabatan</span>
                            </a>

                            <ul class="submenu {{ isset($menuActive) && $menuActive == 'jabatan' ? 'active' : '' }}">

                                <li class="submenu-item {{ request()->is('admin/jabatan') ? 'active' : '' }}">
                                    <a href="/admin/jabatan">Jabatan</a>
                                </li>

                                <li class="submenu-item {{ request()->is('admin/pangkat') ? 'active' : '' }}">
                                    <a href="/admin/pangkat">Pangkat</a>
                                </li>
                            </ul>
                        </li>



                        {{-- ---------------------Pengguna-------------------------- --}}

                        <li class="sidebar-item  has-sub {{ isset($menuActive) && $menuActive == 'pengguna' ? 'active' : '' }}"
                            id="pengguna-menu">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Pengguna</span>
                            </a>
                            <ul class="submenu {{ isset($menuActive) && $menuActive == 'pengguna' ? 'active' : '' }}">
                                <li
                                    class="submenu-item {{ request()->is('admin/pengguna/jenispengguna') ? 'active' : '' }}">
                                    <a href="/admin/pengguna/jenispengguna">Jenis Pengguna</a>
                                </li>

                                <li
                                    class="submenu-item {{ request()->is('admin/pengguna/pengguna') ? 'active' : '' }}">
                                    <a href="/admin/pengguna/pengguna">Pengguna</a>
                                </li>

                                <li
                                    class="submenu-item {{ request()->is('admin/pengguna/peranpengguna') ? 'active' : '' }}">
                                    <a href="/admin/pengguna/peranpengguna">Peran Pengguna</a>
                                </li>

                                <li
                                    class="submenu-item {{ request()->is('admin/pengguna/izinpengguna') ? 'active' : '' }}">
                                    <a href="/admin/pengguna/izinpengguna">Izin Pengguna</a>
                                </li>
                            </ul>
                        </li>

                        {{-- -------------------Aplikasi--------------------------- --}}

                        <li class="sidebar-item  has-sub {{ isset($menuActive) && $menuActive == 'aplikasi' ? 'active' : '' }}"
                            id="aplikasi-menu">

                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-bar-chart-fill"></i>
                                <span>Aplikasi</span>
                            </a>

                            <ul class="submenu {{ isset($menuActive) && $menuActive == 'aplikasi' ? 'active' : '' }}">

                                <li
                                    class="submenu-item {{ request()->is('admin/aplikasi/sidarendu') ? 'active' : '' }}">
                                    <a href={{ url('/admin/aplikasi/sidarendu') }}>Sidarendu</a>

                                </li>

                                <li
                                    class="submenu-item {{ request()->is('admin/aplikasi/sipenting') ? 'active' : '' }}">
                                    <a href={{ url('/admin/aplikasi/sipenting') }}>Sipenting</a>

                                </li>

                                <li class="submenu-item {{ request()->is('admin/aplikasi/sipeka') ? 'active' : '' }}">
                                    <a href={{ url('/admin/aplikasi/sipeka') }}>Sipeka</a>

                                </li>

                                <li
                                    class="submenu-item {{ request()->is('admin/aplikasi/siperbakin') ? 'active' : '' }}">
                                    <a href={{ url('/admin/aplikasi/siperbakin') }}>Siperbakin</a>

                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-10 order-md-1 order-last">

                                <h3>
                                    @yield('judul-halaman')
                                </h3>
                                <br>
                                <h5 mt-8>
                                    Hai, {{ Auth::user()->name }}
                                </h5>
                                <p class="text-subtitle text-muted mt-2">
                                    @yield('keterangan-halaman')
                                </p>

                            </div>

                            {{-- breadcrumb --}}

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

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>Copyright 2023 &copy; Dinas Komunikasi Informatika dan Persandian Kab. Aceh Tamiang</p>
                    </div>
                </div>
            </footer>

        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/bootstrap.js"></script>

    <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/app.js"></script>

    {{-- Script Tambahan --}}
    <script
        src="{{ asset('') }}storage/admin_template/mazer/assets/extensions/choices.js/public/assets/scripts/choices.js">
    </script>
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/pages/form-element-select.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @livewireScripts

    @stack('java-script')

</body>

</html>
