<?= $this->extend('Template/index') ?>
<?= $this->section('content') ?>
<?php 
use App\Models\detailStokTipeBarangModel;

$detailStokTipeBarangModel = new \App\Models\detailStokTipeBarangModel();
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
                <div class="row">
                    <div class="col-lg-3 mt-2">
                        <button id="btn_print" type="button"
                            class="btn btn-success justify-content-end align-items-center btn_print"><i
                                class="mdi mdi-printer"></i> Print</button>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered text-black-50">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center align-middle">No</th>
                                <th rowspan="2" class="text-center align-middle">Nama Barang</th>
                                <th colspan="2" class="text-center align-middle">Detail Stok</th>
                                <th rowspan="2" class="text-center align-middle">Total Stok</th>
                            </tr>
                            <tr>
                                <th class="text-center">Exp</th>
                                <th class="text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $total_order = 0;
                            // Order
                           if (!empty($data_stok)) :
                            // dd($data_stok);
                            foreach ($data_stok as $value) :
                                $detailTipeBarang = $detailStokTipeBarangModel->getStokTipeBarangByIdTipeBarang($value['id_tipe_barang']);
                                if(!empty($detailTipeBarang) && is_array($detailTipeBarang)):
                                    $jumlah_detail_stok = count($detailTipeBarang);
                                    $firstRow = true;
                                    $sub_total_stok = 0; // Inisialisasi sub total stok untuk tiap tipe barang
                                    
                                    foreach ($detailTipeBarang as $do) {
                                        $sub_total_stok += $do['jumlah_detail_stok_tipe_barang'];
                                    }
                                
                                    foreach ($detailTipeBarang as $do) :
                                ?>
                            <tr>
                                <?php if ($firstRow) : ?>
                                <td class="text-center align-middle" rowspan="<?= $jumlah_detail_stok; ?>"><?= $no++; ?>
                                </td>
                                <td class="text-center align-middle" rowspan="<?= $jumlah_detail_stok; ?>">
                                    <?= $value['nama_barang']; ?> (<?= $value['merk_tipe_barang']; ?>)</td>
                                <?php endif; ?>
                                <td
                                    <?= ($do['exp_detail_stok_tipe_barang'] < date('Y-m-d')) ? 'class="text-danger text-center"' : 'class="text-center"'; ?>>
                                    <?php if ($do['exp_detail_stok_tipe_barang'] == '0000-00-00') : ?>
                                    <span class="badge badge-success">Tidak Ada Exp</span>
                                    <?php else : ?>
                                    <?= date('d-m-Y', strtotime($do['exp_detail_stok_tipe_barang'])); ?>
                                    <?php endif; ?>
                                </td>

                                <td class="text-center "><?= $do['jumlah_detail_stok_tipe_barang']; ?></td>
                                <?php if ($firstRow) : ?>
                                <td class="text-center align-middle" rowspan="<?= $jumlah_detail_stok; ?>">
                                    <?= $sub_total_stok; ?></td>
                                <?php
                                    $firstRow = false;
                                    endif;
                                    ?>
                            </tr>
                            <?php
                            endforeach;
                            else :
                            // dd($value);
                            ?>
                            <tr>
                                <td class="text-center align-middle"><?= $no++; ?>
                                </td>
                                <td class="text-center align-middle">
                                    <?= $value['nama_barang']; ?> (<?= $value['merk_tipe_barang']; ?>)</td>

                                <td class="text-center align-middle text-center">
                                    -
                                </td>
                                <td class="text-center">0</td>
                                <td class="text-center align-middle">0</td>
                            </tr>
                            <?php
                            endif;
                            endforeach;
                            else:
                            ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data stok</td>
                            </tr>
                            <?php 
                            endif;
                            ?>
                        </tbody>
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
$('.btn_print').on('click', function() {
    window.print();
});
</script>
<?= $this->endSection('dataTables'); ?>