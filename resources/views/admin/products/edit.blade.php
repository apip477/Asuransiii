
@extends('admin.layouts.app')

@section('header')
    {{ __('Edit Produk/Jaminan') }}
@endsection

@section('content')
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-2xl font-extrabold mb-6 border-b pb-3 text-indigo-700">Edit Produk: {{ $product->name }}</h3>

                    {{-- Formulir Edit menggunakan method POST dan di-spoof menjadi PUT/PATCH --}}
                    <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        {{-- Field Nama Produk --}}
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama Produk *</label>
                            {{-- Menggunakan $product->name atau old('name') --}}
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required autofocus>
                            @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Field Kategori --}}
                        <div class="mb-4">
                            <label for="category" class="block font-medium text-sm text-gray-700">Kategori</label>
                            <input type="text" name="category" id="category" value="{{ old('category', $product->category) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('category') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Field Deskripsi --}}
                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi Lengkap</label>
                            <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('description', $product->description) }}</textarea>
                            @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Display Gambar Saat Ini & Field Upload Baru --}}
                        <div class="mb-6 p-4 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50">
                            <label class="block font-medium text-sm text-gray-700 mb-3">Gambar Produk Saat Ini:</label>
                            
                            @if ($product->image_path)
                                {{-- Menampilkan gambar lama yang tersimpan di storage --}}
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="Gambar {{ $product->name }}" class="h-32 object-cover rounded-md mb-4 border border-gray-200">
                                <p class="text-xs text-gray-500 mb-2">Jika Anda memilih file baru, gambar di atas akan **diganti**.</p>
                            @else
                                <p class="text-sm text-red-500 mb-2">Tidak ada gambar saat ini.</p>
                            @endif

                            <label for="image_path" class="block font-medium text-sm text-indigo-700 mt-4 mb-2">Upload Gambar Baru (Opsional)</label>
                            <input type="file" name="image_path" id="image_path" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700">
                            <p class="text-xs text-gray-600 mt-2">Biarkan kosong jika tidak ingin mengganti gambar. Max 2MB.</p>
                            @error('image_path') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.products.index') }}" class="ml-4 text-gray-600 hover:text-gray-900">Kembali</a>
                            <button type="submit" class="ml-4 px-4 py-2 bg-green-700 text-white font-bold rounded-lg hover:bg-green-800 transition">
                                Perbarui Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection