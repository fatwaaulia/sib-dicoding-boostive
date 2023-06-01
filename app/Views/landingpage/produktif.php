


  <div class="h-10">content</div>
  <section class="px-6 py-12 md:px-12 ">
    <h1 class="text-3xl md:text-4xl xl:text-5xl font-bold tracking-tight mb-8">Kategori</h1>
    <div class="grid grid-cols-2 max-[425px]:grid-cols-1 lg:grid-cols-3 gap-x-10 gap-y-8">
        <a class="flex items-center" href="<?= base_url('produktif/TK') ?>">
                <div class="w-[48px] h-[48px] flex flex-shrink-0 justify-center items-center bg-[#F0EEB7] rounded-full md:w-16 md:h-16 sm:w-14 sm:h-14 overflow-hidden">
                    <img class="h-[56px] w-[26px] object-contain aspect-square rounded" src="<?=base_url("assets/img/category-icon/tk-cat-icon.png")?>"></img>
                </div>
            <div class="text-sm ms-4">
                <p class="text-black font-semibold">TK</p>
                <p class="text-neutral-500">Taman Kanak-Kanak</p>
            </div>
        </a>
        <a class="flex items-center" href="<?= base_url('produktif/SD') ?>">
            <div class="flex flex-shrink-0 justify-center items-center bg-[#FFCFBF] rounded-full md:w-16 md:h-16 sm:w-14 sm:h-14 overflow-hidden">
                <img class="w-[48px] aspect-square rounded" src="<?=base_url("assets/img/category-icon/sd-cat-icon.png")?>"></img>
             </div>
            <div class="text-sm ms-4">
                <p class="text-black font-semibold">SD</p>
                <p class="text-neutral-500">Sekolah Dasar</p>
            </div>
        </a>
        <a class="flex items-center" href="<?= base_url('produktif/SMP') ?>">
            <div class="flex flex-shrink-0 justify-center items-center bg-[#C1B8F9] rounded-full md:w-16 md:h-16 sm:w-14 sm:h-14 overflow-hidden">
                <img class="w-[48px] aspect-square rounded flex-shrink-0" src="<?=base_url("assets/img/category-icon/smp-cat-icon.png")?>"></img>
             </div>
            <div class="text-sm ms-4">
                <p class="text-black font-semibold">SMP</p>
                <p class="text-neutral-500">Sekolah Menengah Pertama</p>
            </div>
        </a>
        <a class="flex items-center" href="<?= base_url('produktif/SMA') ?>">
            <div class="flex flex-shrink-0 justify-center items-center bg-[#C2C2C2] rounded-full md:w-16 md:h-16 sm:w-14 sm:h-14 overflow-hidden">
                <img class="w-[48px] aspect-square rounded" src="<?=base_url("assets/img/category-icon/sma-cat-icon.png")?>"></img>
             </div>
            <div class="text-sm ms-4">
                <p class="text-black font-semibold">SMA</p>
                <p class="text-neutral-500">Sekolah Menengah Atas</p>
            </div>
        </a>
        <a class="flex items-center" href="<?= base_url('produktif/kuliah') ?>">
            <div class="flex flex-shrink-0 justify-center items-center bg-[#8F8F8F] rounded-full md:w-16 md:h-16 sm:w-14 sm:h-14 overflow-hidden">
                <img class="w-[48px] aspect-square rounded" src="<?=base_url("assets/img/category-icon/kuliah-cat-icon.png")?>"></img>
             </div>
            <div class="text-sm ms-4">
                <p class="text-black font-semibold">Kuliah</p>
                <p class="text-neutral-500">Perguruan Tinggi</p>
            </div>
        </a>
        <a class="flex items-center" href="<?= base_url('produktif/semua-usia') ?>">
            <div class="flex flex-shrink-0 justify-center items-center bg-[#F6F4AD] rounded-full md:w-16 md:h-16 sm:w-14 sm:h-14 overflow-hidden">
                <img class="w-[48px] aspect-square rounded" src="<?=base_url("assets/img/category-icon/su-cat-icon.png")?>"></img>
             </div>
            <div class="text-sm ms-4">
                <p class="text-black font-semibold">Semua Usia</p>
                <p class="text-neutral-500">Untuk Semua Kalangan</p>
            </div>
        </a>
        <a class="flex items-center" href="<?= base_url('produktif/orang-tua') ?>">
            <div class="flex flex-shrink-0 justify-center items-center bg-[#FBCBF9] rounded-full md:w-16 md:h-16 sm:w-14 sm:h-14 overflow-hidden">
                <img class="w-[48px] aspect-square rounded" src="<?=base_url("assets/img/category-icon/orang-tua-cat-icon.png")?>"></img>
             </div>
            <div class="text-sm ms-4">
                <p class="text-black font-semibold">Orang Tua</p>
                <p class="text-neutral-500">Untuk dipelajari oleh Orang Tua</p>
            </div>
        </a>
    </div>
</section>
  <div class="divider"></div>
  <section class="px-6 pb-12 md:px-12">
    <h1 class="text-3xl md:text-4xl xl:text-5xl font-bold tracking-tight mb-8 text-center">Tools Populer</h1>
    <div class="grid grid-cols-2 max-[600px]:grid-cols-1 xl:grid-cols-4 gap-x-10 gap-y-8">
        <div href="" class="card bg-base-100 shadow-xl">
            <figure class="px-10 pt-10">
                <img src="<?= base_url('assets/img/category-icon/add-cat-icon.png') ?>"/>
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Tambah Produktif Baru</h2>
                <p class="mb-4">Usulkan produktif baru untuk kategori Belum Terkategori</p>
                <span class="bg-green-100 text-green-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded-full">Belum Dikategorikan</span>
                <div class="divider"></div>
                <div class="flex flex-wrap">
                    <p class="mr-2">Usulkan</p>
                    <img src="<?= base_url('assets/img/category-icon/usulkan-icon.png') ?>">
                </div>
            </div>
        </div>
        <div href="" class="card bg-base-100 shadow-xl">
            <figure class="px-10 pt-10">
                <img src="<?= base_url('assets/img/category-icon/add-cat-icon.png') ?>"/>
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Tambah Produktif Baru</h2>
                <p class="mb-4">Usulkan produktif baru untuk kategori Belum Terkategori</p>
                <span class="bg-green-100 text-green-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded-full">Belum Dikategorikan</span>
                <div class="divider"></div>
                <div class="flex flex-wrap">
                    <p class="mr-2">Usulkan</p>
                    <img src="<?= base_url('assets/img/category-icon/usulkan-icon.png') ?>">
                </div>
            </div>
        </div>
        <div href="" class="card bg-base-100 shadow-xl">
            <figure class="px-10 pt-10">
                <img src="<?= base_url('assets/img/category-icon/add-cat-icon.png') ?>"/>
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Tambah Produktif Baru</h2>
                <p class="mb-4">Usulkan produktif baru untuk kategori Belum Terkategori</p>
                <span class="bg-green-100 text-green-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded-full">Belum Dikategorikan</span>
                <div class="divider"></div>
                <div class="flex flex-wrap">
                    <p class="mr-2">Usulkan</p>
                    <img src="<?= base_url('assets/img/category-icon/usulkan-icon.png') ?>">
                </div>
            </div>
        </div>
        <div href="" class="card bg-base-100 shadow-xl">
            <figure class="px-10 pt-10">
                <img src="<?= base_url('assets/img/category-icon/add-cat-icon.png') ?>"/>
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Tambah Produktif Baru</h2>
                <p class="mb-4">Usulkan produktif baru untuk kategori Belum Terkategori</p>
                <span class="bg-green-100 text-green-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded-full">Belum Dikategorikan</span>
                <div class="divider"></div>
                <div class="flex flex-wrap">
                    <p class="mr-2">Usulkan</p>
                    <img src="<?= base_url('assets/img/category-icon/usulkan-icon.png') ?>">
                </div>
            </div>
        </div>
    </div>
  </section>
