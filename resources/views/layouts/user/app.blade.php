<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('judul-halaman') </title>

    <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/main/app.css">
    <link rel="shortcut icon" href="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/favicon.svg"
        type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/favicon.png"
        type="image/png">

    <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/shared/iconly.css">

    {{-- <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/extensions/@icon/dripicons/dripicons.css">
    <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/pages/dripicons.css"> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    @livewireStyles

    @stack('css')

</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">

            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">

                            @if (request()->getHost() === 'sipeka.acehtamiangkab.go.id')
                                <a href="/user/opd/bappeda/aplikasi/sipeka/dashboard"><img
                                        src="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/logo-sipeka.svg"
                                        alt="Logo">
                                </a>
                            @elseif(request()->getHost() === 'sidarendu.acehtamiangkab.go.id')
                                <a href="/user/opd/bappeda/aplikasi/sipeka/dashboard"><img
                                        src="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/logo-sidarendu.svg"
                                        alt="Logo">
                                </a>
                            @elseif(request()->getHost() === 'siperbakin.acehtamiangkab.go.id')
                                <a href="/user/opd/bappeda/aplikasi/sipeka/dashboard"><img
                                        src="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/logo-siperbakin.svg"
                                        alt="Logo">
                                </a>
                            @elseif(request()->getHost() === 'sipenting.acehtamiangkab.go.id')
                                <a href="/user/opd/bappeda/aplikasi/sipeka/dashboard"><img
                                        src="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/logo-sipenting.svg"
                                        alt="Logo">
                                </a>
                            @else
                                <a href="/user/opd/bappeda/aplikasi/sipeka/dashboard"><img
                                        src="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/logo.svg"
                                        alt="Logo">
                                </a>
                            @endif



                        </div>
                        <div class="header-top-right">

                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown"
                                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2">
                                        @if (Auth::user()->avatar)
                                            <img src="{{ asset('') }}storage/admin_template/mazer/assets/images/faces/{{ Auth::user()->avatar }}"
                                                alt="Avatar">
                                        @else
                                            <img src="{{ asset('') }}storage/admin_template/mazer/assets/images/faces/12.jpg"
                                                alt="Avatar">
                                        @endif
                                    </div>
                                    <div class="text">
                                        <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                                        {{-- <p class="user-dropdown-status text-sm text-muted">Member</p> --}}
                                    </div>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end shadow-lg"
                                    aria-labelledby="topbarUserDropdown">
                                    <li><a class="dropdown-item" href="#">Akun Saya</a></li>
                                    <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                </ul>
                            </div>

                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>



                @yield('navbar')



            </header>




            @yield('content')




            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">


                        <div class="float-start">
                            <p>@yield('copyright')</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                    href="#">@yield('team')</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/bootstrap.js"></script>
    {{-- <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/app.js"></script> --}}
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/pages/horizontal-layout.js"></script>



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
