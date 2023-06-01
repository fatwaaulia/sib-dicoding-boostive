<section>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="my-4"><?= isset($title) ? $title : '' ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= $base_route . '/update/' . model('Env')->encode($data['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Kontributor</label>
                                    <input type="text" class="form-control" value="<?= $data['nama_kontributor'] ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email Kontributor</label>
                                    <input type="email" class="form-control" value="<?= $data['email_kontributor'] ?>" disabled>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <div class="col-md-6 position-relative">
                                    <?php
                                    if ($data['img']) {
                                        $img = base_url('assets/img/' . $base_name . '/' . $data['img']);
                                    } else {
                                        $img = base_url('assets/img/default.png');
                                    }
                                    ?>
                                        <img src="<?= $img ?>" class="w-100 h-100 img-style <?= validation_show_error('img') ? 'border border-danger' : '' ?>" id="frame">
                                        <div class="position-absolute" style="bottom:0px;right:0px">
                                            <button class="btn btn-secondary rounded-circle" style="padding:8px 10px" type="button" data-bs-toggle="modal" data-bs-target="#option">
                                                <i class="fa-solid fa-pen fa-lg"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="option" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div data-bs-dismiss="modal">
                                                                <input type="file" class="form-control" name="img" accept="image/*" onchange="preview()">
                                                                <?php if ($data['img']) : ?>
                                                                <div class="mt-3">
                                                                    <a href="#" class="text-secondary" data-bs-toggle="modal" data-bs-target="#deleteImage">
                                                                        <i class="fa-solid fa-trash-can fa-lg"></i>
                                                                        Hapus
                                                                    </a>
                                                                </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="<?= validation_show_error('img') ? 'is-invalid' : '' ?>">
                                    </span>
                                    <div class="invalid-feedback">
                                        <?= str_replace('img,', 'gambar ', validation_show_error('img')) ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="id_kategori" class="form-label">Kategori</label>
                                    <select class="form-select <?= validation_show_error('id_kategori') ? 'is-invalid' : '' ?>" id="id_kategori" name="id_kategori">
                                        <option value="">~Pilih</option>
                                        <?php
                                        $kategori_produktif = model('KategoriProduktif')->findAll();
                                        foreach ($kategori_produktif as $v) : 
                                            if (old('id_kategori')) {
                                                if (old('id_kategori') == $v['id']) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                            } else {
                                                if ($data['id_kategori'] == $v['id']) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
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
                                    <input type="text" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?? $data['nama'] ?>" placeholder="Masukkan nama">
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('nama') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tautan" class="form-label">Tautan</label>
                                    <input type="text" class="form-control <?= validation_show_error('tautan') ? 'is-invalid' : '' ?>" id="tautan" name="tautan" value="<?= old('tautan') ?? $data['tautan'] ?>" placeholder="https://example.com/">
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('tautan') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control <?= validation_show_error('deskripsi') ? 'is-invalid' : '' ?>" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan deskripsi"><?= old('deskripsi') ?? $data['deskripsi'] ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('deskripsi') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!--  -->
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 float-end">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- Dselect -->
<link rel="stylesheet" href="<?= base_url() . 'assets/css/dselect.css' ?>">
<script src="<?= base_url() . 'assets/js/dselect.js' ?>"></script>
<script>
dselect(document.querySelector('#id_kategori'));
</script>

<!-- Modal hapus gambar -->
<div class="modal fade" id="deleteImage" tabindex="-1" aria-labelledby="deleteImageLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteImageLabel">Hapus gambar?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <form action="<?= $base_route . '/delete-image/' . model('Env')->encode($data['id']) ?>" method="post">
                <?= csrf_field(); ?>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
        </div>
    </div>
</div>