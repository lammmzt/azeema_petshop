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

            </div>
            <div class="card-body">
                <form action="<?= base_url('Laporan/Transaksi'); ?>" method="post">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Tipe Transaksi</label>
                                <select name="jenis_transaksi" class="form-control" id="jenis_transaksi">
                                    <option value="">Semua Transaksi</option>
                                    <option value="0" <?= $jenis_transaksi == '0' ? 'selected' : ''; ?>>Transaksi Masuk
                                    </option>
                                    <option value="1" <?= $jenis_transaksi == '1' ? 'selected' : ''; ?>>Transaksi Keluar
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="tgl_awal" class="form-control" value="<?= $tgl_awal; ?>"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="tgl_akhir" class="form-control" value="<?= $tgl_akhir; ?>"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-4">
                            <button type="submit" class="btn btn-primary justify-content-end align-items-center"><i
                                    class="mdi mdi-magnify"></i> Filter</button>
                            <button type="button" class="btn btn-success justify-content-end align-items-center"><i
                                    class="mdi mdi-printer"></i> Print</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive mt-4">
                    <table class="table table-striped table-responsive-sm text-black-50" id="tabel_data_transaksi">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Transaksi</th>
                                <th>Tipe Transaksi</th>
                                <th>Tanggal</th>
                                <th>Detail Produk</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $total_transaksi = 0;
                            if(!empty($data_transaksi)) :
                            foreach ($data_transaksi as $key => $value) : 
                            $total_transaksi += $value['total_transaksi'];
                            $data_detail_transaksi = $detailTransaksiModel->getDetailTransaksiByTransaksi($value['id_transaksi']);
                            ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $value['id_transaksi']; ?></td>
                                <td class="text-center">
                                    <?= $value['jenis_transaksi'] == '0' ? '<span class="badge badge-success">Transaksi Masuk</span>' : '<span class="badge badge-danger">Transaksi Keluar</span>'; ?>
                                </td>
                                <td><?= $value['tanggal_transaksi']; ?></td>
                                <td class="list_detail_items">
                                    <?php 
                                    foreach ($data_detail_transaksi as $key => $dt) : 
                                    ?>
                                    <p><?= $dt['nama_barang']; ?> <?= $dt['merk_tipe_barang']; ?>(<?= $dt['satuan']; ?>)
                                        @ <?php echo "Rp. " . number_format($dt['harga_barang'], 0, ',', '.'); ?> x
                                        <?= $dt['jumlah_transaksi']; ?> =
                                        <?php echo "Rp. " . number_format($dt['sub_total_transaksi'], 0, ',', '.'); ?>
                                    </p>

                                    <?php 
                                    endforeach; 
                                    ?>
                                </td>
                                <td><?php echo "Rp. " . number_format($value['total_transaksi'], 0, ',', '.'); ?></td>

                            </tr>
                            <?php endforeach; 
                            else:
                            ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data transaksi</td>
                            </tr>
                            <?php 
                            endif;
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-right"><strong>Total Transaksi</strong></td>
                                <td><strong><?php echo "Rp. " . number_format($total_transaksi, 0, ',', '.'); ?></strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.list_detail_items p {
    margin: 0;
    padding: 0;
    margin-bottom: 0;
}
</style>
<?= $this->endSection('content'); ?>
<?= $this->section('dataTables'); ?>
<script>
$(document).ready(function() {
    $('#tabel_data_transaksi').DataTable({
        "searching": false,
        "ordering": false,
        "paging": false,
        "info": false,
        "columnDefs": [{
            "orderable": false,
            "searchable": false,
        }]

    });

});
</script>
<?= $this->endSection('dataTables'); ?>