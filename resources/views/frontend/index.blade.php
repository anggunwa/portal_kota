<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">Portal Layanan Kota</h2>
    </x-slot>

    <div class="py-6 px-6">
        <p class="mb-6 text-gray-700">
            Selamat datang di Portal Layanan Kota Boyolali. Berikut daftar Organisasi Perangkat Daerah (OPD) di Boyolali:
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($opds as $opd)
            <div class="bg-white p-4 shadow rounded">
                <div class="flex justify-center mb-3">
                    @if ($opd->logo)
                     <img src="{{ asset($opd->logo) }}" alt="{{ $opd->nama }}" class="h-16 object-contain">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>