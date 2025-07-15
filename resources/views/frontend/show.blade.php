<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Detail Layanan
        </h2>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto px-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $layanan->nama_layanan }}</h1>
            
            @if ($layanan->opd)
                <p class="mb-2 text-gray-600">Diselenggarakan oleh: 
                    <strong>{{ $layanan->opd->nama }}</strong>
                </p>
            @endif

            <div class="mb-4 text-gray-700">
                {!! nl2br(e($layanan->deskripsi ?? 'Belum ada deskripsi')) !!}
            </div>

            @if ($layanan->link)
                <a href="{{ $layanan->link }}" target="_blank" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Kunjungi Layanan
                </a>
            @endif
        </div>
    </div>
</x-app-layout>
