<?= $this->extend('Template/index') ?>
<?= $this->section('content') ?>
<?php 
use App\Models\detailStokTipeBarangModel;
$detailStokTipeBarangModel = new detailStokTipeBarangModel();
?>
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
                <a href="<?= base_url('Barang'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                    Kembali</a>
            </div>
            <div class="card-header">
                <h4 class="card-title"><?= $title; ?> <?= $barang['nama_barang']; ?></h4>
                <?php 
                    if (session()->get('role') == '2') : 
                ?>
                <button type="button" data-toggle="modal" data-target="#add" href=""
                    class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></button>
                <?php
                    endif;
                ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-sm text-black-50" id="tabel_tipe_barang">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Tipe Barang</th>
                                <th>Satuan</th>
                                <th class="text-center">Stok Barang</th>
                                <th>Harga Jual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($tipe_barang as $key => $value) : 
                            $checkStok = $detailStokTipeBarangModel->where(['id_tipe_barang' => $value['id_tipe_barang']])->findAll();
                            if(!empty($checkStok)) {
                                $data_detail_stok = $detailStokTipeBarangModel->getStokRilllByIdTipeBarang($value['id_tipe_barang']);
                            } else {
                                $data_detail_stok = null;
                            }
                            // dd($data_detail_stok);
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['merk_tipe_barang']; ?></td>
                                <td><?= $value['satuan']; ?></td>
                                <td class="text-center">
                                    <?= ($data_detail_stok != null) ? $data_detail_stok[0]['total_stok'] : 0; ?>
                                </td>
                                <td>Rp. <?= number_format($value['harga_tipe_barang'], 0, ',', '.'); ?></td>
                                <td class="text-center">
                                    <?php 
                                    if (session()->get('role') == '2') : 
                                    ?>
                                    <button type="button" data-toggle="modal"
                                        data-target="#edit<?= $value['id_tipe_barang']; ?>" href=""
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    <a href="<?= base_url('TipeBarang/detail_stok/' . $value['id_tipe_barang']); ?>"
                                        class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <!-- <button type="button" data-toggle="modal"
                                        data-target="#hapus<?= $value['id_tipe_barang']; ?>" href=""
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> -->
                                    <?php 
                                    else:
                                    ?>
                                    <a href="<?= base_url('TipeBarang/detail_stok/' . $value['id_tipe_barang']); ?>"
                                        class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <?php
                                    endif;
                                    ?>

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
            <form action="<?= base_url('TipeBarang/Simpan'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <label for="">Nama Tipe Barang</label>
                            <input type="text" name="merk_tipe_barang" class="form-control"
                                placeholder="Masukan Nama tipe barang">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('merk_tipe_barang'); ?>
                            </div>
                        </div>
                        <input type="hidden" value="<?= $barang['id_barang']; ?>" name="id_barang">
                        <div class="col-lg-12 mb-2">
                            <label for="">Harga Tipe Barang</label>
                            <input type="text" name="harga_tipe_barang" class="form-control"
                                placeholder="Masukan harga tipe barang">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga_tipe_barang'); ?>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <label for="">Satuan</label>
                            <select name="satuan" class="form-control" id="tambah_satuan">
                                <option value="pcs">Pcs</option>
                                <option value="kg">KG</option>
                                <option value="karung">Karung</option>
                                <option value="box">Box</option>
                                <option value="dus">Dus</option>
                                <option value="lusin">Lusin</option>
                            </select>

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('satuan'); ?>
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
foreach ($tipe_barang as $key => $value) : ?>

<!-- Modal tamabh-->
<div class="modal fade" id="edit<?= $value['id_tipe_barang']; ?>">
    <div class="modal-dialog modal-dialog-centered text-black-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="<?= base_url('TipeBarang/Update'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" value="<?= $value['id_tipe_barang']; ?>" name="id_tipe_barang">
                        <div class="col-lg-12 mb-2">
                            <label for="">Nama Tipe Barang</label>
                            <input type="text" name="merk_tipe_barang" class="form-control"
                                placeholder="Masukan Nama tipe barang" value="<?= $value['merk_tipe_barang']; ?>">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('merk_tipe_barang'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for="">Harga Tipe Barang</label>
                            <input type="text" name="harga_tipe_barang" class="form-control"
                                placeholder="Masukan harga tipe barang" value="<?= $value['harga_tipe_barang']; ?>">

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga_tipe_barang'); ?>
                            </div>
                        </div>
                        <input type="hidden" value="<?= $barang['id_barang']; ?>" name="id_barang">

                        <div class="col-lg-12 mb-2">
                            <label for="">Satuan</label>
                            <select name="satuan" class="form-control" id="tambah_satuan">
                                <option value="pcs" <?= $value['satuan'] == 'pcs' ? 'selected' : ''; ?>>Pcs</option>
                                <option value="kg" <?= $value['satuan'] == 'kg' ? 'selected' : ''; ?>>KG</option>
                                <option value="karung" <?= $value['satuan'] == 'karung' ? 'selected' : ''; ?>>Karung
                                </option>
                                <option value="box" <?= $value['satuan'] == 'box' ? 'selected' : ''; ?>>Box</option>
                                <option value="dus" <?= $value['satuan'] == 'dus' ? 'selected' : ''; ?>>Dus</option>
                                <option value="lusin" <?= $value['satuan'] == 'lusin' ? 'selected' : ''; ?>>Lusin
                                </option>
                            </select>

                            <!-- validation -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('satuan'); ?>
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
foreach ($tipe_barang as $key => $value) : ?>
<div class="modal fade" id="hapus<?= $value['id_tipe_barang']; ?>">
    <div class="modal-dialog modal-dialog-centered text-black-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="<?= base_url('TipeBarang/Hapus'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" value="<?= $barang['id_barang']; ?>" name="id_barang">
                    <input type="hidden" value="<?= $value['id_tipe_barang']; ?>" name="id">
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