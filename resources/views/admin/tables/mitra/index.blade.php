
@extends('admin.layouts.app') 
{{-- Asumsi: Anda memiliki file resources/views/admin/layouts/app.blade.php --}}

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    
    {{-- HEADER TABEL --}}
    <div class="flex justify-between items-center mb-6 border-b pb-3">
        <h1 class="text-2xl font-extrabold text-gray-900">Manajemen Mitra Penjamin</h1>
        {{-- Tombol Add New Mitra (Diubah ke warna Indigo) --}}
        <a href="{{ route('admin.mitra.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition font-medium">
            + Tambah Mitra Baru
        </a>
    </div>

    {{-- TABEL MITRA --}}
    <div class="overflow-x-auto border rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    {{-- Kolom Actions --}}
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> 
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($mitras as $mitra)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $mitra->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $mitra->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($mitra->description, 50) }}</td>
                    
                    {{-- KOLOM IMAGE (Logo Display) --}}
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        @if($mitra->image)
                            <img src="{{ asset('storage/' . $mitra->image) }}" alt="{{ $mitra->name }} Logo" class="w-16 h-16 object-contain">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </td>
                    
                    {{-- KOLOM ACTIONS (View, Edit, Delete) --}}
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        
                        {{-- VIEW --}}
                        <a href="{{ route('admin.mitra.show', $mitra) }}" class="text-blue-600 hover:text-blue-900">View</a>
                        
                        {{-- EDIT --}}
                        <a href="{{ route('admin.mitra.edit', $mitra) }}" class="ml-3 text-indigo-600 hover:text-indigo-900">Edit</a>
                        
                        {{-- DELETE --}}
                        <form method="POST" action="{{ route('admin.mitra.destroy', $mitra) }}" class="inline ml-3" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mitra {{ $mitra->name }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 transition">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada mitra yang terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection