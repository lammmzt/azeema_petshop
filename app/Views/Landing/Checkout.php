<?= $this->extend('Landing/index') ?>
<?= $this->section('content') ?>


<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row my-4">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-4">Checkout</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-left mb-4">
                <a href="<?= base_url('LandingPage/Keranjang') ?>" class="btn btn-primary">
                    <i class="fa fa-arrow-left"></i> Kembali ke Keranjang
                </a>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="contact-form" id="form_keranjang" method="POST" enctype="multipart/form-data">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_user">Nama Lengkap</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="Username" readonly value="<?= $data_user['username'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp_user">No Hp Aktif</label>
                                <input type="text" class="form-control" name="no_hp_user" id="no_hp_user"
                                    placeholder="No HP" readonly value="<?= $data_user['no_hp_user'] ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id_user" id="id_user" value="<?= $data_user['id_user'] ?>">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat_user">Alamat Lengkap</label>
                                <input type="text" class="form-control" name="alamat_user" id="alamat_user"
                                    placeholder="Alamat" readonly value="<?= $data_user['alamat_user'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_datang">Tanggal Kedatangan</label>
                                <input type="date" class="form-control" name="tanggal_datang" id="tanggal_datang"
                                    placeholder="Tanggal Pemesanan" value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jam_datang">Jam Datang</label>
                                <input type="time" class="form-control" name="jam_datang" id="jam_datang"
                                    placeholder="Jam Pemesanan" required value="<?= date('H:i') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ket_order">Catatan</label>
                                <textarea name="ket_order" id="ket_order" class="form-control" rows="3"
                                    placeholder="Catatan"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipe_pembayaran">Tipe Pembayaran</label>
                                <select name="tipe_pembayaran" id="tipe_pembayaran" class="form-control" required>
                                    <option value="">Pilih Tipe Pembayaran</option>
                                    <option value="0">Cash</option>
                                    <option value="1">Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="div_bukti_pembayaran1" style="display: none;">
                            <img src="<?= base_url('assets/img/Logo-BCA.jpg') ?>" alt="BCA" class="img-fluid float-left"
                                width="100">
                            <p class="text-center">No Rek: 1234567890</p>
                            <p class="text-center">A/N: Azema Petshop</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="div_bukti_pembayaran" style="display: none;">
                            <div class="form-group">
                                <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                                <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran"
                                    placeholder="Upload Bukti Pembayaran">
                            </div>
                        </div>

                    </div>
                    <hr style="border: 1px solid #000;">
                    <div class="row mb-2">
                        <div class="col-md-12 text-center heading-section">
                            <h5 class="mb-4">Detail Pemesanan</h5>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="table_keranjang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_keranjang">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right">Total</td>
                                    <td id="total_harga" colspan="2" class="text-left">Rp. 0</td>
                                </tr>
                                <tr id="btn_checkout" style="display: none;">
                                    <td colspan="7" class="text-right">
                                        <button type="submit" class="btn btn-primary"
                                            id="btn_checkout">Checkout</button>
                                    </td>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>
<?= $this->section('script'); ?>
<script>
let keranjang = [];

function getKeranjang() {
    let data_keranjang = localStorage.getItem('keranjang');
    if (data_keranjang) {
        keranjang = JSON.parse(data_keranjang);
        return keranjang;
    } else {
        keranjang = [];
        localStorage.setItem('keranjang', JSON.stringify(keranjang));
        return keranjang;
    }
}

getKeranjang();
// console.log(keranjang);

// get data from local storage and display to table
function tampilkanKeranjang() {
    // alert('test');
    let tbody_keranjang = document.getElementById('tbody_keranjang');

    let total_harga = document.getElementById('total_harga');
    let total = 0;
    tbody_keranjang.innerHTML = '';
    if (keranjang.length > 0) {
        for (let i = 0; i < keranjang.length; i++) {
            let tr = document.createElement('tr');
            tr.innerHTML = `
                <td class="text-center">${i + 1}</td>
                <td><img src="${keranjang[i].foto_layanan}" alt="" class="img-fluid" width="100"></td>
                <td>${keranjang[i].nama_layanan}</td>
                <td>Rp. ${keranjang[i].harga_layanan.toLocaleString()} / ${keranjang[i].satuan_layanan}</td>
                <td class="text-center">${keranjang[i].qty}</td>
                <td>Rp. ${(keranjang[i].harga_layanan * keranjang[i].qty).toLocaleString()}</td>
            `;
            tbody_keranjang.appendChild(tr);
            total += keranjang[i].harga_layanan * keranjang[i].qty;
        }
        total_harga.innerHTML = 'Rp. ' + total.toLocaleString();
        if (total > 0) {
            document.getElementById('btn_checkout').style.display = 'table-row';
        } else {
            document.getElementById('btn_checkout').style.display = 'none';
        }

    } else {
        tbody_keranjang.innerHTML = '<tr><td colspan="7" class="text-center">Keranjang Kosong</td></tr>';
        total_harga.innerHTML = 'Rp. 0';
        document.getElementById('btn_checkout').style.display = 'none';
    }
}
tampilkanKeranjang();


// when tipe_pembayaran is changed, show or hide div_bukti_pembayaran
$('#tipe_pembayaran').change(function() {
    if ($(this).val() == '1') {
        $('#div_bukti_pembayaran').show();
        $('#div_bukti_pembayaran1').show();
    } else {
        $('#div_bukti_pembayaran').hide();
        $('#div_bukti_pembayaran1').hide();
    }
});

// when form_keranjang is submitted, save to database
$('#form_keranjang').submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append('data_layanan', JSON.stringify(keranjang));
    let tipe_pembayaran = $('#tipe_pembayaran').val();
    if (tipe_pembayaran == '1') {
        if ($('#bukti_pembayaran').val() == '') {
            getSweetAlert('warning', 'Peringatan', 'Upload Bukti Pembayaran!');
            return false;
        }
    }
    // $('#btn_checkout').attr('disabled', true);
    // $('#btn_checkout').html('<i class="fa fa-spinner fa-spin"></i> Loading...');

    $.ajax({
        url: '<?= base_url('LandingPage/saveCheckout') ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // console.log(response);
            if (response.status == '200') {
                localStorage.removeItem('keranjang');
                getSweetAlert('success', 'Berhasil', response.message);
                setTimeout(function() {
                    window.location.href = '<?= base_url('LandingPage/Riwayat') ?>';
                }, 2000);
            } else {
                getSweetAlert('error', 'Gagal', response.message);
                $('#btn_checkout').attr('disabled', false);
                $('#btn_checkout').html('Checkout');
            }
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
});
</script>
<?= $this->endSection('script'); ?>