<?= $this->extend('Template/index'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text">Total Pengguna </div>
                    <div class="stat-digit"> <i class="fa fa-users"></i> <?= $jml_user; ?></div>
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
                    <div class="stat-text">Total Layaan</div>
                    <div class="stat-digit"> <i class="fa fa-cogs"></i> <?= $jml_layanan; ?></div>
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
                    <div class="stat-text">Total Transaksi</div>
                    <div class="stat-digit"> <i class="fa fa-tasks"></i>
                        <?= $jml_transaksi; ?></div>
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
                    <div class="stat-text">Total Orderan</div>
                    <div class="stat-digit"> <i class="fa fa-shopping-cart"></i> <?= $jml_order; ?></div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Grafik Penjulan dan Pemesanan</h4>
                <form action="<?= base_url('/'); ?>" method="post" id="form_grafik_transaksi">
                    <!-- tahun -->
                    <select name="tahun_grafik_transaksi" id="tahun_grafik_transaksi" class="form-control"
                        style="width: 150px; float: right;">
                        <?php for ($i = date('Y'); $i >= 2024; $i--) : ?>
                        <option value="<?= $i; ?>" <?= ($tahun_grafik_transaksi == $i) ? 'selected' : ''; ?>>
                            <?= $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </form>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <!-- warna penjelsan grafik -->
                        <div class="text-center mb-4">
                            <span class="badge badge_penjualan">Jumlah Penjualan</span>
                            <span class="badge badge_pemesanan">Jumlah Pemesanan</span>
                        </div>
                        <style>
                        .badge_penjualan {
                            background-color: #343957;
                            color: white;
                            padding: 10px;
                            border-radius: 5px;
                        }

                        .badge_pemesanan {
                            background-color: #5873FE;
                            color: white;
                            padding: 10px;
                            border-radius: 5px;
                        }
                        </style>
                        <div id="charts_grafiks"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-xl-4 col-lg-4 col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <div class="m-t-10">
                    <h4 class="card-title">Customer Feedback</h4>
                    <h2 class="mt-3">385749</h2>
                </div>
                <div class="widget-card-circle mt-5 mb-5" id="info-circle-card">
                    <i class="ti-control-shuffle pa"></i>
                </div>
                <ul class="widget-line-list m-b-15">
                    <li class="border-right">92% <br><span class="text-success"><i class="ti-hand-point-up"></i>
                            Positive</span></li>
                    <li>8% <br><span class="text-danger"><i class="ti-hand-point-down"></i>Negative</span></li>
                </ul>
            </div>
        </div>
    </div> -->
</div>
<?php 
if(session()->get('role') == '2' || session()->get('role') == '1') :
?>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Stok Barang Limit</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">

                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm text-black-50" id="tabel_stok_minim">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th class="text-center">Stok</th>
                                        <td class="text-center">Detail</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_stok_minimal as $key => $value) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $value['id_barang']; ?></td>
                                        <td><?= $value['nama_barang']; ?> - <?= $value['merk_tipe_barang']; ?>
                                            (<?= $value['satuan']; ?>)</td>
                                        <td class="text-center"><?= $value['total_stok']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('TipeBarang/detail_stok/' . $value['id_tipe_barang']); ?>"
                                                class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($data_stok_minimal)) : ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data stok barang menipis</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar barang expired</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">

                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm text-black-50" id="tabel_stok_exp">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Exp Barang</th>
                                        <th class="text-center">Stok</th>
                                        <td class="text-center">Detail</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_become_expired as $key => $value) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $value['id_barang']; ?></td>
                                        <td><?= $value['nama_barang']; ?> - <?= $value['merk_tipe_barang']; ?>
                                            (<?= $value['satuan']; ?>)</td>
                                        <td><?= date('d-m-Y', strtotime($value['exp_detail_stok_tipe_barang'])); ?></td>
                                        <td class="text-center"><?= $value['jumlah_detail_stok_tipe_barang']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('TipeBarang/detail_stok/' . $value['id_tipe_barang']); ?>"
                                                class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($data_become_expired)) : ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data stok barang hampir exp</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
endif;
?>
<?= $this->endSection('content'); ?>
<?= $this->section('dataTables'); ?>
<!-- <script src="<?php // echo base_url('assets/js/plugins-init/chartjs-init.js')  
                    ?>"></script> -->

<script type="text/javascript">
var months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
data_grafik = <?= json_encode($data_grafik); ?>;

// when change select tahun_grafik_transaksi
$('#tahun_grafik_transaksi').change(function() {
    $('#form_grafik_transaksi').submit();
});

// console.log(data_grafik);
(function($) {
    "use strict";
    Morris.Bar({
        element: 'charts_grafiks',
        // foreach data_grafik
        data: [
            <?php foreach ($data_grafik as $grafik) : ?> {
                y: months[<?= $grafik['bulan'] - 1; ?>],
                a: <?= $grafik['jml_transaksi']; ?>,
                b: <?= $grafik['jml_order']; ?>
            },
            <?php endforeach; ?>
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Jumlah Penjualan', 'Jumlah Pemesanan'],
        barColors: ['#343957', '#5873FE'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });
})(jQuery);

$(document).ready(function() {
    $('#tabel_stok_minim').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": 4

        }]
    });
    $('#tabel_stok_exp').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": 4
        }]
    });

});
</script>

<?= $this->endSection('dataTables'); ?>