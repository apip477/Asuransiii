{{-- resources/views/admin/works/show.blade.php --}}

<x-layouts.admin-layout>
    <x-slot name="header">
        {{ __('Detail Pengajuan & Verifikasi') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-2xl font-extrabold mb-6 border-b pb-3 text-indigo-700">
                        Detail Pengajuan #{{ $work->id }}
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        
                        {{-- KOLOM KIRI: DETAIL SUBMISI --}}
                        <div>
                            <h4 class="text-xl font-bold mb-3 text-gray-800">Informasi Kontrak</h4>
                            
                            <div class="space-y-4 border p-4 rounded-lg bg-gray-50">
                                <p>
                                    <span class="block text-sm font-medium text-gray-500">Pemilik Akun:</span>
                                    <span class="block text-lg font-semibold text-indigo-700">{{ $work->user->name ?? 'N/A' }}</span>
                                </p>
                                <p>
                                    <span class="block text-sm font-medium text-gray-500">Judul Proyek/Kontrak:</span>
                                    <span class="block text-lg font-semibold">{{ $work->title }}</span>
                                </p>
                                <p>
                                    <span class="block text-sm font-medium text-gray-500">Deskripsi:</span>
                                    <span class="block text-base">{{ $work->description }}</span>
                                </p>
                                <p>
                                    <span class="block text-sm font-medium text-gray-500">Tanggal Pengajuan:</span>
                                    <span class="block text-base">{{ $work->created_at->format('d F Y H:i') }}</span>
                                </p>
                            </div>
                        </div>

                        {{-- KOLOM KANAN: DOKUMEN & STATUS --}}
                        <div>
                            <h4 class="text-xl font-bold mb-3 text-gray-800">Dokumen & Verifikasi</h4>
                            
                            {{-- STATUS SAAT INI --}}
                            <div class="mb-6 p-4 rounded-lg shadow-sm border 
                                @if($work->status == 'pending') bg-yellow-100 border-yellow-400
                                @elseif($work->status == 'verified') bg-green-100 border-green-400
                                @else bg-red-100 border-red-400
                                @endif">
                                <p class="text-sm font-medium">Status Saat Ini:</p>
                                <span class="text-2xl font-extrabold 
                                    @if($work->status == 'pending') text-yellow-800
                                    @elseif($work->status == 'verified') text-green-800
                                    @else text-red-800
                                    @endif">
                                    {{ ucfirst($work->status) }}
                                </span>
                            </div>

                            {{-- LINK DOWNLOAD DOKUMEN --}}
                            @if($work->file_path)
                                <a href="{{ asset('storage/' . $work->file_path) }}" target="_blank" class="block text-center px-4 py-2 mb-6 border border-indigo-600 bg-indigo-50 text-indigo-700 font-semibold rounded-lg hover:bg-indigo-100 transition">
                                    Unduh Dokumen Kontrak ({{ pathinfo($work->file_path, PATHINFO_EXTENSION) }})
                                </a>
                            @else
                                <p class="text-red-500 text-sm mb-6">Dokumen tidak ditemukan.</p>
                            @endif


                            {{-- FORM UPDATE STATUS --}}
                            <h4 class="text-lg font-bold mb-3 mt-6 text-gray-800">Ubah Status Pengajuan</h4>
                            <form method="POST" action="{{ route('works.update', $work->id) }}">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-4">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Pilih Status Baru:</label>
                                    <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                        <option value="pending" {{ $work->status == 'pending' ? 'selected' : '' }}>Pending (Menunggu Review)</option>
                                        <option value="verified" {{ $work->status == 'verified' ? 'selected' : '' }}>Verified (Disetujui/Proses)</option>
                                        <option value="rejected" {{ $work->status == 'rejected' ? 'selected' : '' }}>Rejected (Ditolak)</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition">
                                    Simpan Perubahan Status
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-4 border-t">
                        <a href="{{ route('works.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">&larr; Kembali ke Daftar Pengajuan</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-layout>