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
                <div class="row">
                    <div class="col-12">
                        <a href="<?= $base_route . '/new' ?>" class="btn btn-primary mb-3" style="padding:5px 10px">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                </div>
                <table class="table-default display nowrap w-100">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Kontributor</th>
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
                            <td>
                                <?php
                                $kategori_produktif = model('Users')->where('id', $v['id_kontributor'])->first();
                                echo $kategori_produktif['nama'];
                                ?>
                            </td>
                            <td>
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
                                                        <td class="fw-500"> :&nbsp;</td>
                                                        <td> <?= $v['nama'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-500">Kontributor</td>
                                                        <td class="fw-500"> :&nbsp;</td>
                                                        <td> 
                                                            <?php
                                                            $kategori_produktif = model('Users')->where('id', $v['id_kontributor'])->first();
                                                            echo $kategori_produktif['nama'];
                                                            ?> 
                                                        </td>
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
