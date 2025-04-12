<?= $this->extend('Landing/index') ?>
<?= $this->section('content') ?>


<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row my-4">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-4">Profile</h2>
                <p>Silahkan isi data profile anda dengan benar.</p>
            </div>
            <form action="<?= base_url('LandingPage/updateProfile'); ?>" method="post"
                class="col-md-12 ftco-animate p-4 p-md-5 border">
                <!-- alert -->
                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                </div>
                <?php endif; ?>
                <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="nama_user">Nama User</label>
                        <input type="text" id="nama_user" name="nama_user"
                            class="form-control <?= ($validation->hasError('nama_user')) ? 'is-invalid' : ''; ?>"
                            value="<?= $data_user['nama_user']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_user'); ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="username"
                            class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                            value="<?= $data_user['username']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="old_password">Password Lama</label>
                        <input type="old_password" id="old_password" name="old_password"
                            class="form-control <?= ($validation->hasError('old_password')) ? 'is-invalid' : ''; ?>"
                            placeholder="Kosongkan jika tidak ingin mengganti password">
                        <div class="invalid-feedback">
                            <?= $validation->getError('old_password'); ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="new_password">Password Baru</label>
                        <input type="new_password" id="new_password" name="new_password"
                            class="form-control <?= ($validation->hasError('new_password')) ? 'is-invalid' : ''; ?>"
                            placeholder="Kosongkan jika tidak ingin mengganti password">
                        <div class="invalid-feedback">
                            <?= $validation->getError('new_password'); ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="no_hp_user">No HP</label>
                        <input type="text" id="no_hp_user" name="no_hp_user"
                            class="form-control <?= ($validation->hasError('no_hp_user')) ? 'is-invalid' : ''; ?>"
                            value="<?= $data_user['no_hp_user']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_hp_user'); ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="alamat_user">Alamat</label>
                        <textarea id="alamat_user" name="alamat_user"
                            class="form-control <?= ($validation->hasError('alamat_user')) ? 'is-invalid' : ''; ?>"
                            required><?= $data_user['alamat_user']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_user'); ?>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_user" value="<?= $data_user['id_user']; ?>">
                <input type="hidden" name="csrf_token" value="<?= csrf_hash(); ?>">

                <div class="row form-group">
                    <div class="col-md-12 mb-2 mb-md-0 mt-2">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>