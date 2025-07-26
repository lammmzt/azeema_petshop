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
                <a href="<?= base_url('Order'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                    Kembali</a>
            </div>
            <div class="card-header">
                <h4 class="card-title"><?= $title; ?></h4>
                <!-- <a href="<?= base_url('Transaksi/tambah_transaksi_masuk'); ?>"
                    class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a> -->
            </div>
            <div class="card-body">
                <!-- form -->
                <form method="post" enctype="multipart/form-data" id="form_order">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal_transaksi" class="form-control" required
                                    value="<?= date('Y-m-d'); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Nama Pelanggan</label>
                                <select name="id_user" id="id_user" class="form-control" required style="width: 100%">
                                    <option value="">Pilih Pelanggan</option>
                                    <?php foreach ($data_user as $u) : ?>
                                    <option value="<?= $u['id_user']; ?>"><?= $u['nama_user']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <a href="<?= base_url('Users'); ?>" class="btn btn-warning btn-sm mt-2"
                                    target="_blank"><i class="fa fa-plus"></i> Tambah Pelanggan</a>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Tgl Kedatangan</label>
                                <input type="date" name="tanggal_datang" class="form-control" required
                                    value="<?= date('Y-m-d'); ?>" required min="<?= date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Jam Datang</label>
                                <input type="time" name="jam_datang" class="form-control" required
                                    value="<?= date('H:i'); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Tipe Pembayaran</label>
                                <select name="tipe_pembayaran" id="tipe_pembayaran" class="form-control" required>
                                    <option value="">Pilih Tipe Pembayaran</option>
                                    <option value="0">Cash</option>
                                    <option value="1">Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6" id="bank" style="display: none;">
                            <div class="form-group">
                                <label for="">Upload Bukti</label>
                                <input type="file" name="bukti_pembayaran" class="form-control" accept="image/*">
                                <small class="text-danger">*Upload bukti pembayaran jika menggunakan transfer</small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Catatan</label>
                                <textarea name="ket_order" class="form-control" placeholder="Masukan keterangan"
                                    required rows="3" required></textarea>
                            </div>
                        </div>
                        <!-- add nama barang dan tombol plus -->
                        <div class="col-lg-11">
                            <div class="form-group">
                                <label for="">Nama Layanan</label>
                                <div class="input-group">
                                    <select name="id_layanan" id="id_layanan" class="form-control">
                                        <option value="">Pilih Layanan</option>
                                        <?php foreach ($data_layanan as $l) : ?>
                                        <option value="<?= $l['id_layanan']; ?>"
                                            data-satuan="<?= $l['satuan_layanan']; ?>"
                                            data-harga_layanan="<?= $l['harga_layanan']; ?>">
                                            <?= $l['nama_layanan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 my-4">
                            <div class="form-group">
                                <label for=""></label>
                                <button type="button" class="btn btn-primary btn-sm" id="tambah_barang"><i
                                        class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-striped table-responsive-sm text-black-50">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tabel_order">

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-sm" id="btn_simpan">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>
<?= $this->section('dataTables'); ?>
<script>
// select2
$(document).ready(function() {
    $('#id_layanan').select2();
    $('#id_user').select2({
        placeholder: 'Pilih Pelanggan',
        allowClear: true
    });
});

// tipe pembayaran
$('#tipe_pembayaran').on('change', function() {
    var tipe = $(this).val();
    if (tipe == '1') { // jika transfer
        $('#bank').show(); // tampilkan upload bukti
    } else {
        $('#bank').hide(); // sembunyikan upload bukti
    }
});

var data_order_layanan = [];
var total = 0;
// tambah barang
function tampilData() {
    var html = '';
    var no = 1;

    if (data_order_layanan.length > 0) { // jika ada data barang
        data_order_layanan.forEach(function(item) { // tampilkan data barang
            html += '<tr>';
            html += '<td class="text-center">' + no + '</td>';
            html += '<td>' + item.nama_barang + '</td>';
            html += '<td> ' + formatRupiah(item.harga_layanan) + ' / ' + item.satuan_layanan +
                '</td>';
            html +=
                '<td> <input type="number" name="qty[]" class="form-control text-center" min="1" style="max-width: 100px;" value="' +
                item
                .qty +
                '" > </td>';
            html += '<td> <input type="text" name="subtotal[]" class="form-control" value="' + formatRupiah(item
                    .subtotal) +
                '" readonly> </td>';
            html += '<td><button type="button" class="btn btn-danger btn-sm" onclick="hapusLayanan(' + no +
                ')"><i class="fa fa-trash"></i></button></td>';
            no++;
            html += '</tr>';

            total += item.subtotal;
        });

        html += '<tr>';
        html += '<td colspan="4" class="text-right">Total</td>';
        html += '<td><input type="text" name="total" class="form-control" value="' + formatRupiah(total) +
            '" readonly></td>';
        html += '<td></td>';
        html += '</tr>';
    } else { // jika tidak ada data barang
        html += '<tr>';
        html += '<td colspan="6" class="text-center">Tidak ada data</td>';
        html += '</tr>';
    }

    $('#tabel_order').html(html);
}

tampilData(); // tampilkan barang

// tambah barang
$('#tambah_barang').on('click', function() {
    // alert('tambah barang');
    var id_layanan = $('#id_layanan').val();
    var nama_barang = $('#id_layanan option:selected').text();
    var harga_layanan = $('#id_layanan option:selected').data('harga_layanan');
    var satuan_layanan = $('#id_layanan option:selected').data('satuan');
    var qty = 1;
    var subtotal = harga_layanan * qty;

    if (id_layanan == '') { // jika barang belum dipilih
        alert('Pilih layanan');
        return false;
    }

    // jika barang sudah ada
    var index = data_order_layanan.findIndex(x => x.id_layanan == id_layanan);

    if (index == -1) { // jika barang belum ada
        data_order_layanan.push({
            id_layanan: id_layanan,
            nama_barang: nama_barang,
            harga_layanan: harga_layanan,
            satuan_layanan: satuan_layanan,
            qty: qty,
            subtotal: subtotal
        });
    } else {
        parseInt(data_order_layanan[index].qty++);
        data_order_layanan[index].subtotal = data_order_layanan[index].qty * data_order_layanan[index]
            .harga_layanan;
    }

    tampilData(); // tampilkan barang
});

// ubah qty barang
$('#tabel_order').on('change', 'input[name="qty[]"]', function() {
    // alert('ubah qty barang');
    var index = $(this).closest('tr').index(); // index baris
    var qty = $(this).val(); // qty barang
    if (qty < 1) { // jika qty kurang dari 1
        alert('qty tidak boleh kurang dari 1');
        $(this).val(1);
        qty = 1;
    }

    var harga_layanan = data_order_layanan[index].harga_layanan; // harga_layanan barang
    var subtotal = qty * harga_layanan; // subtotal

    data_order_layanan[index].qty = qty; // ubah qty barang
    data_order_layanan[index].subtotal = subtotal; // ubah subtotal barang

    total = 0; // reset total
    tampilData(); // tampilkan barang
});

// ubah harga_layanan barang
$('#tabel_order').on('change', 'input[name="harga_layanan[]"]', function() {
    // alert('ubah harga_layanan barang');
    var index = $(this).closest('tr').index(); // index baris
    var harga_layanan = $(this).val(); // harga_layanan barang
    var qty = data_order_layanan[index].qty; // qty barang
    var subtotal = qty * harga_layanan; // subtotal

    data_order_layanan[index].harga_layanan = harga_layanan; // ubah harga_layanan barang
    data_order_layanan[index].subtotal = subtotal; // ubah subtotal barang

    tampilData(); // tampilkan barang
});


// hapus barang
function hapusLayanan(index) {
    // alert('hapus barang ' + index);
    data_order_layanan.splice(index - 1, 1);
    total = 0; // reset total
    tampilData(); // tampilkan barang
}


// simpan data
$('#form_order').on('submit', function(e) {
    e.preventDefault();
    // alert('submit');
    if (data_order_layanan.length == 0) { // jika tidak ada data barang
        alert('Pilih barang');
        return false;
    }

    // jia tipe pembayaran transfer
    if ($('#tipe_pembayaran').val() == '1') {
        var bukti = $('input[name="bukti_pembayaran"]').val(); // ambil file bukti
        if (bukti == '') { // jika file bukti kosong
            alert('Upload bukti pembayaran');
            return false;
        }
    }
    // ubah btn simpan to loading
    $('#btn_simpan').html('<i class="fa fa-spin fa-spinner"></i> Loading...');
    $('#btn_simpan').attr('disabled', true);

    let formData = new FormData(this);
    formData.append('data_layanan', JSON.stringify(data_order_layanan));
    console.log(formData);
    $.ajax({
        url: '<?= base_url('LandingPage/saveCheckout'); ?>',
        type: 'post',
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(hasil) {
            if (hasil.status == 200) {

                location.href = '<?= base_url('Order'); ?>'; // redirect ke halaman order
                // console.log(hasil.data);

            } else {
                alert(hasil.pesan);
                $('#btn_simpan').html('Simpan');
                $('#btn_simpan').attr('disabled', false);
            }
        }
    });

    return false;
});
</script>
<?= $this->endSection('dataTables'); ?>