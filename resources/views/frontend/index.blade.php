<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Portal Layanan Kota</h2>
    </x-slot>

    <div class="py-10 px-6 max-w-7xl mx-auto">
        <div class="mb-10 text-center">
            <h1 class="text-2xl font-bold mb-2 text-gray-800 leading-relaxed">
                Selamat datang di Portal Layanan Kota Boyolali.<br>
                Berikut daftar Organisasi Perangkat Daerah (OPD) di Boyolali:
            </h1>
                <p class="text-gray-600">
                    Silahkan pilih layanan dari OPD yang tersedia di bawah ini.
                </p>
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

                    <div class="mt-4 text-center">
                        <a href="{{ $opd->link }}" target="_blank" class="inline-block px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                        Kunjungi Situs
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>