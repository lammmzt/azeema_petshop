<!DOCTYPE html>
<html lang="en">
<?php 
use App\Models\detailStokTipeBarangModel;

$detailStokTipeBarangModel = new \App\Models\detailStokTipeBarangModel();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok Barang</title>
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
                    <h2>
                        Laporan Stok Barang
                    </h2>
                </td>
            </tr>
        </table>
    </div>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
                <th rowspan="2" style="text-align: center; vertical-align: middle;">Kode Barang</th>
                <th rowspan="2" style="text-align: center; vertical-align: middle;">Nama Barang</th>
                <th colspan="3" style="text-align: center; vertical-align: middle;">Detail Stok</th>
                <th rowspan="2" style="text-align: center; vertical-align: middle;">Total Stok</th>
            </tr>
            <tr>
                <th style="text-align: center">Harga Barang</th>
                <th style="text-align: center">Exp</th>
                <th style="text-align: center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
                            $no = 1;
                            $total_order = 0;
                            // Order
                           if (!empty($data_stok)) :
                            // dd($data_stok);
                            foreach ($data_stok as $value) :
                                $detailTipeBarang = $detailStokTipeBarangModel->getStokTipeBarangByIdTipeBarang($value['id_tipe_barang']);
                                if(!empty($detailTipeBarang) && is_array($detailTipeBarang)):
                                    $jumlah_detail_stok = count($detailTipeBarang);
                                    $firstRow = true;
                                    $sub_total_stok = 0; // Inisialisasi sub total stok untuk tiap tipe barang
                                    
                                    foreach ($detailTipeBarang as $do) {
                                        $sub_total_stok += $do['jumlah_detail_stok_tipe_barang'];
                                    }
                                
                                    foreach ($detailTipeBarang as $do) :
                                ?>
            <tr>
                <?php if ($firstRow) : ?>
                <td style="text-align: center; vertical-align: middle;" rowspan="<?= $jumlah_detail_stok; ?>">
                    <?= $no++; ?>
                </td>
                <td style="text-align: center; vertical-align: middle;" rowspan="<?= $jumlah_detail_stok; ?>">
                    <?= $value['id_barang']; ?></td>

                <td style="text-align: center; vertical-align: middle;" rowspan="<?= $jumlah_detail_stok; ?>">
                    <?= $value['nama_barang']; ?> (<?= $value['merk_tipe_barang']; ?>)</td>

                <?php endif; ?>
                <td style="text-align: center; vertical-align: middle;">Rp.
                    <?= number_format($do['harga_detail_stok_tipe_barang'], 0, ',', '.'); ?></td>

                <td
                    <?= ($do['exp_detail_stok_tipe_barang'] < date('Y-m-d')) ? 'class="text-danger text-center"' : 'style="text-align: center"'; ?>>
                    <?php if ($do['exp_detail_stok_tipe_barang'] == '0000-00-00') : ?>
                    <span class="badge badge-success">Tidak Ada Exp</span>
                    <?php else : ?>
                    <?= date('d-m-Y', strtotime($do['exp_detail_stok_tipe_barang'])); ?>
                    <?php endif; ?>
                </td>

                <td style="text-align: center; "><?= $do['jumlah_detail_stok_tipe_barang']; ?></td>
                <?php if ($firstRow) : ?>
                <td style="text-align: center; vertical-align: middle;" rowspan="<?= $jumlah_detail_stok; ?>">
                    <?= $sub_total_stok; ?></td>
                <?php
                                    $firstRow = false;
                                    endif;
                                    ?>
            </tr>
            <?php
                            endforeach;
                            else :
                            // dd($value);
                            ?>
            <tr>
                <td style="text-align: center; vertical-align: middle;"><?= $no++; ?>
                </td>
                <td style="text-align: center; vertical-align: middle;"><?= $value['id_barang']; ?></td>
                <td style="text-align: center; vertical-align: middle;">
                    <?= $value['nama_barang']; ?> (<?= $value['merk_tipe_barang']; ?>)</td>

                <td style="text-align: center; vertical-align: middle;">
                    Rp. <?= number_format($value['harga_tipe_barang'], 0, ',', '.'); ?></td>
                </td>
                <td style="text-align: center">-</td>
                <td style="text-align: center; vertical-align: middle;">0</td>
                <td style="text-align: center; vertical-align: middle;">0</td>
            </tr>
            <?php
                            endif;
                            endforeach;
                            else:
                            ?>
            <tr>
                <td colspan="7" style="text-align: center">Tidak ada data stok</td>
            </tr>
            <?php 
                            endif;
                            ?>
        </tbody>
    </table>
</body>

</html>