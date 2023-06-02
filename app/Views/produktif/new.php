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
                    <form action="<?= $base_route . '/create' ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <div class="col-md-6 position-relative">
                                        <img src="<?= base_url('assets/img/default.png') ?>" class="w-100 h-100 img-style <?= validation_show_error('img') ? 'border border-danger' : '' ?>" id="frame">
                                        <div class="position-absolute" style="bottom:0px;right:0px">
                                            <button class="btn btn-secondary rounded-circle" style="padding:8px 10px" type="button" data-bs-toggle="modal" data-bs-target="#option">
                                                <i class="fa-solid fa-camera fa-lg"></i>
                                            </button>                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="option" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div data-bs-dismiss="modal">
                                                                <input type="file" class="form-control" name="img" accept="image/*" onchange="preview()">
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
                                    <input type="text" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?>" placeholder="Masukkan nama">
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('nama') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tautan" class="form-label">Tautan</label>
                                    <input type="text" class="form-control <?= validation_show_error('tautan') ? 'is-invalid' : '' ?>" id="tautan" name="tautan" value="<?= old('tautan') ?>" placeholder="https://example.com/">
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('tautan') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control <?= validation_show_error('deskripsi') ? 'is-invalid' : '' ?>" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan deskripsi"><?= old('deskripsi') ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('deskripsi') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!--  -->
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 float-end">Tambahkan</button>
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
