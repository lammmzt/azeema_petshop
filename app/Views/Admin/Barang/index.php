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
                    <table class="table table-striped table-responsive-sm text-black-50" id="tabel_barang">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($barang as $key => $value) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama_barang']; ?></td>
                                <td>
                                    <button type="button" data-toggle="modal"
                                        data-target="#edit<?= $value['id_barang']; ?>" href=""
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    <button type="button" data-toggle="modal"
                                        data-target="#hapus<?= $value['id_barang']; ?>" href=""
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    <a href="<?= base_url('TipeBarang/' . $value['id_barang']); ?>"
                                        class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
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
            <form action="<?= base_url('Barang/Simpan'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <label for="">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control"
                                placeholder="Masukan nama barang">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_barang'); ?>
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
foreach ($barang as $key => $value) : ?>

<!-- Modal tamabh-->
<div class="modal fade" id="edit<?= $value['id_barang']; ?>">
    <div class="modal-dialog modal-dialog-centered text-black-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Barang/Update'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" value="<?= $value['id_barang']; ?>" name="id_barang">
                        <div class="col-lg-12 mb-2">
                            <label for="">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" placeholder="Masukan nama barang"
                                value="<?= $value['nama_barang']; ?>">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_barang'); ?>
                            </div>
                        </div>
                        ]
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
foreach ($barang as $key => $value) : ?>
<div class="modal fade" id="hapus<?= $value['id_barang']; ?>">
    <div class="modal-dialog modal-dialog-centered text-black-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Barang/Hapus'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" value="<?= $value['id_barang']; ?>" name="id">
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
    $('#tabel_barang').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": 2

        }]

    });

});
</script>
<?= $this->endSection('dataTables'); ?>