<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - PT Savannah Jaya Utama</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen flex flex-col justify-center items-center py-6 sm:pt-0 px-4">
        
        {{-- CARD FORM --}}
        <div class="w-full sm:max-w-md bg-white shadow-2xl rounded-xl p-8 border border-gray-100">

            <div class="mb-6 text-center">
                <h2 class="text-2xl font-extrabold text-indigo-700 mb-2">Atur Ulang Kata Sandi</h2>
                <p class="text-sm text-gray-600">Masukkan password baru Anda untuk melanjutkan.</p>
            </div>
            
            {{-- Tampilan Error Global --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                @csrf

                {{-- Hidden Token --}}
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                
                {{-- Field Email (Diasumsikan sudah terisi dari Controller) --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Alamat Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', request()->email) }}" required readonly
                           class="w-full border-gray-300 rounded-lg p-2.5 bg-gray-100 cursor-not-allowed focus:ring-indigo-500 focus:border-indigo-500" />
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Field Password Baru --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Password Baru</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                           class="w-full border-gray-300 rounded-lg p-2.5 focus:ring-indigo-500 focus:border-indigo-500" />
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Field Konfirmasi Password --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="password_confirmation">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                           class="w-full border-gray-300 rounded-lg p-2.5 focus:ring-indigo-500 focus:border-indigo-500" />
                    @error('password_confirmation') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-bold tracking-wide hover:bg-indigo-700 transition duration-150">
                    RESET PASSWORD
                </button>
            </form>

        </div>
    </div>
</body>
</html>