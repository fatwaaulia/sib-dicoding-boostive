<link rel="stylesheet" href="<?= base_url() . 'assets/css/bootstrap.min.css' ?>">
<link rel="stylesheet" href="<?= base_url() . 'assets/css/main.css' ?>">
<script src="<?= base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/sweetalert2.js' ?>"></script>

    <!-- loader -->
    <div class="loader-bg position-absolute top-50 start-50 translate-middle">
        <div class="loader-p"></div>
    </div>
    <script>
    setTimeout(() => {
        $('.loader-bg').fadeToggle();
    });
    </script>
    <!-- Akhir Loader -->

    <!-- Pesan -->
    <?= session()->getFlashdata('message') ?>
    <?php if(session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
            icon: 'error',
            title: '<?= session()->getFlashdata('error') ?>',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            })
        </script>
    <?php endif; ?>
    <!-- Akhir Pesan -->

<section>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <style>
            #back-arrow {transition:.5s;}
            #back-arrow:hover {padding-left:5px;}
            </style>
            <a href="<?= base_url() ?>" class="text-dark" id="back-arrow">
                <i class="fa-solid fa-arrow-left-long fa-lg"></i>
            </a>
        </div>
    </div>
</div>
<div class="container py-4">
    <div class="row">
        <div class="offset-xxl-3 col-xxl-6 offset-lg-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2 class="mb-2 fw-600">Formulir Kontribusi</h2>
                        <p class="mb-4">Bagikan tools bermanfaat kepada banyak orang.</p>
                    </div>
                    <a href="#" class="float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Periksa status kontribusi</a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="<?= base_url('status-kontribusi') ?>" method="get">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Periksa status kontribusi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="periksa_nama_kontributor" class="form-label">Nama Anda</label>
                                            <input type="text" class="form-control" id="periksa_nama_kontributor" name="nama_kontributor" required placeholder="Masukkan nama anda">
                                        </div>
                                        <div class="mb-3">
                                            <label for="periksa_email_kontributor" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="periksa_email_kontributor" name="email_kontributor" required placeholder="name@gmail.com">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Periksa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <form action="<?= base_url('formulir-kontribusi/kirim') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                        <label class="fw-600 mb-3">Kontributor</label>
                        <div class="mb-3">
                            <label for="nama_kontributor" class="form-label">Nama Anda</label>
                            <input type="text" class="form-control <?= validation_show_error('nama_kontributor') ? 'is-invalid' : '' ?>" id="nama_kontributor" name="nama_kontributor" value="<?= old('nama_kontributor') ?>" placeholder="Masukkan nama anda" autocomplete="off">
                            <div class="invalid-feedback">
                                <?= validation_show_error('nama_kontributor') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email_kontributor" class="form-label">Email</label>
                            <input type="text" class="form-control <?= validation_show_error('email_kontributor') ? 'is-invalid' : '' ?>" id="email_kontributor" name="email_kontributor" value="<?= old('email_kontributor') ?>" placeholder="name@gmail.com" autocomplete="off">
                            <div class="invalid-feedback">
                                <?= validation_show_error('email_kontributor') ?>
                            </div>
                        </div>
                        <label class="fw-600 mb-3 mt-1">Data Produktif</label>
                        <div class="mb-3">
                            <label for="id_kategori" class="form-label">Kategori</label>
                            <select class="form-select <?= validation_show_error('id_kategori') ? 'is-invalid' : '' ?>" id="id_kategori" name="id_kategori">
                                <option value="">~Pilih</option>
                                <?php
                                $kategori_produktif = model('KategoriProduktif')->findAll();
                                foreach ($kategori_produktif as $v) :
                                    if (old('id_kategori') == $v['id']) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                    ?>
                                <option value="<?= $v['id'] ?>" <?= $selected ?> ><?= $v['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= validation_show_error('id_kategori') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?>" placeholder="Masukkan nama kegiatan" autocomplete="off">
                            <div class="invalid-feedback">
                                <?= validation_show_error('nama') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tautan" class="form-label">Tautan</label>
                            <input type="text" class="form-control <?= validation_show_error('tautan') ? 'is-invalid' : '' ?>" id="tautan" name="tautan" value="<?= old('tautan') ?>" placeholder="https://example.com/" autocomplete="off">
                            <div class="invalid-feedback">
                                <?= validation_show_error('tautan') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control <?= validation_show_error('deskripsi') ? 'is-invalid' : '' ?>" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan deskripsi" autocomplete="off"><?= old('deskripsi') ?></textarea>
                            <div class="invalid-feedback">
                                <?= validation_show_error('deskripsi') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                        <?php
                        $angka_pertama = random_string('numeric', 1);
                        $angka_kedua = random_string('numeric', 1);
                        $penjumlahan = $angka_pertama . ' + ' . $angka_kedua;
                        ?>
                        <label for="input_penjumlahan" class="form-label fw-600"><?= $penjumlahan ?></label>
                        <input type="hidden" name="angka_pertama" value="<?= $angka_pertama ?>">
                        <input type="hidden" name="angka_kedua" value="<?= $angka_kedua ?>">
                        <input type="number" class="form-control <?= validation_show_error('input_penjumlahan') ? 'is-invalid' : '' ?>" name="input_penjumlahan" value="<?= old('input_penjumlahan') ?>" placeholder="Hasil dari <?= $penjumlahan ?>" autocomplete="off">
                        <div class="invalid-feedback">
                            <?= validation_show_error('input_penjumlahan') ?>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 px-5 float-end">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<script src="<?= base_url() . 'assets/js/bootstrap.bundle.min.js' ?>"></script>

<!-- Dselect -->
<link rel="stylesheet" href="<?= base_url() . 'assets/css/dselect.css' ?>">
<script src="<?= base_url() . 'assets/js/dselect.js' ?>"></script>
<script>
dselect(document.querySelector('#id_kategori'));
</script>
