<?= $this->extend('Landing/index') ?>
<?= $this->section('content') ?>


<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row my-4">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-4">Keranjang</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
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
                                <th>Aksi</th>
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
                                    <a href="<?= base_url('LandingPage/Checkout') ?>"
                                        class="btn btn-primary">Checkout</a>
                                </td>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- layanan lainnya -->
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section ftco-animate">
                <h5 class="mb-4">Layanan Lainnya</h5>
            </div>
        </div>
        <div class="row mt-2">
            <?php foreach ($data_layanan as $layanan) : 
            $no = 1; ?>
            <div class="col-md-3 ftco-animate data-layanan">
                <div class="services-2 text-center">
                    <a href="<?= base_url('LandingPage/Layanan/' . $layanan['id_layanan']) ?>">
                        <img src="<?= base_url('assets/img/Layanan/' . $layanan['foto_layanan']) ?>" alt=""
                            class="img-fluid">
                    </a>
                    <div class="text">
                        <h3><a
                                href="<?= base_url('LandingPage/Layanan/' . $layanan['id_layanan']) ?>"><?= $layanan['nama_layanan'] ?></a>
                        </h3>
                        <p><?= number_format($layanan['harga_layanan'], 0, ',', '.') ?> /
                            <?= $layanan['satuan_layanan'] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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
                <td><input type="number" class="form-control change_qty" value="${keranjang[i].qty}" min="1" max="10" data-index="${keranjang[i].id_layanan}" style="min-width: 60px;"></td>
                <td>Rp. ${(keranjang[i].harga_layanan * keranjang[i].qty).toLocaleString()}</td>
                <td><button class="btn btn-danger" onclick="hapusKeranjang(${i})">Hapus</button></td>
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
// function to remove item from keranjang
function hapusKeranjang(index) {
    keranjang.splice(index, 1);
    localStorage.setItem('keranjang', JSON.stringify(keranjang));
    getKeranjang();
    tampilkanKeranjang();
    getJmlKeranjang();
}

// change qty when input change_qty
$('.change_qty').on('focusout', function() {
    let index = $(this).data('index');
    let qty = $(this).val();
    let index_keranjang = keranjang.findIndex(item => item.id_layanan == index);
    if (qty < 1) {
        getSweetAlert('error', 'Gagal', 'Jumlah tidak boleh kurang dari 1!');
        $(this).val(keranjang[index_keranjang].qty);
    } else if (qty > 10) {
        getSweetAlert('error', 'Gagal', 'Jumlah tidak boleh lebih dari 10!');
        $(this).val(keranjang[index_keranjang].qty);
    } else {
        keranjang[index_keranjang].qty = qty;
        localStorage.setItem('keranjang', JSON.stringify(keranjang));
        window.location.reload();
    }
});
</script>
<?= $this->endSection('script'); ?>