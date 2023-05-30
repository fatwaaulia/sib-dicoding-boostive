<link rel="stylesheet" href="<?= base_url() . 'assets/css/bootstrap.min.css' ?>">
<link rel="stylesheet" href="<?= base_url() . 'assets/css/main.css' ?>">

<script src="<?= base_url() . 'assets/js/jquery.min.js' ?>"></script>

<!-- Datatables -->
<link rel="stylesheet" href="<?= base_url() . 'assets/module/datatables/css/jquery.dataTables.min.css' ?>">
<link rel="stylesheet" href="<?= base_url() . 'assets/module/datatables/css/dataTables.dateTime.min.css' ?>">
<link rel="stylesheet" href="<?= base_url() . 'assets/module/datatables/css/buttons.dataTables.min.css' ?>">

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
                        <p class="mb-4">Terima kasih atas kontribusi Anda dalam berbagi tools bermanfaat.</p>
                    </div>
                    <table class="table-default display nowrap w-100">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Nama Kegiatan</th>
                                <th>Kontributor</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nama_kontributor = $_GET['nama_kontributor'];
                            $email_kontributor = $_GET['email_kontributor'];
                            $where = [
                                'nama_kontributor' => $nama_kontributor,
                                'email_kontributor' => $email_kontributor,
                            ];
                            $data_kontribusi = model('Kontribusi')->where($where)->findAll();
                            $data_produktif = model('Produktif')->where($where)->findAll();
                            foreach (array_merge($data_kontribusi, $data_produktif) as $key => $v) :
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
                                <td><?= $v['nama_kontributor'] ?></td>
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
<script src="<?= base_url() . 'assets/module/datatables/js/dataTables.buttons.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/module/datatables/js/jszip.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/module/datatables/js/buttons.html5.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/module/datatables/js/buttons.colVis.min.js' ?>"></script>
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
    $('.table-excel').DataTable({
        "scrollX": true,
        "columnDefs": [{
                "searchable": false,
                "targets": [0],
            }
        ],
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis',
        ],
    });
});
</script>