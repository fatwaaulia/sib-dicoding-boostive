<!-- navbar disini -->
<nav>
    <div class="container navbar bg-base-100">
        <div>
            <a class="btn btn-ghost normal-case text-xl">
                <img src="<?= base_url('assets/img/logo.png') ?>" class="w-40 sm:w-32 md:w-36" alt="logo.png">
            </a>
        </div>
        <div class="w-auto">
            <ul class="hidden sm:flex menu menu-horizontal px-1">
                <li ><a class="text-s">Home</a></li>
                <li tabindex="0">
                    <a class="text-s">
                        Produktif
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                    </a>
                    <ul class="p-2 bg-base-100">
                        <li><a class="text-s">Submenu 1</a></li>
                <li><a class="text-s">Submenu 2</a></li>
            </ul>
        </li>
        <li><a class="text-s">Tentang Kami</a></li>
    </ul>
</div>
<input type="checkbox" class="peer hidden" id="cek">
<label for="cek" class="absolute right-4 sm:hidden btn btn-outline py-3 px-4 rounded
 focus:outline-none hover:bg-gray-200 hover:cursor-pointer">☰</label>
<div class="absolute left-0 top-[60px] w-1/3 bg-white -translate-x-[41rem] border-solid border-black border border-opacity-10
peer-checked:translate-x-0 transition duration-500 sm:w-auto sm:static sm:hidden">
    <ul class="max-h-40 font-semibold h-screen p-3 flex flex-col gap-5 sm:h-auto sm:flex-row sm:bg-inherit">
        <li><a>Home</a></li>
        <li><a>Produktif</a></li>
        <li><a>Tentang Kami</a></li>

    </ul>
</div>
</div>
</nav>
<!-- Akhir navbar -->


<?= $content ?? '' ?>


<!-- footer disini -->
<h1>Footer</h1>
<!-- akhir footer -->