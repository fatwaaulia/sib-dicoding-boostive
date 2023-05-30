<!-- navbar disini -->
<nav>
    <div class="container navbar bg-base-100 fixed z-10">
        <div>
            <a class="btn btn-ghost normal-case text-xl">
                <img src="<?= base_url('assets/img/logo.png') ?>" class="w-40 sm:w-32 md:w-36" alt="logo.png">
            </a>
        </div>
        <div class="w-auto">
            <ul class="hidden sm:flex menu menu-horizontal px-1">
                <li ><a href="<?= base_url() ?>" class="text-m">Home</a></li>
                <li tabindex="0">
                    <a class="text-m">
                        Produktif
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                    </a>
                    <ul class="p-2 bg-base-100">
                        <li><a href="<?= base_url('produktif') ?>" class="text-m">Semua Usia</a></li>
            </ul>
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


<?= $content ?? '' ?>


<!-- footer disini -->
<footer class="footer items-center p-4 bg-base-200 text-neutral-content">
  <div class="items-center grid-flow-row">
    <img width="36" height="36" viewBox="0 0 24 24" src="<?= base_url('assets/img/logo.png') ?>" class="w-40 sm:w-32 md:w-36" alt="logo.png"> 
    <p class="text-neutral">Mengenal Tools produktif melalui kami.</p>
  </div> 
  <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current bg-neutral"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
    </a> 
  </div>
</footer>
<!-- akhir footer -->