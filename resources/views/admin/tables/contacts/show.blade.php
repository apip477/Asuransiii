{{-- resources/views/admin/contacts/show.blade.php --}}
<x-layouts.admin-layout>
    <x-slot name="header">
        {{ __('Detail Pesan Masuk') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-2xl font-extrabold mb-6 border-b pb-3 text-indigo-700">Pesan dari: {{ $contact->name ?? 'Pengirim' }}</h3>
                    
                    <div class="space-y-4">
                        <p><strong>Email Pengirim:</strong> <span class="text-blue-600">{{ $contact->email ?? 'N/A' }}</span></p>
                        <p><strong>Tanggal Diterima:</strong> {{ $contact->created_at->format('d M Y H:i') ?? 'N/A' }}</p>
                        <p><strong>Status Admin:</strong> 
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $contact->is_read ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $contact->is_read ? 'Sudah Dibaca' : 'Belum Dibaca (Baru)' }}
                            </span>
                        </p>
                    </div>

                    <h4 class="text-xl font-bold border-b pb-2 mb-4 mt-8 text-indigo-700">Isi Pesan Lengkap</h4>
                    <div class="bg-gray-50 p-6 rounded-lg border-2 border-gray-100 min-h-[150px]">
                        <p class="text-gray-800 whitespace-pre-line">{{ $contact->message ?? 'Pesan tidak ditemukan.' }}</p>
                    </div>

                    
                    {{-- Tombol Aksi: Tandai Sudah Dibaca --}}
                    @if (!$contact->is_read)
                        <div class="mt-8 pt-4 border-t">
                            <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="is_read" value="1">
                                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg font-bold hover:bg-green-700 transition">
                                    Tandai Sebagai Sudah Dibaca
                                </button>
                            </form>
                        </div>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('admin.contacts.index') }}" class="text-gray-600 hover:text-gray-900 text-sm">&larr; Kembali ke Daftar Pesan</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-layout>