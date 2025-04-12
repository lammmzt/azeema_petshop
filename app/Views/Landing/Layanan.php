<?= $this->extend('Landing/index') ?>
<?= $this->section('content') ?>


<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row my-4">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-4">Layanan</h2>
            </div>
        </div>
        <!-- dtail layaban-->
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/Layanan/' . $data_layanan['foto_layanan']) ?>" alt=""
                    class="img-fluid">
            </div>
            <div class="col-md-8">
                <div class="row ">
                    <div class="col-md-12">
                        <h3><?= $data_layanan['nama_layanan'] ?></h3>
                        <p><?= $data_layanan['deskripsi_layanan'] ?></p>
                        <p>Harga : <?= number_format($data_layanan['harga_layanan'], 0, ',', '.') ?> /
                            <?= $data_layanan['satuan_layanan'] ?></p>
                    </div>
                    <!-- btn add keranjang -->
                    <div class="col-md-12">
                        <a href="#" id="btn-add-keranjang" data-id="<?= $data_layanan['id_layanan'] ?>"
                            data-nama="<?= $data_layanan['nama_layanan'] ?>"
                            data-harga="<?= $data_layanan['harga_layanan'] ?>"
                            data-satuan="<?= $data_layanan['satuan_layanan'] ?>"
                            data-foto="<?= base_url('assets/img/Layanan/' . $data_layanan['foto_layanan']) ?>"
                            data-deskripsi="<?= $data_layanan['deskripsi_layanan'] ?>" class="btn btn-primary">Add to
                            Keranjang</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- layanan lainnya -->
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section ftco-animate">
                <h5 class="mb-4">Layanan Lainnya</h5>
            </div>
        </div>
        <div class="row">
            <?php foreach ($all_layanan as $layanan) : 
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
// get data form local storage
let keranjang = JSON.parse(localStorage.getItem('keranjang'));
if (keranjang == null) {
    keranjang = [];
}
// add to keranjang
$('#btn-add-keranjang').click(function(e) {
    e.preventDefault();
    let id_layanan = $(this).data('id');
    let nama_layanan = $(this).data('nama');
    let harga_layanan = $(this).data('harga');
    let satuan_layanan = $(this).data('satuan');
    let foto_layanan = $(this).data('foto');
    let deskripsi_layanan = $(this).data('deskripsi');

    let data_layanan = {
        id_layanan: id_layanan,
        nama_layanan: nama_layanan,
        harga_layanan: harga_layanan,
        satuan_layanan: satuan_layanan,
        foto_layanan: foto_layanan,
        deskripsi_layanan: deskripsi_layanan,
        qty: 1
    };
    // check if id_layanan already exists in keranjang
    let index = keranjang.findIndex(item => item.id_layanan == id_layanan);
    if (index == -1) {
        keranjang.push(data_layanan);
        localStorage.setItem('keranjang', JSON.stringify(keranjang));
        getSweetAlert('success', 'Berhasil', 'Layanan berhasil ditambahkan ke keranjang!');
        getJmlKeranjang();
        getKeranjang();
    } else {
        keranjang[index].qty += 1;
        localStorage.setItem('keranjang', JSON.stringify(keranjang));
        getSweetAlert('success', 'Berhasil', 'Layanan berhasil ditambahkan ke keranjang!');
        getJmlKeranjang();
        getKeranjang();
    }
});
</script>
<?= $this->endSection('script'); ?>