<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Savannah Jaya</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    @include('layouts.navigation')

    <div class="min-h-screen flex flex-col items-center pt-16 sm:pt-0">
        
        <div class="mt-8 mb-6">
            <img src="{{ asset('images/savannah_logo.png') }}" alt="Savannah Logo" class="h-12 w-auto mx-auto">
        </div>

        <div class="w-full sm:max-w-md mt-6 bg-white p-6 md:p-8 rounded-xl shadow-2xl border border-gray-100">

            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-indigo-900">Lupa Kata Sandi?</h2>
                <p class="text-sm text-gray-600 mt-2">
                    Masukkan email Anda. Kami akan mengirimkan tautan untuk mengatur ulang kata sandi.
                </p>
            </div>
            
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-lg border border-green-200">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf
                
                <div>
                    <label for="email" class="block font-medium text-sm text-gray-700 mb-1">Email</label>
                    <input id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan alamat email terdaftar" />
                    
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end pt-4">
                    <button type="submit" class="w-full py-2.5 bg-indigo-600 border border-transparent rounded-lg font-semibold text-white tracking-wide hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        KIRIM TAUTAN RESET
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>