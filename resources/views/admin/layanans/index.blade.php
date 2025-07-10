<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Layanan
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.layanans.create') }}"
            class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            + Tambah Layanan
        </a>

        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <table class="w-full text-left table-auto border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama Layanan</th>
                        <th class="px-4 py-2">OPD</th>
                        <th class="px-4 py-2">Deskripsi</th>
                        <th class="px-4 py-2">Link</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($layanans as $index => $layanan)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $layanan->nama_layanan }}</td>
                            <td class="px-4 py-2">{{ $layanan->opd->nama ?? "" }}</td>
                            <td class="px-4 py-2">{{ $layanan->deskripsi }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ $layanan->link }}" class="text-blue-500 underline" target="_blank">
                                    {{ $layanan->link }}
                                </a>
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.layanans.edit', $layanan->id) }}" class="text-indigo-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.layanans.destroy'), $layanan->id }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus layanan ini?')" class="text-red-600 hover:underline">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center">Belum ada data layanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>