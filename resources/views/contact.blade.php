<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - Asuransi</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    @include('layouts.navigation')

    <main class="pt-24">
        <section class="bg-white py-12 md:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Hubungi Kami
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Tim kami siap membantu 24/7 untuk segala kebutuhan asuransi Anda.
                    </p>
                </div>
        
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <div class="bg-indigo-950 text-white p-8 rounded-lg shadow-xl">
                        <h3 class="text-2xl font-bold mb-6">Kantor Pusat</h3>
                        
                        <div class="flex items-start mb-6">
                            <svg class="w-6 h-6 text-indigo-300 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div>
                                <p class="font-semibold text-white">Alamat</p>
                                <p class="text-indigo-200 text-sm">Jl. Taman Malaka Selatan Gg. D No.6, RT.10/RW.9, Malaka Jaya, <br>Duren Sawit, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta </p>
                            </div>
                        </div>
        
                        <div class="flex items-start mb-6">
                            <svg class="w-6 h-6 text-indigo-300 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div>
                                <p class="font-semibold text-white">Email</p>
                                <p class="text-indigo-200 text-sm">savannah.guarantee165@gmail.com</p>
                                <p class="text-indigo-200 text-sm">donnysaputra.gjs@gmail.com</p>
                            </div>
                        </div>
        
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-indigo-300 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div>
                                <p class="font-semibold text-white">Telepon (Whatsapp)</p>
                                <p class="text-indigo-200 text-sm">+62 813-8163-6933</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan</h3>
                        
                        @if(session('success'))
                            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                <p class="font-semibold">Mohon perbaiki kesalahan berikut:</p>
                                <ul class="list-disc list-inside text-sm mt-2">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700">Pesan</label>
                                <textarea rows="4" name="message" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="w-full py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </main>
</body>
@include('layouts.footer')
</html>