
<style>
        .lc-2 {
            text-overflow: ellipsis;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2 !important;
            max-height: 50px;
        }   
    @keyframes showOpacity {
        0% {
            opacity: 0;
            }
        50% {
            opacity: 0;
            }
        100%{
            opacity: 1;
            }
            
        }

    #populer, #produktif {
        animation-name: showOpacity;
        animation-duration: 1.2s;
            }
</style>

  <div class="h-10 "></div>
  <section id="produktif" class="px-6 py-12 md:px-12">
    <h1 class="text-3xl md:text-4xl xl:text-5xl font-bold tracking-tight mb-8">Kategori</h1>
    <div class="grid grid-cols-2 max-[500px]:grid-cols-1 lg:grid-cols-3 gap-x-10 gap-y-8">
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
  <section id="populer" class="px-6 pb-12 md:px-12">
    <h1 class="text-3xl md:text-4xl xl:text-5xl font-bold tracking-tight text-center mb-4">Tools Populer</h1>
    <p class="text-1lg md:text-2lg xl:text-3lg text-inherit font-regular text-center tracking-tight mb-8">Temukan pengetahuan baru dari tools populer</p>
    <div class="grid grid-cols-2 max-[600px]:grid-cols-1 xl:grid-cols-4 gap-x-10 gap-y-8">
    <?php 
    $produktif_populer = model('Produktif')->orderBy('view', 'DESC')->findAll(4);
    foreach ($produktif_populer as $v)  :
    $kategori_produktif_populer = model('KategoriProduktif')->where('id', $v['id_kategori'])->first()['nama'];
    ?>
            <div class="card bg-base-100 shadow-xl border-solid border-t-0 border-x-0 border-2 border-gray-200">
            <figure class='max-h-52'>
            <?php
                if ($v['img']) {
                    $img = base_url('assets/img/produktif/' . $v['img']);
                } else {
                    $img = base_url('assets/img/default.png');
                }
            ?>
                <img src="<?= $img ?>"/>
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title"><?= $v['nama'] ?></h2>
                <p class="mb-0 lc-2"><?= $v['deskripsi'] ?></p>
                <span class="bg-green-100 text-green-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded-full"><?= $kategori_produktif_populer ?></span>
                <div class="divider"></div>
                <div class="flex flex-wrap">
                    <a class='flex'href="<?= base_url('produktif/') . $kategori_produktif_populer . '/' . $v['slug'] ?>"><p class="mr-2">Detail</p>
                        <img src="<?= base_url('assets/img/category-icon/detail-icon.png') ?>">
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        </div>
  </section>
