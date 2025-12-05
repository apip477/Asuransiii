{{-- resources/views/produk.blade.php (KODE FINAL DINAMIS) --}}

<x-app-layout>
    
    {{-- HEADER PAGE --}}
    <div class="bg-indigo-900 pt-32 pb-16 text-white text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold mb-3">
                Katalog Produk Jaminan Kami
            </h1>
            <p class="text-xl text-indigo-200">
                Pilih jenis jaminan yang sesuai dengan kebutuhan proyek atau tender Anda, lalu ajukan secara online.
            </p>
        </div>
    </div>

    {{-- SECTION DETAIL PRODUK (GRID DINAMIS) --}}
    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
                
                {{-- LOOPING DATA PRODUK DARI DATABASE --}}
                @forelse ($products as $product)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100" x-data="{ expanded: false }">
                        
                        <img src="{{ asset('storage/' . $product->image_path) }}" 
                            alt="{{ $product->name }}" 
                            class="w-full h-48 object-cover">
                        
                        <div class="p-6">
                            {{-- NAMA PRODUK --}}
                            <h3 class="text-xl font-bold text-indigo-800 mb-2">
                                {{ $product->name }} ({{ $product->category }})
                            </h3>
                            
                            <div class="text-gray-600 text-sm mb-4">
                                
                                {{-- 1. VERSI PENDEK (Default: DILIHAT) --}}
                                {{-- Teks ini selalu pendek, dan akan hilang saat expanded --}}
                                <p x-show="!expanded" class="mb-2">
                                    {{ Str::limit($product->description, 100) }}
                                </p>

                                {{-- 2. VERSI PANJANG (Default: TERSEMBUNYI) --}}
                                <p x-show="expanded" class="mb-2">
                                    {{ $product->description }}
                                </p>
                                
                                {{-- Tombol Toggle "Selengkapnya" --}}
                                @if (strlen($product->description) > 100)
                                    <button 
                                        @click="expanded = !expanded" 
                                        class="text-indigo-600 text-sm font-semibold mt-2 hover:underline"
                                        x-text="expanded ? 'Sembunyikan' : 'Selengkapnya'">
                                        Selengkapnya
                                    </button>
                                @endif
                            </div>
                            
                            {{-- TOMBOL PILIH PRODUK --}}
                            <a href="{{ Auth::check() ? route('user.submission.create', ['product' => $product->slug]) : route('login') }}" 
                                class="mt-4 block w-full text-center bg-indigo-600 text-white py-2.5 rounded-lg font-bold hover:bg-indigo-700 transition">
                                Pilih Produk
                            </a>
                        </div>
                    </div>
                @empty
                    {{-- Pesan Jika Database Kosong --}}
                    <div class="md:col-span-3 text-center py-10 bg-white rounded-xl shadow">
                        <p class="text-gray-500 font-medium">Belum ada produk yang tersedia. Silakan input produk dari Admin Panel.</p>
                    </div>
                @endforelse
                
            </div>
        </div>
    </div>
</x-app-layout>