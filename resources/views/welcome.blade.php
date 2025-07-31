<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Layanan Kota</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@formkit/auto-animate@1"></script>
</head>
<body class="bg-[#f3f4f6] font-sans antialiased">
    
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Portal Layanan Kota</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($opds as $opd)
                <div class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center justify-between h-full">
                    @if ($opd->logo)
                        <img src="{{ asset($opd->logo) }}" alt="Logo {{ $opd->nama }}" class="h-24 object-contain mb-4">
                    @else
                        <div class="text-gray-300 text-6xl mb-4">❔</div>
                    @endif

                    <h3 class="text-center font-semibold text-lg text-gray-700 mb-3">{{ $opd->nama }}</h3>
                    
                    @if ($opd->link)
                        <a href="{{ $opd->link }}" target="_blank" class="mt-auto inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Kunjungi Situs</a>
                    @endif
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada data OPD</p>
            @endforelse
        </div>
    </div>

</body>
</html>