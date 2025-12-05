{{-- resources/views/layouts/navigation.blade.php --}}
<nav x-data="{ open: false }" class="relative">
    
    <div class="hidden md:block w-full">
        <div class="fixed top-6 left-1/2 -translate-x-1/2 z-50 w-auto max-w-7xl"> 
            
            {{-- Container Pill Navy --}}
            <div class="flex items-center justify-between gap-3 bg-indigo-900 text-white rounded-full shadow-2xl px-4 py-2.5 border border-indigo-800"> 
                {{-- LOGO SAVANNAH (Sisi Kiri) --}}
                <a href="/" class="flex items-center gap-2 flex-shrink-0 hover:opacity-80 transition mr-8">

            <div class="bg-white px-2 py-1.5 rounded-full flex items-center justify-center shadow-md">
    <img src="{{ asset('images/svnh.png') }}" alt="Savannah Logo" class="h-7 w-auto">
</div>
                </a>

                {{-- gap-6 diperkecil jadi gap-5 agar muat --}}
                <div class="flex items-center gap-5 text-sm font-medium">
                    <a href="{{ route('home') }}" class="whitespace-nowrap hover:text-indigo-200 transition {{ request()->routeIs('home') ? 'text-white font-bold' : 'text-indigo-100' }}">
                        Home
                    </a>
                    <a href="{{ route('produk') }}" class="whitespace-nowrap text-indigo-100 hover:text-white transition">
                        Product
                    </a>
                    <a href="{{ route('claim.create') }}" class="whitespace-nowrap text-indigo-100 hover:text-white transition">
                        Claim
                    </a>
                    <a href="{{ route('contact') }}" class="whitespace-nowrap text-indigo-100 hover:text-white transition">
                        Contact
                    </a>
                    {{-- Tambah whitespace-nowrap agar "About Us" sejajar --}}
                    <a href="{{ route('about') }}" class="whitespace-nowrap hover:text-white transition {{ request()->routeIs('about') ? 'text-white font-bold' : 'text-indigo-100' }}">
                        About Us
                    </a>
                </div>

                {{-- LOGIN / ALAMAT (Sisi Kanan) --}}
                <div class="ml-2"> 
                    @auth
    {{-- SUDAH LOGIN: Tombol Log Out Sederhana (Hanya Tulisan Log Out) --}}

<form method="POST" action="{{ route('logout') }}" class="inline-flex">
        @csrf
        <button type="submit" class="bg-indigo-800 hover:bg-indigo-700 text-white rounded-full px-4 py-1.5 text-xs font-bold transition-colors whitespace-nowrap">
            Log Out
        </button>
    </form>
@else
    {{-- BELUM LOGIN: Tombol Alamat (Maps) --}}
    <a href="{{ route('login') }}" class="bg-white text-indigo-900 px-5 py-1.5 rounded-full text-sm font-bold hover:bg-indigo-50 transition shadow-md whitespace-nowrap">
        Alamat
</a>
@endauth
                </div>
            </div>
        </div>
    </div>

    {{-- TAMPILAN MOBILE (Sudah Diperbaiki) --}}
    <div class="md:hidden flex items-center justify-between px-4 py-4 bg-white shadow-sm relative z-50">
        <div class="font-bold text-indigo-900 flex items-center gap-2">
            <img src="{{ asset('images/svnh.png') }}" alt="Savannah Jaya Logo" class="h-8 w-auto">
        </div>
        <button @click="open = ! open" class="p-2 text-gray-600 bg-gray-50 rounded-md">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
        </button>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white border-t border-gray-200 fixed w-full z-40 shadow-lg">
        <div class="pt-2 pb-4 space-y-1 px-4">
            {{-- MENU MOBILE INDONESIA --}}
            <a href="{{ route('home') }}" class="block py-2.5 px-3 rounded-lg hover:bg-indigo-50 text-indigo-900 font-medium">Home</a>

            <a href="{{ route('produk') }}" class="block py-2.5 px-3 rounded-lg hover:bg-indigo-50 text-gray-600">Product</a>
            <a href="#" class="block py-2.5 px-3 rounded-lg hover:bg-indigo-50 text-gray-600">Claim</a>
            <a href="#" class="block py-2.5 px-3 rounded-lg hover:bg-indigo-50 text-gray-600">Contact</a>
            <a href="#" class="block py-2.5 px-3 rounded-lg hover:bg-indigo-50 text-gray-600">About Us</a>
            <div class="border-t border-gray-100 my-2"></div>
            @auth
                <a href="{{ route('dashboard') }}" class="block py-2 px-3 text-gray-700">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block text-center w-full bg-indigo-900 text-white py-3 rounded-lg font-bold mt-4">Login</a>
            @endauth
        </div>
    </div>
</nav>