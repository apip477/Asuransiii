{{-- resources/views/user/submission/success.blade.php --}}

<x-app-layout>
    <div class="py-24 bg-gray-50 min-h-screen">
        <div class="max-w-xl mx-auto px-6 lg:px-8 text-center">
            <div class="bg-white p-10 rounded-xl shadow-2xl border-t-4 border-green-500">
                
                <svg class="w-20 h-20 text-green-500 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>

                <h3 class="text-3xl font-extrabold text-green-700 mb-3">
                    Pengajuan Berhasil Diterima!
                </h3>
                <h4 class="text-xl font-bold text-gray-800 mb-6">
                    Tim PT Savanaah Jaya Utama akan segera memproses pengajuan jaminan Anda.
                </h4>

                <p class="text-gray-600 mb-8">
                    Anda tidak perlu melakukan aksi apa pun lagi. Silakan cek email Anda untuk notifikasi lanjutan dari Admin (admin@sju.com).
                </p>

                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-bold rounded-full shadow-sm text-indigo-900 bg-gray-200 hover:bg-gray-300 transition">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>