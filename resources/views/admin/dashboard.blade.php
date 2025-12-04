@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-blue-500 text-white p-4 rounded">
            <h3 class="text-lg font-semibold">Total Works</h3>
            <p class="text-2xl">{{ $worksCount }}</p>
        </div>
        <div class="bg-yellow-500 text-white p-4 rounded">
            <h3 class="text-lg font-semibold">Pending Works</h3>
            <p class="text-2xl">{{ $pendingCount }}</p>
        </div>
        <div class="bg-green-500 text-white p-4 rounded">
            <h3 class="text-lg font-semibold">Verified Works</h3>
            <p class="text-2xl">{{ $verifiedCount }}</p>
        </div>
        <div class="bg-purple-500 text-white p-4 rounded">
            <h3 class="text-lg font-semibold">Total Users</h3>
            <p class="text-2xl">{{ $userCount }}</p>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-bold mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('admin.layanan.index') }}" class="bg-blue-600 text-white p-4 rounded hover:bg-blue-700">
                Manage Layanan
            </a>
            <a href="{{ route('admin.mitra.index') }}" class="bg-green-600 text-white p-4 rounded hover:bg-green-700">
                Manage Mitra
            </a> <a href="{{ route('admin.work.index') }}" class="bg-yellow-500 text-white p-4 rounded hover:bg-yellow-600">
                Manage Work
            </a>  </a> <a href="{{ route('admin.contacts.index') }}" class="bg-purple-600 text-white p-4 rounded hover:bg-purple-700">
                Contact Messages
            </a>  <a href="{{ route('admin.products.index') }}" class="bg-red-600 text-white p-4 rounded hover:bg-red-700">
                Product Management
            </a>
            
    </div>
</div>
@endsection
