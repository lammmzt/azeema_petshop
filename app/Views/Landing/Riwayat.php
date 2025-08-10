<?= $this->extend('Landing/index') ?>
<?= $this->section('content') ?>


<section class="ftco-section ftco-no-pt ftco-no-pb mb-4">
    <div class="container">
        <div class="row my-4">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-4">Riwayat</h2>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table_keranjang">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Kode Pemesanan</th>
                                <th>Tanggal Booking</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_keranjang">
                            <?php $no = 1; ?>
                            <?php foreach ($data_order as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $row['id_order'] ?></td>
                                <td><?= date('d-m-Y', strtotime($row['tanggal_order'])) ?></td>
                                <td><?php
                                    if ($row['status_order'] == 1) {
                                        echo '<span class="badge badge-warning">Menunggu Persetujuan</span>';
                                    } elseif ($row['status_order'] == 2) {
                                        echo '<span class="badge badge-info">Menunggu Jadwal Pengerjaan</span>';
                                    } elseif ($row['status_order'] == 3) {
                                        echo '<span class="badge badge-secondary">Menunggu Proses Pengerjaan</span>';
                                    } elseif ($row['status_order'] == 4) {
                                        echo '<span class="badge badge-success">Selesai</span>';
                                    } else {
                                        echo '<span class="badge badge-danger">Ditolak</span>';
                                    }
                                    ?></td>
                                </td>
                                <td>Rp. <?= number_format($row['total_order'], 0, ',', '.') ?></td>
                                <td><button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modal_detail<?= $row['id_order'] ?>">Detail</button></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php foreach ($data_order as $row) : ?>
<div class="modal fade" id="modal_detail<?= $row['id_order'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan <?= $row['id_order'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="border-0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Data Pemesanan</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Pemesan</label>
                            <input type="text" class="form-control" value="<?= $row['nama_user'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">No. Hp</label>
                            <input type="text" class="form-control" value="<?= $row['no_hp_user'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" value="<?= $row['alamat_user'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Booking</label>
                            <input type="text" class="form-control"
                                value="<?= date('d-m-Y', strtotime($row['tanggal_order'])) ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Datang</label>
                            <input type="text" class="form-control"
                                value="<?= date('d-m-Y', strtotime($row['tanggal_datang'])) ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Jam Booking</label>
                            <input type="text" class="form-control" value="<?= $row['jam_datang'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tipe Pembayaran</label>
                            <input type="text" class="form-control"
                                value="<?= ($row['tipe_pembayaran'] == 1) ? 'Transfer' : 'Cash' ?>" readonly>
                        </div>
                    </div>
                    <?php 
                    if ($row['bukti_pembayaran'] != null) : ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Bukti Pembayaran</label><br>
                            <img src="<?= base_url('assets/img/bukti_pembayaran/' . $row['bukti_pembayaran']) ?>"
                                alt="Bukti Pembayaran" class="img-fluid" width="200px">
                        </div>
                    </div>
                    <?php endif;
                    if ($row['ket_order'] != null) : 
                    ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Catatan Booking</label>
                            <textarea class="form-control" rows="3" readonly><?= $row['ket_order'] ?></textarea>
                        </div>
                    </div>
                    <?php endif;
                    if ($row['ket_proses'] != null) : 
                    ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Catatan Admin </label>
                            <textarea class="form-control" rows="3" readonly><?= $row['ket_proses'] ?></textarea>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga Layanan</th>
                                    <th class="text-center">Jumlah</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_keranjang">
                                <?php 
                            $no = 1;
                            $detall_order = $detailOrderModel->getDetailOrderByOrder($row['id_order']);

                            foreach ($detall_order as $row_detail) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $row_detail['nama_layanan'] ?></td>
                                    <td>Rp. <?= number_format($row_detail['harga_layanan'], 0, ',', '.') ?></td>
                                    <td class="text-center"><?= $row_detail['jumlah_order'] ?></td>
                                    <td>Rp. <?= number_format($row_detail['sub_total_order'], 0, ',', '.') ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-center">Total</th>
                                    <th>Rp. <?= number_format($row['total_order'], 0, ',', '.') ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row mb-2">
                    <div class="col-12">
                        <div id="accordion-two" class="accordion accordion-bordered">
                            <div class="accordion__item">
                                <div class="accordion__header" data-toggle="collapse"
                                    data-target="#bordered_collapseOne"> <span class="accordion__header--text">Timeline
                                        Pemesanan</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="bordered_collapseOne" class="collapse accordion__body"
                                    data-parent="#accordion-two">
                                    <div class="accordion__body--text">
                                        <div class="widget-timeline">
                                            <ul class="timeline">
                                                <li>
                                                    <div class="timeline-badge primary">1</div>
                                                    <a class="timeline-panel text-muted" href="#">
                                                        <span><?= date('d-m-Y h:i', strtotime($row['tanggal_order'])) ?></span>
                                                        <h6 class="m-t-5">
                                                            <?= $row['nama_user'] ?> melakukan pemesanan layanan.
                                                        </h6>
                                                    </a>
                                                </li>

                                                <?php if ($row['tanggal_disetujui'] != null) : ?>
                                                <?php 
                                                if($row['status_order'] != '1' || $row['tanggal_disetujui'] != null) : ?>
                                                <li>
                                                    <div class="timeline-badge warning">2</div>
                                                    <a class="timeline-panel text-muted" href="#">
                                                        <span><?= date('d-m-Y h:i', strtotime($row['tanggal_disetujui'])) ?></span>
                                                        <h6 class="m-t-5">Pemesanan telah disetujui oleh petugas,
                                                            selanjutnya menunggu jadwal
                                                            pengerjaan
                                                        </h6>
                                                    </a>
                                                </li>
                                                <?php endif; ?>

                                                <?php 
                                                    if($row['status_order'] != '1' || $row['status_order'] != '2' || $row['tanggal_proses'] != null) : ?>
                                                <li>
                                                    <div class="timeline-badge info">3</div>
                                                    <a class="timeline-panel text-muted" href="#">
                                                        <span><?= date('d-m-Y h:i', strtotime($row['tanggal_proses'])) ?></span>
                                                        <h6 class="m-t-5"> Menunggu Proses Pengerjaan
                                                        </h6>
                                                    </a>
                                                </li>

                                                <?php 
                                                endif; 
                                                ?>
                                                <?php
                                                if($row['status_order'] == '4') : ?>
                                                <li>
                                                    <div class="timeline-badge success">4</div>
                                                    <a class="timeline-panel text-muted" href="#">
                                                        <span><?= date('d-m-Y h:i', strtotime($row['tanggal_selesai'])) ?></span>
                                                        <h6 class="m-t-5">Proses Pengerjaan Selesai
                                                        </h6>
                                                    </a>
                                                </li>
                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php
                                                if($row['status_order'] == '0') : ?>
                                                <li>
                                                    <div class="timeline-badge danger">1</div>
                                                    <a class="timeline-panel text-muted" href="#">
                                                        <span><?= date('d-m-Y h:i', strtotime($row['tanggal_selesai'])) ?></span>
                                                        <h6 class="m-t-5">Pemesanan Ditolak oleh petugas
                                                            dengan alasan
                                                            <?= $row['ket_order'] ?>
                                                        </h6>
                                                    </a>
                                                </li>
                                                <?php endif; ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<style>
/* style time line to perfect  design */

.timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
}

.timeline:before {
    top: 0;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 3px;
    background-color: #eeeeee;
    left: 50%;
    margin-left: -1.5px;
}

.timeline>li {
    margin-bottom: 20px;
    position: relative;
}

.timeline>li:before,
.timeline>li:after {
    content: " ";
    display: table;
}

.timeline>li:after {
    clear: both;
}

.timeline>li:before,
.timeline>li:after {
    content: " ";
    display: table;
}

.timeline>li:after {
    clear: both;
}

.timeline>li>.timeline-panel {
    width: 46%;
    float: left;
    border: 1px solid #d4d4d4;
    border-radius: 2px;
    padding: 20px;
    position: relative;
    -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}

.timeline>li>.timeline-panel:before {
    position: absolute;
    top: 26px;
    right: -15px;
    display: inline-block;
    border-top: 15px solid transparent;
    border-left: 15px solid #ccc;
    border-right: 0 solid #ccc;
    border-bottom: 15px solid transparent;
    content: " ";
}

.timeline>li>.timeline-panel:after {
    position: absolute;
    top: 27px;
    right: -14px;
    display: inline-block;
    border-top: 14px solid transparent;
    border-left: 14px solid #fff;
    border-right: 0 solid #fff;
    border-bottom: 14px solid transparent;
    content: " ";
}

.timeline>li>.timeline-badge {
    color: #fff;
    width: 50px;
    height: 50px;
    line-height: 50px;
    font-size: 1.4em;
    text-align: center;
    position: absolute;
    top: 16px;
    left: 50%;
    margin-left: -25px;
    background-color: #999999;
    z-index: 100;
    border-top-right-radius: 50%;
    border-top-left-radius: 50%;
    border-bottom-right-radius: 50%;
    border-bottom-left-radius: 50%;
}

.timeline>.timeline-heading li {
    list-style-type: none;
    margin-left: -40px;
}

.timeline>.timeline-heading li span {
    margin-right: 5px;
}

.timeline>.timeline-heading li i {
    margin-right: 5px;
}

.timeline-heading {
    margin-left: 0px;
}

.timeline-badge.primary {
    background-color: #2e6da4 !important;
}

.timeline-badge.success {
    background-color: #3f903f !important;
}

.timeline-badge.warning {
    background-color: #f0ad4e !important;
}

.timeline-badge.danger {
    background-color: #d9534f !important;
}

.timeline-badge.info {
    background-color: #5bc0de !important;
}

.timeline-title {
    margin-top: 0;
    color: inherit;
}

.timeline-body>img {
    margin: 20px;
}

.timeline-footer {
    padding: 4px 15px;
    background-color: #fff;
    border-top: 1px solid #ddd;
}

.timeline-footer a {
    cursor: pointer;
}

.timeline-footer a:hover {
    text-decoration: none;
}
</style>
<?= $this->endSection('content'); ?>
<?= $this->section('script'); ?>
<script>
// dataTable
$(document).ready(function() {
    $('#table_keranjang').DataTable({
        // "ordering": false,
        // "info": false,
        // "searching": false,
        // "lengthChange": false,
        "language": {
            "emptyTable": "Tidak ada data yang tersedia",
            "zeroRecords": "Tidak ada data yang ditemukan",
            "infoEmpty": "",
            "infoFiltered": ""
        }
    });

    $('.img-fluid').on('click', function() {
        var src = $(this).attr('src');
        window.open(src, '_blank');
    });
});
</script>
<?= $this->endSection('script'); ?>