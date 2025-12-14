@extends('admin.layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pengajuan Jaminan Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- resources/views/admin/tables/works/index.blade.php --}}

<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-bold">Daftar Pengajuan (Work Management)</h2>

    <form action="{{ route('admin.work.index') }}" method="GET" class="flex items-center space-x-4">
        <label for="statusFilter" class="text-gray-600">Filter Status:</label>
        
        <select name="status" id="statusFilter" class="border rounded-lg py-2 text-sm" onchange="this.form.submit()">
            
            {{-- Tambahkan 'selected' berdasarkan status yang aktif --}}
            <option value="" @if(empty(request('status'))) selected @endif> Tampilkan Semua </option>
            <option value="pending" @if(request('status') === 'pending') selected @endif>Pending</option>
            <option value="verified" @if(request('status') === 'verified') selected @endif>Verified</option>
            <option value="rejected" @if(request('status') === 'rejected') selected @endif>Rejected</option>

        </select>
        
        {{-- BADGE PENDING (Menggunakan $pendingCount dari Controller) --}}
        @if ($pendingCount > 0)
            <span class="px-3 py-1 text-sm font-semibold text-yellow-800 bg-yellow-300 rounded-full">
                Pending ({{ $pendingCount }})
            </span>
        @endif

        {{-- Link Reset Filter --}}
        @if(request('status'))
            <a href="{{ route('admin.work.index') }}" class="text-sm text-red-600 hover:text-red-800">Reset Filter</a>
        @endif
    </form>
</div>

                    @if ($works->isEmpty())
                        <div class="text-center py-10 text-gray-500">
                            <p>Belum ada pengajuan jaminan yang masuk saat ini.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Diajukan Oleh</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Judul Proyek</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($works as $work)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $work->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $work->user->name ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $work->title }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{-- KONDISI STATUS DIBENARKAN & DIRAPIKAN --}}
                                                    @if ($work->status === 'Pending') bg-yellow-100 text-yellow-800
                                                    @elseif($work->status === 'verified') 
                                                        bg-green-100 text-green-800
                                                    @else bg-red-100 text-red-800 @endif">

                                                    {{ $work->status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $work->created_at->format('d M Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                {{-- LINK AKSI DIBENARKAN --}}
                                                <a href="{{ route('works.show', $work->id) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">
                                                    Lihat Detail
                                                </a>
                                                <form action="{{ route('works.destroy', $work->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="text-red-600 hover:text-red-800 transition""
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini? Data tidak dapat dikembalikan.');">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
