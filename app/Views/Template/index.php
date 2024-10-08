<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title; ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon.png'); ?>">

    <link href="<?= base_url('assets/vendor/datatables/css/jquery.dataTables.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/owl-carousel/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/owl-carousel/css/owl.theme.default.min.css'); ?>">
    <link href="<?= base_url('assets/vendor/jqvmap/css/jqvmap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">



</head>

<body>
    <style>
    @media print {
        @page {
            margin-top: 30px;
            margin: 10px;
        }

        .btn,
        #header,
        #sidebar,
        footer,
        header,
        aside,
        .fixed-top,
        form,
        .breadcrumb,
        .quixnav,
        .page-titles,
        .quixnav-scroll,
        .footer,
        .nav-header

        /* .quixnav-scroll::-webkit-scrollbar,
        .quixnav-scroll::-webkit-scrollbar-track,
        .quixnav-scroll::-webkit-scrollbar-thumb,
        .quixnav-scroll::-webkit-scrollbar-thumb:window-inactive,
        .quixnav-scroll::-webkit-scrollbar-thumb:active,
        .quixnav-scroll::-webkit-scrollbar-thumb:hover,
         */
            {
            display: none;
            visibility: hidden;
        }

        .content-body {
            display: block;
            visibility: visible;
            margin-top: 0px;
            margin-left: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            padding: 0px;
            width: 100%;
            height: 100%;
        }
    }
    </style>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?= $this->include('Layout/Header'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?= $this->include('Layout/Sidebar'); ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <?php

            // use App\Models\usersModel;

            // $usersModel = new usersModel();
            // $user = $usersModel->getUsers(session()->get('id_user'));
            ?>
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, </h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $title; ?></a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?= $subtitle; ?></a></li>
                        </ol>
                    </div>
                </div>
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Developed by <a href="#" target="_blank"></a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->



    <!-- Required vendors -->
    <script src="<?= base_url('assets/vendor/global/global.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/quixnav-init.js'); ?>"></script>
    <script src="<?= base_url('assets/js/custom.min.js'); ?>"></script>

    <!-- Datatable -->
    <script src="<?= base_url('assets/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>

    <?= $this->renderSection('dataTables'); ?>

    <!-- Vectormap -->
    <script src="<?= base_url('assets/vendor/raphael/raphael.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/morris/morris.min.js'); ?>"></script>


    <script src="<?= base_url('assets/vendor/circle-progress/circle-progress.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/chart.js/Chart.bundle.min.js'); ?>"></script>

    <script src="<?= base_url('assets/vendor/gaugeJS/dist/gauge.min.js'); ?>"></script>

    <!--  flot-chart js -->
    <script src="<?= base_url(''); ?>"></script>
    <script src="<?= base_url('assets/vendor/flot/jquery.flot.resize.js'); ?>"></script>

    <!-- Owl Carousel -->
    <script src="<?= base_url('assets/vendor/owl-carousel/js/owl.carousel.min.js'); ?>"></script>

    <!-- Counter Up -->
    <script src="<?= base_url('assets/vendor/jqvmap/js/jquery.vmap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/jqvmap/js/jquery.vmap.usa.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery.counterup/jquery.counterup.min.js'); ?>"></script>


    <script src="<?= base_url('assets/js/dashboard/dashboard-1.js'); ?>"></script>

    <script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").remove();
        }, 5000);
    });
    </script>
</body>

</html>