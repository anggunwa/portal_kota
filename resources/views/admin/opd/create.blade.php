<x-app-layout>
    <div class="max-w-xl mx-auto bg-white p-6 mt-10 rounded shadow text-lg">
        <h2  class="text-xl font-bold mb-6">Tambah OPD</h2>

        <form action="{{ route('admin.opds.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Nama:</label><br>
            <input type="text" name="nama" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required><br><br>

            <label>Slug:</label><br>
            <input type="text" name="slug" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required><br><br>

            <label>Link:</label><br>
            <input type="url" name="link" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"><br><br>

            <label>Logo:</label>
            <input type="file" name="logo" accept="image/*"><br><br>

            <div class="mt-4 inline-block bg-blue-600 px-4 py-2 text-white text-m rounded hover:bg-blue-700">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>