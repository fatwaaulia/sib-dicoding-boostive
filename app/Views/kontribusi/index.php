<section>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="my-4"><?= isset($title) ? $title : '' ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-3">
                <table class="table-default display nowrap w-100">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Nama Kegiatan</th>
                            <th>Kontributor</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $v) : ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td>
                                <?php
                                $kategori_produktif = model('KategoriProduktif')->where('id', $v['id_kategori'])->first();
                                echo $kategori_produktif['nama'];
                                ?>
                            </td>
                            <td>
                                <?= $v['nama'] ?>
                                <a href="<?= $v['tautan'] ?>" target="_blank">
                                    <i class="fa-solid fa-up-right-from-square ms-1"></i>
                                </a>
                            </td>
                            <td><?= $v['nama_kontributor'] ?></td>
                            <td><?= $v['status'] ?></td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#periksa_pengajuan_kontribusi<?= model('Env')->encode($v['id']) ?>">
                                    <i class="fa-regular fa-pen-to-square fa-lg"></i>
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="periksa_pengajuan_kontribusi<?= model('Env')->encode($v['id']) ?>" tabindex="-1" aria-labelledby="periksaDataLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="periksaDataLabel">Periksa <?= str_replace('Data ','',$title) ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <?= $v['nama_kontributor'] ?>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <?= date('d-m-Y H:i', strtotime($v['created_at'])) ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-3">
                                                    <label class="form-label">Kategori</label>
                                                    <input type="text" class="form-control" value="<?= $kategori_produktif['nama'] ?>" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Kegiatan</label>
                                                    <input type="text" class="form-control" value="<?= $v['nama'] ?>" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" rows="7" disabled><?= $v['deskripsi'] ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tautan </label> <br>
                                                    <a href="<?= $v['tautan'] ?>" target="_blank"><?= $v['tautan'] ?></a>
                                                </div>
                                                <form action="<?= base_url('pengajuan-kontribusi/update/') . model('Env')->encode($v['id']) ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select <?= validation_show_error('status') ? 'is-invalid' : '' ?>" id="status" name="status">
                                                        <?php
                                                        $status = ['Diproses', 'Diterima', 'Ditolak'];
                                                        foreach ($status as $v_status) : 
                                                            if (old('status')) {
                                                                if (old('status') == $v_status) {
                                                                    $selected = 'selected';
                                                                } else {
                                                                    $selected = '';
                                                                }
                                                            } else {
                                                                if ($v['status'] == $v_status) {
                                                                    $selected = 'selected';
                                                                } else {
                                                                    $selected = '';
                                                                }
                                                            }
                                                        ?>
                                                        <option value="<?= $v_status ?>" <?= $selected ?> ><?= $v_status ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        <?= validation_show_error('status') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>


<!-- Dselect -->
<link rel="stylesheet" href="<?= base_url() . 'assets/css/dselect.css' ?>">
<script src="<?= base_url() . 'assets/js/dselect.js' ?>"></script>
<script>
dselect(document.querySelector('#status'));
</script>
