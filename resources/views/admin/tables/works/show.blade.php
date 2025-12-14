@extends('admin.layouts.app')

@section('content')
    <x-slot name="header">
        {{ __('Verifikasi Pengajuan Jaminan') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-2xl font-extrabold mb-6 border-b pb-3">Detail Kontrak: {{ $work->title ?? 'Judul Kontrak Hilang' }}</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        
                        {{-- KOLOM KIRI: DETAIL KONTRAK --}}
                        <div class="md:col-span-2 space-y-4">
                            <h4 class="text-lg font-bold border-b pb-2 mb-4 text-indigo-700">Informasi Pengajuan</h4>
                            
                            <p><strong>ID Pengajuan:</strong> {{ $work->id ?? 'N/A' }}</p>
                            <p><strong>Nama Pemilik Akun:</strong> {{ $work->user->name ?? 'N/A' }}</p>
                            <p><strong>Email Pemilik:</strong> {{ $work->user->email ?? 'N/A' }}</p>
                            
                            <p><strong>Status Saat Ini:</strong> 
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    {{ ucfirst($work->status ?? 'Missing') }}
                                </span>
                            </p>
                            <p><strong>Tanggal Diajukan:</strong> {{ $work->created_at->format('d M Y H:i') ?? 'N/A' }}</p>
                            <p><strong>No. Sertifikat:</strong> {{ $work->certificate_number ?? 'Belum Ditetapkan' }}</p>

                            <h4 class="text-lg font-bold border-b pb-2 mb-4 mt-8 text-indigo-700">Deskripsi Proyek</h4>
                            <div class="bg-gray-50 p-4 rounded-lg border">
                                <p class="text-gray-700">{{ $work->description ?? 'Deskripsi Proyek Tidak Ditemukan.' }}</p>
                            </div>
                        </div>

                        {{-- KOLOM KANAN: AKSI & VERIFIKASI --}}
                        <div class="md:col-span-1 space-y-6 bg-gray-50 p-6 rounded-lg border-2 border-gray-100">
                            <h4 class="text-lg font-bold text-indigo-800">Dokumen dan Aksi Verifikasi</h4>

                            {{-- Link File --}}
                            <div class="space-y-2">
                                <p class="text-sm font-medium">Dokumen Kontrak:</p>
                                <a href="{{ asset('storage/' . ($work->file_path ?? '#')) }}" target="_blank" class="text-blue-600 hover:text-blue-800 flex items-center">
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    Lihat Dokumen
                                </a>
                            </div>
                            
                            <hr>

                            {{-- Tombol Aksi Admin (Mengarah ke method update()) --}}
                            <div class="space-y-3">
                                {{-- FORM UNTUK VERIFIKASI (Setujui) --}}
                                <form action="{{ route('works.update', $work ?? '1') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="status" value="verified" class="w-full bg-green-600 text-white py-2 rounded-lg font-bold hover:bg-green-700 transition">
                                         Setujui & Verifikasi
                                    </button>
                                </form>
                                
                                {{-- FORM UNTUK PENOLAKAN --}}
                                <form action="{{ route('works.update', $work ?? '1') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="status" value="rejected" class="w-full bg-red-600 text-white py-2 rounded-lg font-bold hover:bg-red-700 transition">
                                        Tolak Pengajuan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection