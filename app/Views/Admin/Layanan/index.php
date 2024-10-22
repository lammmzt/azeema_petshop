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
                <h4 class="card-title"><?= $title; ?></h4>
                <button type="button" data-toggle="modal" data-target="#add" href=""
                    class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-sm text-black-50" id="tabel_layanan">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Layanan</th>
                                <th class="text-center">Foto</th>
                                <th>Harga</th>
                                <th>Promo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($layanan as $key => $value) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama_layanan']; ?></td>
                                <td class="text-center"><img
                                        src="<?= base_url('assets/img/Layanan/' . $value['foto_layanan']); ?>"
                                        alt="foto_layanan" width="100px"></td>
                                <td><?= $value['harga_layanan']; ?></td>
                                <td><?= $value['promo_layanan']; ?>%</td>
                                <td>
                                    <button type="button" data-toggle="modal"
                                        data-target="#edit<?= $value['id_layanan']; ?>" href=""
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    <button type="button" data-toggle="modal"
                                        data-target="#hapus<?= $value['id_layanan']; ?>" href=""
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
<!-- Modal tamabh-->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-dialog-centered text-black-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Layanan/Simpan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <label for="">Nama Layanan</label>
                            <input type="text" name="nama_layanan" class="form-control"
                                placeholder="Masukan nama layanan">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_layanan'); ?>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <label for="">Deskripsi Layanan</label>
                            <textarea name="deskripsi_layanan" class="form-control"
                                placeholder="Masukan deskripsi layanan"></textarea>

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi_layanan'); ?>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <label for="">Harga Layanan</label>
                            <input type="text" name="harga_layanan" class="form-control"
                                placeholder="Masukan harga layanan">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga_layanan'); ?>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <label for="">Promo</label>
                            <div class="input-group mb-3">
                                <input type="number" name="promo_layanan" class="form-control"
                                    placeholder="Masukan promo layanan" id="promo_layanan">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <label for="">Foto Layanan</label>
                            <input type="file" name="foto_layanan" class="form-control"
                                placeholder="Masukan foto layanan">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('foto_layanan'); ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="Submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- endModal tambah -->

<!-- modalEdit -->
<?php
foreach ($layanan as $key => $value) : ?>

<!-- Modal tamabh-->
<div class="modal fade" id="edit<?= $value['id_layanan']; ?>">
    <div class="modal-dialog modal-dialog-centered text-black-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Layanan/Update'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" value="<?= $value['id_layanan']; ?>" name="id_layanan">
                        <div class="col-lg-12 mb-2">
                            <label for="">Nama layanan</label>
                            <input type="text" name="nama_layanan" class="form-control"
                                placeholder="Masukan nama layanan" value="<?= $value['nama_layanan']; ?>">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_layanan'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Deskripsi layanan</label>
                            <textarea name="deskripsi_layanan" class="form-control"
                                placeholder="Masukan deskripsi layanan"><?= $value['deskripsi_layanan']; ?></textarea>

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi_layanan'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Harga layanan</label>
                            <input type="text" name="harga_layanan" class="form-control"
                                placeholder="Masukan harga layanan" value="<?= $value['harga_layanan']; ?>">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga_layanan'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Promo</label>
                            <div class="input-group mb-3">
                                <input type="number" name="promo_layanan" class="form-control"
                                    placeholder="Masukan promo layanan" id="promo_layanan"
                                    value="<?= $value['promo_layanan']; ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="<?= $value['foto_layanan']; ?>" name="foto_layanan_lama">
                        <div class="col-lg-12 mb-2">
                            <label for="">Foto layanan</label>
                            <input type="file" name="foto_layanan" class="form-control"
                                placeholder="Masukan foto layanan">

                            <!-- validation -->
                            <div class=" invalid-feedback">
                                <?= $validation->getError('foto_layanan'); ?>
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
<!-- Modal hapus-->
<?php
foreach ($layanan as $key => $value) : ?>
<div class="modal fade" id="hapus<?= $value['id_layanan']; ?>">
    <div class="modal-dialog modal-dialog-centered text-black-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="<?= base_url('layanan/Hapus'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" value="<?= $value['id_layanan']; ?>" name="id">
                    <p>Apakah Anda Yakin Ingin Menghapus Data Ini ? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="Submit" class="btn btn-primary">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- endModa hapus -->


<?= $this->endSection('content'); ?>
<?= $this->section('dataTables'); ?>
<script>
$(document).ready(function() {
    $('#tabel_layanan').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": 5

        }]

    });

});
</script>
<?= $this->endSection('dataTables'); ?>