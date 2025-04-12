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
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>
<?= $this->section('script'); ?>
<script>
function getKeranjang() {
    let keranjang = localStorage.getItem('keranjang');
    if (keranjang) {
        return JSON.parse(keranjang);
    } else {
        return [];
    }
}
let keranjang = getKeranjang();

console.log(keranjang);

// get data from local storage and display to table
function tampilkanKeranjang() {
    let tbody_keranjang = document.getElementById('tbody_keranjang');

    let total_harga = document.getElementById('total_harga');
    let total = 0;
    tbody_keranjang.innerHTML = '';
    if (keranjang.length > 0) {
        for (let i = 0; i < keranjang.length; i++) {
            let tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${i + 1}</td>
                <td><img src="${keranjang[i].foto_layanan}" alt="" class="img-fluid" width="100"></td>
                <td>${keranjang[i].nama_layanan}</td>
                <td>Rp. ${keranjang[i].harga_layanan.toLocaleString()}</td>
                <td>${keranjang[i].qty}</td>
                <td>Rp. ${(keranjang[i].harga_layanan * keranjang[i].qty).toLocaleString()}</td>
                <td><button class="btn btn-danger" onclick="hapusKeranjang(${i})">Hapus</button></td>
            `;
            tbody_keranjang.appendChild(tr);
            total += keranjang[i].harga_layanan * keranjang[i].qty;
        }
        total_harga.innerHTML = 'Rp. ' + total.toLocaleString();
    } else {
        tbody_keranjang.innerHTML = '<tr><td colspan="7" class="text-center">Keranjang Kosong</td></tr>';
        total_harga.innerHTML = 'Rp. 0';
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

// function to checkout
</script>
<?= $this->endSection('script'); ?>