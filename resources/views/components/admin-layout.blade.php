{{-- resources/views/components/admin-layout.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Panel Admin - {{ config('app.name', 'PT Savanaah Jaya Utama') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-100">
        <div class="min-h-screen flex">

            {{-- ================================================== --}}
            {{-- BAGIAN KIRI: FIXED SIDEBAR (NAVY THEME) --}}
            {{-- ================================================== --}}
            <div class="w-64 bg-indigo-900 text-white flex flex-col fixed h-screen shadow-2xl z-20">

                {{-- LOGO BRAND --}}
                <div class="p-4 text-xl font-extrabold border-b border-indigo-700">
                    SJU Admin Panel
                </div>

                {{-- SIDEBAR MENU --}}
                <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-auto">

                    {{-- 1. Dashboard (Akses Cepat) --}}
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition duration-200
                            {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-700 text-white shadow-md' : 'text-indigo-200 hover:bg-indigo-700 hover:text-white' }}">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l-2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>

                    {{-- 2. Manajemen Admin (Nested/Collapsible Menu) --}}
                    <div x-data="{ open: true }"> {{-- Atur 'open: false' jika ingin tertutup saat dibuka --}}
                        <button @click="open = !open"
                                class="flex items-center justify-between w-full px-4 py-2.5 text-sm font-medium rounded-lg transition duration-200 text-indigo-100 hover:bg-indigo-700 hover:text-white">
                            <span class="flex items-center">
                                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.373a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.373 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.373a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.373-2.37a1.724 1.724 0 002.572-1.065z"></path></svg>
                                Manajemen Admin
                            </span>
                            <svg class="h-4 w-4 transform transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        {{-- SUB MENU --}}
                        <div x-show="open" x-collapse>
                            <a href="{{ route('admin.layanan.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg text-indigo-300 hover:bg-indigo-700 ml-4 transition duration-200">
                                Layanan & Produk
                            </a>
                            <a href="{{ route('admin.mitra.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg text-indigo-300 hover:bg-indigo-700 ml-4 transition duration-200">
                                Mitra Penjamin
                            </a>
                            {{-- <a href="#" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg text-indigo-300 hover:bg-indigo-700 ml-4 transition duration-200">
                                Manajemen Pengguna
                            </a> --}}
                        </div>
                    </div>

                </nav>

                {{-- Tombol Logout (Bawah) --}}
                <div class="mt-auto p-4 border-t border-indigo-700">
                     <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-4 py-2 text-sm font-medium rounded-lg text-red-300 hover:bg-indigo-700 hover:text-white transition duration-200">
                            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                            Log Out ({{ Auth::user()->name ?? 'Admin' }})
                        </button>
                    </form>
                </div>
            </div>

            {{-- ================================================== --}}
            {{-- BAGIAN KANAN: HEADER & KONTEN (Main Content) --}}
            {{-- ================================================== --}}
            <div class="flex-1 ml-64">

                {{-- HEADER PANEL ATAS (Untuk Judul Halaman & Aksi Cepat) --}}
                <header class="bg-white shadow-sm h-16 flex items-center px-6 sticky top-0 z-10 justify-between">
                    <h1 class="text-lg font-semibold text-gray-700">
                        <x-slot name="header">Admin Panel</x-slot>
                    </h1>

                    {{-- Tombol Aksi Cepat Sesuai Screenshot (Contoh) --}}
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:underline">
                            Lihat Dashboard User
                        </a>
                    </div>
                </header>

                {{-- KONTEN UTAMA DARI VIEW --}}
                <main class="p-6">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>
