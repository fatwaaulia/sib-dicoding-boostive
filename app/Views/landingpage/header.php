<!DOCTYPE html>
<html>
<head>
    <?= csrf_meta() ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="description" content="Akses semua tools produktif dengan mudah yang dapat meningkatkan kreatifitasmu.">
    <link rel="shortcut icon" href="<?= base_url() . 'favicon.png' ?>" type="image/x-icon">

    <title><?= isset($title) ? $title . ' | ' . model('Env')->webName() : model('Env')->webName() ?></title>

    <!-- Source Support -->
    <?php
    if (service('uri')->getSegment(1) !== 'formulir-kontribusi') {
        echo '<link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />';
    }
    ?>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    h1, h2, h3, h4, h5, h6, p, span, a, div, button, label {
        font-family: 'Poppins', sans-serif!important;
    }
    </style>
</head>

<body data-theme="light">
    
    <?= $navbar_footer ?? '' ?>

    <?php 
    if (in_array(service('uri')->getSegment(1), ['formulir-kontribusi', 'status-kontribusi'])) {
        echo $content ?? '';
    }
    ?>

    <!-- Source Support -->
    <script src="https://cdn.tailwindcss.com"></script>
    
</body>
</html>
