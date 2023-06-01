<div class="relative">
    <div class="hero pt-20 pb-12 md:px-12 text-center lg:text-left" style="background-color: #191D25;">
        <div class="hero-content text-left text-primary-content">
        <div class="grid md:grid-cols-2 gap-12 flex items-center justify-center mb-4">
            <div class="mt-4 lg:mt-0 md:mb-8 xl:ml-40">
                <h1 class="text-3xl md:text-3xl xl:text-4xl font-bold tracking-tight text-center">Sekolah Menengah Atas (SMA)</h1>
            </div>
            <div class="mb-4 lg:mb-0">
                <img
                    class="w-fit ml-24"
                  src="<?= base_url('assets/img/hero/hero-produktif.png') ?>"
                  alt=""
                  />
                </div>
            </div>
        </div>
        
    </div>
    <section class="z-10 mt-[-350px] sm:mt-[-310px] md:mt-[-150px] mx-4 sm:mx-6  md:mx-12">
        <div class="grid grid-cols-2 max-[425px]:grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-4">
            <div href="" class="card bg-base-100 shadow-xl border-solid border-t-0 border-x-0 border-2 border-gray-200">
            <figure class='mx-4 my-8 h-36'>
                <img src="<?= base_url('assets/img/category-icon/add-cat-icon.png') ?>"/>
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Tambah Produktif Baru</h2>
                <p class="mb-0">Usulkan produktif baru untuk kategori Belum Terkategori</p>
                <span class="bg-green-100 text-green-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded-full">Belum Dikategorikan</span>
                <div class="divider"></div>
                <div class="flex flex-wrap">
                    <a class='flex'href=""><p class="mr-2">Usulkan</p>
                        <img src="<?= base_url('assets/img/category-icon/usulkan-icon.png') ?>">
                    </a>
                </div>
            </div>
        </div>
        <?php for ($i=0; $i <10 ; $i++) : ?>
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
</div>