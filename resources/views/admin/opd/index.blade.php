<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-10 px-6">Manajemen OPD (admin)</h2>

    <div class="py-4 px-6">
        <a href="{{ route('admin.opds.create') }}" class="text-blue-500 hover:underline">+ Tambah OPD Baru</a>
    
        <table class="mt-4 w-full bg-white border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-3 py-2">No</th>
                    <th class="px-3 py-2">Nama</th>
                    <th class="px-3 py-2">Slug</th>
                    <th class="px-3 py-2">Link</th>
                    <th class="px-3 py-2">Logo</th>
                    <th class="px-3 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($opds as $index => $opd)
                    <tr class="text-gray-700">
                        <td class="px-3 py-2">{{ $index + 1 }}</td>
                        <td class="px-3 py-2">{{ $opd->nama }}</td>
                        <td class="px-3 py-2">{{ $opd->slug }}</td>
                        <td class="px-3 py-2">
                            <a href="{{ $opd->link }}" class="text-blue-500 hover:underline" target="_blank">{{ $opd->link }}</a>
                        </td>
                        <td class="px-3 py-2">
                        <!-- Logo -->
                            @if ($opd->logo)
                                <img src="{{ asset($opd->logo) }}" alt="Logo {{ $opd->nama }}" class="h-10 mx-auto">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                            </td>
                        <td class="px-3 py-2">
                            <a href="{{ route('admin.opds.edit', $opd->id) }}" class="text-green-500">Edit</a> | 
                            <form action="{{ route('admin.opds.destroy', $opd->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500" onclick="return confirm('Hapus OPD ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4">Belum ada data OPD.</td></tr>
                @endforelse    
            </tbody>
        </table>
    </div>
</x-app-layout>
