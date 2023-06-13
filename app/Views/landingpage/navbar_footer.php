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
            <li><a href="<?= base_url('produktif') ?>">Produktif</a></li>
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
<footer class="footer p-10 bg-base-200 text-base-content">
  <div>
    <span class="footer-title">Features</span> 
    <a href="<?= base_url() ?>" class="link link-hover">Beranda</a> 
    <a href="<?= base_url('produktif') ?>" class="link link-hover">Produktif</a> 
    <a href="<?= base_url('formulir-kontribusi') ?>" class="link link-hover">Kontribusi</a> 
  </div> 
  <div>
    <span class="footer-title">Company</span> 
    <a href="<?= base_url('tentang-kami') ?>" class="link link-hover">Tentang Kami</a> 
  </div> 
</footer> 
<footer class="footer px-10 py-4 border-t bg-base-200 text-base-content border-base-300">
  <div class="items-center grid-flow-col">
    <img width="24" height="24" viewBox="0 0 24 24" src="<?= base_url('assets/img/logo.png') ?>" class="w-40 sm:w-32 md:w-36" alt="logo.png">
    <p>Mengenal Tools Produktif melalui Kami</p>
  </div> 
  <div class="md:place-self-center md:justify-self-end">
    <div class="grid grid-flow-col gap-4">
      <a href="https://github.com/fatwaaulia/sib-dicoding-boostive.git"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M12 0C5.4 0 0 5.4 0 12c0 5.3 3.4 9.8 8.1 11.4.6.1.9-.3.9-.6v-2.1c-3.3.7-4-1.6-4-1.6-.5-1.3-1.3-1.7-1.3-1.7-1.1-.7.1-.7.1-.7 1.2.1 1.8 1.2 1.8 1.2 1 .6 2.6.5 3.3.4.1-.8.4-1.3.7-1.6-2.5-.3-5.2-1.2-5.2-5.6 0-1.2.4-2.3 1.2-3.1-.1-.3-.5-1.5.1-3.1 0 0 1-.3 3.3 1.2 1-.3 2-.4 3-.4s2 .1 3 .4c2.3-1.5 3.3-1.2 3.3-1.2.6 1.6.2 2.8.1 3.1.8.8 1.2 1.9 1.2 3.1 0 4.4-2.7 5.3-5.3 5.6.4.4.8 1.1.8 2.3v3.4c0 .3.3.7 1 .6 4.7-1.6 8-6.1 8-11.4C24 5.4 18.6 0 12 0zm0 17.5c-.9 0-1.6-.3-2.2-.9.2-.3.4-.5.7-.7.6-.5 1.4-.7 2.2-.7s1.6.3 2.2.8c.3.2.5.4.7.7-.6.6-1.3.9-2.2.9zm0-15c5.2 0 9.4 4.2 9.4 9.4s-4.2 9.4-9.4 9.4S2.6 17.1 2.6 12 6.8 2.6 12 2.6zm-3.3 10c.3.1.7.1 1 0 .3-.2.4-.6.2-1-.2-.3-.6-.4-1-.2-.3.2-.4.6-.2 1zm6.3 0c.3.1.7.1 1 0 .3-.2.4-.6.2-1-.2-.3-.6-.4-1-.2-.3.2-.4.6-.2 1z"/></svg></a>
    </div>
  </div>
</footer>
<!-- akhir footer -->