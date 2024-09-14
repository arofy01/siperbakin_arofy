<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SIPEKA</title>

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}storage/sipeka_template/css/bootstrap.css" />
    <!-- fonts awesome style -->
    <link href="{{ asset('') }}storage/sipeka_template/css/font-awesome.min.css" rel="stylesheet" />
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,500,700&display=swap"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('') }}storage/sipeka_template/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('') }}storage/sipeka_template/css/responsive.css" rel="stylesheet" />

    <link rel="shortcut icon" href="{{ asset('') }}storage/sipeka_template/images/favicon.png"
    type="image/png">


</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="contact_nav_container">
                <div class="container">
                    <div class="contact_nav">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Address : Komplek Perkantoran Bupati Kab. Aceh Tamiang
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                Email : sipeka@acehtamiangkab.go.id
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Phone Call : +62 852-6004-9435
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <div class="custom_menu-btn">
                        <button onclick="openNav()">
                            <span class="s-1"> </span>
                            <span class="s-2"> </span>
                            <span class="s-3"> </span>
                        </button>
                    </div>

                    <div id="myNav" class="overlay">
                        <div class="menu_btn-style ">
                            <button onclick="closeNav()">
                                <span class="s-1"> </span>
                                <span class="s-2"> </span>
                                <span class="s-3"> </span>
                            </button>
                        </div>
                        <div class="overlay-content">
                            <a class="active" href="/"> Beranda <span class="sr-only">(current)</span></a>
                            <a class="" href=""> Tentang Kami</a>
                            <a class="" href=""> Mengapa SIPEKA </a>
                            <a class="" href=""> Tim Kami</a>
                            <a class="" href=""> Testimoni</a>
                            <a class="" href=""> Hubungi Kami</a>
                        </div>
                    </div>

                    <a class="navbar-brand" href="index.html">
                        <span>
                            SIPEKA
                        </span>
                    </a>
                    <div class="user_option">
                        <a href="/login">
                            <span>
                                Login
                            </span>
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                        <form class="form-inline">
                            <button class="btn  nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->


        <!-- slider section -->
        <section class="slider_section position-relative">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                    <li data-target="#customCarousel1" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="box">
                            <div class="baby_detail">
                                <div class="baby_text">
                                    <h2>
                                        sipeka
                                    </h2>
                                </div>
                                {{-- <a href="">
                                    Selanjutnya
                                </a> --}}
                            </div>
                            <div class="care_detail">
                                {{-- <a href="">
                                    Hubungi Kami
                                </a> --}}
                                <div class="care_text">
                                    <h2>
                                        Sistem Informasi Pengentasan Kemiskinan Kab. Aceh Tamiang
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="box">
                            <div class="baby_detail">
                                <div class="baby_text">
                                    <h2>
                                        Sipeka
                                    </h2>
                                </div>
                                {{-- <a href="">
                                    Selanjutnya
                                </a> --}}
                            </div>
                            <div class="care_detail">
                                {{-- <a href="">
                                    Hubungi Kami
                                </a> --}}
                                <div class="care_text">
                                    <h2>
                                        Memanajemen data kemiskinan di wilayah Kab. Aceh Tamiang
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="box">
                            <div class="baby_detail">
                                <div class="baby_text">
                                    <h2>
                                        Sipeka
                                    </h2>
                                </div>
                                {{-- <a href="">
                                    Selanjutnya
                                </a> --}}
                            </div>
                            <div class="care_detail">
                                {{-- <a href="">
                                    Hubungi Kami
                                </a> --}}
                                <div class="care_text">
                                    <h2>
                                        Meningkatkan akurasi data kemiskinan di wilayah Kab. Aceh Tamiang
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="box">
                            <div class="baby_detail">
                                <div class="baby_text">
                                    <h2>
                                       Sipeka
                                    </h2>
                                </div>
                                {{-- <a href="">
                                    Selanjutnya
                                </a> --}}
                            </div>
                            <div class="care_detail">
                                {{-- <a href="">
                                    Hubungi Kami
                                </a> --}}
                                <div class="care_text">
                                    <h2>
                                       Membantu mengakselerasi Program Pengentasan Kemiskinan Nasional
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>

    <!-- service section -->

    {{-- <section class="service_section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('') }}storage/sipeka_template/images/service1.png"
                                alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                Baby Milk
                            </h4>
                            <p>
                                available, but the majority have suffered alteration in some form, by injected
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('') }}storage/sipeka_template/images/service2.png"
                                alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                Baby Clothes
                            </h4>
                            <p>
                                available, but the majority have suffered alteration in some form, by injected
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('') }}storage/sipeka_template/images/service3.png"
                                alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                Baby
                            </h4>
                            <p>
                                available, but the majority have suffered alteration in some form, by injected
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('') }}storage/sipeka_template/images/service4.png"
                                alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                Baby Walk
                            </h4>
                            <p>
                                available, but the majority have suffered alteration in some form, by injected
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- end service section -->

    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container-fluid">
            <div class="box">
                <div class="img-box">
                    <img src="{{ asset('') }}storage/sipeka_template/images/about-img.jpg" alt="" />
                </div>
                <div class="detail-box">
                    <h2>
                        Tentang Kami
                    </h2>
                    <p>
                        Sistem Informasi Pengentasan Kemiskinan Kabupaten Aceh Tamiang adalah aplikasi untuk memanajemen data kemiskinan yang terpadu serta terintegrasi di Pemerintahan Kabupaten Aceh Tamiang, yang
                        dikembangkan dengan teknologi berbasis web (client server) untuk mendukung program
                        Pengentasan kemiskinan sehingga menjadi lebih cepat, mudah efisien, dan tepat sasaran.
                    </p>
                    <a href="">
                        {{-- <span>
                            Selanjutnya
                        </span> --}}
                        <hr />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- we have section -->

    <section class="wehave_section">
        <div class="container-fluid">
            <div class="box">
                <div class="detail-box">
                    <h2>
                        Mengapa Sipeka
                    </h2>
                    <p>
                        Dengan bantuan penerapan teknologi informasi (Sipeka), Pemerintah Kabupaten Aceh Tamiang akan lebih mudah menentukan arah kebijakan yang berkaitan dengan Percepatan Penghapusan Kemiskinan Ekstrem (PPKE) yaitu upaya yang terarah, terpadu, dan berkelanjutan yang dilakukan pemerintah, pemerintah daerah, dan/atau masyarakat dalam bentuk kebijakan, program dan kegiatan pemberdayaan, pendampingan, serta fasilitasi untuk memenuhi kebutuhan dasar setiap warga negara.
                    </p>
                    <a href="">
                        {{-- <span>
                            Selanjutnya
                        </span> --}}
                        <hr />
                    </a>
                </div>
                <div class="img-box">
                    <img src="{{ asset('') }}storage/sipeka_template/images/we_img.jpg" alt="" />
                </div>
            </div>
        </div>
    </section>

    <!-- end we have section -->

    <!-- why section -->

    <section class="why_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    SIPEKA
                </h2>
                <p>
                    Fitur yang dimiliki oleh Sistem Informasi Pengentasan Kemiskinan Kab. Aceh Tamiang
                </p>
            </div>
            <div class="why_container">
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('') }}storage/sipeka_template/images/why1.png" alt="" />
                    </div>
                    <div class="detail-box">
                        <h5>
                            Terintegrasi Data P3KE
                        </h5>
                        <a href="">
                            {{-- <span>
                                Selanjutnya
                            </span> --}}
                            <hr />
                        </a>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('') }}storage/sipeka_template/images/why2.png" alt="" />
                    </div>
                    <div class="detail-box">
                        <h5>
                            Analisa Kemiskinan
                        </h5>
                        <a href="">
                            {{-- <span>
                                Selanjutnya
                            </span> --}}
                            <hr />
                        </a>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('') }}storage/sipeka_template/images/why3.png" alt="" />
                    </div>
                    <div class="detail-box">
                        <h5>
                            Peta Kemiskinan
                        </h5>
                        <a href="">
                            {{-- <span>
                                Selanjutnya
                            </span> --}}
                            <hr />
                        </a>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('') }}storage/sipeka_template/images/why4.png" alt="" />
                    </div>
                    <div class="detail-box">
                        <h5>
                            Layanan Aduan Terpadu
                        </h5>
                        <a href="">
                            {{-- <span>
                                Selanjutnya
                            </span> --}}
                            <hr />
                        </a>
                    </div>
                </div>

                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('') }}storage/sipeka_template/images/why4.png" alt="" />
                    </div>
                    <div class="detail-box">
                        <h5>
                            Program Bantuan
                        </h5>
                        <a href="">
                            {{-- <span>
                                Selanjutnya
                            </span> --}}
                            <hr />
                        </a>
                    </div>
                </div>

                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('') }}storage/sipeka_template/images/why4.png" alt="" />
                    </div>
                    <div class="detail-box">
                        <h5>
                            Satu Data Kemiskinan Daerah
                        </h5>
                        <a href="">
                            {{-- <span>
                                Selanjutnya
                            </span> --}}
                            <hr />
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- end why section -->

    <!-- team section -->

    <section class="team_section">
        <div class="container-fluid">
            <div class="heading_container">
                <h2>
                    TIM KAMI
                </h2>
                <p>
                    Tim Pengentasan Kemiskinan BAPPEDA Kabupaten Aceh Tamiang
                </p>
            </div>
            <div class="carousel-wrap ">
                <div class="owl-carousel team_carousel">
                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('') }}storage/sipeka_template/images/team1.jpg"
                                    alt="" />
                            </div>
                            <div class="detail-box">
                                <h6>
                                    AZHAR SKM, M.Kes
                                </h6>
                                <div class="social_box">
                                    <a href="">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('') }}storage/sipeka_template/images/team2.jpg"
                                    alt="" />
                            </div>
                            <div class="detail-box">
                                <h6>
                                    AIDIL PUTRA S.HI
                                </h6>
                                <div class="social_box">
                                    <a href="">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('') }}storage/sipeka_template/images/team3.jpg"
                                    alt="" />
                            </div>
                            <div class="detail-box">
                                <h6>
                                    Erliana Lubis, SH
                                </h6>
                                <div class="social_box">
                                    <a href="">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('') }}storage/sipeka_template/images/team4.jpg"
                                    alt="" />
                            </div>
                            <div class="detail-box">
                                <h6>
                                    Fadjariah, SE
                                </h6>
                                <div class="social_box">
                                    <a href="">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('') }}storage/sipeka_template/images/team5.jpg"
                                    alt="" />
                            </div>
                            <div class="detail-box">
                                <h6>
                                    Irwansyah
                                </h6>
                                <div class="social_box">
                                    <a href="">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('') }}storage/sipeka_template/images/team6.jpg"
                                    alt="" />
                            </div>
                            <div class="detail-box">
                                <h6>
                                    Agus Vitrianto
                                </h6>
                                <div class="social_box">
                                    <a href="">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end team section -->

    <!-- contact section -->

    <section class="contact_section layout_padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="contact-form">
                        <div class="heading_container">
                            <h2>
                                Hubungi Kami
                            </h2>
                        </div>
                        <form action="">
                            <input type="text" placeholder="Nama Lengkap " />
                            <div class="top_input">
                                <input type="email" placeholder="Email" />
                                <input type="text" placeholder="Nomor Telepon" />
                            </div>
                            <input type="text" placeholder="Pesan" class="message_input" />
                            <div class="btn-box">
                                <button>
                                    Kirim
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end contact section -->

    <!-- client section -->

    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    TESTIMONI
                </h2>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('') }}storage/sipeka_template/images/client.jpg"
                                    alt="" />
                            </div>
                            <div class="client_detail">
                                <div class="client_name">
                                    <div class="client_info">
                                        <h4>
                                            Dr. MEURAH BUDIMAN, SH, M.Kum
                                        </h4>
                                        <span>
                                            Pj. Bupati Kab. Aceh Tamiang
                                        </span>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                                <p>
                                   Saya sangat mendukung gagasan dan pengembangan  sistem informasi penangulangan kemiskinan di Kab. Aceh Tamiang, saya berharap Pemerintah Kab. Aceh Tamiang memiliki basis datanya sendiri untuk memaksimalkan upaya-upaya kebijakan yang terarah dan berdampak kepada seluruh masyarakat Kab. Aceh Tamiang terutama dalam hal penanganan kemiskinan.
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('') }}storage/sipeka_template/images/client1.jpg"
                                    alt="" />
                            </div>
                            <div class="client_detail">
                                <div class="client_name">
                                    <div class="client_info">
                                        <h4>
                                            Drs. ASRA
                                        </h4>
                                        <span>
                                            Sekretaris Daerah Kab. Aceh Tamiang
                                        </span>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                                <p>
                                   Penangulangan kemiskinan di Kab. Aceh Tamiang merupakan salah satu prioritas Pemerintah Kab. Aceh Tamiang, saya berharap dengan adanya prototype (bentuk awal) sistem informasi Pengentasan kemiskinan ini dapat terus memacu keakuratan kita dalam mendata masyarakat miskin yang akurat dan tepat.
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('') }}storage/sipeka_template/images/client2.jpg"
                                    alt="" />
                            </div>
                            <div class="client_detail">
                                <div class="client_name">
                                    <div class="client_info">
                                        <h4>
                                            Ir. MUHAMMAD ZEIN
                                        </h4>
                                        <span>
                                            Ka. BAPPEDA Kab. Aceh Tamiang
                                        </span>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                                <p>
                                    Saya berharap prototype Sistem Informasi Pengentasan Kemiskinan Kab. Aceh Tamiang ini dapat mendukung kinerja di organisasi BAPPEDA dalam melakukan perencanaan dan pengentasan kemiskinan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
            </div>
        </div>
    </section>

    <!-- end client section -->

    <!-- info section -->

    <section class="info_section layout_padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="info_contact">
                        <h5>
                            Alamat 
                        </h5>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Lokasi
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +62 852-6004-9435
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    sipeka@acehtamiangkab.go.id
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="info_social">
                        <a href="">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info_link_box">
                        <h5>
                            Navigasi
                        </h5>
                        <div class="info_links">
                            <a class="active" href="index.html"> <i class="fa fa-angle-right"
                                    aria-hidden="true"></i> Beranda <span class="sr-only">(current)</span></a>
                            <a class="" href="about.html"> <i class="fa fa-angle-right"
                                    aria-hidden="true"></i> Tentang kami</a>
                            <a class="" href="why.html"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                Mengapa Sikatebuat </a>
                            <a class="" href="team.html"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                Tim Kami</a>
                            <a class="" href="testimonial.html"> <i class="fa fa-angle-right"
                                    aria-hidden="true"></i> Testimoni</a>
                            <a class="" href="contact.html"> <i class="fa fa-angle-right"
                                    aria-hidden="true"></i> Hubungi Kami</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>
                        Newsletter
                    </h5>
                    <form action="">
                        <input type="text" placeholder="Masukan Email Anda" />
                        <button type="submit">
                            Daftarkan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- end info section -->

    <!-- footer section -->
    <footer class="footer_section container-fluid">
        <p>
            &copy; <span id="displayYear"></span> All Rights Reserved. Design by
            <a href="https://html.design/">BAPPEDA Kab. Aceh Tamiang</a>
        </p>
    </footer>
    <!-- footer section -->

    <script src="{{ asset('') }}storage/sipeka_template/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('') }}storage/sipeka_template/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('') }}storage/sipeka_template/js/custom.js"></script>

</body>

</html>
