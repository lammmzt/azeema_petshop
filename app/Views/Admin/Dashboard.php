<?= $this->extend('Template/index'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text">Total penguna </div>
                    <div class="stat-digit">
                        <i class="fa fa-users"></i>

                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text">Pesanan aktif</div>
                    <div class="stat-digit">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text">Pesanan selesai</div>
                    <div class="stat-digit">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text">Pendapatan</div>
                    <div class="stat-digit">
                        <i class="fa fa-money"></i>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-sm text-black-50" id="orderTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama order</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pendapatan tiap bulan</h4>
                </div>
                <div class="card-body">
                    <canvas id="cartOrder"></canvas>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection('content'); ?>
    <?= $this->section('dataTables'); ?>

    <script src="<?= base_url('assets/vendor/chart.js/Chart.bundle.min.js'); ?>"></script>
    <!-- <script src="<?php // echo base_url('assets/js/plugins-init/chartjs-init.js')  
                    ?>"></script> -->

    <script>
    $(document).ready(function() {
        $('#orderTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": 4

            }]

        });
    });
    </script>
    <?= $this->endSection('dataTables'); ?>