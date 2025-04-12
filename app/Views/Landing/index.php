<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?= $title; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/Landing/'); ?>css/animate.css">

    <link rel="stylesheet" href="<?= base_url('assets/Landing/'); ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/Landing/'); ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/Landing/'); ?>css/magnific-popup.css">


    <link rel="stylesheet" href="<?= base_url('assets/Landing/'); ?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/Landing/'); ?>css/jquery.timepicker.css">

    <link rel="stylesheet" href="<?= base_url('assets/Landing/'); ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/Landing/'); ?>css/style.css">
</head>

<body>

    <div class="wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <p class="mb-0 phone pl-md-2">
                        <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span>085200000075</a>
                        <a href="#"><span class="fa fa-paper-plane mr-1"></span> az_petshop@email.com</a>
                    </p>
                </div>
                <div class="col-md-6 d-flex justify-content-md-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('LandingPage'); ?>"><span
                    class="flaticon-pawprint-1 mr-2"></span>AZ Petshop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#home" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#testimoni" class="nav-link">Testimoni</a></li>
                    <li class="nav-item"><a href="#layanan" class="nav-link">Layanan</a></li>
                    <li class="nav-item"><a href="#faq" class="nav-link">FAQ</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
                    <li class="text-white"><a data-toggle="modal" data-target="#exampleModal" href="#"
                            class="btn btn-primary mt-4 ml-2">
                            Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
    html {
        scroll-behavior: smooth;
    }

    .navbar.fixed-top {
        background-color: #000;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    </style>
    <!-- END nav -->
    <div class="hero-wrap js-fullheight"
        style="background-image: url('<?= base_url('assets/Landing/'); ?>images/bg_1.jpg');"
        data-stellar-background-ratio="0.5" id="home">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                data-scrollax-parent="true">
                <div class="col-md-11 ftco-animate text-center">
                    <h1 class="mb-4">
                        Perawatan Hewan Peliharaan Terbaik di Kota Pekalongan
                    </h1>
                    <p><a href="#" class="btn btn-primary mr-md-4 py-3 px-4">Learn more <span
                                class="ion-ios-arrow-forward"></span></a></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light ftco-no-pt ftco-intro">
        <div class="container">
            <div class="row justify-content-center">
                <?php 
                foreach($data_layanan as $dl) : ?>
                <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate my-4">
                    <div class="d-block services text-center my-4">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="<?= $dl['icon_layanan']; ?>"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading"><?= $dl['nama_layanan']; ?></h3>
                            <p>
                                <?= $dl['deskripsi_layanan']; ?>
                            </p>
                            <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span
                                    class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <style>

    </style>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container" id="about">
            <div class="row d-flex no-gutters">
                <div class="col-md-5 d-flex">
                    <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0"
                        style="background-image:url(<?= base_url('assets/Landing/'); ?>images/about-1.jpg);">
                    </div>
                </div>
                <div class="col-md-7 pl-md-5 py-md-5">
                    <div class="heading-section pt-md-5">
                        <h2 class="mb-4">Kenapa memilih kami?</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-stethoscope"></span></div>
                            <div class="text pl-3">
                                <h4>
                                    Saran Perawatan
                                </h4>
                                <p>
                                    Kami memberikan saran perawatan yang terbaik untuk hewan peliharaan anda.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-customer-service"></span></div>
                            <div class="text pl-3">
                                <h4>
                                    Layanan Pelanggan
                                </h4>
                                <p>
                                    Kami memberikan layanan pelanggan yang terbaik untuk anda.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-emergency-call"></span></div>
                            <div class="text pl-3">
                                <h4>
                                    Penanganan Darurat
                                </h4>
                                <p>
                                    Kami memberikan penanganan darurat yang terbaik untuk hewan peliharaan anda.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-veterinarian"></span></div>
                            <div class="text pl-3">
                                <h4>
                                    Profesional
                                </h4>
                                <p>
                                    Kami memiliki petugas yang profesional dalam menangani hewan peliharaan anda.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter" id="section-counter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="50">0</strong>
                        </div>
                        <div class="text">
                            <span>Layanan</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="8500">0</strong>
                        </div>
                        <div class="text">
                            <span>Petugas</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="20">0</strong>
                        </div>
                        <div class="text">
                            <span>Pelanggan</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="50">0</strong>
                        </div>
                        <div class="text">
                            <span>
                                Pesanan
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="ftco-section testimony-section"
        style="background-image: url(<?= base_url('assets/Landing/'); ?>'<?= base_url('assets/Landing/'); ?>images/bg_2.jpg');"
        id="testimoni">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2>Testimoni Pelanggan</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-quote-left"></span></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url(<?= base_url('assets/Landing/'); ?>images/person_1.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-quote-left"></span></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url(<?= base_url('assets/Landing/'); ?>images/person_2.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-quote-left"></span></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url(<?= base_url('assets/Landing/'); ?>images/person_3.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-quote-left"></span></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url(<?= base_url('assets/Landing/'); ?>images/person_1.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-quote-left"></span></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url(<?= base_url('assets/Landing/'); ?>images/person_2.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light" id="layanan">
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2>Layanan Kami</h2>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-4 ftco-animate">
                    <div class="block-7">
                        <div class="img"
                            style="background-image: url(<?= base_url('assets/Landing/'); ?>images/pricing-1.jpg);">
                        </div>
                        <div class="text-center p-4">
                            <span class="excerpt d-block">Personal</span>
                            <span class="price"><sup>$</sup> <span class="number">49</span> <sub>/mos</sub></span>

                            <ul class="pricing-text mb-5">
                                <li><span class="fa fa-check mr-2"></span>5 Dog Walk</li>
                                <li><span class="fa fa-check mr-2"></span>3 Vet Visit</li>
                                <li><span class="fa fa-check mr-2"></span>3 Pet Spa</li>
                                <li><span class="fa fa-check mr-2"></span>Free Supports</li>
                            </ul>

                            <a href="#" class="btn btn-primary d-block px-2 py-3">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="block-7">
                        <div class="img"
                            style="background-image: url(<?= base_url('assets/Landing/'); ?>images/pricing-2.jpg);">
                        </div>
                        <div class="text-center p-4">
                            <span class="excerpt d-block">Business</span>
                            <span class="price"><sup>$</sup> <span class="number">79</span> <sub>/mos</sub></span>

                            <ul class="pricing-text mb-5">
                                <li><span class="fa fa-check mr-2"></span>5 Dog Walk</li>
                                <li><span class="fa fa-check mr-2"></span>3 Vet Visit</li>
                                <li><span class="fa fa-check mr-2"></span>3 Pet Spa</li>
                                <li><span class="fa fa-check mr-2"></span>Free Supports</li>
                            </ul>

                            <a href="#" class="btn btn-primary d-block px-2 py-3">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="block-7">
                        <div class="img"
                            style="background-image: url(<?= base_url('assets/Landing/'); ?>images/pricing-3.jpg);">
                        </div>
                        <div class="text-center p-4">
                            <span class="excerpt d-block">Ultimate</span>
                            <span class="price"><sup>$</sup> <span class="number">109</span> <sub>/mos</sub></span>

                            <ul class="pricing-text mb-5">
                                <li><span class="fa fa-check mr-2"></span>5 Dog Walk</li>
                                <li><span class="fa fa-check mr-2"></span>3 Vet Visit</li>
                                <li><span class="fa fa-check mr-2"></span>3 Pet Spa</li>
                                <li><span class="fa fa-check mr-2"></span>Free Supports</li>
                            </ul>

                            <a href="#" class="btn btn-primary d-block px-2 py-3">Get Started</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <?php 
            foreach($data_layanan as $dl) : ?>
                <div class="col-md-4 ftco-animate">
                    <div class="block-7 shadow-sm">
                        <div class="img"
                            style="background-image: url(<?= base_url('assets/img/Layanan/'); ?><?= $dl['foto_layanan']; ?>);">
                        </div>
                        <div class="text-center p-4">
                            <span class="excerpt d-block"><?= $dl['nama_layanan']; ?></span>
                            <span class="price"><sup>Rp. </sup> <span
                                    class="number"><?= number_format($dl['harga_layanan'], 0, ',', '.'); ?></span>
                                <sub>/</sub> <?= $dl['satuan_layanan']; ?></span>

                            <!-- <span class="price"> <span
                                    class="number promo_number"><?= number_format($dl['harga_layanan'], 0, ',', '.'); ?></span> -->


                            <ul class="pricing-text mb-5">
                                <li><span class="fa fa-check mr-2"></span><?= $dl['deskripsi_layanan']; ?></li>
                            </ul>

                            <a href="#" class="btn btn-primary d-block px-2 py-3">Pesan Sekarang <span
                                    class="fa fa-chevron-right"></span></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <style>
    .number {
        font-size: 38px !important;
    }


    .promo_number {
        font-size: 20px !important;
    }
    </style>


    <section class="ftco-section bg-light ftco-faqs" id="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-md-last">
                    <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0"
                        style="background-image:url(<?= base_url('assets/Landing/'); ?>images/about.jpg);">
                        <a href="https://vimeo.com/45830194"
                            class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                            <span class="fa fa-play"></span>
                        </a>
                    </div>
                    <div class="d-flex mt-3">
                        <!-- <div class="img img-2 mr-md-2"
                            style="background-image:url(<?= base_url('assets/Landing/'); ?>images/about-2.jpg);"></div>
                        <div class="img img-2 ml-md-2"
                            style="background-image:url(<?= base_url('assets/Landing/'); ?>images/about-3.jpg);"></div> -->
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="heading-section mb-5 mt-5 mt-lg-0">
                        <h2 class="mb-3">Pertanyaan yang sering diajukan</h2>
                        <p>
                            Berikut adalah beberapa pertanyaan yang sering diajukan oleh pelanggan kami.
                        </p>
                    </div>
                    <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header p-0" id="headingTwo" role="tab">
                                <h2 class="mb-0">
                                    <button href="#collapseTwo"
                                        class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link"
                                        data-parent="#accordion" data-toggle="collapse" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        <p class="mb-0">Bagaimana cara mendaftar akun?</p>
                                        <i class="fa" aria-hidden="true"></i>
                                    </button>
                                </h2>
                            </div>
                            <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="card-body py-3 px-0">
                                    <ol>
                                        <li>Tekan tombol login/daftar di pojok kanan atas</li>
                                        <li>Pilih daftar akun</li>
                                        <li>Isi formulir pendaftaran</li>
                                        <li>Selesai</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header p-0" id="headingOne">
                                <h2 class="mb-0">
                                    <button href="#collapseOne"
                                        class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link"
                                        data-parent="#accordion" data-toggle="collapse" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        <p class="mb-0">
                                            Bagaimana cara pemesanan layanan?
                                        </p>
                                        <i class="fa" aria-hidden="true"></i>
                                    </button>
                                </h2>
                            </div>
                            <div class="collapse" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body py-3 px-0">
                                    <ol>
                                        <li>Buka website <a href="https://azema-petshop.com">azema-petshop.com</a></li>
                                        <li>Login atau daftar akun jika belum memiliki akun</li>
                                        <li>Pilih layanan yang diinginkan</li>
                                        <li>Isi formulir pemesanan</li>
                                        <li>Selesaikan pembayaran</li>
                                        <li>Selesai</li>
                                    </ol>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header p-0" id="headingThree" role="tab">
                                <h2 class="mb-0">
                                    <button href="#collapseThree"
                                        class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link"
                                        data-parent="#accordion" data-toggle="collapse" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <p class="mb-0">
                                            Apa yang dilakukan setelah pemesanan layanan?
                                        </p>
                                        <i class="fa" aria-hidden="true"></i>
                                    </button>
                                </h2>
                            </div>
                            <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="card-body py-3 px-0">
                                    <ol>
                                        <li>Menunggu konfirmasi petugas</li>
                                        <li>Datang ke azeema petshop atau menunggu petugas datang ke rumah</li>
                                        <li>Selesai</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">Azeema Petshop</h2>
                    <p>
                        Petshop terbaik di kota Pekalongan yang memberikan layanan terbaik untuk hewan peliharaan anda.
                    </p>
                    <ul class="ftco-footer-social p-0">
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
                                title="Twitter"><span class="fa fa-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
                                title="Facebook"><span class="fa fa-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
                                title="Instagram"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">Kontak</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon fa fa-map"></span><span class="text">Jl. Hos Cokroaminoto Gg. 14,
                                    Kuripan Lor, Kec. Pekalongan Sel., Kota Pekalongan</span></li>
                            <li><a href="#"><span class="icon fa fa-phone"></span><span
                                        class="text">085200000075</span></a></li>
                            <li><a href="#"><span class="icon fa fa-paper-plane"></span><span
                                        class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-4 mb-md-0">
                    <h2 class="footer-heading">Lokasi</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7683686718924!2d109.67345827483543!3d-6.9182720930813515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70256e09e8cbdf%3A0xc7e37c3be73febe3!2sAZEEMA%20PETSHOP%201!5e0!3m2!1sid!2sid!4v1742686616024!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
                    <h2 class="footer-heading">Quick Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Home</a></li>
                        <li><a href="#" class="py-2 d-block">About</a></li>
                        <li><a href="#" class="py-2 d-block">Services</a></li>
                        <li><a href="#" class="py-2 d-block">Works</a></li>
                        <li><a href="#" class="py-2 d-block">Blog</a></li>
                        <li><a href="#" class="py-2 d-block">Contact</a></li>
                    </ul>
                </div> -->

            </div>
            <div class="row mt-5">
                <div class="col-md-12 text-center">

                    <p class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved | made with <i class="fa fa-heart" aria-hidden="true"></i> by <a
                            href=#" target="_blank">Azzema Petshop</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>




    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg>
    </div>

    <!-- modal login -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login / Daftar Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center justify-content-center">
                            <ul class="nav nav-pills mb-3 px-2 mx-2" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation" style="width: 50%;">
                                    <button class="nav-link active border-0 px-0" id="login-tab" data-toggle="pill"
                                        data-target="#login" type="button" role="tab" aria-controls="login"
                                        style="width: 100%;" aria-selected="true">
                                        <i class="fa fa-sign-in"></i> Login
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation" style="width: 50%;">
                                    <button class="nav-link border-0 px-0" id="daftar_akun-tab" data-toggle="pill"
                                        data-target="#daftar_akun" type="button" role="tab" aria-controls="daftar_akun"
                                        style="width: 100%;" aria-selected="false"> <i class="fa fa-user-plus"></i>
                                        Daftar Akun
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <!-- form login -->
                            <form class="px-4 py-3" action="<?= base_url('Auth/login'); ?>" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required
                                        placeholder="Masukkan username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required
                                        placeholder="Masukkan password">
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mt-2">Login</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="daftar_akun" role="tabpanel" aria-labelledby="daftar_akun-tab">
                            <form action="<?= base_url('Users/Simpan'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 mb-2">
                                            <label for="">Username</label>
                                            <input type="text" name="username" class="form-control"
                                                placeholder="Username">

                                            <!-- validation -->
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('username'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password">
                                            <!-- validation -->
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label for="">Nama User</label>
                                            <input type="text" name="nama_user" class="form-control"
                                                placeholder="Nama User">
                                            <!-- validation -->
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_user'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label for="">Role</label>
                                            <select name="role" class="form-control">
                                                <option value="">-- Pilih Role --</option>
                                                <option value="1">Owner</option>
                                                <option value="2">Admin</option>
                                                <option value="3">User</option>
                                                <!-- validation -->
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('role'); ?>
                                                </div>
                                            </select>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label for="">No Hp</label>
                                            <input type="text" name="no_hp_user" class="form-control"
                                                placeholder="No Hp">
                                            <!-- validation -->
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('no_hp_user'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mt-2">Daftar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/Landing/'); ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/jquery.easing.1.3.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/jquery.stellar.min.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/jquery.animateNumber.min.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/bootstrap-datepicker.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/jquery.timepicker.min.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="<?= base_url('assets/Landing/'); ?>js/google-map.js"></script>
    <script src="<?= base_url('assets/Landing/'); ?>js/main.js"></script>
    <script>
    // when scrole add navbar fixed top and bg blur
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.navbar').addClass('fixed-top');
            $('.navbar').addClass('bg-blur');
        } else {
            $('.navbar').removeClass('fixed-top');
            $('.navbar').removeClass('bg-blur');
        }
    });

    // active class navbar
    $(document).ready(function() {
        $('.navbar-nav li').click(function() {
            $('.navbar-nav li').removeClass('active');
            $(this).addClass('active');
        });
    });
    </script>
</body>

</html>