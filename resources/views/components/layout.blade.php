<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Portal Layanan Kabupaten Boyolali' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900">

    {{-- Header Navigasi --}}
    @include('layouts.navigation')

    {{-- Judul Halaman --}}
    @isset($header)
<header class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
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
