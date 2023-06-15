<style>
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

    #tentang_boostive, #tentang_kami {
        animation-name: showOpacity;
        animation-duration: 1s;
            }
</style>
<div class="hero rounded-bl-[150px] max-[425px]:rounded-bl-[50px] px-6 pt-20 pb-12 md:px-12 text-center lg:text-left" style="background-color: #191D25;">
    <div class="hero-content text-left text-primary-content">
        <div id="tentang_boostive" class="grid md:grid-cols-2 gap-12 flex items-center">
            <div  class="mt-4 lg:mt-0">
                <h1 class="text-2lg md:text-3lg xl:text-4lg text-red-600 font-medium tracking-tight mb-2">Tentang Boostive</h1>
                <h1 class="text-3xl md:text-4xl xl:text-5xl font-bold tracking-tight mb-4">Apa sih Boostive itu?</h1>
                <p class="">Boostive adalah platform berbasis website yang menyediakan tools produktivitas dengan mengarahkan user ke sebuah website, aplikasi atau sebuah kegiataan lain.</p>
            </div>
            <div class="mb-4 lg:mb-0">
                <img
                  src="<?= base_url('assets/img/hero/hero-tentang-kami.png') ?>"
                  class="w-fit rounded-lg shadow-lg"
                  alt=""
                />
            </div>
        </div>
    </div>
</div>

<section id="tentang_kami" class="px-6 pt-12 md:px-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
        <article>
            <h1 class="text-1lg md:text-2lg xl:text-3lg text-red-600 font-medium tracking-tight mb-2">Visi Boostive</h1>
            <h1 class="text-1xl md:text-2xl xl:text-3xl font-bold tracking-tight mb-4">Indonesia Produktif</h1>
            <p class="text-1lg md:text-2lg xl:text-3lg text-inherit font-regular tracking-tight mb-2">Boostive adalah platform berbasis website yang menyediakan tools produktivitas dengan mengarahkan user ke sebuah website, aplikasi atau sebuah kegiataan lain.</p>
        </article>
        <article>
            <h1 class="text-1lg md:text-2lg xl:text-3lg text-red-600 font-medium tracking-tight mb-2">Misi Boostive</h1>
            <h1 class="text-1xl md:text-2xl xl:text-3xl font-bold tracking-tight mb-4">"Untuk mengajak, menyedihkan, dan berbincang"</h1>
            <p class="text-1lg md:text-2lg xl:text-3lg text-inherit font-regular tracking-tight mb-4">Itulah misi kami. Dengan tampilan yang menarik dan mudah digunakan dapat membantu hari-hari kamu lebih produktif.</p>
        </article>
    </div>
    <div class="divider"></div>
</section>

<section class="px-6 pb-12 md:px-12">
<h1 class="text-center text-1xl md:text-2xl xl:text-3xl font-bold tracking-tight mb-8">Tim Capstone</h1>
    <div class="grid grid-cols-2 max-[600px]:grid-cols-1 xl:grid-cols-4 gap-x-10 gap-y-8">
        <article class="card bg-base-100 shadow-xl">
            <figure><img
                  src="<?= base_url('assets/img/team/akmal.png') ?>"
                  alt="Hafizhuddin Akmal"
                  class="h-80"/></figure>
            <div class="card-body">
                <h1 class="card-title">Hafizhuddin Akmal</h2>
                <p>Universitas Padjadjaran</p>
            </div>
        </article>
        <article class="card bg-base-100 shadow-xl">
            <figure><img
                  src="<?= base_url('assets/img/team/adil.png') ?>"
                  alt="Muhammad Adil Raja Saputra"
                  class="h-80"/></figure>
            <div class="card-body">
                <h1 class="card-title">Muhammad Adil Raja Saputra</h2>
                <p>Universitas Diponegoro</p>
            </div>
        </article>
        <article class="card bg-base-100 shadow-xl">
            <figure><img
                  src="<?= base_url('assets/img/team/jessica.png') ?>"
                  alt="Jessica Kristina Hutasoit"
                  class="h-80"/></figure>
            <div class="card-body">
                <h1 class="card-title">Jessica Kristina Hutasoit</h2>
                <p>Universitas Sumatera Utara</p>
            </div>
        </article>
        <article class="card bg-base-100 shadow-xl">
            <figure><img
                  src="<?= base_url('assets/img/team/fatwa.png') ?>"
                  alt="Fatwa Aulia"
                  class="h-80"/></figure>
            <div class="card-body">
                <h1 class="card-title">Fatwa Aulia</h2>
                <p>Politeknik Negeri Banyuwangi</p>
            </div>
        </article>
    </div>
</section>