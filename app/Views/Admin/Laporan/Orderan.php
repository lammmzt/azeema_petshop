<?= $this->extend('Template/index') ?>
<?= $this->section('content') ?>
<?php 
use App\Models\detailOrderModel;

$detailOrderModel = new detailOrderModel();
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
                <form action="<?= base_url('Laporan/Orderan'); ?>" method="post">
                    <div class="row">

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
                            <button type="button"
                                class="btn btn-success justify-content-end align-items-center btn_print"><i
                                    class="mdi mdi-printer" id="btn_print"></i> Print</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive mt-4">
                    <table class="table table-striped table-responsive-sm text-black-50" id="tabel_data_order">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Pemesanan</th>
                                <th>Tanggal</th>
                                <th>Detail Produk</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $total_order = 0;
                            if(!empty($data_order)) :
                            foreach ($data_order as $key => $value) : 
                            $total_order += $value['total_order'];
                            $data_detail_order = $detailOrderModel->getDetailOrderByOrder($value['id_order']);
                            ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $value['id_order']; ?></td>

                                <td><?= $value['tanggal_order']; ?></td>
                                <td class="list_detail_items">
                                    <?php 
                                    foreach ($data_detail_order as $key => $dt) : 
                                    ?>
                                    <p><?= $dt['nama_layanan']; ?>
                                        @ <?php echo "Rp. " . number_format($dt['harga_layanan'], 0, ',', '.'); ?> x
                                        <?= $dt['jumlah_order']; ?> =
                                        <?php echo "Rp. " . number_format($dt['sub_total_order'], 0, ',', '.'); ?>
                                    </p>

                                    <?php 
                                    endforeach; 
                                    ?>
                                </td>
                                <td><?php echo "Rp. " . number_format($value['total_order'], 0, ',', '.'); ?></td>

                            </tr>
                            <?php endforeach; 
                            else:
                            ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data pemesanan</td>
                            </tr>
                            <?php 
                            endif;
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right"><strong>Total Pemesanan</strong></td>
                                <td><strong><?php echo "Rp. " . number_format($total_order, 0, ',', '.'); ?></strong>
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
    $('#tabel_data_order').DataTable({
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

$('.btn_print').on('click', function() {
    window.print();
});
</script>
<?= $this->endSection('dataTables'); ?>