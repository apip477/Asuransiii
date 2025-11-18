<x-app-layout>
    {{-- Section Utama --}}
    <div class="bg-gray-50 min-h-screen flex items-center justify-center pt-20">
        <div class="text-center px-4">
            <h1 class="text-5xl font-extrabold text-gray-900 mb-6">
                Asuransi Hak Cipta <span class="text-indigo-900">Terpercaya</span>
            </h1>
            <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                Lindungi karya digital Anda dari pembajakan. Kami menjamin keamanan aset intelektual Anda dengan teknologi terkini.
            </p>
            
            <div class="flex justify-center gap-4">
                <a href="{{ route('register') }}" class="bg-indigo-900 text-white px-8 py-4 rounded-full font-bold shadow-lg hover:bg-indigo-800 transition">
                    Daftar Sekarang
                </a>
                <a href="#" class="bg-white text-indigo-900 border border-indigo-200 px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition">
                    Pelajari Layanan
                </a>
            </div>
        </div>
    </div>
</x-app-layout>