<x-app-layout>
    
    {{-- SECTION 1: HEADER & TITLE --}}
    <div class="bg-gray-50 pt-32 pb-16 text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-3">
            Pilih Paket Jaminan yang Tepat
        </h1>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
            PT Savannah Jaya Utama menyediakan paket Surety Bond dan Garansi Bank yang disesuaikan dengan skala proyek dan kebutuhan finansial Anda.
        </p>
    </div>

    {{-- SECTION 2: PRICING GRID --}}
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                
                {{-- CARD 1: PAKET BASIC --}}
                <div class="bg-white p-8 rounded-2xl shadow-xl border-t-4 border-indigo-200 hover:shadow-2xl transition duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Basic Bond</h3>
                    <p class="text-sm text-gray-500 mb-6">Cocok untuk proyek skala kecil & tender awal.</p>
                    
                    <div class="mb-8">
                        <span class="text-4xl font-extrabold text-indigo-600">Rp 25 Juta</span>
                        <span class="text-gray-500"> / Maksimum Jaminan</span>
                    </div>

                    <ul class="space-y-4 text-gray-600">
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Surety Bond Tender
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Limit 1x Pengajuan
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            Konsultasi Hukum Dasar
                        </li>
                    </ul>

                    <a href="{{ route('register') }}" class="mt-8 block w-full text-center bg-indigo-900 text-white py-3 rounded-full font-bold hover:bg-indigo-800 transition">
                        Pilih Paket
                    </a>
                </div>


                {{-- CARD 2: PAKET PRO (BEST VALUE) --}}
                <div class="bg-indigo-900 p-8 rounded-2xl shadow-2xl border-t-4 border-indigo-400 transform scale-105 transition duration-300">
                    <h3 class="text-2xl font-bold text-white mb-2">Pro Business</h3>
                    <p class="text-indigo-200 text-sm mb-6">Pilihan terbaik untuk kontraktor aktif.</p>
                    
                    <div class="mb-8">
                        <span class="text-4xl font-extrabold text-white">Rp 500 Juta</span>
                        <span class="text-indigo-200"> / Maksimum Jaminan</span>
                    </div>

                    <ul class="space-y-4 text-white">
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-indigo-300 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Semua Fitur Basic
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-indigo-300 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Bank Garansi (Maks. 3X)
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-indigo-300 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Prioritas Pencairan Klaim
                        </li>
                    </ul>

                    <a href="{{ route('register') }}" class="mt-8 block w-full text-center bg-white text-indigo-900 py-3 rounded-full font-bold hover:bg-gray-200 transition">
                        Pilih Paket (Best Value)
                    </a>
                </div>


                {{-- CARD 3: PAKET ENTERPRISE --}}
                <div class="bg-white p-8 rounded-2xl shadow-xl border-t-4 border-indigo-200 hover:shadow-2xl transition duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Enterprise</h3>
                    <p class="text-sm text-gray-500 mb-6">Solusi kustom untuk korporasi besar.</p>
                    
                    <div class="mb-8">
                        <span class="text-4xl font-extrabold text-indigo-600">Negosiasi</span>
                        <span class="text-gray-500"> / Limit Tidak Terbatas</span>
                    </div>

                    <ul class="space-y-4 text-gray-600">
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Semua Jenis Jaminan
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></path></svg>
                            Manajer Akun Khusus
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Integrasi API (Kustom)
                        </li>
                    </ul>

                    <a href="{{ route('contact') }}" class="mt-8 block w-full text-center bg-gray-200 text-gray-700 py-3 rounded-full font-bold hover:bg-gray-300 transition">
                        Hubungi Sales
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    {{-- SECTION 3 & 4: FAQ & FINAL CTA --}}
    <div class="bg-gray-100 py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-2">
                    Pertanyaan Umum (FAQ)
                </h2>
                <p class="text-gray-600">Jawab semua keraguan Anda seputar jaminan dan penjaminan.</p>
            </div>

            <div class="space-y-6">
                
                {{-- FAQ Item 1 --}}
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-indigo-600">
                    <h4 class="font-bold text-lg text-gray-800 mb-2">
                        Apa perbedaan Surety Bond dan Bank Garansi?
                    </h4>
                    <p class="text-gray-600">
                        Surety Bond diterbitkan oleh perusahaan penjaminan (seperti PT SJU) dan biayanya lebih rendah. Bank Garansi diterbitkan oleh bank dan seringkali memerlukan jaminan aset (kolateral) yang lebih besar.
                    </p>
                </div>

                {{-- FAQ Item 2 --}}
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-indigo-600">
                    <h4 class="font-bold text-lg text-gray-800 mb-2">
                        Berapa lama proses penerbitan jaminan berlangsung?
                    </h4>
                    <p class="text-gray-600">
                        Jika dokumen lengkap, melalui platform digital kami, proses penerbitan bisa selesai dalam 1-3 jam kerja, jauh lebih cepat daripada proses konvensional.
                    </p>
                </div>

                {{-- FAQ Item 3 --}}
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-indigo-600">
                    <h4 class="font-bold text-lg text-gray-800 mb-2">
                        Apakah jaminan dari PT SJU diterima oleh lembaga pemerintah?
                    </h4>
                    <p class="text-gray-600">
                        Ya, kami bekerja sama dengan perusahaan penjamin berizin OJK, sehingga produk jaminan kami sah dan diterima untuk tender BUMN maupun instansi pemerintah lainnya.
                    </p>
                </div>
            </div>
            
        </div>
    </div>
    
    <div class="bg-indigo-900 py-16">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h3 class="text-3xl font-extrabold text-white mb-4">
                Siap Amankan Proyek Anda?
            </h3>
            <p class="text-indigo-200 mb-6">
                Hubungi tim sales kami untuk negosiasi paket Enterprise atau konsultasi risiko gratis.
            </p>
            <a href="{{ route('contact') }}" class="bg-white text-indigo-900 px-8 py-3 rounded-full font-bold shadow-lg hover:bg-gray-200 transition">
                Hubungi Kami Sekarang
            </a>
        </div>
    </div>

</x-app-layout>