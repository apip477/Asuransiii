<x-app-layout>
    <x-slot name="header">
        {{-- Header tidak digunakan di layout ini, tetapi Anda bisa menambahkannya jika perlu --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-2xl font-bold mb-4">Detail Kontrak Proyek</h3>
                    <p class="text-gray-600 mb-6">Isi semua detail yang diperlukan untuk pengajuan Surety Bond atau Bank Garansi.</p>

                    {{-- PESAN UNTUK MENAMPILKAN JUDUL YANG DI-PREFILL --}}
                    @if(isset($prefill_title) && $prefill_title)
                        <div class="mb-6 p-4 bg-indigo-50 border border-indigo-300 rounded-lg">
                            <p class="font-bold text-sm text-indigo-800">
                                Produk Dipilih: {{ $prefill_title }}
                            </p>
                            <p class="text-xs text-indigo-700 mt-1">
                                Field Judul Proyek di bawah ini sudah terisi otomatis. Anda dapat memodifikasinya jika perlu.
                            </p>
                            <input type="hidden" name="product_name" value="{{ $prefill_title }}">
                        </div>
                    @endif


                    {{-- Formulir Pengajuan --}}
                    <form method="POST" action="{{ route('user.submission.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Field Judul Kontrak --}}
                        <div class="mb-4">
                            <label for="title" class="block font-medium text-sm text-gray-700">Judul Proyek / Kontrak</label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                                required 
                                autofocus
                                value="{{ old('title', $prefill_title ?? '') }}" 
                            >
                            @error('title') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Field Deskripsi --}}
                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi Proyek</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('description') }}</textarea>
                            @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        {{-- Field Upload Dokumen --}}
                        <div class="mb-6 p-4 border-2 border-dashed border-indigo-300 rounded-lg bg-indigo-50">
                            <label for="file_path" class="block font-medium text-sm text-indigo-700 mb-2">Upload Dokumen Kontrak (.pdf, .zip, .jpg)</label>
                            <input type="file" name="file_path" id="file_path" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700" required>
                            <p class="text-xs text-indigo-600 mt-2">Max. 5MB. Dokumen ini yang akan diverifikasi Admin.</p>
                            @error('file_path') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="w-full px-4 py-3 bg-indigo-800 text-white font-bold rounded-lg hover:bg-indigo-900 transition">
                                Ajukan Jaminan Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>