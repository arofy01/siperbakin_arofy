<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Siperbakin</title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/css/bootstrap.css">
    <!-- fonts awesome style -->
    <link href="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/css/style.css" rel="stylesheet">
    <!-- responsive style -->
    <link href="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/favicon.png" type="image/png">



    <link href="https://siperbakin.acehtamiangkab.go.id/storage/sidarendu_template/lib/animate/animate.min.css" rel="stylesheet">
    <link href="https://siperbakin.acehtamiangkab.go.id/storage/sidarendu_template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://siperbakin.acehtamiangkab.go.id/storage/sidarendu_template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
    <link href="https://siperbakin.acehtamiangkab.go.id/storage/sidarendu_template/css/style.css" rel="stylesheet">
    <link href="https://siperbakin.acehtamiangkab.go.id/storage/sidarendu_template/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">



    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-inner img {
            height: 620px;
            width: 1550px;
            object-fit: cover;
        }
    </style>

    <style>
        #map {
            height: 380px;
        }
    </style>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/58/10/intl/id_ALL/common.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/58/10/intl/id_ALL/util.js"></script>
</head>

<body>
    <!-- Header -->


    <nav class="navbar bg-dark bg-opacity-50 navbar-expand-sm text-center sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#"><b>SIPERBAKIN</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto me-4 my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#about">Tentang Kami</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Berita
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">MUSRENBANG RPKD 2024 DIMULAI</a></li>
                            <li><a class="dropdown-item" href="#">berita belum tersedia</a></li>
                            <li><a class="dropdown-item" href="#">berita belum tersedia</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contact-us">Contact Us</a>
                    </li>
                </ul>
                <div class="nav-item d-flex align-items-center">
                    <a href="https://siperbakin.acehtamiangkab.go.id/login" class="btn btn-success">Login</a>
                    <a class="nav-link text-white ms-2" href="#">/ Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Slider -->
    <section id="home" class="slider_section">
        <div id="companySlider" class="carousel slide" data-bs-ride="carousel">
            <!-- Welcome text dan tombol -->
            <div class="welcome-container position-absolute w-100 h-100" style="z-index: 2; top: 0; left: 0; background: rgba(0,0,0,0.7);">
                <div class="text-center position-absolute top-50 start-50 translate-middle w-100 p-5">
                    <h1 class="text-white mb-4">Selamat Datang di SIPERBAKIN</h1>
                    <p class="text-white mb-4 fs-4">Sistem Informasi Perencanaan Berbasis Koordinat Kabupaten Aceh Tamiang</p>
                
                   
                </div>
            </div>

            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/slider-img3.jpg" alt="Slide 1" class="d-block w-100">
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/slider-img.jpg" alt="Slide 2" class="d-block w-100">
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/slider-img3.jpg" alt="Slide 3" class="d-block w-100">
                </div>
            </div>
            
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#companySlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#companySlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Tambahkan CSS -->
    <style>
    .slider_section {
        margin-top: -56px;
        position: relative;
    }

    .carousel-inner img {
        height: 100vh;
        object-fit: cover;
        object-position: center;
    }

    .welcome-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .welcome-container h1 {
        font-size: 3.5rem;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        letter-spacing: 1px;
    }

    .welcome-container p {
        font-size: 1.5rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        line-height: 1.6;
    }

    .btn-lg {
        padding: 15px 40px;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
        font-size: 1.2rem;
    }

    .btn-lg:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .welcome-container h1 {
            font-size: 2.5rem;
        }
        
        .welcome-container p {
            font-size: 1.2rem;
        }
        
        .btn-lg {
            padding: 12px 30px;
            font-size: 1rem;
        }
    }
    </style>


    <!-- about section -->

    <section id="about" class="about_section mt-1 bg-warning">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box" style="text-decoration:white;">
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

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box mt-4 md-4 ml-4 mb-4">
                        <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/about-img.jpg" alt="">
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
                            <img class="img-fluid" src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/team-1.jpg" alt="">
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
                            <img class="img-fluid" src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/team-2.jpg" alt="">
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
                            <img class="img-fluid" src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/team-3.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Intan Farrah, S.IP
                                </h5>
                                <small>Analis Rencana dan&nbsp;Program</small>
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
                            <img class="img-fluid" src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/team-4.jpg" alt="">
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
                            <img class="img-fluid" src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/team-5.jpg" alt="">
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
                            <img class="img-fluid" src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/team-7.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Tanrizal, ST</h5>
                                <small>Perencana Ahli&nbsp;Muda</small>
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
                            <img class="img-fluid" src="{{ asset('storage/siperbakin_template/images/team-6.jpg') }}" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Feri Darmawan
                                </h5>
                                <small>Pengadministrasi&nbsp;umum</small>
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
                            <img class="img-fluid" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjLzZIerDGvKtYf7BIS8CGMIoQOzhHYSqgwajVTBoXIGUL7mKLbfO5iYmvo9RgSNoOboA8cabC-ys9m4K5LT1KCqbB_kn4W-h2wAb-fFkLJ6oA3-0pTM0ZVbqVB1XdHumpJ28G51m-fFrbTxeYgqsca6bGoPqwtQPqWMNb9GfhgSmGGL_4g2YQG45W2by4/s622/RURY%20ANDI%20NATHA%20ASMARA,%20ST.png" alt="" style="width: 100%; height: 300px; object-fit: cover;">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">RURY ANDI NATHA ASMARA, ST</h5>
                                <small>perencana ahli pertama</small>
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
            <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/help-img.jpg" alt="" />
            
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
                            <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/wedo-img2.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Pendataan (Collecting)

                            </h5>


                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="box pr-0 pr-lg-5">
                        <div class="img-box">
                            <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/wedo-img3.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Perencanaan (Planning)
                            </h5>

                            <p></p>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="box pr-0 pr-lg-5">
                        <div class="img-box">
                            <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/wedo-img4.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Evaluasi (Evaluating)
                            </h5>


                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="box pr-0 pr-lg-5">
                        <div class="img-box">
                            <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/wedo-img1.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Pelaporan (Reporting)
                            </h5>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end we do section -->

    <!-- news section -->

    <section id="news" class="about_section mt-3">
        <div class="container ">
        <div class="heading_container">
                <h2>
                    BERITA TERBARU
                </h2>

            </div>
            <div class="row mt-5 md-5 mb-5 ml-5">
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/news-img.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    


    <!-- client section -->

    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    TESTIMONI
                </h2>
            </div>
            <div class="carousel-wrap ">
                <div class="owl-carousel owl-loaded owl-drag">





                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-1052px, 0px, 0px); transition: 0.25s; width: 3682px;">
                            <div class="owl-item cloned" style="width: 516px; margin-right: 10px;">
                                <div class="item">
                                    <div class="box">
                                        <div class="client_id">
                                            <div class="img-box">
                                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/client-img2.jpg" alt="">
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
                            </div>
                            <div class="owl-item cloned" style="width: 516px; margin-right: 10px;">
                                <div class="item">
                                    <div class="box">
                                        <div class="client_id">
                                            <div class="img-box">
                                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/client-img3.jpg" alt="">
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
                            <div class="owl-item active" style="width: 516px; margin-right: 10px;">
                                <div class="item">
                                    <div class="box">
                                        <div class="client_id">
                                            <div class="img-box">
                                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/client-img1.jpg" alt="">
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
                            </div>
                            <div class="owl-item" style="width: 516px; margin-right: 10px;">
                                <div class="item">
                                    <div class="box">
                                        <div class="client_id">
                                            <div class="img-box">
                                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/client-img2.jpg" alt="">
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
                            </div>
                            <div class="owl-item" style="width: 516px; margin-right: 10px;">
                                <div class="item">
                                    <div class="box">
                                        <div class="client_id">
                                            <div class="img-box">
                                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/client-img3.jpg" alt="">
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
                            <div class="owl-item cloned" style="width: 516px; margin-right: 10px;">
                                <div class="item">
                                    <div class="box">
                                        <div class="client_id">
                                            <div class="img-box">
                                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/client-img1.jpg" alt="">
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
                            </div>
                            <div class="owl-item cloned" style="width: 516px; margin-right: 10px;">
                                <div class="item">
                                    <div class="box">
                                        <div class="client_id">
                                            <div class="img-box">
                                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/client-img2.jpg" alt="">
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
                            </div>
                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button></div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- end client section -->


    <!-- contact section -->
    <section id="contact-us" class="py-5">
        <!-- konten contact us -->
    </section>
    <section id="contact" class="contact_section layout_padding">
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
                                <input type="text" placeholder="Nama Lengkap ">
                            </div>
                            <div>
                                <input type="email" placeholder="Email">
                            </div>
                            <div>
                                <input type="text" placeholder="Nomor HP">
                            </div>
                            <div>
                                <input type="text" class="message-box" placeholder="Pesan">
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
                            <div id="map" class="leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0" style="position: relative;">
                                <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(-9px, 0px, 0px);">
                                    <div class="leaflet-pane leaflet-tile-pane">
                                        <div class="leaflet-layer " style="z-index: 1; opacity: 1;">
                                            <div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 20; transform: translate3d(0px, 0px, 0px) scale(1);"><img alt="" src="http://mt3.google.com/vt?lyrs=m&amp;x=6326&amp;y=3997&amp;z=13" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(114px, -93px, 0px); opacity: 1;"><img alt="" src="http://mt0.google.com/vt?lyrs=m&amp;x=6327&amp;y=3997&amp;z=13" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(370px, -93px, 0px); opacity: 1;"><img alt="" src="http://mt0.google.com/vt?lyrs=m&amp;x=6326&amp;y=3998&amp;z=13" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(114px, 163px, 0px); opacity: 1;"><img alt="" src="http://mt1.google.com/vt?lyrs=m&amp;x=6327&amp;y=3998&amp;z=13" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(370px, 163px, 0px); opacity: 1;"><img alt="" src="http://mt2.google.com/vt?lyrs=m&amp;x=6325&amp;y=3997&amp;z=13" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-142px, -93px, 0px); opacity: 1;"><img alt="" src="http://mt1.google.com/vt?lyrs=m&amp;x=6328&amp;y=3997&amp;z=13" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(626px, -93px, 0px); opacity: 1;"><img alt="" src="http://mt3.google.com/vt?lyrs=m&amp;x=6325&amp;y=3998&amp;z=13" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-142px, 163px, 0px); opacity: 1;"><img alt="" src="http://mt2.google.com/vt?lyrs=m&amp;x=6328&amp;y=3998&amp;z=13" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(626px, 163px, 0px); opacity: 1;"></div>
                                        </div>
                                    </div>
                                    <div class="leaflet-pane leaflet-overlay-pane"><svg pointer-events="none" class="leaflet-zoom-animated" width="890" height="456" viewBox="-65 -38 890 456" style="transform: translate3d(-65px, -38px, 0px);">
                                            <g>
                                                <path class="leaflet-interactive" stroke="red" stroke-opacity="1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="#f03" fill-opacity="0.5" fill-rule="evenodd" d="M378.5292984887492,190.28372782317456a1,1 0 1,0 2,0 a1,1 0 1,0 -2,0 "></path>
                                            </g>
                                        </svg></div>
                                    <div class="leaflet-pane leaflet-shadow-pane"><img src="https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png" class="leaflet-marker-shadow leaflet-zoom-animated" alt="" style="margin-left: -12px; margin-top: -41px; width: 41px; height: 41px; transform: translate3d(380px, 190px, 0px);"></div>
                                    <div class="leaflet-pane leaflet-marker-pane"><img src="https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="Marker" tabindex="0" role="button" style="margin-left: -12px; margin-top: -41px; width: 25px; height: 41px; transform: translate3d(380px, 190px, 0px); z-index: 190;"></div>
                                    <div class="leaflet-pane leaflet-tooltip-pane"></div>
                                    <div class="leaflet-pane leaflet-popup-pane"></div>
                                    <div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(1.61972e+06px, 1.02352e+06px, 0px) scale(4096);"></div>
                                </div>
                                <div class="leaflet-control-container">
                                    <div class="leaflet-top leaflet-left">
                                        <div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in" aria-disabled="false"><span aria-hidden="true">+</span></a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out" aria-disabled="false"><span aria-hidden="true">−</span></a></div>
                                    </div>
                                    <div class="leaflet-top leaflet-right"></div>
                                    <div class="leaflet-bottom leaflet-left"></div>
                                    <div class="leaflet-bottom leaflet-right">
                                        <div class="leaflet-control-attribution leaflet-control"><a href="https://leafletjs.com" title="A JavaScript library for interactive maps"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" class="leaflet-attribution-flag">
                                                    <path fill="#4C7BE1" d="M0 0h12v4H0z"></path>
                                                    <path fill="#FFD500" d="M0 4h12v3H0z"></path>
                                                    <path fill="#E0BC00" d="M0 7h12v1H0z"></path>
                                                </svg> Leaflet</a></div>
                                    </div>
                                </div>
                            </div>
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
                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/nav-bullet.png" alt="">
                                Beranda
                            </a>
                            <a class="" href="">
                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/nav-bullet.png" alt="">
                                Tentang Kami
                            </a>
                            <a class="" href="">
                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/nav-bullet.png" alt="">
                                Layanan
                            </a>
                            <a class="" href="l">
                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/nav-bullet.png" alt="">
                                Testimoni
                            </a>
                            <a class="" href="">
                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/nav-bullet.png" alt="">
                                Berita Terbaru
                            </a>
                            <a class="" href="">
                                <img src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/images/nav-bullet.png" alt="">
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
                        <input type="text" placeholder="Masukan Email">
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
                        © <span id="displayYear">2024</span> All Rights Reserved. Design by
                        <a href="https://html.design/">BAPPEDA ATAM</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer section -->

    <script src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/js/jquery-3.4.1.min.js"></script>
    <script src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://siperbakin.acehtamiangkab.go.id/storage/siperbakin_template/js/custom.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&amp;callback=myMap">
    </script>
    <!-- End Google Map -->


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const carousel = document.getElementById('companyCarousel');
        const bootstrapCarousel = new bootstrap.Carousel(carousel, {
            interval: 1000, // Interval in milliseconds
            ride: 'carousel'
        });
    </script>

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

    <script>
    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                const navbarHeight = document.querySelector('.navbar').offsetHeight;
                const targetPosition = targetElement.offsetTop - navbarHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });

                // Update active state
                document.querySelectorAll('.nav-link').forEach(link => {
                    link.classList.remove('active');
                });
                this.classList.add('active');
            }
        });
    });

    // Form submission handler
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // Add your form submission logic here
        alert('Terima kasih! Pesan Anda telah terkirim.');
        this.reset();
    });
    </script>

    <style>
    .navbar {
        z-index: 1030;
    }

    .navbar .nav-link:hover {
        color: #e9ecef !important;
    }

    .navbar .nav-link.active {
        color: #fff !important;
        font-weight: bold;
    }

    .dropdown-menu {
        background-color: rgba(33, 37, 41, 0.9);
    }

    .dropdown-item {
        color: white;
    }

    .dropdown-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
    }

    /* Tambahan untuk spacing */
    .navbar-nav {
        gap: 1rem; /* Memberikan jarak antar menu */
    }

    /* Contact Us styles */
    #contact-us {
        padding: 80px 0;
        background: linear-gradient(rgba(0,0,0,0.05), rgba(0,0,0,0.05));
    }

    #contact-us .card {
        border: none;
        border-radius: 15px;
    }

    #contact-us .form-control {
        border-radius: 8px;
        padding: 12px;
    }

    #contact-us .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(13,110,253,.15);
    }

    #contact-us .btn-primary {
        padding: 12px 40px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    #contact-us .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        #contact-us {
            padding: 40px 0;
        }
    }
    </style>

    <style>
    html {
        scroll-padding-top: 70px; /* Sesuaikan dengan tinggi navbar */
    }

    #news {
        scroll-margin-top: 70px; /* Sesuaikan dengan tinggi navbar */
    }
    </style>

</body>

</html>