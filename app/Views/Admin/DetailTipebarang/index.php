<?= $this->extend('Template/index') ?>
<?= $this->section('content') ?>

<!-- row -->

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
                <a href="<?= base_url('TipeBarang/' . $tipe_barang['id_barang']); ?>"
                    title="Kembali ke daftar tipe barang" class="btn btn-primary btn-sm"><i
                        class="fa fa-arrow-left"></i>
                    Kembali</a>
            </div>
            <div class="card-header">
                <h4 class="card-title"><?= $title; ?> <?= $tipe_barang['nama_barang']; ?>
                    (<?= $tipe_barang['merk_tipe_barang']; ?>)
                </h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-sm text-black-50" id="tabel_tipe_barang">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Merk</th>
                                <th class="text-center">Satuan</th>
                                <th>Stok Barang</th>
                                <th>Harga Jual</th>
                                <th>Exp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($detail_stok as $key => $value) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['merk_tipe_barang']; ?></td>
                                <td><?= $value['satuan']; ?></td>
                                <td><?= $value['jumlah_detail_stok_tipe_barang']; ?></td>
                                <td><?= $value['harga_detail_stok_tipe_barang']; ?></td>
                                <td>
                                    <?php if ($value['exp_detail_stok_tipe_barang'] == '0000-00-00') : ?>
                                    <span class="badge badge-success">Tidak Ada Exp</span>
                                    <?php else : ?>
                                    <?= date('d-m-Y', strtotime($value['exp_detail_stok_tipe_barang'])); ?>
                                    <?php endif; ?>
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
<?= $this->endSection('content'); ?>
<?= $this->section('dataTables'); ?>
<script>
$(document).ready(function() {
    $('#tabel_tipe_barang').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": 2

        }]

    });

});

// tambah satuan select2
$('#tambah_satuan').select2();
</script>
<?= $this->endSection('dataTables'); ?>