<div class="hero px-6 pt-20 pb-12 md:px-12 text-center lg:text-left" style="background-color: #191D25;">
    <div class="hero-content text-left text-primary-content">
        <div class="grid md:grid-cols-2 gap-12 flex items-center">
            <div class="mt-4 lg:mt-0">
                <h1 class="text-3xl md:text-4xl xl:text-5xl font-bold tracking-tight mb-8">Yuk, berkenalan dengan BOOSTIVE dan salurkan Ide Produktif kamu</h1>
                <p class="">Pilih kegiatan produktif kamu dan dapatkan ilmu baru dengan cara yan menyenangkan.</p>
            </div>
            <div class="mb-4 lg:mb-0">
                <img
                  src="<?= base_url('assets/img/hero/hero-beranda.png') ?>"
                  class="w-fit"
                  alt=""
                />
            </div>
        </div>
    </div>
</div>

<section class="px-6 pb-12 md:px-12">
    <h1 class="text-center text-2xl md:text-3xl font-semibold tracking-tight mt-8 mb-8">Fitur Boostive</h1>
    <div class="grid grid-cols-1 min-[900px]:grid-cols-2 place-items-center gap-x-8 gap-y-8">
        <div class="card w-80 sm:w-96 bg-base-100 shadow-xl">
            <div class="card-body rounded-tl-3xl rounded-br-3xl bg-blue-200">
                <h1 class="card-title text-blue-800">Produktivitas</h1>
            </div>
            <div class="card-body items-center text-center">
                <p class="text-justify pb-2">Banyak tools produktif yang tersedia, gunakanlah waktu luang anda untuk melakukan hal-hal positif dan jadilah produktif!</p>
                <div class="card-actions">
                    <a href="<?= base_url('produktif') ?>"><button class="btn btn-info rounded-full">Selengkapnya</button></a>
                </div>
            </div>
        </div>
        <div class="card w-80 sm:w-96 bg-base-100 shadow-xl">
            <div class="card-body rounded-tl-3xl rounded-br-3xl bg-red-200">
                <h1 class="card-title text-red-800">Kontribusi Data</h1>
            </div>
            <div class="card-body items-center text-center">
                <p class="text-justify pb-2">Kontribusi data disediakan untuk anda dapat ikut memberikan rekomendasi tools produktif pada boostive. Silakan klik tombol di bawah ini.</p>
                <div class="card-actions">
                <a href="<?= base_url('formulir-kontribusi') ?>"><button class="btn btn-error rounded-full">Selengkapnya</button></a>
                </div>
            </div>
        </div>
        <!-- <div class="card w-80 sm:w-96 bg-base-100 shadow-xl">
            <div class="card-body rounded-tl-3xl rounded-br-3xl bg-red-200">
                <h1 class="card-title text-red-800">Kontribusi Data</h1>
            </div>
                <div class="card-body items-center text-center">
                    <p class="text-justify">Kontribusi data disediakan untuk anda dapat ikut memberikan rekomendasi tools produktif pada boostive</p>
                    <div class="card-actions">
                        <a href="<?= base_url('formulir-kontribusi') ?>"><button class="btn btn-error rounded-full">Selengkapnya</button></a>
                    </div>
                </div>
        </div>
    </div> -->
</section>

<section class="w-full flex flex-col flex-wrap items-center gap-8 px-6 pb-12 md:px-12">
    <h1 class="text-center text-2xl md:text-3xl font-bold text-red-800 tracking-tight mt-2 mb-4">Tahukah Kamu Manfaat Menjadi Orang Yang Produktif?</h1>
    <div class="max-w-[1200px] md:grid md:grid-cols-2 md:gap-5">
        <div class="flex justify-center">
            <img src="<?= base_url('assets/img/beranda/tips-1.png') ?>" alt="">
        </div>
        <div class="flex flex-col justify-center mt-6">
            <h2 class="text-lg font-bold">Pintar Mengatur Waktu</h2>
            <p class="mt-2 text-base font-normal text-justify">Orang yang produktif cenderung mampu menyelesaikan pekerjaan tepat pada waktunya. Ini karena mereka konsisten menjaga fokusnya ketika melakukan sesuatu, sehingga tidak mudah terdistraksi. Maka tak heran, apabila orang yang produktif senantiasa lihai dalam mengelola waktu yang mereka miliki. Alhasil, tak akan ada lagi waktu yang terbuang begitu saja.</p>
        </div>
    </div>
    <div class="max-w-[1200px] md:grid md:grid-cols-2 md:gap-5">
        <div class="flex justify-center md:col-start-2">
            <img src="<?= base_url('assets/img/beranda/tips-2.png') ?>" alt="">
        </div>
        <div class="flex flex-col justify-center mt-6 md:col-start-1 md:row-start-1">
            <h2 class="text-lg font-bold">Memperoleh lebih banyak kesempatan</h2>
            <p class="mt-2 text-base font-normal text-justify">Ketika seseorang sudah terbiasa menjalani hidup yang produktif, biasanya dia bakal sering mendapatkan kesempatan lebih untuk mencoba banyak hal lain. Inilah alasan yang membuat hidup tidak akan pernah terasa membosankan, karena selalu ada saja pilihan yang menarik untuk dikerjakan. Lalu, jika beruntung, peluang tersebut bisa menjadi potensi baru yang mungkin akan sangat berguna untuk ke depannya.</p>
        </div>
    </div>
    <div class="max-w-[1200px] md:grid md:grid-cols-2 md:gap-5">
        <div class="flex justify-center">
            <img src="<?= base_url('assets/img/beranda/tips-3.png') ?>" alt="">
        </div>
        <div class="flex flex-col justify-center mt-6">
            <h2 class="text-lg font-bold">Terhindar dari stres</h2>
            <p class="mt-2 text-base font-normal text-justify">Stres dapat dipicu oleh beberapa faktor, salah satunya adalah overthinking, atau berpikir secara berlebihan. Sementara itu, kebahagiaan dan rasa puas timbul dari pikiran kita yang terpusat. Itulah sebabnya orang yang produktif imun terhadap serangan pikiran negatif, karena mereka selalu mencurahkan fokus pada satu tugas sebelum beralih ke tugas berikutnya. Jadi, sebisa mungkin jangan pernah membiarkan diri kita ini menganggur, tanpa melakukan sesuatu yang berarti. Sebab, saat kita diam terlalu lama, berbagai kekhawatiran bisa tiba-tiba mengusik pikiran.</p>
        </div>
    </div>
    <div class="max-w-[1200px] md:grid md:grid-cols-2 md:gap-5">
        <div class="flex justify-center md:col-start-2">
            <img src="<?= base_url('assets/img/beranda/tips-4.png') ?>" alt="">
        </div>
        <div class="flex flex-col justify-center mt-6 md:col-start-1 md:row-start-1">
            <h2 class="text-lg font-bold">Kemampuan meningkat secara signifikan</h2>
            <p class="mt-2 text-base font-normal text-justify">Jika kita ingin semakin mahir dalam suatu bidang tertentu, maka kita perlu meningkatkan produktivitas diri kita. Lalu, melakukan hal itu secara berulang-ulang, terjadwal, dan kontinu, tanpa mengenal kata bosan. Dengan semua upaya tersebut, maka otomatis kemampuan kita akan mengalami perkembangan sesuai dengan yang diharapkan. Inilah untungnya menjadi orang yang selalu berusaha produktif.</p>
        </div>
    </div>
    <div class="max-w-[1200px] md:grid md:grid-cols-2 md:gap-5">
        <div class="flex justify-center">
            <img src="<?= base_url('assets/img/beranda/tips-5.png') ?>" alt="">
        </div>
        <div class="flex flex-col justify-center mt-6">
            <h2 class="text-lg font-bold">Waktu luang yang tersedia lebih banyak</h2>
            <p class="mt-2 text-base font-normal text-justify">Orang yang benar-benar produktif tahu kapan waktunya untuk rehat dan menikmati waktu luang. Setelah mereka mampu mencapai target, mereka akan memanjakan diri dengan beristirahat sejenak atau melakukan aktivitas lain yang menyenangkan. Dan, untungnya lagi, waktu luang yang mereka miliki biasanya jauh lebih panjang, karena pekerjaan mereka yang sebelumnya telah diselesaikan jauh dari deadline.</p>
        </div>
    </div>
</section>
