@extends('admin.layouts.app')

@section('header')
    {{ __('Tambah Produk/Jaminan Baru') }}
@endsection

@section('content')
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-2xl font-extrabold mb-6 border-b pb-3 text-indigo-700">Formulir Tambah Produk</h3>

                    {{-- Formulir menggunakan method POST dan enctype untuk file upload --}}
                    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Field Nama Produk --}}
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama Produk (Contoh: Bid Bond) *</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required autofocus>
                            @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Field Kategori --}}
                        <div class="mb-4">
                            <label for="category" class="block font-medium text-sm text-gray-700">Kategori (Contoh: Surety Bond)</label>
                            <input type="text" name="category" id="category" value="{{ old('category') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('category') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Field Deskripsi --}}
                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi Lengkap</label>
                            <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('description') }}</textarea>
                            @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Field Gambar Upload (Image Path) --}}
                        <div class="mb-6 p-4 border-2 border-dashed border-indigo-300 rounded-lg bg-indigo-50">
                            <label for="image_path" class="block font-medium text-sm text-indigo-700 mb-2">Upload Gambar Produk (Wajib)</label>
                            <input type="file" name="image_path" id="image_path" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700" required>
                            <p class="text-xs text-indigo-600 mt-2">Format yang didukung: jpg, jpeg, png, gif. Max 2MB.</p>
                            @error('image_path') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.products.index') }}" class="ml-4 text-gray-600 hover:text-gray-900">Batal</a>
                            <button type="submit" class="ml-4 px-4 py-2 bg-indigo-800 text-white font-bold rounded-lg hover:bg-indigo-900 transition">
                                Simpan Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection