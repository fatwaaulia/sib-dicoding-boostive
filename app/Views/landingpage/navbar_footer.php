<!-- navbar disini -->
<div class="flex flex-col min-h-screen">

    <nav>
        <div class="navbar bg-white fixed z-10 border-solid border-2 border-gray-100 w-screen">
            <div>
                <a class="btn btn-ghost normal-case text-xl">
                <img src="<?= base_url('assets/img/logo.png') ?>" class="w-40 sm:w-32 md:w-36" alt="logo.png">
            </a>
        </div>
        <div class="w-auto">
            <ul class="hidden sm:flex menu menu-horizontal px-1">
                <li ><a href="<?= base_url() ?>" class="text-m">Home</a></li>
                <li tabindex="0">
                    <a class="text-m" href="<?= base_url('produktif') ?>">
                        Produktif
                    </a>
                </li>
                <li><a href="<?= base_url('tentang-kami') ?>" class="text-m">Tentang Kami</a></li>
            </ul>
        </div>
        <input type="checkbox" class="peer hidden" id="cek">
        <label for="cek" class="absolute right-4 sm:hidden btn btn-outline py-3 px-4 rounded
        focus:outline-none hover:bg-gray-200 hover:cursor-pointer">☰</label>
        <div class="rounded-box rounded-l-none absolute left-0 top-[60px] w-1/3 bg-white -translate-x-[41rem] border-solid border-black border border-opacity-10
        peer-checked:translate-x-0 transition duration-500 sm:w-auto sm:static sm:hidden">
        <ul class="max-h-40 font-semibold h-screen p-3 flex flex-col gap-5 sm:h-auto sm:flex-row sm:bg-inherit">
            <li><a href="<?= base_url() ?>">Home</a></li>
            <div class="dropdown" id="dropdown">
                <label for="dropdown" tabindex="0">Produktif</label>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="<?= base_url('produktif?kategori=Semua Usia') ?>">Semua Usia</a></li>
                </ul>
            </div>
            <li><a href="<?= base_url('tentang-kami') ?>">Tentang Kami</a></li>
            
        </ul>
    </div>
</div>
</nav>
<!-- Akhir navbar -->


<?=  $content ?? '' ?>


<!-- footer disini -->
<footer class="footer items-center p-4 bg-base-200 text-neutral-content">
    <div class="items-center grid-flow-row">
        <img width="36" height="36" viewBox="0 0 24 24" src="<?= base_url('assets/img/logo.png') ?>" class="w-40 sm:w-32 md:w-36" alt="logo.png"> 
        <p class="text-neutral">Mengenal Tools produktif melalui kami.</p>
    </div> 
    <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
        <a href="https://github.com/fatwaaulia/sib-dicoding-boostive.git">
            <img src="<?= base_url('assets/img/github-logo.png') ?>">
        </a> 
  </div>
</footer>
</div>
<!-- akhir footer -->