<html style="background-color:#f5f7fb">

<link rel="stylesheet" href="<?= base_url() . 'assets/css/bootstrap.min.css' ?>">
<link rel="stylesheet" href="<?= base_url() . 'assets/css/main.css' ?>">

<script src="<?= base_url() . 'assets/js/jquery.min.js' ?>"></script>

<!-- Datatables -->
<link rel="stylesheet" href="<?= base_url() . 'assets/module/datatables/css/jquery.dataTables.min.css' ?>">

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

<section>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <style>
            #back-arrow {transition:.5s;}
            #back-arrow:hover {padding-left:5px;}
            </style>
            <a href="<?= base_url('formulir-kontribusi') ?>" class="text-dark" id="back-arrow">
                <i class="fa-solid fa-arrow-left-long fa-lg"></i>
            </a>
        </div>
    </div>
</div>
<div class="container py-4">
    <div class="row">
        <div class="offset-xxl-3 col-xxl-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2 class="mb-2 fw-600">Status Kontribusi Anda</h2>
                        <?php
                        $nama_kontributor = $_GET['nama_kontributor'];
                        $email_kontributor = $_GET['email_kontributor'];
                        $where = [
                            'nama_kontributor' => $nama_kontributor,
                            'email_kontributor' => $email_kontributor,
                        ];
                        $data_kontribusi = model('Kontribusi')->where($where)->findAll();
                        $data_produktif = model('Produktif')->where($where)->findAll();
                        $status_kontribusi = array_merge($data_kontribusi, $data_produktif);

                        if ($status_kontribusi) {
                        ?>
                        <p>Terima kasih atas kontribusi Anda dalam berbagi tools bermanfaat.</p>
                        <?php } else { ?>
                        <p>Anda belum memiliki kontribusi, mulai bagikan tools bermanfaat <a href="<?= base_url('formulir-kontribusi') ?>">disini.</a></p>
                        <?php } ?>
                    </div>
                    <div class="mb-4">
                        <label>Nama: <?= $_GET['nama_kontributor'] ?></label> <br>
                        <label>Email: <?= $_GET['email_kontributor'] ?></label>
                    </div>
                    <table class="table-default display nowrap w-100">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Nama Kegiatan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($status_kontribusi as $key => $v) :
                            ?>
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
                                $status = isset($v['status']);
                                if($status) {
                                    echo $v['status'];
                                } else {
                                    echo 'Diterima';
                                }
                                ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<script src="<?= base_url() . 'assets/js/bootstrap.bundle.min.js' ?>"></script>

<!-- Datatables -->
<script src="<?= base_url() . 'assets/module/datatables/js/jquery.dataTables.min.js' ?>"></script>
<script>
$(document).ready(function() {
    $('.table-default').DataTable({
        "scrollX": true,
        "columnDefs": [{
                "searchable": false,
                "targets": [0],
            }
        ],
    });
});
</script>