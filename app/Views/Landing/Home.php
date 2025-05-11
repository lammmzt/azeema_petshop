<?= $this->extend('Landing/index'); ?>
<?= $this->section('content'); ?>

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
<!-- 
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
</section> -->

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

                        <a href="<?= base_url('LandingPage/Layanan/'.$dl['id_layanan']); ?>"
                            class="btn btn-primary d-block px-2 py-3 detail_layanan">Pesan Sekarang <span
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
                        <form class="px-4 py-3" method="post" id="formLogin">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="username" required
                                    placeholder="Masukkan email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required
                                    placeholder="Masukkan password">
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary mt-2" id="btnLogin">Login</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="daftar_akun" role="tabpanel" aria-labelledby="daftar_akun-tab">
                        <form id="formDaftar" class="px-4 py-3" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-2">
                                        <label for="">Email</label>
                                        <input type="email" name="username" class="form-control" placeholder="email"
                                            required>

                                        <!-- validation -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" required>
                                        <!-- validation -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password'); ?>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <label for="">Nama User</label>
                                        <input type="text" name="nama_user" class="form-control" placeholder="Nama User"
                                            required>
                                        <!-- validation -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_user'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <label for="">No Hp</label>
                                        <input type="text" name="no_hp_user" class="form-control" placeholder="No Hp"
                                            required>
                                        <!-- validation -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_hp_user'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <label for="alamat_user">Alamat</label>
                                        <textarea type="text" name="alamat_user" class="form-control" rows="3" required
                                            placeholder="Alamat"></textarea>

                                        <!-- validation -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('alamat_user'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary mt-2" id="btnDaftar">Daftar</button>
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
<?= $this->endSection('content'); ?>
<?= $this->section('script'); ?>
<script type="text/javascript">
// when post daftar
$('#formDaftar').submit(function(e) {
    e.preventDefault();
    $('#btnDaftar').attr('disabled', true);
    $('#btnDaftar').html('<i class="fa fa-spinner fa-spin"></i> Loading...');

    $.ajax({
        url: '<?= base_url('Auth/Register '); ?>',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.error) {
                // alert(response.message);
                getSweetAlert('error', 'Oops...', response.message);
                $('#btnDaftar').attr('disabled', false);
                $('#btnDaftar').html('Daftar');
            } else {
                getSweetAlert('success', 'Berhasil', response.message);
                // auto to tab login
                $('#login-tab').click();
                // clear form
                $('#formDaftar')[0].reset();
                $('#btnDaftar').attr('disabled', false);
                $('#btnDaftar').html('Daftar');
            }
        }
    });
});

// when post login
$('#formLogin').submit(function(e) {
    e.preventDefault();
    $('#btnLogin').attr('disabled', true);
    $('#btnLogin').html('<i class="fa fa-spinner fa-spin"></i> Loading...');

    $.ajax({
        url: '<?= base_url('Auth/loginUser'); ?>',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.error == true) {
                // alert(response.message);
                getSweetAlert('error', 'Oops...', response.message);
                $('#btnLogin').attr('disabled', false);
                $('#btnLogin').html('Login');
            } else {
                getSweetAlert('success', 'Berhasil', response.message);
                // redirect to home
                setTimeout(function() {
                    window.location.href = '<?= base_url('LandingPage'); ?>';
                }, 2000);
            }
        },
        error: function(xhr, status, error) {
            // alert(xhr.responseText);
            setTimeout(function() {
                window.location.href = '<?= base_url('LandingPage'); ?>';
            }, 2000);
        }
    });
});

var session_username = '<?= session()->get('username'); ?>';
// when click button detail layanan, show modal login when session username is null
$('.detail_layanan').click(function(e) {
    e.preventDefault();
    if (session_username == '') {
        $('#exampleModal').modal('show');
    } else {
        window.location.href = $(this).attr('href');
    }
});
</script>
<?= $this->endSection('script'); ?>