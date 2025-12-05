<x-app-layout>

    <div class="bg-gray-50 min-h-screen flex items-center justify-center pt-20 relative overflow-hidden">
        {{-- BLOB ANIMASI --}}
        <div
            class="absolute top-0 left-0 w-64 h-64 bg-indigo-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
        </div>
        <div
            class="absolute top-0 right-0 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
        </div>
        {{-- HERO SECTION --}}
        <div class="text-center px-4 max-w-4xl mx-auto relative z-10">

            {{-- Badge Kecil --}}
            <div
                class="inline-block mb-4 px-4 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-bold tracking-wide uppercase">
                #1 Platform Surety & Bank Garansi Resmi
            </div>

            <h1 class="text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                Jaminan Bank & Surety Bond <br>
                <span class="text-indigo-900">oleh PT Savannah Jaya Utama.</span>
            </h1>

            <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto leading-relaxed">
                Mitigasi risiko kerugian finansial dalam setiap tender. Kami menjamin pemenuhan kewajiban Anda dengan
                proses surety bond yang cepat dan dukungan dari perusahaan penjamin terpercaya.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                {{-- Tombol Daftar --}}
                <a href="{{ route('pre.register.form') }}"
                    class="bg-indigo-900 text-white px-8 py-4 rounded-full font-bold shadow-lg hover:bg-indigo-800 transition transform hover:-translate-y-1">
                    Daftar Sekarang
                </a>
                {{-- Tombol Pelajari --}}
                <a href="layanan"
                    class="bg-white text-indigo-900 border border-indigo-200 px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition">
                    Pelajari Layanan
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Section layanan kami --}}
            {{-- Judul Section --}}
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                    Daftar Layanan Kami
                </h2>
                <div class="h-1.5 w-24 bg-indigo-900 mx-auto rounded-full"></div>
            </div>

            {{-- Grid 4 Kolom --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <div
                    class="group bg-gray-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 mx-auto bg-white text-indigo-900 shadow-sm rounded-full flex items-center justify-center mb-6 group-hover:bg-indigo-900 group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                    </div>
                    <h3
                        class="text-xl font-bold text-gray-900 text-center mb-3 group-hover:text-indigo-700 transition-colors">
                        Bank Garansi</h3>
                    <p class="text-gray-500 text-sm text-center leading-relaxed">Jaminan tertulis dari bank kepada
                        nasabah.</p>
                </div>

                <div
                    class="group bg-gray-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 mx-auto bg-white text-indigo-900 shadow-sm rounded-full flex items-center justify-center mb-6 group-hover:bg-indigo-900 group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3
                        class="text-xl font-bold text-gray-900 text-center mb-3 group-hover:text-indigo-700 transition-colors">
                        Surety Bond</h3>
                    <p class="text-gray-500 text-sm text-center leading-relaxed">Perjanjian jaminan perlindungan proyek.
                    </p>
                </div>

                <div
                    class="group bg-gray-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 mx-auto bg-white text-indigo-900 shadow-sm rounded-full flex items-center justify-center mb-6 group-hover:bg-indigo-900 group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3
                        class="text-xl font-bold text-gray-900 text-center mb-3 group-hover:text-indigo-700 transition-colors">
                        General Insurance</h3>
                    <p class="text-gray-500 text-sm text-center leading-relaxed">Ganti rugi kerusakan materi.</p>
                </div>

                <div
                    class="group bg-gray-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 mx-auto bg-white text-indigo-900 shadow-sm rounded-full flex items-center justify-center mb-6 group-hover:bg-indigo-900 group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h3
                        class="text-xl font-bold text-gray-900 text-center mb-3 group-hover:text-indigo-700 transition-colors">
                        Customs Bond</h3>
                    <p class="text-gray-500 text-sm text-center leading-relaxed">Jaminan kewajiban pabean (Bea Cukai).
                    </p>
                </div>

            </div>
        </div>
    </div>


    {{-- SECTION KEUNGGULAN KAMI (WHY CHOOSE US) --}}
    <div class="bg-gray-50 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                {{-- Kolom Kiri: Teks & Fitur (Telah Diperbarui) --}}
                <div>
                    <h2 class="text-xs font-bold text-indigo-600 uppercase tracking-wider mb-2">
                        KEUNGGULAN PT SAVANNAH JAYA UTAMA
                    </h2>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8 leading-tight">
                        Kepastian Jaminan Keuangan <br>
                        dengan Proses Digital Cepat.
                    </h3>

                    <dl class="space-y-10">

                        {{-- Fitur 1: Proses Cepat & Digital --}}
                        <div class="relative">
                            <dt>
                                <div
                                    class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-900 text-white">
                                    {{-- Icon Jam/Waktu --}}
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Penerbitan Digital 30
                                    Menit
                                </p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                Proses pengajuan dan penerbitan Surety Bond/Bank Garansi dilakukan 100% online,
                                tanpa
                                perlu datang ke kantor fisik.
                            </dd>
                        </div>

                        {{-- Fitur 2: Jaminan Acceptable --}}
                        <div class="relative">
                            <dt>
                                <div
                                    class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-900 text-white">
                                    {{-- Icon Tanda Cek/Verifikasi --}}
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Jaminan Diterima Semua
                                    Bank
                                    & BUMN</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                Produk jaminan kami diakui dan diterima secara luas oleh lembaga pemerintah dan
                                seluruh
                                bank di Indonesia.
                            </dd>
                        </div>

                        {{-- Fitur 3: Konsultasi Risiko --}}
                        <div class="relative">
                            <dt>
                                <div
                                    class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-900 text-white">
                                    {{-- Icon Konsultasi/Chat --}}
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 4v-4z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Dukungan Konsultasi
                                    Risiko
                                    Gratis</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                Tim ahli kami akan membantu Anda menganalisis risiko proyek dan menentukan batas
                                jaminan
                                yang paling efektif.
                            </dd>
                        </div>
                    </dl>
                </div>

                {{-- Kolom Kanan: Ilustrasi / CTA --}}
                <div class="lg:h-full lg:relative">
                    <div
                        class="bg-indigo-100 rounded-2xl p-6 shadow-xl lg:absolute lg:top-1/2 lg:transform lg:-translate-y-1/2 w-full">
                        <h4 class="text-xl font-bold text-indigo-900 mb-4">Siap Ajukan Jaminan Anda?</h4>
                        <p class="text-indigo-700 mb-6">Jangan tunda pengajuan Surety Bond atau Bank Garansi. Mulai
                            proses digital sekarang.</p>

                        {{-- Tombol CTA --}}
                        <a href="{{ Auth::check() ? route('user.submission.create') : route('register') }}"
                            class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-indigo-600 hover:bg-indigo-700 shadow-md transition">
                            {{-- Ubah teks tombol berdasarkan status login --}}
                            {{ Auth::check() ? 'Mulai Proses Pengajuan' : 'Daftar Sekarang' }}
                        </a>
                    </div>
                </div>

            </div>
            {{-- SECTION MITRA PENJAMIN (POSISI SUDAH DIPINDAHKAN DI LUAR GRID) --}}
            <div class="text-center mb-16 mt-24">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                    Mitra Penjamin
                </h2>
                <div class="h-1.5 w-24 bg-indigo-900 mx-auto rounded-full"></div>
            </div>
           <!-- Clients -->
<div class="px-4 sm:px-6 lg:px-8">
  <div class="relative py-6 md:py-10 overflow-hidden before:absolute before:top-0 before:start-0 before:z-10 before:w-20 before:h-full before:bg-linear-to-r before:from-white before:to-transparent after:absolute after:top-0 after:end-0 after:w-20 after:h-full after:bg-linear-to-l after:from-white after:to-transparent dark:before:from-neutral-900 dark:after:from-neutral-900">
    
    {{-- Container Flexbox untuk Logo Mitra --}}
    <div class="flex justify-between items-center gap-x-4">
        
      {{-- 1. Logo Mitra 1 (Dulu SVG, Sekarang IMG) --}}
      <img src={{ asset('img/mitra/bank_jatim.png') }}
           alt="Logo Mitra 1"
           class="w-14 md:w-20 h-auto text-black mx-auto dark:text-white"
           loading="lazy">
           
      {{-- 2. Logo Mitra 2 (Dulu SVG, Sekarang IMG) --}}
      <img src={{asset('img/mitra/bri.png')}}
           alt="Logo Mitra 2"
           class="w-14 md:w-20 h-auto text-black mx-auto dark:text-white"
           loading="lazy">

      {{-- 3. Logo Mitra 3 (Dulu SVG, Sekarang IMG) --}}
      <img src={{asset('img/mitra/mandri.png')}}
           alt="Logo Mitra 3"
           class="w-14 md:w-20 h-auto text-black mx-auto dark:text-white"
           loading="lazy">

      {{-- 4. Logo Mitra 4 (Tersembunyi di Mobile, Dulu SVG, Sekarang IMG) --}}
      <img src={{asset('img/mitra/bca.png')}}
           alt="Logo Mitra 4"
           class="hidden sm:block w-14 md:w-20 h-auto text-black mx-auto dark:text-white"
           loading="lazy">

      {{-- 5. Logo Mitra 5 (Tersembunyi di Mobile/Tablet, Dulu SVG, Sekarang IMG) --}}
      <img src={{{asset('img/mitra/bukopoin.png')}}}
           alt="Logo Mitra 5"
           class="hidden md:block w-14 md:w-20 h-auto text-black mx-auto dark:text-white"
           loading="lazy">
           
      {{-- 6. Logo Mitra 6 (Tersembunyi di Mobile/Tablet, Dulu SVG, Sekarang IMG) --}}
      <img src={{asset('img/mitra/jtrust.png')}}
           alt="Logo Mitra 6"
           class="hidden md:block w-14 md:w-20 h-auto text-black mx-auto dark:text-white"
           loading="lazy">
           
      {{-- 7. Logo Mitra 7 (Tersembunyi di Mobile/Tablet, Dulu SVG, Sekarang IMG) --}}
      <img src={{asset('img/mitra/exim.png')}}
           alt="Logo Mitra 7"
           class="hidden md:block w-14 md:w-20 h-auto text-black mx-auto dark:text-white"
           loading="lazy">

            {{-- 7. Logo Mitra 7 (Tersembunyi di Mobile/Tablet, Dulu SVG, Sekarang IMG) --}}
      <img src={{asset('img/mitra/btn.png')}}
           alt="Logo Mitra 7"
           class="hidden md:block w-14 md:w-20 h-auto text-black mx-auto dark:text-white"
           loading="lazy">

            {{-- 7. Logo Mitra 7 (Tersembunyi di Mobile/Tablet, Dulu SVG, Sekarang IMG) --}}
      <img src={{asset('img/mitra/bni.png')}}
           alt="Logo Mitra 7"
           class="hidden md:block w-14 md:w-20 h-auto text-black mx-auto dark:text-white"
           loading="lazy">
           
    </div>
  </div>
</div>
<div class="mt-10 mb-12 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16 mt-24">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                    Alamat Kami
                </h2>
                <div class="h-1.5 w-24 bg-indigo-900 mx-auto rounded-full"></div>
            </div>
    
    <div class="relative w-full h-[450px] rounded-lg overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700">
        
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.1651204092404!2d106.9318333!3d-6.2310619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698d003e313be1%3A0x9191277771f5922a!2sPT.%20SAVANNAH%20JAYA%20UTAMA!5e1!3m2!1sid!2sid!4v1764953091987!5m2!1sid!2sid" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            class="absolute top-0 left-0"
        ></iframe>
        </div>
    
    <div class="text-center mt-4 text-gray-600 dark:text-gray-400">
        <p>
            PT. SAVANNAH JAYA UTAMA <br>
            Jl. Taman Malaka Selatan Gg. D No.6, RT.10/RW.9, Malaka Jaya, <br>
            Kec. Duren Sawit, Kota Jakarta Timur, Jakarta 13460.
        </p>
        <p class="mt-2">
            <a href="https://www.google.com/maps/place/PT.+SAVANNAH+JAYA+UTAMA/@-6.231062,106.931833,694m/data=!3m1!1e3!4m6!3m5!1s0x2e698d003e313be1:0x9191277771f5922a!8m2!3d-6.2310619!4d106.9318333!16s%2Fg%2F11w3k7fw9_?hl=id&entry=ttu&g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D" 
               target="_blank" 
               class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 font-medium">
                Lihat Peta Lebih Besar
            </a>
        </p>
    </div>
</div>

        </div>
    </div>
</x-app-layout>