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
                                <th>Nama Tipe Barang</th>
                                <th class="text-center">Satuan</th>
                                <th>Stok Barang</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Exp</th>
                                <th>Action</th>
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
                                <td>Rp. <?= number_format($value['harga_beli_detail_stok_tipe_barang'], 0, ',', '.'); ?>
                                <td>Rp. <?= number_format($value['harga_detail_stok_tipe_barang'], 0, ',', '.'); ?></td>
                                </td>
                                <td
                                    <?= ($value['exp_detail_stok_tipe_barang'] < date('Y-m-d')) ? 'class="text-danger"' : ''; ?>>
                                    <?php if ($value['exp_detail_stok_tipe_barang'] == '0000-00-00') : ?>
                                    <span class="badge badge-success">Tidak Ada Exp</span>
                                    <?php else : ?>
                                    <?= date('d-m-Y', strtotime($value['exp_detail_stok_tipe_barang'])); ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php 
                                if(session()->get('role') == '1' ): ?>
                                    <button type="button" data-toggle="modal"
                                        data-target="#edit<?= $value['id_detail_stok_tipe_barang']; ?>" href=""
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    <?php 
                                else: ?>
                                    -
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
<!-- modalEdit -->
<?php
foreach ($detail_stok as $key => $value) : ?>

<!-- Modal tamabh-->
<div class="modal fade" id="edit<?= $value['id_detail_stok_tipe_barang']; ?>">
    <div class="modal-dialog modal-dialog-centered text-black-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="<?= base_url('TipeBarang/UpdateDetail'); ?>" method="post" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" value="<?= $value['id_detail_stok_tipe_barang']; ?>"
                            name="id_detail_stok_tipe_barang">
                        <input type="hidden" value="<?= $tipe_barang['id_tipe_barang']; ?>" name="id_tipe_barang">
                        <div class="col-lg-12 mb-2">
                            <label for="">Tgl Exp</label>
                            <input type="date" name="exp_detail_stok_tipe_barang" class="form-control"
                                placeholder="Masukan merk tipe barang"
                                value="<?= date('Y-m-d', strtotime($value['exp_detail_stok_tipe_barang'])); ?>"
                                required>

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('exp_detail_stok_tipe_barang'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Jumlah Stok</label>
                            <input type="number" name="jumlah_detail_stok_tipe_barang" class="form-control"
                                placeholder="Masukan jumlah stok"
                                value="<?= $value['jumlah_detail_stok_tipe_barang']; ?>" required>

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah_detail_stok_tipe_barang'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Harga Beli</label>
                            <input type="number" name="harga_beli_detail_stok_tipe_barang" class="form-control"
                                placeholder="Masukan harga jual"
                                value="<?= $value['harga_beli_detail_stok_tipe_barang']; ?>" required>

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga_detail_stok_tipe_barang'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Harga Jual</label>
                            <input type="number" name="harga_detail_stok_tipe_barang" class="form-control"
                                placeholder="Masukan harga jual" value="<?= $value['harga_detail_stok_tipe_barang']; ?>"
                                required>

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga_detail_stok_tipe_barang'); ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="Submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- endModal edit -->
<?php endforeach; ?>
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