<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sidarendu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('') }}storage/sidarendu_template/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('') }}storage/sidarendu_template/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('') }}storage/sidarendu_template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('') }}storage/sidarendu_template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('') }}storage/sidarendu_template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('') }}storage/sidarendu_template/css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('') }}storage/sidarendu_template/img/favicon.png"
    type="image/png">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row align-items-center top-bar">
            <div class="col-lg-3 col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
                    <h1 class="text-primary m-0">SIDARENDU</h1>
                </a>
            </div>
            <div class="col-lg-9 col-md-12 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                    <p class="m-0">Komplek Perkantoran Bupati Aceh Tamiang</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="far fa-envelope-open text-primary me-2"></i>
                    <p class="m-0">sidarendu@acehtamiangkab.go.id</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
            <a href="" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
                <h1 class="text-primary m-0">Sidarendu</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="/" class="nav-item nav-link active">Beranda</a>
                    <a href="" class="nav-item nav-link">Tentang</a>
                    <a href="" class="nav-item nav-link">Layanan</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Halaman</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="" class="dropdown-item">Pencarian</a>
                            {{-- <a href="team.html" class="dropdown-item">Technicians</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a> --}}
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Hubungi</a>
                    <a href="/login" class="nav-item nav-link">Login</a>
                </div>
                <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-primary d-flex align-items-center">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                        <i class="fa fa-phone-alt text-primary"></i>
                    </div>
                    <div class="ms-3">
                        <p class="mb-1 text-white">Layanan</p>
                        <h5 class="m-0 text-secondary">+62 852 6198 1980</h5>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('') }}storage/sidarendu_template/img/carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Sistem Data Perencanaan Terpadu</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Sistem Data Perencanaan Terpadu</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Sistem Informasi yang menyimpan, mengolah dan  menyajikan berbagai data untuk kegiatan perencanaan dan pembangunan di Kab. Aceh Tamiang.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Lanjutkan</a>
                                {{-- <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Free Quote</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('') }}storage/sidarendu_template/img/carousel-2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Sistem Data Perencanaan Terpadu</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Sistem Data Perencanaan Terpadu</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Sistem Informasi yang terintegrasi dengan berbagai Organisasi Perangkat Daerah (OPD).</p>
                                {{-- <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Lanjutkan</a> --}}
                                {{-- <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Free Quote</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('') }}storage/sidarendu_template/img/carousel-3.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Sistem Data Perencanaan Terpadu</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Sistem Data Perencanaan Terpadu</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Sistem Informasi yang terintegrasi dengan berbagai lembaga pemerintahan seperti Desa, Sekolah, Pasantren, Posyandu dan lembaga lainnya.</p>
                                {{-- <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Lanjutkan</a> --}}
                                {{-- <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Free Quote</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.1s">
                    <div class="overflow-hidden">
                        <img class="img-fluid w-100 h-100" src="{{ asset('') }}storage/sidarendu_template/img/service-1.jpg" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light p-4">
                        {{-- <h5 class="text-truncate me-3 mb-0">Residential Plumbing</h5> --}}
                        <a class="btn btn-square btn-outline-primary border-2 border-white flex-shrink-0" href=""><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.3s">
                    <div class="overflow-hidden">
                        <img class="img-fluid w-100 h-100" src="{{ asset('') }}storage/sidarendu_template/img/service-2.jpg" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light p-4">
                        {{-- <h5 class="text-truncate me-3 mb-0">Commercial Plumbing</h5> --}}
                        <a class="btn btn-square btn-outline-primary border-2 border-white flex-shrink-0" href=""><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.5s">
                    <div class="overflow-hidden">
                        <img class="img-fluid w-100 h-100" src="{{ asset('') }}storage/sidarendu_template/img/service-3.jpg" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light p-4">
                        {{-- <h5 class="text-truncate me-3 mb-0">Emergency Servicing</h5> --}}
                        <a class="btn btn-square btn-outline-primary border-2 border-white flex-shrink-0" href=""><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="text-secondary text-uppercase">Tentang Kami</h1>
                    {{-- <h1 class="mb-4">Badan Perencanaan dan Pembangunan Daerah Kab. Aceh Tamiang</h1> --}}
                    <p class="mb-4">Sistem Informasi Data Perencanaan Terpadu (SIDARENDU) memberikan kemudahan kepada BAPPEDA Kab. Aceh Tamiang untuk mengumpulkan data-data yang terkait dengan perencanaan dan pembangunan dari seluruh pemangku kepentingan (OPD, Desa, Sekolah, Pesantren dan Lembaga Pemerintahan lainnya). Dengan adanya Sistem Informasi ini BAPPEDA Kab. Aceh Tamiang dapat dimudahkan untuk melakukan menganalisa perencanaan dan mengevaluasinya.</p>
                    {{-- <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Menyimpan dan Mengolah Data Perencanaan Pembangunan</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Menjamin ketersediaan Data Perencanaan Pembangunan</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Pelayanan bagi seluruh pemangku kepentingan yang membutuhkan data perencanaan dan pembangunan</p> --}}
                    <div class="bg-primary d-flex align-items-center p-4 mt-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <p class="fs-5 fw-medium mb-2 text-white">Layanan</p>
                            <h3 class="m-0 text-secondary">+62 852 6198 1980</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pt-4" style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('') }}storage/sidarendu_template/img/about-1.jpg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="{{ asset('') }}storage/sidarendu_template/img/about-2.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-check fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Data Perencanaan Kabupaten</p>
                    
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Data Perencanaan Desa</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Data Perencanaan Sekolah</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-wrench fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Data Perencanaan lembaga lainnya</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- Service Start -->
    {{-- <div class="container-fluid py-5 px-4 px-lg-0 "> --}}
        <div class="container-xxl py-5">
            <div class="container">
        {{-- <div class="row g-0"> --}}


            {{-- <div class="col-lg-3 d-none d-lg-flex">
                <div class="d-flex align-items-center justify-content-center bg-primary w-100 h-100">
                    <h1 class="display-3 text-white m-0" style="transform: rotate(-90deg);">21 Tahun Melayani</h1>
                </div>
            </div> --}}


            {{-- <div class="col-md-12 col-lg-9">
                <div class="ms-lg-5 ps-lg-5"> --}}
                    {{-- <div class="text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s"> --}}
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="text-secondary text-uppercase">Layanan Kami</h1>
                        {{-- <h1 class="mb-5">Jelajahi Layanan Kami</h1> --}}
                    </div>

                    <div class="owl-carousel service-carousel position-relative wow fadeInUp " data-wow-delay="0.1s">
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                <i class="fa fa-water fa-2x text-primary"></i>
                            </div>
                            <h4 class="mb-3">Konsultasi Perencanaan</h4>
                            <p>Memberikan Layanan Konsultasi Perencanaan Kepada Seluruh Stakeholder Pembangunan</p>
                            {{-- <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Musrembang Kecamatan</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Forum Gabungan Organisasi Perangkat Daerah </p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Musrembang Kabupaten</p>
                            {{-- <a href="" class="btn bg-white text-primary w-100 mt-2">Selanjutnya<i class="fa fa-arrow-right text-secondary ms-2"></i></a> --}}
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                <i class="fa fa-toilet fa-2x text-primary"></i>
                            </div>
                            <h4 class="mb-3">Survei Perencanaan</h4>
                            <p>Melakukan Survei perencanaan terhadap objek-objek Pembangunan di Pemerintahan Kabupaten Aceh Tamiang</p>.</p>
                            {{-- <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Quality Service</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Customer Satisfaction</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Support 24/7</p> --}}
                            {{-- <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i class="fa fa-arrow-right text-secondary ms-2"></i></a> --}}
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                <i class="fa fa-shower fa-2x text-primary"></i>
                            </div>
                            <h4 class="mb-3">Pelaporan Perencanaan</h4>
                            <p>Membuat Berbagai Pelaporan perencanan Pemerintah Kabupaten Aceh Tamiang</p>
                            {{-- <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Quality Service</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Customer Satisfaction</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Support 24/7</p> --}}
                            {{-- <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i class="fa fa-arrow-right text-secondary ms-2"></i></a> --}}
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                <i class="fa fa-tint fa-2x text-primary"></i>
                            </div>
                            <h4 class="mb-3">Evaluasi Perencanaan</h4>
                            <p>Melakukan Evaluasi Perencanaan Pemerintah Kabupaten Aceh Tamiang</p>
                            {{-- <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Quality Service</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Customer Satisfaction</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Support 24/7</p> --}}
                            {{-- <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i class="fa fa-arrow-right text-secondary ms-2"></i></a> --}}
                        </div>
                    </div>

                {{-- </div>
            </div> --}}
        </div>
    </div>
    <!-- Service End -->


    <!-- Booking Start -->
    <div class="container-fluid my-5 px-0">
        <div class="video wow fadeInUp" data-wow-delay="0.1s">
            <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                <span></span>
            </button>

            <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- 16:9 aspect ratio -->
                            <div class="ratio ratio-16x9">
                                <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                    allow="autoplay"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <h1 class="text-white mb-4">Emergency Plumbing Service</h1>
            <h3 class="text-white mb-0">24 Hours 7 Days a Week</h3> --}}
        </div>
        <div class="container position-relative wow fadeInUp" data-wow-delay="0.1s" style="margin-top: -6rem;">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-light text-center p-5">
                        <h1 class="mb-4">Hubungi Kami</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Nama Lengkat" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control border-0" placeholder="Email Anda" style="height: 55px;">
                                </div>
                                {{-- <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" style="height: 55px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">Service 1</option>
                                        <option value="2">Service 2</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div> --}}
                                {{-- <div class="col-12 col-sm-6">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control border-0 datetimepicker-input"
                                            placeholder="Service Date" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div> --}}
                                <div class="col-12">
                                    <textarea class="form-control border-0" placeholder="Pesan"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="text-secondary text-uppercase">Tim Kami</h1>
                {{-- <h1 class="mb-5">Our Expert Technicians</h1> --}}
            </div>
            <div class="row g-4">
               
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('') }}storage/sidarendu_template/img/team-1.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">HERMAWAN, SE</h5>
                                <small style="text-align: center">Kepala Bidang Perencanaan, Pengendalian dan Evaluasi</small>
                            </div>
                            <div class="bg-primary">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('') }}storage/sidarendu_template/img/team-2.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Mhd. Syamsuddin Yasyir. TN, S.STP, M.Ec.Dev
                                </h5>
                                <small>Perencana Ahli Muda</small>
                            </div>
                            <div class="bg-primary">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('') }}storage/sidarendu_template/img/team-3.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Tengku Herawati, S.T, M.A.P
                                </h5>
                                <small>Perencana Ahli Muda</small>
                            </div>
                            <div class="bg-primary">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('') }}storage/sidarendu_template/img/team-4.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Fitriyanti, S.Si
                                </h5>
                                <small>Perencana Ahli Muda</small>
                            </div>
                            <div class="bg-primary">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('') }}storage/sidarendu_template/img/team-7.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Mariani Yuyun, S.St, M.Si</h5>
                                <small>Analis Monitoring dan Evaluasi Pelaporan</small>
                            </div>
                            <div class="bg-primary">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h1 class="text-secondary text-uppercase">Testimoni</h1>
                {{-- <h1 class="mb-5">Testimoni</h1> --}}
            </div>
            <div class="owl-carousel testimonial-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Saya berharap dengan adanya sistem informasi ini dapat mempermudah BAPPEDA Kab. Aceh Tamiang dalam melaksanakan Perencenaan dan Pembangunan. </p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="{{ asset('') }}storage/sidarendu_template/img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1">Dr. MEURAH BUDIMAN, SH, M.Kum</h5>
                    <p class="m-0">Pj. Bupati Kab. Aceh Tamiang</p>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Maju terus BAPPEDA Kab. Aceh Tamiang, semoga Perencanaan lebih menjadi mudah setelah ada Sistem Informasi ini.</p>
                        {{-- <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p> --}}
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="{{ asset('') }}storage/sidarendu_template/img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1"> Drs. ASRA</h5>
                    <p class="m-0">Sekretaris Daerah Kab. Aceh Tamiang</p>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        {{-- <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p> --}}
                        <p class="mb-0">Selamat kami ucapkan atas pengembangan prototype sistem Informasi Perencanaan Data Terpadu, Semoga bermanfaat. </p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="{{ asset('') }}storage/sidarendu_template/img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1">Ir. MUHAMMAD ZEIN</h5>
                    <p class="m-0">Ka. BAPPEDA Kab. Aceh Tamiang</p>
                </div>
                {{-- <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="{{ asset('') }}storage/sidarendu_template/img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1">Client Name</h5>
                    <p class="m-0">Profession</p>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Alamat</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Ir. H. Juanda, Komplek Perkantoran Bupati Aceh Tamiang</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 852 6198 1980</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>sidarendu@acehtamiangkab.go.id</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Jam Pelayanan</h4>
                    <h6 class="text-light">Senin - Jum'at:</h6>
                    <p class="mb-4">09.00 AM - 16.00 PM</p>
                    
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Layanan</h4>
                    <a class="btn btn-link" href="">Konsultasi</a>
                    <a class="btn btn-link" href="">Survei dan Pendataan</a>
                    <a class="btn btn-link" href="">Pelaporan</a>
                    <a class="btn btn-link" href="">Evaluasi</a>
                    {{-- <a class="btn btn-link" href="">Broken Pipe</a> --}}
                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">sidarendu.acehtamiangkab.go.id</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://bapedda.acehtamiangkab.go.id">Bappeda ATAM</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}storage/sidarendu_template/lib/wow/wow.min.js"></script>
    <script src="{{ asset('') }}storage/sidarendu_template/lib/easing/easing.min.js"></script>
    <script src="{{ asset('') }}storage/sidarendu_template/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('') }}storage/sidarendu_template/lib/counterup/counterup.min.js"></script>
    <script src="{{ asset('') }}storage/sidarendu_template/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('') }}storage/sidarendu_template/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{ asset('') }}storage/sidarendu_template/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{ asset('') }}storage/sidarendu_template/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('') }}storage/sidarendu_template/js/main.js"></script>
</body>

</html>