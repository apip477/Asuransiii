@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Layanan Details</h1>

    <div class="mb-4">
        <strong>ID:</strong> {{ $layanan->id }}
    </div>
    <div class="mb-4">
        <strong>Name:</strong> {{ $layanan->name }}
    </div>
    <div class="mb-4">
        <strong>Description:</strong> {{ $layanan->description }}
    </div>
    <div class="mb-4">
        <strong>Image:</strong>
        @if($layanan->image)
            <img src="{{ asset($layanan->image) }}" alt="Layanan Image" class="w-64 h-64 object-cover">
        @else
            No image uploaded.
        @endif
    </div>
    <div class="mb-4">
        <strong>Created At:</strong> {{ $layanan->created_at->format('Y-m-d H:i:s') }}
    </div>
    <div class="mb-4">
        <strong>Updated At:</strong> {{ $layanan->updated_at->format('Y-m-d H:i:s') }}
    </div>

    <div class="flex justify-end">
        <a href="{{ route('admin.layanan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600">Back to List</a>
        <a href="{{ route('admin.layanan.edit', $layanan) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
    </div>
</div>
@endsection
