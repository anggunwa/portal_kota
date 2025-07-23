<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Portal Layanan Kota!</h2>
    </x-slot>

    <section class="relative h-screen bg-cover bg-center" style="background-image: url('/images/boyolali-bg2.jpg')">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
             <div class="text-center text-white px-4">
                    <h1 class="text-4xl font-extrabold mb-2 leading-relaxed">
                        Selamat Datang di Portal Layanan Kabupaten Boyolali.<br>
                        Temukan Layanan Publik Kabupaten Boyolali Dengan Cepat dan Mudah.
                    </h1>
             </div>
        </div>
    </section>

    <div class="py-10 px-6 max-w-7xl mx-auto">
        <div class="mb-6">
            <form action="{{ route('home') }}" method="GET" class="flex flex-col sm:flex-row gap-3 items-center justify-center">
                <input
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
                </button>
            </form>
        </div>

        <div class="btn-group mb-4" id="filter-buttons">
            <button class="btn btn-primary active" data-filter="all">SEMUA</button>
            <button class="btn btn-outline-primary" data-filter="publik">LAYANAN PUBLIK</button>
            <button class="btn btn-outline-primary" data-filter="admin">LAYANAN ADMINISTRASI</button>
            <button class="btn btn-outline-primary" data-filter="opd">OPD</button>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 gap-y-8">
            @foreach ($opds as $opd)
                <div class="bg-white p-5 shadow-sm rounded-lg border flex flex-col hover:shadow-lg transition duration-200 transform hover:-translate-y-1 justify-between h-64">
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
    </script>

</x-app-layout>