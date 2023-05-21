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
                                    <div class="wh-150 position-relative">
                                    <?php
                                    if ($data['img']) {
                                        $img = base_url('assets/img/' . $base_name . '/' . $data['img']);
                                    } else {
                                        $img = base_url('assets/img/user-default.png');
                                    }
                                    ?>
                                        <img src="<?= $img ?>" class="w-100 h-100 img-style rounded-circle <?= validation_show_error('img') ? 'border border-danger' : '' ?>" id="frame">
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
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?? $data['nama'] ?>" placeholder="Masukkan nama lengkap">
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('nama') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select <?= validation_show_error('jenis_kelamin') ? 'is-invalid' : '' ?>" id="jenis_kelamin" name="jenis_kelamin">
                                        <?php
                                        $jenis_kelamin = ['Laki-laki', 'Perempuan'];
                                        foreach ($jenis_kelamin as $v) :   
                                            if (old('jenis_kelamin') == $v) {
                                                $selected = 'selected';
                                            }elseif ($data['jenis_kelamin'] == $v) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                        ?>
                                        <option value="<?= $v ?>" <?= $selected ?> ><?= $v ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('jenis_kelamin') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control <?= validation_show_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat"><?= old('alamat') ?? $data['alamat'] ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('alamat') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="id_role" class="form-label">Role</label>
                                    <select class="form-select <?= validation_show_error('id_role') ? 'is-invalid' : '' ?>" id="id_role" name="id_role">
                                        <?php
                                        $role = model('Role')->find([2, 3]);
                                        foreach ($role as $v) :     
                                            if (old('id_role')) {
                                                if (old('id_role') == $v['id']) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                            } else {
                                                if ($data['id_role'] == $v['id']) {
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
                                        <?= validation_show_error('id_role') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="telp" class="form-label">No. Telepon</label>
                                    <input type="number" class="form-control <?= validation_show_error('telp') ? 'is-invalid' : '' ?>" id="telp" name="telp" value="<?= old('telp') ?? $data['telp'] ?>" placeholder="08xx">
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('telp') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="<?= $data['email'] ?>" placeholder="name@gmail.com" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Ubah Password</label><span class="text-secondary"> (opsional)</span>
                                    <div class="mb-2 position-relative">
                                        <input type="password" class="form-control <?= validation_show_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" value="<?= old('password') ?>" placeholder="Password">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('password') ?>
                                        </div>
								        <img src="<?= base_url('assets/img/show.png') ?>" class="position-absolute" id="eye_password">
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control <?= validation_show_error('passconf') ? 'is-invalid' : '' ?>" id="passconf" name="passconf" value="<?= old('passconf') ?>" placeholder="Confirm password">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('passconf') ?>
                                        </div>
								        <img src="<?= base_url('assets/img/show.png') ?>" class="position-absolute" id="eye_passconf">
                                    </div>
                                </div>
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
dselect(document.querySelector('#jenis_kelamin'));
dselect(document.querySelector('#id_role'));
</script>

<!-- Modal hapus foto profil -->
<div class="modal fade" id="deleteImage" tabindex="-1" aria-labelledby="deleteImageLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteImageLabel">Hapus foto profil?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="<?= $base_route . '/delete-image/' . model('Env')->encode($data['id']) ?>" method="post">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
let eye_password = document.getElementById('eye_password');
eye_password.onclick = () => {
    let input_password = document.getElementById('password');
	if (input_password.getAttribute('type') == 'password') {
		input_password.type = 'text';
		eye_password.src = "<?= base_url('assets/img/hide.png') ?>"
	} else {
		input_password.type ='password';
		eye_password.src = "<?= base_url('assets/img/show.png') ?>"
	}
};
let eye_passconf = document.getElementById('eye_passconf');
eye_passconf.onclick = () => {
    let input_passconf = document.getElementById('passconf');
	if (input_passconf.getAttribute('type') == 'password') {
		input_passconf.type = 'text';
		eye_passconf.src = "<?= base_url('assets/img/hide.png') ?>"
	} else {
		input_passconf.type ='password';
		eye_passconf.src = "<?= base_url('assets/img/show.png') ?>"
	}
};
</script>