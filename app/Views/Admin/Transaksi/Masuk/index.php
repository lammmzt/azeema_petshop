<?= $this->extend('Template/index') ?>
<?= $this->section('content') ?>
<?php 
use App\Models\detailTransaksiModel;

$detailTransaksiModel = new detailTransaksiModel();
?>

<div class="row">
    <div class="col-lg-12">
        <?php if (session()->getFlashdata('success')) : ?>

        <div class="alert alert-success solid alert-right-icon alert-dismissible fade show">
            <span><i class="mdi mdi-check"></i></span>
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                        class="mdi mdi-close"></i></span>
            </button>
            <strong>Success!</strong> <?= session()->getFlashdata('success'); ?>
        </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>

        <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
            <span><i class="mdi mdi-check"></i></span>
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                        class="mdi mdi-close"></i></span>
            </button>
            <strong>Error!</strong> <?= session()->getFlashdata('error'); ?>
        </div>
        <?php endif; ?>

    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $title; ?></h4>
                <a href="<?= base_url('Transaksi/tambah_transaksi_masuk'); ?>"
                    class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-sm text-black-50" id="tabel_transaksi_masuk">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($transaksi_masuk as $key => $value) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['id_transaksi']; ?></td>
                                <td><?= $value['tanggal_transaksi']; ?></td>
                                <td><?php echo "Rp. " . number_format($value['total_transaksi'], 0, ',', '.'); ?></td>

                                <td>
                                    <button type="button" data-toggle="modal"
                                        data-target="#detail<?= $value['id_transaksi']; ?>" href=""
                                        class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                                    <!-- <button type="button" data-toggle="modal"
                                        data-target="#hapus<?= $value['id_transaksi']; ?>" href=""
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> -->
                                </td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- detail -->
<?php foreach ($transaksi_masuk as $key => $value) : ?>
<div class="modal fade" id="detail<?= $value['id_transaksi']; ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg text-black-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Kode Transaksi</label>
                        <input type="text" name="merk_transaksi_masuk" class="form-control"
                            value="<?= $value['id_transaksi']; ?>" readonly>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Tanggal Transaksi</label>
                        <input type="text" name="merk_transaksi_masuk" class="form-control"
                            value="<?= $value['tanggal_transaksi']; ?>" readonly>
                    </div>
                </div>
                <hr>
                <h5>Detail Barang</h5>
                <div class="row">
                    <div class="col-lg-12 table-responsive">
                        <table class="table table-striped text-black-50">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipe Barang</th>
                                    <th>Exp Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $detail_transaksi = $detailTransaksiModel->getDetailTransaksiByTransaksi($value['id_transaksi']);
                                    foreach ($detail_transaksi as $dt) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $dt['nama_barang']; ?>(<?= $dt['merk_tipe_barang']; ?>) @
                                        <?= $dt['satuan']; ?></td>
                                    <td><?= date('d-m-Y', strtotime($dt['exp_barang'])); ?></td>
                                    <td><?= $dt['jumlah_transaksi']; ?></td>
                                    <td><?php echo "Rp. " . number_format($dt['harga_barang'], 0, ',', '.'); ?></td>
                                    <td><?php echo "Rp. " . number_format($dt['sub_total_transaksi'], 0, ',', '.'); ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="5" class="text-center">Total</td>
                                    <td><?php echo "Rp. " . number_format($value['total_transaksi'], 0, ',', '.'); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?= $this->endSection('content'); ?>
<?= $this->section('dataTables'); ?>
<script>
$(document).ready(function() {
    $('#tabel_transaksi_masuk').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": 2

        }]

    });

});
</script>
<?= $this->endSection('dataTables'); ?>