<x-app-layout>
    <div class="max-w-xl mx-auto bg-white p-6 mt-10 rounded shadow text-lg">
        <h1 class="text-xl font-bold mb-6">Edit Informasi OPD</h1><br>

            <form action="{{ route('admin.opds.update', $opd->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label>Nama:</label><br>
                <input input="text" name="nama" value="{{ $opd->nama }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required><br><br>

                <label>Deskripsi Singkat:</label><br>
                <textarea name="deskripsi" value="{{ $opd->deskripsi }}" rows="3" maxlength="150" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('deskripsi', $opd->deskripsi) }}</textarea>

                <label>Slug:</label><br>
                <input input="text" name="slug" value="{{ $opd->slug }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required><br><br>
                
                <label>Link:</label><br>
                <input type="url" name="link" value="{{ $opd->link }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"><br><br>
            
                <label>Logo Baru:</label>
                <input type="file" name="logo" accept="image/*"><br><br>

                <div class="mb-4">
                    <label class="block text-lg mb-1">Logo Saat Ini:</label>
                    @if ($opd->logo)
                    <img src="{{ asset($opd->logo) }}" alt="Logo OPD" width="100">
                    @endif
                </div>

                <div class="mt-4 inline-block bg-blue-600 px-4 py-2 text-white text-m rounded hover:bg-blue-700">
                    <button type="submit">Update</button>
                </div>
                
            </form>
    </div>
</x-app-layout>
