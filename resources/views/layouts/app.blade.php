<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Portal Layanan Kabupaten Boyolali</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">

        

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

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
        <div class="bg-gray-900 text-center py-4 text-sm text-gray-400">
            © {{ date('Y') }} Pemerintah Kabupaten Boyolali. All rights reserved.
        </div>
    </footer>

    </body>
</html>
