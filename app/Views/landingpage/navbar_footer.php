<!-- navbar disini -->


    <nav>
        <div class="navbar bg-white fixed z-10 border-solid border-2 border-gray-100 w-screen">
            <div>
                <a class="btn btn-ghost normal-case text-xl" href="/">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="logo.png" style="max-height:40px" loading="lazy">
            </a>
        </div>
        <div class="w-auto">
            <ul class="hidden sm:flex menu menu-horizontal px-1">
                <li ><a href="<?= base_url() ?>" class="text-m">Beranda</a></li>
                <li tabindex="0">
                    <a class="text-m" href="<?= base_url('produktif') ?>">
                        Produktif
                    </a>
                </li>
                <li><a href="<?= base_url('tentang-kami') ?>" class="text-m">Tentang Kami</a></li>
            </ul>
        </div>
        <input type="checkbox" style="display: none;" class="peer" id="cek">
        <label for="cek" id='label' class="absolute right-4 sm:hidden btn btn-outline py-3 px-4 rounded
        focus:outline-none hover:bg-gray-200 hover:cursor-pointer">☰</label>
        <div id="navbar_phone" class="rounded-box rounded-l-none absolute left-0 top-[60px] w-1/3 bg-white -translate-x-[41rem] border-solid border-black border border-opacity-10
        peer-checked:translate-x-0 transition duration-500 sm:w-auto sm:static">
        <ul class="max-h-40 font-semibold h-screen p-3 flex flex-col gap-5 sm:h-auto sm:flex-row sm:bg-inherit">
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li><a href="<?= base_url('produktif?kategori=Semua Usia') ?>">Semua Usia</a></li>
            <li><a href="<?= base_url('tentang-kami') ?>">Tentang Kami</a></li>
            
        </ul>
    </div>
</div>
</nav>
<style>
  @media (max-width: 640px) {
    #navbar_phone, #label{
      display: block;
    }
  }

  @media (min-width: 641px) {
    #navbar_phone, #label{
      display: none;
    }
  }
</style>
<!-- Akhir navbar -->


<?=  $content ?? '' ?>


<!-- footer disini -->
<footer class="mt-4 footer items-center p-4 bg-base-200 text-neutral-content gap-y-1">
    <div class="items-center flex flex-row">
        <img width="36" height="36" viewBox="0 0 24 24" src="<?= base_url('assets/img/logo.png') ?>" class="w-40 sm:w-32 md:w-36" alt="logo.png"> 
        <p class="text-neutral">Mengenal Tools produktif melalui kami.</p>
    </div> 
    <div class="md:place-self-center md:justify-self-end">
        <a href="https://github.com/fatwaaulia/sib-dicoding-boostive.git">
            <img src="<?= base_url('assets/img/github-logo.png') ?>">
        </a> 
  </div>
</footer>

<!-- akhir footer -->