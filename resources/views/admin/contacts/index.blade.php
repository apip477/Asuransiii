@extends('admin.layouts.app')


@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <h1 class="ml-2 text-2xl font-medium text-gray-900">
                            Daftar Pesan Kontak
                        </h1>
                    </div>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        Berikut adalah daftar pesan yang dikirim oleh pengguna melalui halaman kontak.
                    </p>
                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-8">
                    @forelse($contacts as $contact)
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $contact->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $contact->email }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $contact->created_at->format('d M Y, H:i') }}</p>
                                </div>
                                @if(!$contact->is_read)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Belum Dibaca
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Sudah Dibaca
                                    </span>
                                @endif
                            </div>
                            <div class="mt-4">
                                <p class="text-gray-700">{{ $contact->message }}</p>
                            </div>
                            <div class="mt-4 flex space-x-2">
                                @if(!$contact->is_read)
                                    <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                            Tandai sebagai Dibaca
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white p-6 rounded-lg shadow-md text-center">
                            <p class="text-gray-500">Belum ada pesan kontak.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
