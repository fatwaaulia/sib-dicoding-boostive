<!DOCTYPE html>
<html>
<head>
    <?= csrf_meta() ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="description" content="">
    <link rel="shortcut icon" href="<?= base_url() . 'favicon.png' ?>" type="image/x-icon">

    <title><?= isset($title) ? $title . ' | ' . model('Env')->webName() : model('Env')->webName() ?></title>

    <!-- Source Support -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/bootstrap.min.css' ?>">
    <script src="<?= base_url() . 'assets/js/jquery.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/js/sweetalert2.js' ?>"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/main.css' ?>">
</head>

<body style="padding-top:61.44px">
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

    <style>
    .nav-link:hover {
        color:var(--dark-color);
    }
    .active {
        font-weight: 600;
    }
    </style>
    <?php
    $segment_1 = service('uri')->getSegment(1);
    ?>
    <nav class="navbar navbar-expand-lg bg-white fixed-top" style="box-shadow:0px 3px 16px 0px rgb(0 0 0 / 10%)">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?= base_url('assets/img/logo.png') ?>" style="width:150px" alt="boostive.png">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link <?= ($segment_1 == '') ? 'active' : '' ?>" href="<?= base_url() ?>">Beranda</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($segment_1 == 'produktif') ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produktif
                        </a>
                        <ul class="dropdown-menu">
                        <?php
                        $kategori_produktif = model('KategoriProduktif')->findAll();
                        foreach ($kategori_produktif as $v) :
                        ?>
                            <li><a class="dropdown-item" href="<?= base_url() . 'produktif?kategori=' . $v['nama'] ?>"><?= $v['nama'] ?></a></li>
                        <?php
                        endforeach
                        ?>
                        </ul>
                    </li>
                    <a class="nav-link <?= ($segment_1 == 'tentang-kami') ? 'active' : '' ?>" href="<?= base_url('tentang-kami') ?>">Tentang Kami</a>
                </div>
                <div class="navbar-nav">
                    <div class="row">
                        <div class="col-lg-4 col-2">
                            <a href="<?= base_url('login') ?>" class="nav-link me-3">Login</a>
                        </div>
                        <div class="col-lg-8 col-10">
                            <a href="<?= base_url('register') ?>" class="btn btn-primary">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Content -->
    <?= $content ?? '' ?>
    <!-- Akhir Content -->

    <hr>
    <footer class="text-center py-3">
        <img src="<?= base_url('assets/img/logo.png') ?>" class="mb-3" style="width:150px" alt="boostive.png">
        <div class="text-secondary">Mengenal Tools produktif melalui kami.</div>
    </footer>

   <!-- Source Support -->
   <script src="<?= base_url() . 'assets/js/bootstrap.bundle.min.js' ?>"></script>

    <!-- My Script -->
    <script src="<?= base_url() . 'assets/js/main.js' ?>"></script>
</body>
</html>
