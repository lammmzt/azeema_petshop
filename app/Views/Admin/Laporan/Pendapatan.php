<?= $this->extend('Template/index') ?>
<?= $this->section('content') ?>
<?php 
use App\Models\detailTransaksiModel;
use App\Models\detailOrderModel;

$detailOrderModel = new detailOrderModel();
$detailTransaksiModel = new detailTransaksiModel();
?>
<style>
@media print {
    @page {
        margin-top: 0px;
        margin: 10px;
        size: 29.7cm 21cm;
    }

    body {
        margin: 0px;
        padding: 0px;
        background: #fff;
        width: 100%;
    }

    .container-fluid {
        margin: 0px !important;
        padding: 0px !important;
        width: 100%;
        height: 100%;
    }

    .content-body {
        margin: 0px !important;
        padding: 0px !important;
        width: 100%;
        height: 100%;
    }

    .btn,
    .nav-header,
    .page-titles,
    .header,
    #header,
    #sidebar,
    footer,
    header,
    aside,
    .fixed-top,
    form,
    .breadcrumb,
    .aksi,
    .alert,
    h1,
    a {
        display: none;
        visibility: hidden;
    }
}
</style>

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
                <h4 class="card-title"><?= $title_laporan; ?></h4>

            </div>
            <div class="card-body">
                <form action="<?= base_url('Laporan/Pendapatan'); ?>" method="post">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Jenis Pendapatan</label>
                                <select name="jenis_pendapatan" class="form-control" id="jenis_pendapatan">
                                    <?php 
                                    if (session()->get('role') == '1') :
                                    ?>
                                    <option value="" <?= $jenis_pendapatan == '' ? 'selected' : ''; ?>>Semua
                                        Pendapatan</option>
                                    <?php 
                                    endif;
                                    if (session()->get('role') == '1' || session()->get('role') == '2') :
                                    ?>
                                    <option value="0" <?= $jenis_pendapatan == '0' ? 'selected' : ''; ?>>Penjualan
                                        Barang
                                    </option>
                                    <?php
                                    endif;
                                    if (session()->get('role') == '1' || session()->get('role') == '4') :
                                    ?>
                                    <option value="1" <?= $jenis_pendapatan == '1' ? 'selected' : ''; ?>>Pemesanan
                                        Layanan

                                    </option>
                                    <?php
                                    endif;
                                    ?>

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
                            <button id="btn_print" type="button"
                                class="btn btn-success justify-content-end align-items-center"><i
                                    class="mdi mdi-printer"></i> Print</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered text-black-50" id="tabel_data_order">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center align-middle">No</th>
                                <th rowspan="2" class="text-center align-middle">Tanggal</th>
                                <th rowspan="2" class="text-center align-middle">Kode</th>
                                <th colspan="3" class="text-center align-middle">Detail</th>
                                <th rowspan="2" class="text-center align-middle">Subtotal</th>
                            </tr>
                            <tr>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $total_pendapatan = 0;

                            if (!empty($data_transaksi) || !empty($data_order)) :
                            
                                // Transaksi
                                if (!empty($data_transaksi)) :
                                    foreach ($data_transaksi as $value) :
                                        $total_pendapatan += $value['total_transaksi'];
                                        $data_detail_transaksi = $detailTransaksiModel->getDetailTransaksiByTransaksi($value['id_transaksi']);
                                        $jumlah_transaksi = count($data_detail_transaksi);
                                        $firstRow = true;
                                        foreach ($data_detail_transaksi as $dt) :
                            ?>
                            <tr>
                                <?php if ($firstRow) : ?>
                                <td class="text-center align-middle" rowspan="<?= $jumlah_transaksi; ?>"><?= $no++; ?>
                                </td>
                                <td class="text-center align-middle" rowspan="<?= $jumlah_transaksi; ?>">
                                    <?= date('d-m-Y', strtotime($value['tanggal_transaksi'])); ?></td>
                                <td class="text-center align-middle" rowspan="<?= $jumlah_transaksi; ?>">
                                    <?= $value['id_transaksi']; ?></td>
                                <?php endif; ?>
                                <td><?= $dt['nama_barang']; ?> (<?= $dt['merk_tipe_barang']; ?>) @ <?= $dt['satuan']; ?>
                                </td>
                                <td class="text-center"><?= "Rp. " . number_format($dt['harga_barang'], 0, ',', '.'); ?>
                                </td>
                                <td class="text-center"><?= $dt['jumlah_transaksi']; ?></td>
                                <?php if ($firstRow) : ?>
                                <td class="text-center align-middle" rowspan="<?= $jumlah_transaksi; ?>">
                                    <?= "Rp. " . number_format($value['total_transaksi'], 0, ',', '.'); ?></td>
                                <?php
                                    $firstRow = false;
                                endif;
                                ?>
                            </tr>
                            <?php
                            endforeach;
                            endforeach;
                            endif;

                           // Order
                           if (!empty($data_order)) :
                               foreach ($data_order as $value) :
                                   $total_pendapatan += $value['total_order'];
                                   $data_detail_order = $detailOrderModel->getDetailOrderByOrder($value['id_order']);
                                   $jumlah_order = count($data_detail_order);
                                   $firstRow = true;
                                   foreach ($data_detail_order as $do) :
                                   ?>
                            <tr>
                                <?php if ($firstRow) : ?>
                                <td class="text-center align-middle" rowspan="<?= $jumlah_order; ?>"><?= $no++; ?></td>
                                <td class="text-center align-middle" rowspan="<?= $jumlah_order; ?>">
                                    <?= date('d-m-Y', strtotime($value['tanggal_order'])); ?></td>
                                <td class="text-center align-middle" rowspan="<?= $jumlah_order; ?>">
                                    <?= $value['id_order']; ?></td>
                                <?php endif; ?>
                                <td><?= $do['nama_layanan']; ?></td>
                                <td class="text-center">
                                    <?= "Rp. " . number_format($do['harga_layanan'], 0, ',', '.'); ?></td>
                                <td class="text-center"><?= $do['jumlah_order']; ?></td>
                                <?php if ($firstRow) : ?>
                                <td class="text-center align-middle" rowspan="<?= $jumlah_order; ?>">
                                    <?= "Rp. " . number_format($value['total_order'], 0, ',', '.'); ?></td>
                                <?php
                                               $firstRow = false;
                                           endif;
                                           ?>
                            </tr>
                            <?php
                                   endforeach;
                               endforeach;
                           endif;

                       else :
                       ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-right"><strong>Total Pendapatan</strong></td>
                                <td class="text-left">
                                    <strong><?= "Rp. " . number_format($total_pendapatan, 0, ',', '.'); ?></strong>
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
$('#btn_print').on('click', function() {
    window.print();
});
</script>
<?= $this->endSection('dataTables'); ?>