<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Portal Layanan Kabupaten Boyolali' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-white dark:bg-gray-900">

    {{-- Header Navigasi --}}
    @include('layouts.navigation')

    {{-- Judul Halaman --}}
    @isset($header)
<header class="bg-[#3489d2] dark:bg-gray-800 shadow">
    <div class="bg-[#3489d2] max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
    </div>
</header>
    @endisset

    {{-- Konten Halaman --}}
<main>
    {{ $slot }}
</main>

    {{-- Footer --}}
    @include('frontend.partials.footer')

</body>
</html>
