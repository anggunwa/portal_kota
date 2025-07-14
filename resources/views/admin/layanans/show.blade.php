<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Layanan
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-4">{{ $layanan->nama_layanan }}</h3>
            <p><strong>OPD:</strong> {{ $layanan->opd->nama ?? '-' }}</p>
            <p><strong>Deskripsi:</strong> {{ $layanan->deskripsi }}</p>
            <p><strong>Link:</strong>
                @if ($layanan->link)
                    <a href="{{ $layanan->link }}" target="_blank" class="text-blue-500 underline">
                        {{ $layanan->link }}
                    </a>
                @else
                    Tidak tersedia
                @endif
            </p>

            <div class="mt-6">
                <a href="{{ route('admin.layanans.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>