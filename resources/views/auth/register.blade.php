<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Asuransi</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">

    @include('layouts.navigation')

    <main class="pt-24 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-lg mx-auto bg-white p-8 md:p-10 rounded-xl shadow-lg border border-gray-200">
            
            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-gray-900">Daftar Akun Baru</h2>
                <p class="mt-2 text-gray-500">Mulai lindungi aset digital Anda sekarang.</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input id="name" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap Anda" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                    <input id="email" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="contoh@domain.com" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                    <input id="password" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi kata sandi Anda" />
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-gray-600 hover:text-gray-900 underline" href="{{ route('login') }}">
                        Sudah punya akun?
                    </a>

                    <button type="submit" class="px-6 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white tracking-wide hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Daftar Sekarang
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>