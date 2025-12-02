@extends('admin.layouts.app')

@section('content')
    <x-slot name="header">
        {{ __('Tambah Mitra Penjamin Baru') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-2xl font-extrabold mb-6 border-b pb-3">Formulir Tambah Mitra</h3>

                    {{-- Form menggunakan method POST dan enctype untuk file upload --}}
                    <form method="POST" action="{{ route('mitra.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Field Nama Mitra --}}
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama Perusahaan Mitra *</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required autofocus>
                            {{-- @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror --}}
                        </div>

                        {{-- Field Deskripsi --}}
                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi Singkat</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description') }}</textarea>
                            {{-- @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror --}}
                        </div>

                        {{-- Field Logo Upload --}}
                        <div class="mb-6 p-4 border-2 border-dashed border-indigo-300 rounded-lg bg-indigo-50">
                            <label for="logo_path" class="block font-medium text-sm text-indigo-700 mb-2">Upload Logo Mitra (.png, .svg)</label>
                            <input type="file" name="logo_path" id="logo_path" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700" required>
                            <p class="text-xs text-indigo-600 mt-2">Pastikan logo berformat gambar untuk tampilan terbaik.</p>
                            {{-- @error('logo_path') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror --}}
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('mitra.index') }}" class="ml-4 text-gray-600 hover:text-gray-900">Batal</a>
                            <button type="submit" class="ml-4 px-4 py-2 bg-indigo-800 text-white font-bold rounded-lg hover:bg-indigo-900 transition">
                                Simpan Mitra
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

