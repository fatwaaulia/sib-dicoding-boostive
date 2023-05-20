<section style="margin-top:32px">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                <img src="<?= base_url() . '/assets/img/404.png' ?>" class="img-style w-100" alt="404">
                <h4><b><?= $error_msg ?? 'OOOPS, HALAMAN INI TIDAK DITEMUKAN!' ?></b></h4>
                <p>Halaman yang Anda cari mungkin telah dihapus, diganti namanya, atau tidak tersedia untuk sementara.</p>
                <a href="<?= base_url() ?>">
                    <button class="btn btn-outline-primary float-end">Kembali</button>
                </a>
            </div>
        </div>
    </div>
</section>