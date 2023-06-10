<div class="relative">
    <div class="hero pt-20 pb-12 md:px-12 text-center lg:text-left" style="background-color: #191D25;">
        <div class="hero-content text-left text-primary-content">
        <div class="grid md:grid-cols-2 flex items-center justify-center mb-6">
            <div class="mb-12 mr-[-30px] md:mt-0 md:mb-8 xl:ml-40">
                <?php 
                $segment_2 = str_replace('%20', ' ', service('uri')->getSegment(2));
                $kategori = model('KategoriProduktif')->where('nama', $segment_2)->first(); 
                ?>
                <h1 class="text-3xl md:text-3xl xl:text-4xl font-bold tracking-tight text-center">
                    <?= $kategori['deskripsi'] ?>
                    (<?= $kategori['nama'] ?>)
                </h1>
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
                <span class="bg-red-100 text-red-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded-full">Belum Dikategorikan</span>
                <div class="divider"></div>
                <div class="flex flex-wrap">
                    <a class='flex' href="<?= base_url('formulir-kontribusi') ?>"><p class="mr-2">Usulkan</p>
                        <img src="<?= base_url('assets/img/category-icon/usulkan-icon.png') ?>">
                    </a>
                </div>
            </div>
        </div>
        <?php
        $data_produktif_by_kategori = model('Produktif')->where('id_kategori', $kategori['id'])->findAll();
        foreach ($data_produktif_by_kategori as $v) :
        ?>
            <div class="card bg-base-100 shadow-xl border-solid border-t-0 border-x-0 border-2 border-gray-200">
            <figure class='max-h-52'>
                <?php 
                if ($v['img']) {
                    $img = base_url('assets/img/produktif/') . $v['img'];
                } else {
                    $img = base_url('assets/img/default.png');
                }
                ?>
                <img src="<?= $img ?>"/>
            </figure>
            <div class="card-body items-center text-center">
                <style>
                .lc-2 {
                    text-overflow: ellipsis;
                    overflow: hidden;
                    display: -webkit-box;
                    -webkit-box-orient: vertical;
                    -webkit-line-clamp: 2 !important;
                    max-height: 50px;
                }   
                </style>
                <h2 class="card-title"><?= $v['nama'] ?></h2>
                <p class="mb-0 lc-2"><?= $v['deskripsi'] ?></p>
                <span class="bg-green-100 text-green-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded-full"><?= $kategori['nama'] ?></span>
                <div class="divider"></div>
                <div class="flex flex-wrap">
                    <a class='flex'href="<?= base_url('produktif/') . $kategori['nama'] . '/' . $v['slug'] ?>"><p class="mr-2">Detail</p>
                        <img src="<?= base_url('assets/img/category-icon/detail-icon.png') ?>">
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
</div>