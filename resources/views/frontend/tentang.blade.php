<x-layout>

    @slot('header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tentang Portal Kota
        </h2>
    @endslot

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <p class="text-gray-700 text-lg leading-relaxed mb-4">
                    Portal Layanan Kota Boyolali merupakan sistem terintegrasi yang dirancang untuk memudahkan masyarakat dalam mengakses informasi dan layanan publik dari berbagai Organisasi Perangkat Daerah (OPD).
                </p>

                <p class="text-gray-700 text-lg leading-relaxed mb-4">
                    Melalui portal ini, warga dapat dengan cepat menemukan layanan seperti pengurusan administrasi, informasi perizinan, hingga berbagai fasilitas umum yang tersedia di kota Boyolali.
                </p>

                <p class="text-gray-700 text-lg leading-relaxed">
                    Proyek ini merupakan bagian dari inisiatif transformasi digital pelayanan publik, yang bertujuan menciptakan transparansi, efisiensi, dan kenyamanan bagi seluruh masyarakat.
                </p>
            </div>
        </div>

        <div class="mt-10 text-center">
            <a href="{{ url('/') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
                Kembali ke Beranda
            </a>
        </div>

</x-layout>
