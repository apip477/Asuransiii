<nav x-data="{ open: false }" class="relative">
    
    <div class="hidden md:block w-full">
        <div class="fixed top-6 left-1/2 -translate-x-1/2 z-50 w-auto max-w-fit">
            
            {{-- Container Pill Navy --}}
            {{-- SAYA KURANGI px-8 JADI px-6, DAN gap-8 JADI gap-1 --}}
            <div class="flex items-center justify-between bg-indigo-900 text-white rounded-full shadow-2xl px-6 py-3 border border-indigo-800">
                
                <a href="/" class="flex items-center gap-2 flex-shrink-0 hover:opacity-80 transition mr-8">
                    <div class="bg-white text-indigo-900 p-1.5 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <span class="font-bold text-sm tracking-wide whitespace-nowrap">HAKI PROTECT</span>
                </a>

                {{-- gap-6 diperkecil jadi gap-5 agar muat --}}
                <div class="flex items-center gap-5 text-sm font-medium">
                    <a href="{{ route('home') }}" class="whitespace-nowrap hover:text-indigo-200 transition {{ request()->routeIs('home') ? 'text-white font-bold' : 'text-indigo-100' }}">
                        Home
                    </a>
                    <a href="#" class="whitespace-nowrap text-indigo-100 hover:text-white transition">
                        Produk
                    </a>
                    <a href="#" class="whitespace-nowrap text-indigo-100 hover:text-white transition">
                        Klaim
                    </a>
                    <a href="{{ route('contact') }}" class="whitespace-nowrap text-indigo-100 hover:text-white transition">
                        Contact
                    </a>
                    {{-- Tambah whitespace-nowrap agar "About Us" sejajar --}}
                    <a href="{{ route('about') }}" class="whitespace-nowrap hover:text-white transition {{ request()->routeIs('about') ? 'text-white font-bold' : 'text-indigo-100' }}">
                        About Us
                    </a>
                </div>

                {{-- Tambah margin left (ml-6) untuk jarak pemisah --}}
                <div class="ml-8 pl-6 border-l border-indigo-700">
                    
                    @auth
                        {{-- SUDAH LOGIN --}}
                        <div class="relative" x-data="{ dropdownOpen: false }">
                            <button @click="dropdownOpen = ! dropdownOpen" class="flex items-center gap-2 bg-indigo-800 hover:bg-indigo-700 text-white rounded-full pl-4 pr-2 py-1.5 text-xs font-bold transition-colors whitespace-nowrap">
                                <span>{{ Auth::user()->name }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
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
                        {{-- BELUM LOGIN --}}
                        <a href="{{ route('login') }}" class="whitespace-nowrap bg-white text-indigo-900 px-6 py-2 rounded-full text-sm font-bold hover:bg-indigo-50 transition shadow-md">
                            Login
                        </a>
                    @endauth

                </div>
            </div>
        </div>
    </div>

    <div class="md:hidden flex items-center justify-between px-4 py-4 bg-white shadow-sm relative z-50">
        <div class="font-bold text-indigo-900 flex items-center gap-2">
            <span>🛡️</span> HAKI PROTECT
        </div>
        <button @click="open = ! open" class="p-2 text-gray-600 bg-gray-50 rounded-md">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
        </button>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white border-t border-gray-200 fixed w-full z-40 shadow-lg">
        <div class="pt-2 pb-4 space-y-1 px-4">
            <a href="{{ route('home') }}" class="block py-2.5 px-3 rounded-lg hover:bg-indigo-50 text-indigo-900 font-medium">Home</a>
            <a href="#" class="block py-2.5 px-3 rounded-lg hover:bg-indigo-50 text-gray-600">Produk</a>
            <a href="#" class="block py-2.5 px-3 rounded-lg hover:bg-indigo-50 text-gray-600">Klaim</a>
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