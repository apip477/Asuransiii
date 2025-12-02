<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klaim Berhasil Diajukan</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">

    @include('layouts.navigation')

    {{-- Layout Card di Tengah --}}
    <div class="min-h-screen pt-24 flex items-start justify-center">
        <div class="w-full max-w-lg bg-white p-10 rounded-xl shadow-2xl border border-green-300 mt-12">
            
            <div class="text-center">
                
                {{-- Icon Sukses (Centang Hijau Besar) --}}
                <svg class="h-20 w-20 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>

                <h1 class="text-3xl font-extrabold text-indigo-900 mb-2">
                    Pengajuan Berhasil Diterima!
                </h1>

                <p class="text-gray-600 mb-6">
                    Terima kasih telah mengajukan klaim. Sistem kami telah mencatat pengajuan Anda. Tim verifikasi akan segera memproses dokumen dan menghubungi Anda dalam 1x24 jam kerja.
                </p>

                <hr class="my-6 border-gray-100">

                <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-full font-bold hover:bg-indigo-700 transition">
                    Kembali ke Home
                </a>
            </div>

        </div>
    </div>
</body>
</html>