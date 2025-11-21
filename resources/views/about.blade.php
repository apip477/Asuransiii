<x-app-layout>

    {{-- HEADER SECTION --}}
    <div class="bg-indigo-900 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
                Tentang PT Savanaah Jaya Utama
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

    {{-- TEAM SECTION --}}
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Tim Kami</h2>
                <p class="text-gray-500 mt-2">Orang-orang hebat di balik perlindungan karya Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition">
                    <img class="w-24 h-24 rounded-full mx-auto mb-4 object-cover border-4 border-indigo-50"
                        src="https://ui-avatars.com/api/?name=Muhammad+Apipudin&background=312e81&color=fff"
                        alt="Siti">
                    <h3 class="text-xl font-bold text-gray-900">Muhammad Apipudin</h3>
                    <p class="text-indigo-600 font-medium">Founder & CEO</p>
                    <p class="text-gray-500 text-sm mt-2">Visioner di balik HAKI Protect dengan pengalaman 10 tahun di
                        industri kreatif.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition">
                    <img class="w-24 h-24 rounded-full mx-auto mb-4 object-cover border-4 border-indigo-50"
                        src="https://ui-avatars.com/api/?name=Fadli+Dwi+Nugraha&background=4338ca&color=fff" alt="Budi">
                    <h3 class="text-xl font-bold text-gray-900">Fadli Dwi Nugraha</h3>
                    <p class="text-indigo-600 font-medium">Head of Legal</p>
                    <p class="text-gray-500 text-sm mt-2">Ahli hukum hak kekayaan intelektual yang siap membela hak
                        Anda.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition">
                    <img class="w-24 h-24 rounded-full mx-auto mb-4 object-cover border-4 border-indigo-50"
                        src="https://ui-avatars.com/api/?name=Muhammad+rifky+putra+hilmanyah&background=6366f1&color=fff" alt="Dewi">
                    <h3 class="text-xl font-bold text-gray-900">M.Rifky Putra H.</h3>
                    <p class="text-indigo-600 font-medium">Tech Lead</p>
                    <p class="text-gray-500 text-sm mt-2">Arsitek sistem keamanan blockchain yang melindungi data Anda.
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
