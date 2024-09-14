<!DOCTYPE html>
<html lang="en">

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

    <title></title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    


    {{-- Tembahan dari serdadu template --}}
    <link href="{{ asset('') }}storage/sidarendu_template/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('') }}storage/sidarendu_template/lib/owlcarousel/assets/owl.carousel.min.css"
        rel="stylesheet">
    <link href="{{ asset('') }}storage/sidarendu_template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
        rel="stylesheet" />
    <link href="{{ asset('') }}storage/sidarendu_template/css/style.css" rel="stylesheet">
    <link href="{{ asset('') }}storage/sidarendu_template/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    {{-- CSS dan JS Leafletjs --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    {{-- CSS untuk tinggi peta --}}
    <style>
        #map {
            height: 380px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            {{-- <nav class="navbar navbar-expand-lg custom_nav-container">
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
                        <a class="active" href="">
                            Beranda
                        </a>
                        <a class="" href="">
                            Tentang Kami
                        </a>
                        <a class="" href="">
                            Layanan
                        </a>
                        <a class="" href="">
                            Testimoni
                        </a>
                        <a class="" href="">
                            Berita Terbaru
                        </a>
                        <a class="" href="">
                            Hubungi Kami
                        </a>
                        <a class="" href="/login">
                            Login
                        </a>
                    </div>
                </div>
                <a class="navbar-brand" href="index.html">
                    <span>
                        Siperbakin
                    </span>
                </a>
                <div class="user_option">
                    <form class="form-inline">
                        <button class="btn  nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    <a href="">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="name_style">
                    {{-- <h6>
                       
                    </h6> --}}
                </div>
            </nav> --}}
        </header>
        <!-- end header section -->
        <!-- slider section -->
        {{-- <section class="slider_section position-relative">
            <div class="box">
                <div class="detail-box">
                    <a class="navbar-brand" href="index.html">
                        <span>
                            Siperbakin
                        </span>
                    </a>
                    <div class="carousel slide slider_text_carousel" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="heading_box">
                                    <h1>
                                        <span>
                                            Sistem
                                        </span>
                                        <span>
                                            Informasi
                                        </span>
                                        <span>
                                            Perencanaan
                                        </span>
                                        <span>
                                            Berbasis
                                        </span>
                                        <span>
                                            Koordinat
                                        </span>
                                    </h1>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="heading_box">
                                    <h1>
                                        <span>

                                            Menyajikan Data Infrastruktur
                                        </span>
                                        <span>
                                            Perumahan dan
                                        </span>
                                        <span>
                                            Pemukiman
                                        </span>

                                    </h1>
                                </div>
                            </div>

                            

                            <div class="carousel-item">
                                <div class="heading_box">
                                    <h1>
                                        <span>
                                            Menyajikan data Infrastuktur Perhubungan
                                        </span>
                                        <span>
                                            Transportasi dan
                                        </span>
                                      
                                        <span>
                                            Komunikasi
                                        </span>

                                    </h1>
                                </div>
                            </div>


                            {{-- <div class="carousel-item">
                                <div class="heading_box">
                                    <h1>
                                        <span>
                                            Mempermudah Penataan
                                        </span>
                                        <span>
                                            Wilayah dan
                                        </span>
                                       
                                        <span>
                                            Lingkungan
                                        </span>
                                        <span>
                                            Hidup
                                        </span>
                                    </h1>
                                </div>
                            </div> --}}

                        </div>
                    </div>


                    {{-- <div class="btn-box">
            <a href="" class="btn-1">
              Contact Us
            </a>
            <a href="" class="btn-2">
              Read More
            </a>
          </div> --}}

                </div>
                <div class="img-box">
                    <div class="carousel slide slider_image_carousel carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('') }}storage/siperbakin_template/images/slider-img.jpg"
                                    alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('') }}storage/siperbakin_template/images/slider-img2.jpg"
                                    alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('') }}storage/siperbakin_template/images/slider-img3.jpg"
                                    alt="">
                            </div>
                            {{-- <div class="carousel-item">
                                <img src="{{ asset('') }}storage/siperbakin_template/images/slider-img4.jpg"
                                    alt="">
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- end slider section -->
    </div>




    <!-- feature section -->

    {{-- <section class="feature_section ">
        <div class="carousel_btn-box">
            <a class="slider_btn_prev" href="" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="slider_btn_next" href="" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container-fluid service_container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="box">
                        <div class="number_box">
                            <h5>
                                01
                            </h5>
                        </div>
                        <h4>
                            Kebijakan
                        </h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box">
                        <div class="number_box">
                            <h5>
                                02
                            </h5>
                        </div>
                        <h4>
                            Perencanaan
                        </h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box">
                        <div class="number_box">
                            <h5>
                                03
                            </h5>
                        </div>
                        <h4>
                            Pengembangan Wilayah
                        </h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box">
                        <div class="number_box">
                            <h5>
                                04
                            </h5>
                        </div>
                        <h4>
                            Bimbingan & Konsultasi
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- end feature section -->




    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Tentang Siperbakin
                            </h2>
                        </div>
                        <p>
                            Siperbakin adalah sebuah Sistem Informasi Perencanaan Berbasis Koordinat (geospatial) yang dikembangkan oleh Pemerintah Kab. Aceh Tamiang melalui Badan Perencana dan Pembangunan Daerah (BAPPEDA)
                            dalam rangka untuk mendata Infrastruktur yang telah ada / dimiliki oleh Pemerintah Kabupaten Aceh Tamiang, yang mana sistem informasi ini dapat membantu atau mempermudah Badan Perencana dan Pembangunan Daerah Kab. Aceh Tamiang dalam merumuskan berbagai kebijakan teknis, perencanaan, koordinasi dan
                            konsultasi, Sistem informasi ini akan fokus pada penyediaan data Infrastruktur yang telah ada di Kabupaten Aceh Tamiang.
                        </p>
                        {{-- <a href="">
              Read More
            </a> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <div class="stripe_design sd1"></div>
                        <div class="stripe_design sd2"></div>
                        <div class="stripe_design sd3"></div>
                        <div class="stripe_design sd4"></div>
                        <div class="stripe_design sd5"></div>
                        <div class="stripe_design sd6"></div>
                        <img src="{{ asset('') }}storage/siperbakin_template/images/about-img.jpg"
                            alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="heading_container">
                    <h2>
                        TIM KAMI
                    </h2>
                </div>
                <br>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid"
                                src="{{ asset('') }}storage/siperbakin_template/images/team-1.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">SAFWAN ARDY SE M.Si</h5>
                                <small>Kepala Bidang Infrastruktur dan Kewilayahan </small>
                            </div>
                            <div class="bg-primary">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid"
                                src="{{ asset('') }}storage/siperbakin_template/images/team-2.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">INDRA GUNAWAN MA S.Kom</h5>
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
                            <img class="img-fluid"
                                src="{{ asset('') }}storage/siperbakin_template/images/team-3.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Intan Farrah, S.IP
                                </h5>
                                <small>Analis Rencana dan Program</small>
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
                            <img class="img-fluid"
                                src="{{ asset('') }}storage/siperbakin_template/images/team-4.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">MUHAMMAD KAUTSAR RIZKI S.T.</h5>
                                <small>Analis Pengembangan Infrastruktur</small>
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
                            <img class="img-fluid"
                                src="{{ asset('') }}storage/siperbakin_template/images/team-5.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">SITTI AMINAH, SE
                                </h5>
                                <small>Analisis Perencanaan</small>
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
                            <img class="img-fluid"
                                src="{{ asset('') }}storage/siperbakin_template/images/team-6.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Tanrizal, ST</h5>
                                <small>Perencana Ahli Muda</small>
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
                            <img class="img-fluid"
                                src="{{ asset('') }}storage/siperbakin_template/images/team-7.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Feri Darmawan
                                </h5>
                                <small>Pengadministrasi umum</small>
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




    <!-- help section -->

    <!-- <section class="help_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Let Us Help <br>
                You Get More
              </h2>
            </div>
            <p>
              using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a searchusing 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search
            </p>
            <a href="">
              See Videos
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{ asset('') }}storage/siperbakin_template/images/help-img.jpg" alt="" />
            {{-- <div class="play_btn">
              <button>
                <i class="fa fa-play" aria-hidden="true"></i>
              </button>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section> -->

    <!-- end help section -->


    <!-- we do section -->

    <section class="wedo_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    APA YANG KAMI LAKUKAN
                </h2>
                <p>
                    Badan Perencanaan dan Pembangunan Kab. Aceh Tamiang melalui Bidang Infrastruktur dan Kewilayahan
                    melakukan pendataan, perencanaan, evaluasi dan pelaporan terhadap Infrastruktur dan Kewilayahan.

                </p>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="box pr-0 pr-lg-5">
                        <div class="img-box">
                            <img src="{{ asset('') }}storage/siperbakin_template/images/wedo-img2.png"
                                alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Pendataan (Collecting)
                               
                            </h5>
                            {{-- <p>
                                passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
                                the middle of text. All the Lorem Ipsum
                            </p> --}}
                            {{-- <a href="">
                                Selanjutnya
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="box pr-0 pr-lg-5">
                        <div class="img-box">
                            <img src="{{ asset('') }}storage/siperbakin_template/images/wedo-img3.png"
                                alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Perencanaan (Planning)
                            </h5>
                            {{-- <p>
                                passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
                                the middle of text. All the Lorem Ipsum --}}
                            </p>
                            {{-- <a href="">
                                Selanjutnya
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="box pr-0 pr-lg-5">
                        <div class="img-box">
                            <img src="{{ asset('') }}storage/siperbakin_template/images/wedo-img4.png"
                                alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Evaluasi (Evaluating)
                            </h5>
                            {{-- <p>
                                passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
                                the middle of text. All the Lorem Ipsum
                            </p> --}}
                            {{-- <a href="">
                                Selanjutnya
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="box pr-0 pr-lg-5">
                        <div class="img-box">
                            <img src="{{ asset('') }}storage/siperbakin_template/images/wedo-img1.png"
                                alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Pelaporan (Reporting)
                            </h5>
                            {{-- <p>
                                passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
                                the middle of text. All the Lorem Ipsum
                            </p> --}}
                            {{-- <a href="">
                                Selanjutnya
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end we do section -->

    <!-- news section -->

    <section class="news_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container">
                <h2>
                    BERITA TERBARU
                </h2>
                {{-- <p>
                    Content here, content here', making it look like readable English. Many desktop publishing packages
                    and web page editors now
                </p> --}}
            </div>
            <div class="row">
                <div class="col-lg-6 ">
                    <div class="detail_container">
                        <div class="detail-box">
                            <h4>
                                MUSRENBANG RKPD 2024 DIMULAI
                            </h4>
                            <div class="news_social">
                                <a href="">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <span>
                                        Like
                                    </span>
                                </a>
                                <a href="">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <span>
                                        Comment
                                    </span>
                                </a>
                                <a href="">
                                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    <span>
                                        Share
                                    </span>
                                </a>
                            </div>
                            <p>
                                Aceh Tamiang: Pelaksanaan Musyawarah Perencanaan Pembangunan (Musrenbang) RKPD tahun 2024 di 12 Kecamatan dalam Kabupaten Aceh Tamiang dimulai hari ini. Dengan mengusung tema “Percepatan Penurunan Kemiskinan, Meningkatkan Kualitas Pembangunan Manusia, dan Mensukseskan Pelaksanaan Pemilu Serentak tahun 2024”, sebanyak 3 Kecamatan yaitu Kecamatan Sekerak, Kecamatan Kejuruan Muda dan Kecamatan Banda Mulia melaksanakan kegiatan ini serentak pada Selasa (28/2/23).

                                <br>
                                Mewakili Pj. Bupati Aceh Tamiang, Sekda Aceh Tamiang Drs. Asra membuka langsung kegiatan Musrenbang RKPD tahun 2024 di Aula Kantor Camat Sekerak. Dalam arahannya, Asra menyampaikan agar kiranya dalam musyawarah ini, usulan-usulan program pembangunan yang direncanakan bisa selaras dengan kegiatan pembangunan daerah dengan sasaran dan prioritas pembangunan nasional, provinsi dan kabupaten. 
                            </p>
                        </div>
                        <div class="btn-box">
                            <a href="">
                                Selanjutnya
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="img-box">
                        <img src="{{ asset('') }}storage/siperbakin_template/images/news-img.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end news section -->


    <!-- client section -->

    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    TESTIMONI
                </h2>
            </div>
            <div class="carousel-wrap ">
                <div class="owl-carousel">
                    <div class="item">
                        <div class="box">
                            <div class="client_id">
                                <div class="img-box">
                                    <img src="{{ asset('') }}storage/siperbakin_template/images/client-img1.jpg"
                                        alt="">
                                </div>
                                <div class="client_detail">
                                    <h5>
                                        Dr. MEURAH BUDIMAN, SH, M.Kum
                                    </h5>
                                    <h6>
                                        Pj. Bupati Aceh Tamiang
                                    </h6>
                                </div>
                            </div>
                            <div class="client_text">
                                <p>
                                    Saya sangat mendukung gagasan dan pengembangan prototype (bentuk awal) dari sistem
                                    informasi perencanaan berbasis koordinat ini, saya berharap Pemerintah
                                    Kab. Aceh Tamiang memiliki sebuah sistem informasi yang baik untuk memaksimalkan
                                    upaya-upaya perencanaan dan pengembangan wilayah di Kab. Aceh Tamiang.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="box">
                            <div class="client_id">
                                <div class="img-box">
                                    <img src="{{ asset('') }}storage/siperbakin_template/images/client-img2.jpg"
                                        alt="">
                                </div>
                                <div class="client_detail">
                                    <h5>
                                        Drs. ASRA
                                    </h5>
                                    <h6>
                                        Sekretaris Daerah
                                    </h6>
                                </div>
                            </div>
                            <div class="client_text">
                                <p>
                                    Semoga bentuk awal (prototype) dari sistem informasi perencanaan berbasis koordinat
                                    ini dapat mendukung efektivitas perencanaan dan pembangunan di Kab. Aceh Tamiang,
                                    kedepannya kita dapat menginventarisir dan mengevaluasi semua
                                    infrastruktur yang ada. Saya
                                    ucapkan sukses untuk pengembangan selanjutnya Sistem Informasi Perencanaan Berbasis
                                    Koordinat ini.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="box">
                            <div class="client_id">
                                <div class="img-box">
                                    <img src="{{ asset('') }}storage/siperbakin_template/images/client-img3.jpg"
                                        alt="">
                                </div>
                                <div class="client_detail">
                                    <h5>
                                        Ir. MUHAMMAD ZEIN
                                    </h5>
                                    <h6>
                                        Ka. BAPPEDA Kab. Aceh Tamiang
                                    </h6>
                                </div>
                            </div>
                            <div class="client_text">
                                <p>
                                    Semoga bentuk awal (prototype) dari sistem informasi perencanaan berbasis koordinat
                                    ini dapat mendukung efektivitas perencanaan dan pembangunan di Kab. Aceh Tamiang,
                                    kedepannya kita dapat menginventarisir dan mengevaluasi semua
                                    infrastruktur yang ada. Saya
                                    ucapkan sukses untuk pengembangan selanjutnya Sistem Informasi Perencanaan Berbasis
                                    Koordinat ini.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end client section -->


    <!-- contact section -->

    <section class="contact_section layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-lg-4 offset-md-1 offset-lg-2">
                    <div class="form_container">
                        <div class="heading_container">
                            <h2>
                                HUBUNGI KAMI
                            </h2>
                        </div>
                        <form action="#">
                            <div>
                                <input type="text" placeholder="Nama Lengkap " />
                            </div>
                            <div>
                                <input type="email" placeholder="Email" />
                            </div>
                            <div>
                                <input type="text" placeholder="Nomor HP" />
                            </div>
                            <div>
                                <input type="text" class="message-box" placeholder="Pesan" />
                            </div>
                            <div class="d-flex ">
                                <button>
                                    KIRIM
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6  px-0">
                    <div class="map_container">
                        <div class="map">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end contact section -->


    <!-- info section -->

    <section class="info_section layout_padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="info_contact">
                        <h4 style="color:white">
                            Alamat
                        </h4>
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
                                    Hubungi : +62 852 7576 5756
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    siperbakin@acehtamiangkab.go.id
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
                <div class="col-md-3">
                    <div class="info_link_box">
                        <h4 style="color:white">
                            Link
                        </h4>
                        <div class="info_links">
                            <a class="active" href="">
                                <img src="{{ asset('') }}storage/siperbakin_template/images/nav-bullet.png"
                                    alt="">
                                Beranda
                            </a>
                            <a class="" href="">
                                <img src="{{ asset('') }}storage/siperbakin_template/images/nav-bullet.png"
                                    alt="">
                                Tentang Kami
                            </a>
                            <a class="" href="">
                                <img src="{{ asset('') }}storage/siperbakin_template/images/nav-bullet.png"
                                    alt="">
                                Layanan
                            </a>
                            <a class="" href="l">
                                <img src="{{ asset('') }}storage/siperbakin_template/images/nav-bullet.png"
                                    alt="">
                                Testimoni
                            </a>
                            <a class="" href="">
                                <img src="{{ asset('') }}storage/siperbakin_template/images/nav-bullet.png"
                                    alt="">
                                Berita Terbaru
                            </a>
                            <a class="" href="">
                                <img src="{{ asset('') }}storage/siperbakin_template/images/nav-bullet.png"
                                    alt="">
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info_detail">
                        <h4 style="color:white">
                            Informasi
                        </h4>
                        <p>
                            Sistem Informasi Perencanaan berbasis Koordinat ini masih dalam betuk awal/permulaan
                            (prototype) dan akan terus dikembangkan dimasa depan.
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4 style="color:white">
                        Langganan
                    </h4>
                    <form action="#">
                        <input type="text" placeholder="Masukan Email" />
                        <button type="submit">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- end info section -->

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <p>
                        &copy; <span id="displayYear"></span> All Rights Reserved. Design by
                        <a href="https://html.design/">BAPPEDA ATAM</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer section -->

    <script src="{{ asset('') }}storage/siperbakin_template/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('') }}storage/siperbakin_template/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('') }}storage/siperbakin_template/js/custom.js"></script>

    
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

    {{-- Script leafletJs --}}
    <script>
        var map = L.map('map').setView([4.2979207, 98.043628], 13);

        // var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     maxZoom: 19,
        //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        // }).addTo(map);

        googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);


        var marker = L.marker([4.2979207, 98.043628]).addTo(map);

        var circle = L.circle([4.2979207, 98.043628], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 10
        }).addTo(map);

        // var polygon = L.polygon([
        //     [51.509, -0.08],
        //     [51.503, -0.06],
        //     [51.51, -0.047]
        // ]).addTo(map);
    </script>

</body>

</html>
