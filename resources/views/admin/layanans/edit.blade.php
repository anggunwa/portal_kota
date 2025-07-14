<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Layanan
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px lg:px-8">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <form method="POST" action="{{ route('admin.layanans.update', $layanan->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Nama layanan</label>
                    <input type="text" name="nama_layanan" class="mt-1 block w-full rounded border-gray-300"
                        value="{{ old('nama_layanan', $layanan->nama_layanan) }}" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="mt-1 block w-full rounded border-gray-300">{{ old('deskripsi',$layanan->deskripsi) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Link</label>
                    <input type="url" name="link" class="mt-1 block w-full rounded border-gray-300"
                        value="{{ old('link', $layanan->link) }}">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Pilih OPD</label>
                    <select name="opd_id" class="mt-1 block w-full rounded border-gray-300" required>
                        @foreach ($opds as $opd)
                            <option value="{{ $opd->id }}" {{ $layanan->opd_id == $opd->id ? 'selected' : '' }}>
                                {{ $opd->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex ustify-end">
                    <a href="{{ route('admin.layanans.index') }}" class="mr-4 text-gray-600 hover:underline">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>