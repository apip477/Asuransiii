<x-app-layout>

    <div class="bg-gray-50 min-h-screen flex items-center justify-center pt-20 relative overflow-hidden">
        
    }
        <div class="absolute top-0 left-0 w-64 h-64 bg-indigo-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>

        <div class="text-center px-4 max-w-4xl mx-auto relative z-10">
            
            {{-- Badge Kecil --}}
            <div class="inline-block mb-4 px-4 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-bold tracking-wide uppercase">
                #1 Platform Perlindungan Karya
            </div>

            <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-6 leading-tight">
                Asuransi Hak Cipta <br>
                <span class="text-indigo-900">Terpercaya</span>
            </h1>
            
            <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto leading-relaxed">
                Lindungi karya digital Anda dari pembajakan. Kami menjamin keamanan aset intelektual Anda dengan teknologi terkini dan bantuan hukum penuh.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                {{-- Tombol Daftar --}}
                <a href="{{ route('register') }}" class="bg-indigo-900 text-white px-8 py-4 rounded-full font-bold shadow-lg hover:bg-indigo-800 transition transform hover:-translate-y-1">
                    Daftar Sekarang
                </a>
                {{-- Tombol Pelajari --}}
                <a href="#" class="bg-white text-indigo-900 border border-indigo-200 px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition">
                    Pelajari Layanan
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Judul Section --}}
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                    Daftar Layanan Kami
                </h2>
                <div class="h-1.5 w-24 bg-indigo-900 mx-auto rounded-full"></div>
            </div>

            {{-- Grid 4 Kolom --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <div class="group bg-gray-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div class="w-16 h-16 mx-auto bg-white text-indigo-900 shadow-sm rounded-full flex items-center justify-center mb-6 group-hover:bg-indigo-900 group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-3 group-hover:text-indigo-700 transition-colors">Bank Garansi</h3>
                    <p class="text-gray-500 text-sm text-center leading-relaxed">Jaminan tertulis dari bank kepada nasabah.</p>
                </div>

                <div class="group bg-gray-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div class="w-16 h-16 mx-auto bg-white text-indigo-900 shadow-sm rounded-full flex items-center justify-center mb-6 group-hover:bg-indigo-900 group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-3 group-hover:text-indigo-700 transition-colors">Surety Bond</h3>
                    <p class="text-gray-500 text-sm text-center leading-relaxed">Perjanjian jaminan perlindungan proyek.</p>
                </div>

                <div class="group bg-gray-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div class="w-16 h-16 mx-auto bg-white text-indigo-900 shadow-sm rounded-full flex items-center justify-center mb-6 group-hover:bg-indigo-900 group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-3 group-hover:text-indigo-700 transition-colors">General Insurance</h3>
                    <p class="text-gray-500 text-sm text-center leading-relaxed">Ganti rugi kerusakan materi.</p>
                </div>

                <div class="group bg-gray-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div class="w-16 h-16 mx-auto bg-white text-indigo-900 shadow-sm rounded-full flex items-center justify-center mb-6 group-hover:bg-indigo-900 group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-3 group-hover:text-indigo-700 transition-colors">Customs Bond</h3>
                    <p class="text-gray-500 text-sm text-center leading-relaxed">Jaminan kewajiban pabean (Bea Cukai).</p>
                </div>

            </div>
        </div>
    </div>
    {{-- ... Penutup div SECTION LAYANAN ada di sini ... --}}


    {{-- SECTION KEUNGGULAN KAMI (WHY CHOOSE US) --}}
    <div class="bg-gray-50 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                {{-- Kolom Kiri: Teks & Fitur --}}
                <div>
                    <h2 class="text-xs font-bold text-indigo-600 uppercase tracking-wider mb-2">
                        KEUNGGULAN KAMI
                    </h2>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8 leading-tight">
                        Perlindungan Karya Cipta <br>
                        dengan Teknologi Terdepan.
                    </h3>

                    <dl class="space-y-10">
                        {{-- Fitur 1: Blockchain --}}
                        <div class="relative">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-900 text-white">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Sistem Anti-Duplikasi Blockchain</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                Setiap pendaftaran karya dicatat dalam rantai blok yang tidak dapat diubah, menjamin keaslian dan timestamp yang sah secara hukum.
                            </dd>
                        </div>

                        {{-- Fitur 2: Legalitas --}}
                        <div class="relative">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-900 text-white">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Asuransi Bantuan Hukum Penuh</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                Jika terjadi pelanggaran, polis Anda mencakup biaya konsultasi dan litigasi (persidangan) oleh pengacara HAKI terbaik kami.
                            </dd>
                        </div>

                        {{-- Fitur 3: Klaim Cepat --}}
                        <div class="relative">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-900 text-white">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Proses Klaim & Pencairan 7x Lebih Cepat</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                Didukung oleh teknologi AI, proses identifikasi pelanggaran dan pencairan ganti rugi dapat dilakukan dalam hitungan hari.
                            </dd>
                        </div>
                    </dl>
                </div>

                {{-- Kolom Kanan: Ilustrasi --}}
                <div class="lg:h-full lg:relative">
                    <div class="bg-indigo-100 rounded-2xl p-6 shadow-xl lg:absolute lg:top-1/2 lg:transform lg:-translate-y-1/2 w-full">
                        <h4 class="text-xl font-bold text-indigo-900 mb-4">Siap Amankan Aset Anda?</h4>
                        <p class="text-indigo-700 mb-6">Jangan tunda perlindungan karya Anda. Setiap detik adalah risiko kerugian.</p>
                        
                        <a href="{{ route('register') }}" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-indigo-600 hover:bg-indigo-700 shadow-md transition">
                            Amankan Karya Pertama Saya
                        </a>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>