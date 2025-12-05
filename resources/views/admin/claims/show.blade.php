

@extends('admin.layouts.app')

@section('header') 
    {{ __('Detail Klaim: ') . $claim->policy_number }}
@endsection 

@section('content') 
    
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                
                <h3 class="text-xl font-bold mb-6 border-b pb-2 text-indigo-700">Informasi Klaim</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="font-semibold text-gray-700">Diajukan Oleh:</p>
                        <p class="text-lg text-gray-900">{{ $claim->user->name ?? 'User Tidak Ditemukan' }} ({{ $claim->user->email ?? 'N/A' }})</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Nomor Polis:</p>
                        <p class="text-lg text-gray-900">{{ $claim->policy_number }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Tanggal Kejadian Klaim:</p>
                        <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($claim->claim_date)->format('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Lokasi Kejadian:</p>
                        <p class="text-lg text-gray-900">{{ $claim->location }}</p>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="font-semibold text-gray-700">Deskripsi Klaim:</p>
                    <div class="border p-4 mt-2 bg-gray-50 rounded-lg">
                        <p class="text-gray-800 whitespace-pre-line">{{ $claim->description }}</p>
                    </div>
                </div>
                
                <h3 class="text-xl font-bold mt-8 mb-4 border-b pb-2 text-indigo-700">Dokumen Pendukung</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="font-semibold text-gray-700">Dokumen Kontrak / Polis:</p>
                        @if ($claim->document_contract_path)
                            <a href="{{ Storage::url($claim->document_contract_path) }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline">
                                Unduh Dokumen Kontrak
                            </a>
                        @else
                            <p class="text-red-500">Dokumen tidak tersedia</p>
                        @endif
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Dokumen Kerugian / Laporan:</p>
                        @if ($claim->document_loss_path)
                            <a href="{{ Storage::url($claim->document_loss_path) }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline">
                                Unduh Dokumen Kerugian
                            </a>
                        @else
                            <p class="text-red-500">Dokumen tidak tersedia</p>
                        @endif
                    </div>
                </div>

                <h3 class="text-xl font-bold mt-8 mb-4 border-b pb-2 text-indigo-700">Update Status & Catatan Admin</h3>

                <form action="{{ route('admin.claims.update', $claim->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status Klaim Saat Ini:</label>
                        <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="pending" {{ $claim->status == 'pending' ? 'selected' : '' }}>Pending (Menunggu Review)</option>
                            <option value="approved" {{ $claim->status == 'approved' ? 'selected' : '' }}>Approved (Disetujui, Siap Diproses)</option>
                            <option value="rejected" {{ $claim->status == 'rejected' ? 'selected' : '' }}>Rejected (Ditolak)</option>
                            <option value="closed" {{ $claim->status == 'closed' ? 'selected' : '' }}>Closed (Selesai)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="admin_notes" class="block text-sm font-medium text-gray-700">Catatan Internal Admin (Opsional):</label>
                        <textarea name="admin_notes" id="admin_notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $claim->admin_notes }}</textarea>
                    </div>

                    <div class="flex justify-between items-center">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Perbarui Status Klaim
                        </button>
                        
                        <a href="{{ route('admin.claims.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">
                            &larr; Kembali ke Daftar Klaim
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection