<section>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="my-4 fw-500"><?= isset($title) ? $title : '' ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-3">
                <table class="table-default display nowrap w-100">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Role</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Aktivasi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $v) : ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td>
                                <?php
                                    $role = model('Role')->where('id', $v['id_role'])->first();
                                    echo $role['nama'];
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($v['img']) {
                                    $img = base_url('assets/img/' . $base_name . '/' . $v['img']);
                                } else {
                                    $img = base_url('assets/img/user-default.png');
                                }
                                ?>
                                <img src="<?= $img ?>" class="wh-40 img-style rounded-circle" loading="lazy">
                            </td>
                            <td><?= $v['nama'] ?></td>
                            <td><?= $v['jenis_kelamin'] ?></td>
                            <td><?= $v['alamat'] ?></td>
                            <td><?= $v['telp'] ?></td>
                            <td><?= $v['email'] ?></td>
                            <td><?= $v['activated_at'] != null ? date('d-m-Y H:i:s', strtotime($v['activated_at'])) : 'Belum aktivasi' ?></td>
                            <td>
                                <?php if ($v['id_role'] != 1) : ?>
                                <a href="<?= $base_route . '/edit/' . model('Env')->encode($v['id']) ?>">
                                    <i class="fa-regular fa-pen-to-square fa-lg me-2"></i>
                                </a>
                                <a data-bs-toggle="modal" data-bs-target="#hapus_data<?= model('Env')->encode($v['id']) ?>">
                                    <i class="fa-regular fa-trash-can fa-lg text-danger"></i>
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="hapus_data<?= model('Env')->encode($v['id']) ?>" tabindex="-1" aria-labelledby="hapusDataLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="hapusDataLabel">Hapus <?= str_replace('Data ','',$title) ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table>
                                                    <tr>
                                                        <td class="fw-500">Nama</td>
                                                        <td class="fw-500"> : &nbsp;</td>
                                                        <td> <?= $v['nama'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-500">Email</td>
                                                        <td class="fw-500"> : &nbsp;</td>
                                                        <td> <?= $v['email'] ?> </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="<?= $base_route . '/delete/' . model('Env')->encode($v['id']) ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
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
