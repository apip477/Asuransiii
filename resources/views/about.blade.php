<x-app-layout>

    {{-- HEADER SECTION --}}
    <div class="bg-indigo-900 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
                Tentang PT Savannah Jaya Utama
            </h1>
            <p class="text-xl text-indigo-200 max-w-2xl mx-auto">
                Mitra terpercaya Anda dalam melindungi aset intelektual dan karya kreatif di era digital.
            </p>
        </div>
    </div>

    {{-- STORY SECTION --}}
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

                {{-- Kolom Kiri: Gambar/Ilustrasi --}}
                <div class="relative">
                    <div class="absolute inset-0 bg-indigo-100 rounded-2xl transform rotate-3"></div>
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Team Meeting" class="relative rounded-2xl shadow-xl w-full object-cover h-80 md:h-96">
                </div>

                {{-- Kolom Kanan: Teks --}}
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Visi & Misi Kami</h2>
                    <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                        Menjadi perusahaan Konsultan Penjamin Keuangan yang terkemuka dengan pengelolaan managemen yang
                        handal.
                        Menjadi perusahaan yang dapat memenuhi segala kebutuhan penerbitan instrumen penjaminan
                        keuangan.
                        Menjadi perusahaan yang berintegritas dalam perkembangan teknologi keuangan.
                    </p>
                    <p class="text-gray-600 text-lg mb-8 leading-relaxed">

                        Memberikan Kepuasan dan Kemudahan dalam penerbitan Produk Instrumen Penjaminan Keuangan serta
                        Asuransi Keuangan.
                        Memberikan solusi terbaik dalam setiap permasalahan dalam Penerbitan Bank Garansi dan Surety
                        Bond.
                        Mengedepankan ketepatan waktu yang terintegrasi dengan Proses Penerbitan yang terjamin.
                    </p>

                    {{-- Statistik Kecil --}}
                    <div class="grid grid-cols-2 gap-6 border-t border-gray-100 pt-6">
                        <div>
                            <div class="text-3xl font-bold text-indigo-900">10K+</div>
                            <div class="text-sm text-gray-500">Karya Terlindungi</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-indigo-900">500+</div>
                            <div class="text-sm text-gray-500">Klaim Berhasil</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
