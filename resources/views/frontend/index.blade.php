<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Portal Layanan Kota!</h2>
    </x-slot>

    <section class="h-96 relative md:h-screen bg-cover bg-center" style="background-image: url('/images/kantorbupati1.jpg')">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
             <div class="text-center text-white px-4">
                    <h1 class="text-xl font-extrabold mb-2 leading-relaxed md:text-4xl">
                        Selamat Datang di Portal Layanan Kabupaten Boyolali.<br>
                        Temukan Layanan Publik Kabupaten Boyolali Dengan Cepat dan Mudah.
                    </h1>
             </div>
        </div>
    </section>

    <div class="py-10 px-6 max-w-7xl mx-auto" id='hasil'>

    <!-- SEARCH BAR V3 -->
        <div class="mb-6 px-4">
            <form action="/" method="GET"
                class="flex flex-col sm:flex-row gap-3 items-center justify-center"
                onsubmit="return redirectWithAnchor();">

                <div class="font-extrabold text-xl md:text-3xl mr-8">
                    Layanan apa yang anda cari?
                </div>

                <div class="search-containerV3 w-full sm:w-96">
                    <input 
                        type="text"
                        name="q"
                        value="{{ request('q') }}"
                        placeholder="Telusuri layanan di sini"
                        class="w-full"
                    >

                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            height="22"
                            viewBox="0 0 24 24"
                            width="22">
                            <path fill="none" d="M0 0h24v24H0z"/>
                            <path
                                fill="white"
                                d="M15.5 14h-.79l-.28-.27C15.41
                                12.59 16 11.11 16 9.5 16 5.91
                                13.09 3 9.5 3S3 5.91 3 9.5
                                5.91 16 9.5 16c1.61 0 3.09-.59
                                4.23-1.57l.27.28v.79l5
                                4.99L20.49 19l-4.99-5zM9.5
                                14C7.01 14 5 11.99 5
                                9.5S7.01 5 9.5 5 14
                                7.01 14 9.5 11.99 14
                                9.5 14z"/>
                        </svg>
                    </button>

                </div>

            </form>
        </div>


    <!-- SEACRH BAR V1 -->
     <!-- <input
        type="text"
        name="q"
        value="{{ request('q') }}"
        placeholder="Cari layanan atau OPD, misal: Akta, Pajak, Disdukcapil..."
        class="w-full sm:w-96 px-2 py-2 border rounded shadow-sm focus:ring focus:outline-none"
    >
    <button
        type="submit"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
        >
        Cari
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 10.5a7.5 7.5 0 0013.15 6.15z" />
        </svg>
    </button> -->

        <!-- TOMBOL KATEGORI V1 -->
        <!-- <div class="flex flex-wrap justify-center gap-3 mt-6 mb-6" id="filter-button">
            <button class="filter-button px-4 py-2 border-2 border-cyan-400 text-black font-semibold rounded hover:bg-cyan-400 hover:text-black transition active" data-filter="semua" data-category="semua">SEMUA</button>
            <button class="filter-button px-4 py-2 border-2 border-cyan-400 text-black font-semibold rounded hover:bg-cyan-400 hover:text-black transition" data-filter="publik" data-category="publik">LAYANAN PUBLIK</button>
            <button class="filter-button px-4 py-2 border-2 border-cyan-400 text-black font-semibold rounded hover:bg-cyan-400 hover:text-black transition" data-filter="pegawai" data-category="pegawai">KEPEGAWAIAN</button>
            <button class="filter-button px-4 py-2 border-2 border-cyan-400 text-black font-semibold rounded hover:bg-cyan-400 hover:text-black transition" data-filter="opd" data-category="opd">OPD</button>
        </div> -->

        <!-- TOMBOL KATEGORI V2 -->
        <div class="kategori-wrapper justify-center mt-6 mb-6">

            <!-- tombol kiri -->
            <button class="slider-btn left" onclick="scrollKategori(-1)">
                &#10094;
            </button>

            <!-- container scroll -->
            <div class="kategori-slider flex overflow-x-auto scroll-smooth gap-4" id="kategoriSlider">

                <button class="filter-button kategori-card hover:bg-gray-300 active" data-filter="semua" data-category="semua">
                    <img src="images/semua.png" class="h-12 w-12 object-contain">
                    <span>
                        SEMUA <span class="count">(0)</span>
                    </span>
                </button>

                <button class="filter-button kategori-card hover:bg-gray-300 service-card" data-filter="publik" data-category="publik">
                    <img src="images/publik.png" class="h-12 w-12 object-contain">
                    <span>
                        LAYANAN PUBLIK <span class="count">(0)</span>
                    </span>
                </button>

                <button class="filter-button kategori-card hover:bg-gray-300 service-card" data-filter="pegawai" data-category="pegawai">
                    <img src="images/administrasi.png" class="h-12 w-12 object-contain">
                    <span>
                        LAYANAN ADMINISTRASI <span class="count">(0)</span>
                    </span>
                </button>

                <button class="filter-button kategori-card hover:bg-gray-300 service-card" data-filter="opd" data-category="opd">
                    <img src="images/opd.png" class="h-12 w-12 object-contain">
                    <span>
                        OPD <span class="count">(0)</span>
                    </span>
                </button>
            </div>

            <!-- tombol kanan -->
            <button class="slider-btn right" onclick="scrollKategori(1)">
                &#10095;
            </button>

        </div>

        <div class="text-xl md:text-2xl text-center mb-6 font-bold">Jelajahi Layanan di Kabupaten Boyolali</div>
        
        <div id="cards-wrapper" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 gap-y-8">
            @foreach ($opds as $opd)
                <div class="filter-item duration-500 ease-in-out opacity-100 scale-100 bg-white p-5 shadow-md rounded-xl border flex flex-col hover:shadow-lg transition duration-200 transform hover:-translate-y-1 justify-between h-64" data-category="{{ strtolower($opd->kategori) }}">
                        @if ($opd->logo)
                            <img src="{{ asset($opd->logo) }}" alt="{{ $opd->nama }}" class="h-16 max-h-16 object-contain mb-3 mx-auto">
                        @else
                            <div class="h-16 w-flex flex items-center justify-center bg-gray-100 text-gray-400 mb-3">Tidak ada logo</div>
                        @endif
                    
                    <h3 class="text-base font-semibold text-center text-gray-800">
                        {{ $opd->nama }}
                    </h3>

                    <p class="text-sm text-gray-600 text-center mt-2 line-clamp-3">
                        {{ $opd->deskripsi }}
                    </p>


                    <div class="mt-4 text-center">
                        <a href="{{ $opd->link }}" target="_blank" class="inline-block px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">
                        Kunjungi Situs
                        </a>

                        <button onclick="openModal('{{ $opd->id }}')"
                            class="inline-block px-4 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700 transition">
                            Lihat Layanan
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Modal Layanan OPD -->
    <div id="layananModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl max-h-[80vh] overflow-y-auto">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-lg font-semibold">Daftar Layanan</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-800 text-2xl font-bold">&times;</button>
            </div>
            <div id="layananContent" class="p-4">
                <!-- Konten layanan dimuat lewat AJAX -->
                <p class="text-gray-500 text-center">Memuat layanan...</p>
            </div>
        </div>
    </div>

    <script>
    
    // Modal untuk pop up layanan
    function openModal(opdId) {
        // Tampilkan modal
        document.getElementById('layananModal').classList.remove('hidden');

        // Bersihkan isi lama
        document.getElementById('layananContent').innerHTML = 'Memuat...';

        // Ambil data layanan via AJAX
        fetch(`/opd/${opdId}/layanans`)
            .then(response => response.json())
            .then(data => {
                let html = '';
                if (data.length > 0) {
                    data.forEach(layanan => {
                        html += `
                            <div class="mb-4 border-b pb-2">
                                <h4 class="font-bold text-lg">${layanan.nama_layanan}</h4>
                                <p class="text-sm text-gray-700">${(layanan.deskripsi ?? '-').replace(/\n/g, '<br>')}</p>
                                ${layanan.link ? `<a href="${layanan.link}" target="_blank" class="text-blue-600 text-sm underline">Kunjungi</a>` : ''} |
                                <a href="/layanan/${layanan.id}" class="text-indigo-600 text-sm underline">Detail Layanan</a>
                            </div>
                        `;
                    });
                } else {
                    html = '<p class="text-sm text-gray-500">Belum ada layanan untuk OPD ini.</p>';
                }
                document.getElementById('layananContent').innerHTML = html;
            })
            .catch(err => {
                console.error(err);
                document.getElementById('layananContent').innerHTML = 'Gagal memuat data.';
            });
    }

    function closeModal() {
        document.getElementById('layananModal').classList.add('hidden');
    }

    // JavaScript untuk fungsi tombol kategori
    document.addEventListener("DOMContentLoaded", function () {
        const filterButtons = document.querySelectorAll(".filter-button");
        const items = document.querySelectorAll(".filter-item");

        filterButtons.forEach(button => {
            button.addEventListener("click", () => {
                // Atur tombol aktif
                filterButtons.forEach(btn => btn.classList.remove("btn-primary", "active"));
                filterButtons.forEach(btn => btn.classList.add("btn-outline-primary"));
                button.classList.remove("btn-outline-primary");
                button.classList.add("btn-primary", "active");

                // Ambil filter
                const filter = button.getAttribute("data-filter");

                // Tampilkan/sembunyikan item
                items.forEach(item => {
                    if (filter === "all" || item.dataset.category === filter) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });
    });

    // Transisi tiap ganti kategori
        document.querySelectorAll('.filter-button').forEach(button => {
            button.addEventListener('click', function () {
                document.querySelectorAll('.filter-button').forEach(btn => {
                    btn.classList.remove('bg-cyan-400');
                });
                this.classList.add('bg-cyan-400');

                const filter = this.getAttribute('data-filter');

                document.querySelectorAll('.filter-item').forEach(item => {
                    const category = item.getAttribute('data-category');

                    if (filter === 'semua' || category === filter) {
                        setTimeout(() => {
                            item.classList.remove('hidden');
                            item.classList.remove('opacity-0', 'scale-95');
                            item.classList.add('opacity-100', 'scale-100');
                        }, 10);
                    } else {
                        item.classList.remove('opacity-100', 'scale-100');
                        item.classList.add('opacity-0', 'scale-95');

                        setTimeout(() => {
                            item.classList.add('hidden');
                        }, 300);
                    }
                });
            });
        });

    // Supaya setelah search halaman tidak scroll ke posisi halaman atas
    function redirectWithAnchor() {
        const form = event.target;
        const query = new URLSearchParams(new FormData(form)).toString();
        window.location.href = `/?${query}#hasil`;
        return false; // Hindari form submit default
    }

    // Scroll Kategori Kesamping
    function scrollKategori(direction){

        const container = document.getElementById("kategoriSlider");

        const scrollAmount = 150;

        container.scrollBy({
            left: direction * scrollAmount,
            behavior: "smooth"
        });

    }

    // Counter jumlah layanan per kategori
    document.addEventListener("DOMContentLoaded", function () {

    const filterButtons = document.querySelectorAll(".filter-button");
    const items = document.querySelectorAll(".filter-item");

    function updateCounter(){

        const counts = {
            semua: 0,
            publik: 0,
            pegawai: 0,
            opd: 0
        };

        items.forEach(item => {

            const category = item.dataset.category;

            counts.semua++;

            if(counts[category] !== undefined){
                counts[category]++;
            }

        });

        filterButtons.forEach(button => {

            const category = button.dataset.category;

            const counter = button.querySelector(".count");

            if(counter){
                counter.textContent = "(" + counts[category] + ")";
            }

        });

    }

        filterButtons.forEach(button => {

            button.addEventListener("click", () => {

                // tombol aktif
                filterButtons.forEach(btn => btn.classList.remove("active"));
                button.classList.add("active");

                const filter = button.dataset.filter;

                items.forEach(item => {

                    if(filter === "semua" || item.dataset.category === filter){
                        item.classList.remove("hidden");
                    }else{
                        item.classList.add("hidden");
                    }

                });

            });

        });

    updateCounter();

    });

    </script>

    

</x-app-layout>