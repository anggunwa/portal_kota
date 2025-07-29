    <footer class="bg-gray-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div>
                <h3 class="text-lg font-semibold mb-2">Tentang Portal</h3>
                <p class="text-sm text-gray-300">
                    Portal Layanan Kota Boyolali menyatukan berbagai layanan publik dalam satu tempat untuk kemudahan akses masyarakat.
                </p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-2">Navigasi</h3>
                <ul class="space-y-1 text-sm text-gray-300">
                    <li><a href="{{ url('/') }}" class="hover:underline">Beranda</a></li>
                    <li><a href="{{ route('tentang') }}" class="hover:underline">Tentang</a></li>
                    <li><a href="{{ route('kontak') }}" class="hover:underline">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-2">Kontak</h3>
                <p class="text-sm text-gray-300">
                    Dinas Komunikasi dan Informatika Kabupaten Boyolali<br>
                    Jl. Handayaningrat, Tegalarum, Kemiri, Kec. Mojosongo, Kabupaten Boyolali, Jawa Tengah 57482<br>
                    Email: <a href="mailto:diskominfo@boyolali.go.id" class="underline">diskominfo@boyolali.go.id</a>
                </p>
            </div>
        </div>
        <div class="bg-[#266fad] text-center py-4 text-sm text-white">
            © {{ date('Y') }} Pemerintah Kabupaten Boyolali. All rights reserved.
        </div>
    </footer>