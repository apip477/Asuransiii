{{-- resources/views/layouts/navigation.blade.php --}}
<nav x-data="{ open: false }" class="relative">
    
    <div class="hidden md:block w-full">
        <div class="fixed top-6 left-1/2 -translate-x-1/2 z-50 w-auto max-w-7xl"> 
            
            {{-- Container Pill Navy --}}
            <div class="flex items-center justify-between gap-3 bg-indigo-900 text-white rounded-full shadow-2xl px-4 py-2.5 border border-indigo-800"> 
                
                <a href="{{ route('home') }}" class="flex items-center gap-2 flex-shrink-0 hover:opacity-80 transition">
                    <img src="{{ asset('images/svnh.png') }}" alt="Savannah Jaya Logo" class="h-8 w-auto">
                </a>

                {{-- MENU UTAMA (Bahasa Indonesia) --}}
                <div class="flex items-center gap-3 text-sm font-medium"> 
                    <a href="{{ route('home') }}" class="whitespace-nowrap hover:text-indigo-200 transition {{ request()->routeIs('home') ? 'text-white font-bold' : 'text-indigo-100' }}">Home</a>
                    <a href="{{ route('produk') }}" class="whitespace-nowrap text-indigo-100 hover:text-white transition {{ request()->routeIs('produk') ? 'text-white font-bold' : 'text-indigo-100' }}">Produk</a>
                    <a href="{{ route('layanan') }}" class="whitespace-nowrap text-indigo-100 hover:text-white transition">Klaim</a>
                    <a href="{{ route('contact') }}" class="whitespace-nowrap text-indigo-100 hover:text-white transition">Contact</a>
                    <a href="{{ route('about') }}" class="whitespace-nowrap hover:text-white transition {{ request()->routeIs('about') ? 'text-white font-bold' : 'text-indigo-100' }}">About Us</a>
                </div>

                {{-- LOGIN / ALAMAT (Sisi Kanan) --}}
                <div class="ml-2"> 
                    @auth
                        {{-- SUDAH LOGIN --}}
                        <div class="relative" x-data="{ dropdownOpen: false }">
                            <button @click="dropdownOpen = ! dropdownOpen" class="flex items-center gap-2 bg-indigo-800 hover:bg-indigo-700 text-white rounded-full pl-4 pr-2 py-1.5 text-xs font-bold transition-colors whitespace-nowrap">
                                <span>{{ Auth::user()->name }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </button>
                            <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl py-2 text-gray-700 z-50 overflow-hidden" style="display: none;">
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm hover:bg-indigo-50">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm hover:bg-red-50 text-red-600">Log Out</button>
                                </form>
                            </div>
                        </div>
                    @else
                        {{-- BUTTON ALAMAT / MAPS (Diambil dari remote, tapi teks diubah ke Indonesia) --}}
                        <a href="https://maps.google.com/?cid=10489208401089106474&g_mp=Cidnb29nbGUubWFwcy5wbGFjZXMudjEuUGxhY2VzLlNlYXJjaFRleHQ" target="_blank" class="bg-white text-indigo-900 px-5 py-1.5 rounded-full text-sm font-bold hover:bg-indigo-50 transition shadow-md whitespace-nowrap">
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
            <a href="{{ route('produk') }}" class="block py-2.5 px-3 rounded-lg hover:bg-indigo-50 text-gray-600">Produk</a>
            <a href="{{ route('layanan') }}" class="block py-2.5 px-3 rounded-lg hover:bg-indigo-50 text-gray-600">Klaim</a>
            <a href="{{ route('contact') }}" class="block py-2.5 px-3 rounded-lg hover:bg-indigo-50 text-gray-600">Contact</a>
            <a href="{{ route('about') }}" class="block py-2.5 px-3 rounded-lg hover:bg-indigo-50 text-gray-600">About Us</a>

            <div class="border-t border-gray-100 my-2"></div>
            @auth
                <a href="{{ route('dashboard') }}" class="block py-2 px-3 text-gray-700">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block text-center w-full bg-indigo-900 text-white py-3 rounded-lg font-bold mt-4">Login</a>
            @endauth
        </div>
    </div>
</nav>