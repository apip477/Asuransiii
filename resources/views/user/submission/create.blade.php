<x-app-layout>
    <x-slot name="header">
       
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-2xl font-bold mb-4">Detail Kontrak Proyek</h3>
                    <p class="text-gray-600 mb-6">Isi semua detail yang diperlukan untuk pengajuan Surety Bond atau Bank Garansi.</p>

                    {{-- Formulir Pengajuan --}}
                    <form method="POST" action="{{ route('user.submission.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Field Judul Kontrak --}}
                        <div class="mb-4">
                            <label for="title" class="block font-medium text-sm text-gray-700">Judul Proyek / Kontrak</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required autofocus>
                            {{-- @error('title') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror --}}
                        </div>

                        {{-- Field Deskripsi --}}
                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi Singkat Proyek</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                            {{-- @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror --}}
                        </div>
                        
                        {{-- Field Upload Dokumen --}}
                        <div class="mb-6 p-4 border-2 border-dashed border-indigo-300 rounded-lg bg-indigo-50">
                            <label for="file_path" class="block font-medium text-sm text-indigo-700 mb-2">Upload Dokumen Kontrak (.pdf, .zip, .jpg)</label>
                            <input type="file" name="file_path" id="file_path" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700" required>
                            <p class="text-xs text-indigo-600 mt-2">Max. 5MB. Dokumen ini yang akan diverifikasi Admin.</p>
                            {{-- @error('file_path') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror --}}
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