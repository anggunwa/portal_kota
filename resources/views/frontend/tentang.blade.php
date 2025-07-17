<x-layout>

    {{-- HEADER --}}
    @include('frontend.partials.header')

    {{-- MAIN CONTENT --}}
    <main class="max-w-5xl mx-auto px-4 py-12">

        <h1 class="text-3xl font-bold text-center mb-6 text-red-700">Tentang Portal Kota Boyolali</h1>
        <p class="text-gray-700 text-lg leading-relaxed mb-4">
            Portal Layanan Kota Boyolali merupakan sistem terintegrasi yang dirancang untuk memudahkan masyarakat dalam mengakses informasi dan layanan publik dari berbagai Organisasi Perangkat Daerah (OPD).
        </p>

        <p class="text-gray-700 text-lg leading-relaxed mb-4">
            Melalui portal ini, warga dapat dengan cepat menemukan layanan seperti pengurusan administrasi, informasi perizinan, hingga berbagai fasilitas umum yang tersedia di kota Boyolali.
        </p>

        <p class="text-gray-700 text-lg leading-relaxed">
            Proyek ini merupakan bagian dari inisiatif transformasi digital pelayanan publik, yang bertujuan menciptakan transparansi, efisiensi, dan kenyamanan bagi seluruh masyarakat.
        </p>

        <div class="mt-10 text-center">
            <a href="{{ url('/') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
                Kembali ke Beranda
            </a>
        </div>

        </main>

        {{-- FOOTER --}}
        @include('frontend.partials.footer')

</x-layout>
