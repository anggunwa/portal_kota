<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Layanan Baru
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <form method="POST" action="{{ route('admin.layanans.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Nama Layanan</label>
                    <input type="text" name="nama_layanan" class="mt-1 block w-full rounded border-gray-300" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="mt-1 block w-full rounded border-gray-300" rows="4"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Link</label>
                    <input type="url" name="link" class="mt-1 block w-full rounded border-gray-300">
                </div>
                
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Pilih OPD</label>
                    <select name="opd_id" class="mt-1 block w-full rounded border-gray-300" required>
                        <option value="">---Pilih OPD---</option>
                        @foreach ($opds as $opd)
                            <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end">
                    <button class="px-6 py-2 bg-red-600 text-white rounded hover:underline">
                        <a href="{{ route('admin.layanans.index') }}">Batal</a>
                    </button>                    
                    <button type="submit" class="px-4 py-2 ml-4 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>