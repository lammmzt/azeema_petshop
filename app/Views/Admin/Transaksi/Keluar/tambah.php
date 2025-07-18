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
                <a href="<?= base_url('Transaksi/Keluar'); ?>" class="btn btn-primary btn-sm"><i
                        class="fa fa-arrow-left"></i>
                    Kembali</a>
            </div>
            <div class="card-header">
                <h4 class="card-title"><?= $title; ?></h4>
                <!-- <a href="<?= base_url('Transaksi/tambah_transaksi_masuk'); ?>"
                    class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a> -->
            </div>
            <div class="card-body">
                <!-- form -->
                <form method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal_transaksi" class="form-control" required
                                    value="<?= date('Y-m-d'); ?>" readonly>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Ket Transaksi</label>
                                <textarea name="ket_transaksi" class="form-control" placeholder="Masukan keterangan"
                                    required rows="3" required></textarea>
                            </div>
                        </div> -->
                        <!-- add nama barang dan tombol plus -->
                        <div class="col-lg-11">
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <div class="input-group">
                                    <select name="id_detail_stok_tipe_barang" id="id_detail_stok_tipe_barang"
                                        class="form-control">
                                        <option value="">Pilih Barang</option>
                                        <?php foreach ($detail_stok_tipe_barang as $b) : ?>
                                        <option value="<?= $b['id_detail_stok_tipe_barang']; ?>"
                                            data-harga="<?= $b['harga_detail_stok_tipe_barang']; ?>"
                                            data-stok="<?= $b['jumlah_detail_stok_tipe_barang']; ?>">
                                            <?= $b['nama_barang']; ?>
                                            (<?= $b['merk_tipe_barang']; ?>) | <b> Stok:
                                                <?= $b['jumlah_detail_stok_tipe_barang']; ?> <?= $b['satuan']; ?> | Exp:
                                                <?= $b['exp_detail_stok_tipe_barang'] ? date('d-m-Y', strtotime($b['exp_detail_stok_tipe_barang'])) : 'Tidak Ada'; ?>
                                            </b>
                                        </option>
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
                            <tbody id="tabel_transaksi_keluar">

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
    $('#id_detail_stok_tipe_barang').select2();
});

var data_barang = [];
var total = 0;
// tambah barang
function tampilBarang() {
    var html = '';
    var no = 1;
    total = 0; // reset total
    if (data_barang.length > 0) { // jika ada data barang
        data_barang.forEach(function(item) { // tampilkan data barang
            html += '<tr>';
            html += '<td class="text-center">' + no + '</td>';
            html += '<td>' + item.nama_barang + '</td>';
            html += '<td> <input type="text" name="harga[]" class="form-control" min="1" value="' + item
                .harga +
                '" readonly> </td>';
            html +=
                '<td> <input type="number" name="jumlah[]" class="form-control text-center" min="1" style="max-width: 100px;" value="' +
                item
                .jumlah +
                '" > </td>';
            html += '<td> <input type="text" name="subtotal[]" class="form-control" value="' + formatRupiah(item
                    .subtotal) +
                '" readonly> </td>';
            html += '<td><button type="button" class="btn btn-danger btn-sm" onclick="hapusBarang(' + no +
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

    $('#tabel_transaksi_keluar').html(html);
}

tampilBarang(); // tampilkan barang

// tambah barang
$('#tambah_barang').on('click', function() {
    // alert('tambah barang');
    var id_detail_stok_tipe_barang = $('#id_detail_stok_tipe_barang').val();
    var nama_barang = $('#id_detail_stok_tipe_barang option:selected').text();
    var harga = $('#id_detail_stok_tipe_barang option:selected').data('harga');
    var stok = $('#id_detail_stok_tipe_barang option:selected').data('stok');
    var jumlah = 1;
    var subtotal = harga * jumlah;

    if (id_detail_stok_tipe_barang == '') { // jika barang belum dipilih
        alert('Pilih barang');
        return false;
    }

    if (jumlah > stok) { // jika jumlah melebihi stok
        alert('Stok barang tidak mencukupi (Stok: ' + stok + ')');
        return false;
    }

    // jika barang sudah ada
    var index = data_barang.findIndex(x => x.id_detail_stok_tipe_barang == id_detail_stok_tipe_barang);

    if (index == -1) { // jika barang belum ada
        data_barang.push({
            id_detail_stok_tipe_barang: id_detail_stok_tipe_barang,
            nama_barang: nama_barang,
            harga: harga,
            jumlah: jumlah,
            stok: stok,
            subtotal: subtotal
        });
    } else { // jika barang sudah ada
        if (data_barang[index].jumlah >= data_barang[index].stok) {
            alert('Stok barang tidak mencukupi (Stok: ' + data_barang[index].stok + ')');
            return false;
        }
        parseInt(data_barang[index].jumlah++);
        data_barang[index].subtotal = data_barang[index].jumlah * data_barang[index].harga;
    }

    tampilBarang(); // tampilkan barang
});

// ubah jumlah barang
$('#tabel_transaksi_keluar').on('change', 'input[name="jumlah[]"]', function() {
    // alert('ubah jumlah barang');
    var index = $(this).closest('tr').index(); // index baris
    var jumlah = $(this).val(); // jumlah barang
    if (jumlah < 1) { // jika jumlah kurang dari 1
        alert('Jumlah tidak boleh kurang dari 1');
        $(this).val(1);
        jumlah = 1;
    } else if (jumlah > data_barang[index].stok) { // jika jumlah melebihi stok
        alert('Jumlah stok tidak mencukupi (Stok: ' + data_barang[index].stok + ')');
        $(this).val(data_barang[index].stok);
        jumlah = data_barang[index].stok;
    }

    var harga = data_barang[index].harga; // harga barang
    var subtotal = jumlah * harga; // subtotal

    data_barang[index].jumlah = jumlah; // ubah jumlah barang
    data_barang[index].subtotal = subtotal; // ubah subtotal barang

    total = 0; // reset total
    tampilBarang(); // tampilkan barang
});

// ubah harga barang
$('#tabel_transaksi_keluar').on('change', 'input[name="harga[]"]', function() {
    // alert('ubah harga barang');
    var index = $(this).closest('tr').index(); // index baris
    var harga = $(this).val(); // harga barang
    var jumlah = data_barang[index].jumlah; // jumlah barang
    var subtotal = jumlah * harga; // subtotal

    data_barang[index].harga = harga; // ubah harga barang
    data_barang[index].subtotal = subtotal; // ubah subtotal barang

    tampilBarang(); // tampilkan barang
});


// hapus barang
function hapusBarang(index) {
    // alert('hapus barang ' + index);
    data_barang.splice(index - 1, 1);
    total = 0; // reset total
    tampilBarang(); // tampilkan barang
}


// simpan data
$('form').submit(function() {
    // alert('submit');
    if (data_barang.length == 0) { // jika tidak ada data barang
        alert('Pilih barang');
        return false;
    }

    // ubah btn simpan to loading
    $('#btn_simpan').html('<i class="fa fa-spin fa-spinner"></i> Loading...');
    $('#btn_simpan').attr('disabled', true);

    var form_data = $(this).serializeArray(); // ambil semua data form
    form_data.push({ // tambahkan total transaksi
        name: 'total_transaksi',
        value: total
    });
    form_data.push({ // tambahkan data barang
        name: 'data_barang',
        value: JSON.stringify(data_barang)
    });
    // console.log(form_data);
    $.ajax({
        url: '<?= base_url('Transaksi/simpan_transaksi_keluar'); ?>',
        type: 'post',
        data: form_data,
        dataType: 'json',
        success: function(hasil) {
            if (hasil.status == 200) {
                location.href = '<?= base_url('Transaksi/Keluar'); ?>';
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