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
</head>

<body data-theme="light">
    
    <?= $navbar_footer ?? '' ?>

    <?php 
    if (service('uri')->getSegment(1) === 'formulir-kontribusi') {
        echo $content ?? '';
    }
    ?>

    <!-- Source Support -->
    <script src="https://cdn.tailwindcss.com"></script>
    
</body>
</html>
