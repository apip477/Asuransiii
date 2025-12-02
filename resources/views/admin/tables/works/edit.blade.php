@extends('admin.layouts.app')

@section('content')
    <x-slot name="header">
        {{ __('Edit Pengajuan Jaminan') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-2xl font-extrabold mb-6 border-b pb-3">Edit Detail Kontrak: {{ $work->title ?? 'Judul Kontrak' }}</h3>

                    {{-- Form menggunakan method POST, tapi disisipi @method('PATCH') --}}
                    <form method="POST" action="{{ route('works.update', $work ?? '1') }}">
                        @csrf
                        @method('PATCH')
                        
                        {{-- Field Judul Proyek / Kontrak --}}
                        <div class="mb-4">
                            <label for="title" class="block font-medium text-sm text-gray-700">Judul Proyek / Kontrak</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                                   value="{{ old('title', $work->title ?? '') }}" required autofocus>
                        </div>

                        {{-- Field Deskripsi --}}
                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi Singkat Proyek</label>
                            <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('description', $work->description ?? '') }}</textarea>
                        </div>
                        
                        <div class="flex items-center justify-end mt-6 pt-4 border-t">
                            <a href="{{ route('works.index') }}" class="text-gray-600 hover:text-gray-900">Batal</a>
                            <button type="submit" class="ml-4 px-4 py-2 bg-indigo-800 text-white font-bold rounded-lg hover:bg-indigo-900 transition">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
