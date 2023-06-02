


  <div class="h-10">content</div>
  <section class="px-6 py-12 md:px-12 ">
    <h1 class="text-3xl md:text-4xl xl:text-5xl font-bold tracking-tight mb-8">Kategori</h1>
    <div class="grid grid-cols-2 max-[425px]:grid-cols-1 lg:grid-cols-3 gap-x-10 gap-y-8">
        <?php 
        $kategori_produktif = model('KategoriProduktif')->findAll();
        foreach ($kategori_produktif as $v) :
        ?>
        <a class="flex items-center" href="<?= base_url('produktif/') . $v['nama'] ?>">
            <div class="w-[48px] h-[48px] flex flex-shrink-0 justify-center items-center bg-[<?= $v['bg-color'] ?>] rounded-full md:w-16 md:h-16 sm:w-14 sm:h-14 overflow-hidden">
                <img class="h-[56px] w-[26px] object-contain aspect-square rounded" src="<?=base_url("assets/img/category-icon/") . $v['icon'] ?>"></img>
            </div>
            <div class="text-sm ms-4">
                <p class="text-black font-semibold"><?= $v['nama'] ?></p>
                <p class="text-neutral-500"><?= $v['deskripsi'] ?></p>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</section>
  <div class="divider"></div>
  <section class="px-6 pb-12 md:px-12">
    <h1 class="text-3xl md:text-4xl xl:text-5xl font-bold tracking-tight mb-8 text-center">Tools Populer</h1>
    <div class="grid grid-cols-2 max-[600px]:grid-cols-1 xl:grid-cols-4 gap-x-10 gap-y-8">
    <?php for ($i=0; $i <4 ; $i++) : ?>
            <div class="card bg-base-100 shadow-xl border-solid border-t-0 border-x-0 border-2 border-gray-200">
            <figure class='max-h-52'>
                <img src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=455&q=80"/>
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Tiny Thinkers</h2>
                <p class="mb-0">Daftar aktivitas/permainan online & offline untuk Computational Thinking anak-anak mulai usia 4 tahun ke atas</p>
                <span class="bg-red-100 text-red-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded-full">SD</span>
                <div class="divider"></div>
                <div class="flex flex-wrap">
                    <a class='flex'href=""><p class="mr-2">Detail</p>
                        <img src="<?= base_url('assets/img/category-icon/detail-icon.png') ?>">
                    </a>
                </div>
            </div>
        </div>
        <?php endfor;?>
        </div>
  </section>
