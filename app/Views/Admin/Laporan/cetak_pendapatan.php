<!DOCTYPE html>
<html lang="en">
<?php 
use App\Models\detailTransaksiModel;
use App\Models\detailOrderModel;

$detailOrderModel = new detailOrderModel();
$detailTransaksiModel = new detailTransaksiModel();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan
        <?= ($jenis_pendapatan == '1') ? 'Pendapatan Pemesanan' : ($jenis_pendapatan == '0' ? 'Pendapatan Penjualan' : 'Semua Pendapatan'); ?>
        dari
        <?= date('d-m-Y', strtotime($tgl_awal)) ?> s/d <?= date('d-m-Y', strtotime($tgl_akhir)) ?></title>
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    h2 {
        text-align: center;
    }

    p {
        margin-top: 0;
        margin-bottom: 5px;
    }

    .table-header {
        width: 100%;
        margin-top: 0px;
    }

    .table-header tr:nth-child(even) {
        background-color: white;
    }

    .table-header td {
        padding: 5px;
    }

    .table-header td:first-child {
        padding-top: 0;
    }

    .table-header td:last-child {
        padding-bottom: 2px;
    }

    table {
        width: 99%;
        border-collapse: collapse;
    }

    table th {
        background-color: #f2f2f2;
        color: black;
    }

    table th,
    table td {
        padding: 8px;
        text-align: left;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }


    /* repeat .kop surat */
    .header_laporan {
        text-align: center;
        margin-bottom: 10px;
    }

    .header_laporan img {
        width: 100%;
        height: 150px;
    }

    .table-header h2 {
        margin: 5px 0;
    }

    /* table td auto fit  */
    table td {
        word-wrap: break-word;
        max-width: 200px;
        /* Set a max width for the cells */
    }

    /* media a4 */
    @page {
        size: 297mm 210mm;
        margin: 20px 20px;
    }
    </style>
    <script>
    window.print();

    window.onafterprint = function() {
        window.close();
    }
    </script>

<body>

    <div class="header_laporan">

        <table border="0" cellpadding="5" cellspacing="0" class="table-header">
            <tr>
                <td style="width: 20%;">
                    <img src="<?= base_url('assets/img/logo_azema_bg.png'); ?>" alt="Logo" />
                </td>
                <td style="width: 70%; text-align: center;">
                    <h2>AZEEMA PETSHOP</h2>
                    <p>Jl. Hos Cokroaminoto Gg. 14, Kuripan Lor, Kec. Pekalongan Selatan, Kota Pekalongan</p>
                </td>
                <td style="width: 10%; text-align: right;">

                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <h2>Laporan
                        <?= ($jenis_pendapatan == '1') ? 'Pendapatan Pemesanan' : ($jenis_pendapatan == '0' ? 'Pendapatan Penjualan' : 'Semua Pendapatan'); ?>
                        dari <?= date('d-m-Y', strtotime($tgl_awal)) ?> s/d <?= date('d-m-Y', strtotime($tgl_akhir)) ?>
                </td>
            </tr>
        </table>
    </div>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
                <th rowspan="2" style="text-align: center; vertical-align: middle;">Tanggal</th>
                <th rowspan="2" style="text-align: center; vertical-align: middle;">Kode</th>
                <th colspan="3" style="text-align: center; vertical-align: middle;">Detail</th>
                <th rowspan="2" style="text-align: center; vertical-align: middle;">Subtotal</th>
            </tr>
            <tr>
                <th style="text-align: center">Nama Produk / Layanan</th>
                <th style="text-align: center">Harga</th>
                <th style="text-align: center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
                            $no = 1;
                            $total_pendapatan = 0;

                            if (!empty($data_transaksi) || !empty($data_order)) :
                            
                                // Transaksi
                                if (!empty($data_transaksi)) :
                                    foreach ($data_transaksi as $value) :
                                        $total_pendapatan += $value['total_transaksi'];
                                        $data_detail_transaksi = $detailTransaksiModel->getDetailTransaksiByTransaksi($value['id_transaksi']);
                                        $jumlah_transaksi = count($data_detail_transaksi);
                                        $firstRow = true;
                                        foreach ($data_detail_transaksi as $dt) :
                            ?>
            <tr>
                <?php if ($firstRow) : ?>
                <td style="text-align: center; vertical-align: middle;" rowspan="<?= $jumlah_transaksi; ?>">
                    <?= $no++; ?>
                </td>
                <td style="text-align: center; vertical-align: middle;" rowspan="<?= $jumlah_transaksi; ?>">
                    <?= date('d-m-Y', strtotime($value['tanggal_transaksi'])); ?></td>
                <td style="text-align: center; vertical-align: middle;" rowspan="<?= $jumlah_transaksi; ?>">
                    <?= $value['id_transaksi']; ?></td>
                <?php endif; ?>
                <td><?= $dt['nama_barang']; ?> (<?= $dt['merk_tipe_barang']; ?>) @ <?= $dt['satuan']; ?>
                </td>
                <td style="text-align: center"><?= "Rp. " . number_format($dt['harga_barang'], 0, ',', '.'); ?>
                </td>
                <td style="text-align: center"><?= $dt['jumlah_transaksi']; ?></td>
                <?php if ($firstRow) : ?>
                <td style="text-align: center; vertical-align: middle;" rowspan="<?= $jumlah_transaksi; ?>">
                    <?= "Rp. " . number_format($value['total_transaksi'], 0, ',', '.'); ?></td>
                <?php
                                    $firstRow = false;
                                endif;
                                ?>
            </tr>
            <?php
                            endforeach;
                            endforeach;
                            endif;

                           // Order
                           if (!empty($data_order)) :
                               foreach ($data_order as $value) :
                                   $total_pendapatan += $value['total_order'];
                                   $data_detail_order = $detailOrderModel->getDetailOrderByOrder($value['id_order']);
                                   $jumlah_order = count($data_detail_order);
                                   $firstRow = true;
                                   foreach ($data_detail_order as $do) :
                                   ?>
            <tr>
                <?php if ($firstRow) : ?>
                <td style="text-align: center; vertical-align: middle;" rowspan="<?= $jumlah_order; ?>"><?= $no++; ?>
                </td>
                <td style="text-align: center; vertical-align: middle;" rowspan="<?= $jumlah_order; ?>">
                    <?= date('d-m-Y', strtotime($value['tanggal_order'])); ?></td>
                <td style="text-align: center; vertical-align: middle;" rowspan="<?= $jumlah_order; ?>">
                    <?= $value['id_order']; ?></td>
                <?php endif; ?>
                <td><?= $do['nama_layanan']; ?></td>
                <td style="text-align: center">
                    <?= "Rp. " . number_format($do['harga_layanan'], 0, ',', '.'); ?></td>
                <td style="text-align: center"><?= $do['jumlah_order']; ?></td>
                <?php if ($firstRow) : ?>
                <td style="text-align: center; vertical-align: middle;" rowspan="<?= $jumlah_order; ?>">
                    <?= "Rp. " . number_format($value['total_order'], 0, ',', '.'); ?></td>
                <?php
                                               $firstRow = false;
                                           endif;
                                           ?>
            </tr>
            <?php
                                   endforeach;
                               endforeach;
                           endif;

                       else :
                       ?>
            <tr>
                <td colspan="7" style="text-align: center">Tidak ada data</td>
            </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align: right;"><strong>Total Pendapatan</strong></td>
                <td style="text-align: left;">
                    <strong><?= "Rp. " . number_format($total_pendapatan, 0, ',', '.'); ?></strong>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>