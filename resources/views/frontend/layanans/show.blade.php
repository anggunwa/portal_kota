<x-app-layout>
    <x-slot name="header">
       <h2 class="text-xl font-semibold text-gray-800">
            Detail Layanan
       </h2> 
    </x-slot>

    <div class="py-10 px-6 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded shadow-sm">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $layanan->nama_layanan }}</h1>
        
        @if ($layanan->deskripsi)
            <p class="text-gray-700 mb-4">{!! nl2br(e($layanan->deskripsi)) !!}</p>
        @else
            <p class="text-gray-500 italic mb-4">Deskripsi belum tersedia.</p>
        @endif

        @if ($layanan->link)
            <p class="mb-4">
                <a href="{{ $layanan->link }}" target="_blank" class="text-blue-600 underline">
                    Kunjungi Situs Layanan
                </a>
            </p>
        @endif

        <p class="text-sm text-gray-500">
            Disediakan oleh: {{ $layanan->opd->nama ?? '-' }}
        </p>
        
        </div>
    </div>
</x-app-layout>