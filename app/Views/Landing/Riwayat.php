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
                                <th>No</th>
                                <th>ID Order</th>
                                <th>Tanggal Order</th>
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
                                        echo '<span class="badge badge-info">Menunggu Pengerjaan</span>';
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
                <h5 class="modal-title" id="exampleModalLabel">Detail Order <?= $row['id_order'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="border-0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Data Pemesan</h5>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Nama</th>
                                <td><?= $row['nama_user'] ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td></td>
                            </tr>
                        </table>

                    </div>

                    <div class="col-md-6">
                        <h5>Data Order</h5>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Tanggal Order</th>
                                <td><?= date('d-m-Y', strtotime($row['tanggal_order'])) ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Datang</th>
                                <td><?= date('d-m-Y', strtotime($row['tanggal_datang'])) ?></td>
                            </tr>
                            <tr>
                                <th>Jam Datang</th>
                                <td><?= $row['jam_datang'] ?></td>
                            </tr>
                            <tr>
                                <th>Tipe Pembayaran</th>
                                <td><?= $row['tipe_pembayaran'] ?></td>
                            </tr>

                        </table>

                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Harga Layanan</th>
                            <th>Jumlah</th>
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
                            <td><?= $row_detail['jumlah_order'] ?></td>
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
    </div>
</div>
<?php endforeach; ?>

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
});
</script>
<?= $this->endSection('script'); ?>