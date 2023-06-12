<div class="h-20"></div>
<section class="px-6 pb-12 md:px-12">
    <div class="grid gap-4 place-items-center">
        <div class="bg-red-100 text-red-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded-full">Kategori <?= $kategori ?></div>
        <h1 class="text-center text-2xl md:text-3xl font-semibold tracking-tight"><?= $produktif['nama'] ?></h1>
        <span class="h-1.5 w-96 bg-red-800 rounded-full lg:w-1/3"></span>
        <?php
        if ($produktif['img']) {
            $img = base_url('assets/img/produktif/' . $produktif['img']);
        } else {
            $img = base_url('assets/img/default.png');
        }
        ?>
        <img
            src="<?= $img ?>"
            class="object-contain md:object-scale-down xl:max-w-6xl"
            alt="..." />
        <div class=xl:max-w-6xl>
            <h1 class="text-lg font-semibold">Deskripsi</h1>
            <p class="text-justify"><?= $produktif['deskripsi'] ?></p>

        <h1 class="text-lg font-semibold mt-4">Link Kegiatan :</h1>
            <a href=" <?= base_url('akses-tautan/') . $produktif['slug'] ?>">
                <p class="text-justify"><?= $produktif['tautan'] ?></p>
            </a>
        </div>
    </div>
</section>
