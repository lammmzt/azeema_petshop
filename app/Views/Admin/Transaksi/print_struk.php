<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Belanja Azema Petshop</title>
    <style>
    body {
        font-family: 'Courier New', Courier, monospace;
        max-width: 300px;
        margin: 20px auto;
        padding: 10px;
        border: 1px solid #333;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        color: #333;
        background-color: #fafafa;
    }

    h1,
    .store-info,
    .thanks,
    .footer {
        text-align: center;
        margin: 0;
    }

    .logo {
        display: block;
        margin: 10px auto;
        width: 120px;
    }

    .store-info p,
    .thanks p,
    .footer p {
        font-size: 0.9em;
        margin: 5px 0;
        line-height: 1.2;
    }

    .separator {
        border-top: 1px dashed #333;
        margin: 10px 0;
    }

    table {
        width: 100%;
        margin: 10px 0;
        border-collapse: collapse;
    }

    th,
    td {
        font-size: 0.9em;
        padding: 4px 0;
        text-align: left;
    }

    .total {
        font-weight: bold;
    }

    .right {
        text-align: right;
        margin-left: 10px;
    }

    .center {
        text-align: center;
    }

    .footer {
        font-size: 0.8em;
        margin-top: 15px;
    }

    .thanks p {
        margin-top: 20px;
        font-weight: bold;
    }

    @page {
        size: 50mm auto;
        margin: 0 !important;
        -webkit-print-color-adjust: exact;
        font-color-adjust: exact;


    }

    body {
        width: 50mm;
        margin: 0 !important;
        padding: 0;
        box-shadow: none;
        border: 0;
        background-color: #fff;
    }

    table {
        width: 100%;
    }

    .logo {
        width: 100px;
    }

    /* on print auto width to rool paper */
    /* @media print {
        body {
            width: 100%;
            margin: 0;
            padding: 0;
            box-shadow: none;
            border: 0;
            background-color: #fff;
        }

        table {
            width: 100%;
        }

        .logo {
            width: 100px;
        }
    } */
    </style>
</head>

<body>
    <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Indomaret_Logo.svg/1024px-Indomaret_Logo.svg.png"
        alt="Indomaret Logo" class="logo"> -->

    <div class="store-info">
        <h1>Azema Petshop</h1>
        <p>Jl. Raya No.123, Pekalongan</p>
        <p>Telp: (021) 123-4567</p>
        <p>Tanggal: <span id="date"></span></p>
        <p>Kasir: Andi</p>
        <p>No. Struk: <?= $transaksi['id_transaksi']; ?></p>
    </div>

    <div class="separator"></div>

    <table>
        <thead>
            <tr>
                <th style="width: 60%; text-align: left;">Nama Barang</th>
                <th style="width: 20px; text-align: center; margin-right: 10px;">Qty</th>
                <th class="right">Harga</th>
                <th class="right">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($detail_transaksi as $dt) : ?>
            <tr>
                <td><?= $dt['nama_barang']; ?>(<?= $dt['merk_tipe_barang']; ?>) @
                    <?= $dt['satuan']; ?></td>
                <td class="center"><?= $dt['jumlah_transaksi']; ?></td>
                <td class="right"><?php echo "Rp. " . number_format($dt['harga_barang'], 0, ',', '.'); ?></td>
                <td class="right"><?php echo "Rp. " . number_format($dt['sub_total_transaksi'], 0, ',', '.'); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="total">Total</td>
                <td class="right total">
                    <?php echo "Rp. " . number_format($transaksi['total_transaksi'], 0, ',', '.'); ?>
            </tr>
        </tfoot>
    </table>

    <div class="separator"></div>

    <div class="thanks">
        <p>*** Terima Kasih ***</p>
        <p>Atas Kunjungan Anda</p>
    </div>

    <div class="footer">
        <p>Barang yang sudah dibeli</p>
        <p>tidak dapat dikembalikan</p>
    </div>

    <script>
    // Mendapatkan tanggal hari ini
    const today = new Date();
    const date = today.toLocaleDateString('id-ID');
    document.getElementById('date').textContent = date;

    // Print struk
    window.print();

    // Tutup tab setelah print
    window.onafterprint = function() {
        window.close();
    }
    </script>
</body>

</html>