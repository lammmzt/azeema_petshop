<?= $this->extend('Landing/index') ?>
<?= $this->section('content') ?>


<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row my-4">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-4">Riwayat</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table_keranjang">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Order</th>
                                <th>Tanggal Order</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_keranjang">
                            <?php $no = 1; ?>
                            <?php foreach ($data_order as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['id_order'] ?></td>
                                <td><?= date('d-m-Y', strtotime($row['tanggal_order'])) ?></td>
                                <td><?php
                                    if ($row['status_order'] == 1) {
                                        echo '<span class="badge badge-warning">Menunggu Proses</span>';
                                    } elseif ($row['status_order'] == 2) {
                                        echo '<span class="badge badge-info">Menunggu Proses Pengerjaan</span>';
                                    } elseif ($row['status_order'] == 3) {
                                        echo '<span class="badge badge-success">Selesai</span>';
                                    } elseif ($row['status_order'] == 4) {
                                        echo '<span class="badge badge-danger">Dibatalkan</span>';
                                    } else {
                                        echo '<span class="badge badge-secondary">Tidak Diketahui</span>';
                                    }
                                    ?></td>
                                </td>
                                <td>Rp. <?= number_format($row['total_order'], 0, ',', '.') ?></td>
                                <td><a href="<?= base_url('LandingPage/DetailRiwayat/' . $row['id_order']) ?>"
                                        class="btn btn-primary">Detail</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>
<?= $this->section('script'); ?>
<script>
</script>
<?= $this->endSection('script'); ?>