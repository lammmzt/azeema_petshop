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
                <h4 class="card-title"><?= $subtitle; ?></h4>
                <button type="button" data-toggle="modal" data-target="#add" href=""
                    class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-sm text-black-50" id="user">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>No Hp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($users as $key => $value) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['username']; ?></td>
                                <td><?php
                                        if ($value['role'] == 1) {
                                            echo '<span class="badge badge-primary">Owner</span>';
                                        } elseif ($value['role'] == 2) {
                                            echo '<span class="badge badge-success">Admin</span>';
                                        } elseif ($value['role'] == 3) {
                                            echo '<span class="badge badge-danger">User</span>';
                                        }
                                        ?>
                                </td>
                                <td><?= $value['no_hp_user']; ?></td>
                                <td>
                                    <button type="button" data-toggle="modal"
                                        data-target="#edit<?= $value['id_user']; ?>" href=""
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    <button type="button" data-toggle="modal"
                                        data-target="#hapus<?= $value['id_user']; ?>" href=""
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
            <form action="<?= base_url('Users/Simpan'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>

                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Nama User</label>
                            <input type="text" name="nama_user" class="form-control" placeholder="Nama User">
                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_user'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Role</label>
                            <select name="role" class="form-control">
                                <option value="">-- Pilih Role --</option>
                                <option value="1">Owner</option>
                                <option value="2">Admin</option>
                                <option value="3">User</option>
                                <!-- validation -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('role'); ?>
                                </div>
                            </select>

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
foreach ($users as $key => $value) : ?>


<!-- Modal tamabh-->
<div class="modal fade" id="edit<?= $value['id_user']; ?>">
    <div class="modal-dialog modal-dialog-centered text-black-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Users/Update'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" value="<?= $value['id_user']; ?>" name="id_user">
                        <div class="col-lg-12 mb-2">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username"
                                value="<?= $value['username']; ?>">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>

                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Nama User</label>
                            <input type="text" name="nama_user" class="form-control" placeholder="Nama User"
                                value="<?= $value['nama_user']; ?>">
                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_user'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Role</label>
                            <select name="role" class="form-control">
                                <option value="">-- Pilih Role --</option>
                                <option value="1" <?= ($value['role'] == 1) ? 'selected' : ''; ?>>Owner</option>
                                <option value="2" <?= ($value['role'] == 2) ? 'selected' : ''; ?>>Admin</option>
                                <option value="3" <?= ($value['role'] == 3) ? 'selected' : ''; ?>>User</option>
                                <!-- validation -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('role'); ?>
                                </div>
                            </select>

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
foreach ($users as $key => $value) : ?>
<div class="modal fade" id="hapus<?= $value['id_user']; ?>">
    <div class="modal-dialog modal-dialog-centered text-black-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Users/Hapus'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" value="<?= $value['id_user']; ?>" name="id">
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
    $('#user').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": 4

        }]

    });

});
</script>
<?= $this->endSection('dataTables'); ?>