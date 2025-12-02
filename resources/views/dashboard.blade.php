<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="font-sans antialiased bg-gray-50">

    @include('layouts.navigation')
    <div class="pt-24 pb-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Isi konten Dashboard Anda di sini --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Selamat datang di Dashboard!
                </div>
            </div>
        </div>
    </div>
</body>
</html>