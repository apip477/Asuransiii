@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Layanan Management</h1>
        <a href="{{ route('admin.layanan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Layanan</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($layanans as $layanan)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $layanan->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $layanan->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $layanan->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($layanan->image)
                            <img src="{{ asset('storage/' . $layanan->image) }}" alt="Layanan Image" class="w-16 h-16 object-cover">
                        @else
                            No image
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.layanan.show', $layanan) }}" class="text-blue-600 hover:text-blue-900">View</a>
                        <a href="{{ route('admin.layanan.edit', $layanan) }}" class="ml-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form method="POST" action="{{ route('admin.layanan.destroy', $layanan) }}" class="inline ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center">No layanan found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
