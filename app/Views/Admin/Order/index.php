<?= $this->extend('Template/index') ?>
<?= $this->section('content') ?>


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
                <a href="<?= base_url('Order/tambah_order'); ?>" class="btn btn-primary btn-sm float-right"><i
                        class="fa fa-plus"></i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-sm text-black-50" id="tabel_order">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Order</th>
                                <th>Tgl Order</th>
                                <th>Nama Pelanggan</th>
                                <th>Tgl Datang</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($order as $key => $value) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['id_order']; ?></td>
                                <td><?= date('d-m-Y', strtotime($value['tanggal_order'])); ?></td>
                                <td><?= $value['nama_user']; ?></td>
                                <td><?= date('d-m-Y', strtotime($value['tanggal_datang'])); ?>, Jam
                                    <?= date('H:i', strtotime($value['jam_datang'])); ?></td>
                                <td><?php echo "Rp. " . number_format($value['total_order'], 0, ',', '.'); ?></td>
                                <td>
                                    <?php if ($value['status_order'] == 1) : ?>
                                    <span class="badge badge-warning">Menunggu Persetujuan</span>
                                    <?php elseif ($value['status_order'] == 2) : ?>
                                    <span class="badge badge-info">Menunggu Jadwal Pengerjaan</span>
                                    <?php elseif ($value['status_order'] == 3) : ?>
                                    <span class="badge badge-secondary">Menunggu Proses Pengerjaan</span>
                                    <?php elseif ($value['status_order'] == 4) : ?>
                                    <span class="badge badge-success">Selesai</span>
                                    <?php else : ?>
                                    <span class="badge badge-danger">Ditolak</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php 
                                    if($value['status_order'] == '1' || $value['status_order'] == '2' || $value['status_order'] == '3') : ?>
                                    <button type="button" data-toggle="modal"
                                        data-target="#proses<?= $value['id_order']; ?>"
                                        class="btn btn-success btn-sm"><i class="fa fa-check"></i></b>
                                        <?php 
                                        endif; 
                                    ?>
                                        <button type="button" data-toggle="modal"
                                            data-target="#detail<?= $value['id_order']; ?>" href=""
                                            class="btn btn-info btn-sm mx-2"><i class="fa fa-eye"></i></button>
                                        <!-- <a href="<?= base_url('Order/print_struk/' . $value['id_order']); ?>"
                                            target="_blank" class="btn btn-primary btn-sm"><i
                                            class="fa fa-print"></i></a> -->
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
<!-- detail -->
<?php foreach ($order as $key => $value) : ?>
<div class="modal fade" id="detail<?= $value['id_order']; ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg text-black-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Order</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Data Pemesanan</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Pemesan</label>
                            <input type="text" class="form-control" value="<?= $value['nama_user'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">No. Hp</label>
                            <input type="text" class="form-control" value="<?= $value['no_hp_user'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" value="<?= $value['alamat_user'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Order</label>
                            <input type="text" class="form-control"
                                value="<?= date('d-m-Y', strtotime($value['tanggal_order'])) ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Datang</label>
                            <input type="text" class="form-control"
                                value="<?= date('d-m-Y', strtotime($value['tanggal_datang'])) ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Jam Datang</label>
                            <input type="text" class="form-control" value="<?= $value['jam_datang'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Metode Pembayaran</label>
                            <input type="text" class="form-control"
                                value="<?= ($value['tipe_pembayaran'] == 1) ? 'Transfer' : 'Cash' ?>" readonly>
                        </div>
                    </div>
                    <?php 
                    if ($value['bukti_pembayaran'] != null) : ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Bukti Pembayaran</label><br>
                            <img src="<?= base_url('assets/img/bukti_pembayaran/' . $value['bukti_pembayaran']) ?>"
                                alt="Bukti Pembayaran" class="img-fluid" width="200px">
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga Layanan</th>
                                    <th>Jumlah</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_keranjang">
                                <?php 
                            $no = 1;
                            $detall_order = $detailOrderModel->getDetailOrderByOrder($value['id_order']);

                            foreach ($detall_order as $value_detail) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $value_detail['nama_layanan'] ?></td>
                                    <td>Rp. <?= number_format($value_detail['harga_layanan'], 0, ',', '.') ?></td>
                                    <td><?= $value_detail['jumlah_order'] ?></td>
                                    <td>Rp. <?= number_format($value_detail['sub_total_order'], 0, ',', '.') ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-center">Total</th>
                                    <th>Rp. <?= number_format($value['total_order'], 0, ',', '.') ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- timeline  order -->
                <div class="row">
                    <!-- acordion -->
                    <div class="col-12">
                        <div id="accordion-two" class="accordion accordion-bordered">
                            <div class="accordion__item">
                                <div class="accordion__header" data-toggle="collapse"
                                    data-target="#bordered_collapseOne"> <span class="accordion__header--text">Timeline
                                        Orde</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="bordered_collapseOne" class="collapse accordion__body"
                                    data-parent="#accordion-two">
                                    <div class="accordion__body--text">
                                        <div class="widget-timeline">
                                            <ul class="timeline">
                                                <li>
                                                    <div class="timeline-badge primary"></div>
                                                    <a class="timeline-panel text-muted" href="#">
                                                        <span><?= date('d-m-Y h:i', strtotime($value['tanggal_order'])) ?></span>
                                                        <h6 class="m-t-5">
                                                            <?= $value['nama_user'] ?> melakukan pemesanan layanan.
                                                        </h6>
                                                    </a>
                                                </li>

                                                <?php if ($value['tanggal_disetujui'] != null) : ?>
                                                <?php 
                                                if($value['status_order'] != '1' || $value['tanggal_disetujui'] != null) : ?>
                                                <li>
                                                    <div class="timeline-badge warning"></div>
                                                    <a class="timeline-panel text-muted" href="#">
                                                        <span><?= date('d-m-Y h:i', strtotime($value['tanggal_disetujui'])) ?></span>
                                                        <h6 class="m-t-5">Orderan telah disetujui oleh petugas,
                                                            selanjutnya menunggu jadwal
                                                            pengerjaan
                                                        </h6>
                                                    </a>
                                                </li>
                                                <?php endif; ?>

                                                <?php 
                                                    if($value['status_order'] != '1' || $value['status_order'] != '2' || $value['tanggal_proses'] != null) : ?>
                                                <li>
                                                    <div class="timeline-badge info"></div>
                                                    <a class="timeline-panel text-muted" href="#">
                                                        <span><?= date('d-m-Y h:i', strtotime($value['tanggal_proses'])) ?></span>
                                                        <h6 class="m-t-5"> Menunggu Proses Pengerjaan
                                                        </h6>
                                                    </a>
                                                </li>

                                                <?php 
                                                endif; 
                                                ?>
                                                <?php
                                                if($value['status_order'] == '4') : ?>
                                                <li>
                                                    <div class="timeline-badge success"></div>
                                                    <a class="timeline-panel text-muted" href="#">
                                                        <span><?= date('d-m-Y h:i', strtotime($value['tanggal_selesai'])) ?></span>
                                                        <h6 class="m-t-5">
                                                            <?= $value['nama_user'] ?> Proses Pengerjaan Selesai
                                                        </h6>
                                                    </a>
                                                </li>
                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php
                                                if($value['status_order'] == '0') : ?>
                                                <li>
                                                    <div class="timeline-badge danger"></div>
                                                    <a class="timeline-panel text-muted" href="#">
                                                        <span><?= date('d-m-Y h:i', strtotime($value['tanggal_selesai'])) ?></span>
                                                        <h6 class="m-t-5">
                                                            <?= $value['nama_user'] ?> Orderan Ditolak oleh petugas
                                                            dengan alasan
                                                            <?= $value['ket_order'] ?>
                                                        </h6>
                                                    </a>
                                                </li>
                                                <?php endif; ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- proses -->

<!-- detail -->
<?php foreach ($order as $key => $value) : ?>
<div class="modal fade" id="proses<?= $value['id_order']; ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg text-black-50" role="document">
        <form action="<?= base_url('Order/proses_order'); ?>" method="post">
            <input type="hidden" name="id_order" value="<?= $value['id_order']; ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Order</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Data Pemesanan</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Pemesan</label>
                                <input type="text" class="form-control" value="<?= $value['nama_user'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No. Hp</label>
                                <input type="text" class="form-control" value="<?= $value['no_hp_user'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" value="<?= $value['alamat_user'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Order</label>
                                <input type="text" class="form-control"
                                    value="<?= date('d-m-Y', strtotime($value['tanggal_order'])) ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Datang</label>
                                <input type="text" class="form-control"
                                    value="<?= date('d-m-Y', strtotime($value['tanggal_datang'])) ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jam Datang</label>
                                <input type="text" class="form-control" value="<?= $value['jam_datang'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Metode Pembayaran</label>
                                <input type="text" class="form-control"
                                    value="<?= ($value['tipe_pembayaran'] == 1) ? 'Transfer' : 'Cash' ?>" readonly>
                            </div>
                        </div>
                        <?php 
                    if ($value['bukti_pembayaran'] != null) : ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Bukti Pembayaran</label><br>
                                <img src="<?= base_url('assets/img/bukti_pembayaran/' . $value['bukti_pembayaran']) ?>"
                                    alt="Bukti Pembayaran" class="img-fluid" width="200px">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="ket_order" id="" cols="30" rows="5" class="form-control"
                                    placeholder="Keterangan" readonly><?= $value['ket_order'] ?></textarea>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Layanan</th>
                                        <th>Harga Layanan</th>
                                        <th>Jumlah</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_keranjang">
                                    <?php 
                            $no = 1;
                            $detall_order = $detailOrderModel->getDetailOrderByOrder($value['id_order']);

                            foreach ($detall_order as $value_detail) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $value_detail['nama_layanan'] ?></td>
                                        <td>Rp. <?= number_format($value_detail['harga_layanan'], 0, ',', '.') ?></td>
                                        <td><?= $value_detail['jumlah_order'] ?></td>
                                        <td>Rp. <?= number_format($value_detail['sub_total_order'], 0, ',', '.') ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-center">Total</th>
                                        <th>Rp. <?= number_format($value['total_order'], 0, ',', '.') ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <hr style="border: 1px ;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status Order</label>
                                <select name="status_order" id="" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <?php 
                                    if ($value['status_order'] == '1' || $value['status_order'] == '0' || $value['status_order'] == '2') : ?>
                                    <option value="2" <?= ($value['status_order'] == '2') ? 'selected' : '' ?>>Setujui
                                    </option>
                                    <?php endif; ?>
                                    <?php 
                                    if ($value['status_order'] == '2' || $value['status_order'] == '1' || $value['status_order'] == '3') : ?>
                                    <option value="3" <?= ($value['status_order'] == '3') ? 'selected' : '' ?>>Proses
                                        Pengerjaan</option>
                                    <?php endif; ?>
                                    <?php
                                    if ($value['status_order'] == '3' || $value['status_order'] == '2' || $value['status_order'] == '4') : ?>
                                    <option value="4" <?= ($value['status_order'] == '4') ? 'selected' : '' ?>>Selesai
                                    </option>
                                    <?php endif; ?>
                                    <option value="0" <?= ($value['status_order'] == '0') ? 'selected' : '' ?>>Tolak
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="ket_proses" id="" cols="30" rows="5" class="form-control"
                                    placeholder="Keterangan"><?= $value['ket_proses'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Proses</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php endforeach; ?>
<?= $this->endSection('content'); ?>
<?= $this->section('dataTables'); ?>
<script>
$(document).ready(function() {
    $('#tabel_order').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": 2

        }]

    });

});
</script>
<?= $this->endSection('dataTables'); ?>