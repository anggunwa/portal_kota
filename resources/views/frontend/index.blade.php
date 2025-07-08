<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Portal Layanan Kota</h2>
    </x-slot>

    <div class="py-6 px-6 max-w-7xl mx-auto">
        <div class="mb-6 text-gray-700 text-center">
            <h1 class="text-2xl font-bold mb-2">
                Selamat datang di Portal Layanan Kota Boyolali. Berikut daftar Organisasi Perangkat Daerah (OPD) di Boyolali:
            </h1>
                <p>
                    Silahkan pilih layanan dari OPD yang tersedia di bawah ini.
                </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($opds as $opd)
                <div class="bg-white p-4 shadow-sm rounded-lg border hover:shadow-md transition duration-200 flex flex-col items-center text-center">
                    <div class="flex justify-center mb-3">
                        @if ($opd->logo)
                            <img src="{{ asset($opd->logo) }}" alt="{{ $opd->nama }}" class="h-16 object-contain mb-4">
                        @else
                            <div class="h-16 flex items-center justify-center text-gray-400 mb-4">Tidak ada logo</div>
                        @endif
                    </div>
                    <h3 class="text-base font-semibold text-center text-gray-800">
                        {{ $opd->nama }}
                    </h3>
                    <a href="{{ $opd->link }}" target="_blank" class="inline-block mt-3 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Kunjungi Situs
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>