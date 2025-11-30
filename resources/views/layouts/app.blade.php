<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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

        {{-- ================================================== --}}
        {{-- FOOTER GLOBAL PT SAVANAAH JAYA UTAMA (NAVY THEME) --}}
        {{-- ================================================== --}}
        <footer class="bg-gray-900 text-white pt-12 mt-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

                    {{-- Kolom 1: Logo & Deskripsi --}}
                    <div>
                        <h4 class="text-xl font-bold text-indigo-400 mb-4">PT Savannah Jaya Utama</h4>
                        <p class="text-gray-400 text-sm mb-4">
                            Mitra terpercaya Anda dalam penjaminan Surety Bond dan Bank Garansi untuk kepastian proyek.
                        </p>
                    </div>

                    {{-- Kolom 2: Quick Links --}}
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Menu Cepat</h4>
                        <ul class="space-y-3 text-sm">
                            <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">Home</a></li>
                            <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
                            <li><a href="{{ route('produk') }}" class="text-gray-400 hover:text-white transition">Produk Jaminan</a></li>
                        </ul>
                    </div>

                    {{-- Kolom 3: Kontak & Dukungan --}}
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Hubungi Kami</h4>
                        <ul class="space-y-3 text-sm">
                            <li>
                                <p class="text-gray-400">Email:</p>
                                <a href="mailto:info@savanah.com" class="text-white hover:text-indigo-400">savannah.guarantee165@gmail.com</a>
                            </li>
                            <li>
                                <p class="text-gray-400">Telepon:</p>
                                <a href="tel:+6221xxxxxx" class="text-white hover:text-indigo-400">+62 813-8163-6933</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Kolom 4: Legal & Media --}}
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Legalitas</h4>
                        <ul class="space-y-3 text-sm">
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Kebijakan Privasi</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>

                </div>

                {{-- Copyright Bar --}}
                <div class="mt-10 pt-6 border-t border-gray-700 text-center">
                    <p class="text-sm text-gray-500">
                        &copy; {{ date('Y') }} PT Savanaah Jaya Utama. All Rights Reserved.
                    </p>
                </div>
            </div>
        </footer>

        {{-- SCRIPT JAVASCRIPT ADA DI BAWAH INI --}}
    </body>
</html>
