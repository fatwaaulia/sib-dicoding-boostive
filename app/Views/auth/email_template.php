<div class="container-fluid" style="font-size:14px;font-family:sans-serif;">
    <!-- Header -->
    <div class="row">
        <div class="col-md-12">
            <div style="background:#ededed;text-align:center!important;padding:16px 12px">
                <img src="<?= base_url().'/assets/img/logo.png' ?>" style="height:50px;vertical-align:middle">
            </div>
        </div>
    </div>
    <!-- Body -->
    <div class="row" style="padding:20px 12px">
        <div class="col-md-12">
            <div>
                <p>Hai <?= $name ?? 'Kamu siapa?' ?>,</p>
                <p>
                    <?= $text ?? 'Tidak ada teks, silakan tanya mbah google!' ?>
                </p>
            </div>
            <div style="margin:2rem 0px">
                <a href="<?= $button_link ?? base_url() ?>" target="_blank">
                    <button style="color:#fff;background:#3b7ddd;border:1px solid transparent;padding:0.375rem 0.75rem;border-radius:0.25rem;">
                        <?= $button_name ?? 'Tombol' ?>
                    </button>
                </a>
            </div>
            <div style="margin-bottom:2rem">
                <p>Terima kasih, <br>
                    <?= model('Env')->webName() ?>
                </p>
            </div>
            <hr>
            <p style="font-size:12px">
                Jika Anda mengalami masalah dengan menekan tombol "<?= $button_name ?? 'Tombol' ?>", salin dan tempel URL berikut ini di browser Anda:
                <a href="<?= $button_link ?? model('Env')->webName() ?>"><?= $button_link ?? model('Env')->webName() ?></a>
            </p>
        </div>
    </div>
    <!-- Footer -->
    <div class="row">
        <div class="col-md-12">
            <div style="background:#ededed;text-align:center;color:#888888;padding:16px 12px">
                <span>
                    © <?= date('Y') .' '.  model('Env')->webName() ?>
                </span>
            </div>
        </div>
    </div>
</div>