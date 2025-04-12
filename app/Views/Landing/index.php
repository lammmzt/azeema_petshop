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
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css" rel="stylesheet">
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
                    <?php 
                    if(session()->get('role') == '3') : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <span class="fa fa-user mr-2"></span> <?= session()->get('nama_user'); ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= base_url('LandingPage/Profile'); ?>">
                                Profile</a>
                            <a class="dropdown-item" href="<?= base_url('LandingPage/Keranjang'); ?>">
                                Keranjang<span class="badge badge-danger ml-2" id="jml_keranjang"></span></a>
                            <a class="dropdown-item" href="<?= base_url('LandingPage/Riwayat'); ?>">
                                Riwayat</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('Auth/logout'); ?>">Logout</a>
                        </div>
                    </li>
                    <?php 
                    else : ?>
                    <li class="text-white"><a data-toggle="modal" data-target="#exampleModal" href="#"
                            class="btn btn-primary mt-4 ml-2">
                            Login</a></li>
                    <?php endif; ?>
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
    <?php if ($main_menu != '') : ?>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?= base_url('LandingPage'); ?>">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span><?= $menu_aktif; ?> <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-0 bread"><?= $menu_aktif; ?></h1>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?= $this->renderSection('content'); ?>

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
                            href="#" target="_blank">Azzema Petshop</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>

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

    // hide alert
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 3000);
    });

    function getSweetAlert(type, title, text) {
        Swal.fire({
            icon: type,
            title: title,
            text: text,
            timer: 2000,
        })
    }

    // get jml keranjang form local storage
    function getJmlKeranjang() {
        let keranjang = JSON.parse(localStorage.getItem('keranjang'));
        if (keranjang) {
            $('#jml_keranjang').html(keranjang.length);
        } else {
            $('#jml_keranjang').html(0);
        }
    }
    getJmlKeranjang();
    // active class navbar
    $(document).ready(function() {
        $('.navbar-nav li').click(function() {
            $('.navbar-nav li').removeClass('active');
            $(this).addClass('active');
        });
    });
    </script>
    <?= $this->renderSection('script'); ?>
</body>

</html>