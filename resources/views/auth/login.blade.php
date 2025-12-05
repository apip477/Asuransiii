<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Savannah Jaya</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    @include('layouts.navigation')

    {{-- Layout Card Tepat di Tengah Layar --}}
    <div class="min-h-screen flex flex-col items-center pt-16 sm:pt-0">
        
        <div class="mt-8 mb-6">
            {{-- Logo Brand --}}
            <img src="{{ asset('images/savannah_logo.png') }}" alt="Savannah Logo" class="h-12 w-auto mx-auto">
        </div>

        {{-- Card Form --}}
        <div class="w-full sm:max-w-md bg-white p-6 md:p-8 rounded-xl shadow-2xl border border-gray-100">
            
            <div class="text-center mb-6">
                <h2 class="text-2xl font-extrabold text-indigo-900">Selamat Datang Kembali</h2>
                <p class="mt-1 text-sm text-gray-500">Silakan login untuk melanjutkan ke Dashboard.</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block font-medium text-sm text-gray-700 mb-1">Alamat Email</label>
                    <input id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                </div>

                <div>
                    <label for="password" class="block font-medium text-sm text-gray-700 mb-1">Kata Sandi</label>
                    <input id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex justify-between items-center text-sm pt-2">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-gray-600">Ingat Saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-indigo-600 hover:text-indigo-800 underline" href="{{ route('password.request') }}">Lupa Password?</a>
                    @endif
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-2.5 bg-indigo-600 border border-transparent rounded-lg font-semibold text-white tracking-wide hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Login
                    </button>
                </div>
            </form>
            
            {{-- Link Buat Akun Baru --}}
            <p class="text-center text-sm mt-4">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-800 underline">Daftar Sekarang</a>
            </p>
        </div>
    </div>
</body>
</html>