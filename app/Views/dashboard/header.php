<!DOCTYPE html>
<html>
<head>
    <?= csrf_meta() ?>
    <meta name="dicoding:email" content="fatwaaulia.fy@gmail.com">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="<?= base_url() . 'favicon.png' ?>">
    <meta property="og:title" content="<?= isset($title) ? $title . ' | ' . model('Env')->webName() : model('Env')->webName() ?>" />
    <meta property="og:description" content="Akses semua tools produktif dengan mudah yang dapat meningkatkan kreatifitasmu.">
    
    <link rel="shortcut icon" href="<?= base_url() . 'favicon.png' ?>" type="image/x-icon">
    <title><?= isset($title) ? $title . ' | ' . model('Env')->webName() : model('Env')->webName() ?></title>

    <!-- Source Support -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/bootstrap.min.css' ?>">
    <script src="<?= base_url() . 'assets/js/jquery.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/js/sweetalert2.js' ?>"></script>

    <!-- Datatables -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/module/datatables/css/jquery.dataTables.min.css' ?>">

    <!-- AdminKit CSS -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/module/adminkit/css/app.css' ?>">

    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/main.css' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/dashboard.css' ?>">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    h1, h2, h3, h4, h5, h6, p, span, a, div, button, label {
        font-family: 'Poppins', sans-serif!important;
    }
    </style>
</head>

<body>
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
            position: 'top-end',
            icon: 'error',
            title: '<?= session()->getFlashdata('error') ?>',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            })
        </script>
    <?php endif; ?>
    <!-- Akhir Pesan -->

    <!-- Sidebar & Content -->
    <?= $sidebar ?? '' ?>
        <main class="content">
            <div class="container-fluid p-0">
                <?= $content ?? view('errors/e404') ?>
            </div>
        </main>
    <?php 
    if(isset($sidebar)) :
        echo '</div>
        </div>';
    endif;
     ?>
    <!-- Akhir Sidebar & Content -->

    <!-- AdminKit JS -->
    <script src="<?= base_url() . 'assets/module/adminkit/js/app.js' ?>"></script>

    <!-- My Script -->
    <script src="<?= base_url() . 'assets/js/main.js' ?>"></script>
    
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
</body>
</html>
