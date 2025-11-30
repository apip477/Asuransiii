{{-- resources/views/layanan.blade.php --}}
<x-app-layout>
    
    {{-- HEADER PAGE --}}
    <div class="bg-indigo-900 pt-32 pb-16 text-center">
        <h1 class="text-4xl font-extrabold text-white mb-3">
            Jaminan & Bonds yang Kami Tawarkan
        </h1>
        <p class="text-indigo-200 max-w-3xl mx-auto">
            Pelajari setiap jenis jaminan secara mendalam untuk memilih perlindungan finansial yang paling tepat bagi proyek Anda.
        </p>
    </div>

    {{-- SECTION DETAIL LAYANAN (4 BLOK) --}}
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">

            {{-- 1. BANK GARANSI --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start border-b pb-12">
                <div class="md:col-span-1 text-center md:text-left">
                    <h2 class="text-3xl font-extrabold text-indigo-900 mb-2">Bank Garansi</h2>
                    <div class="inline-flex p-3 bg-indigo-100 rounded-lg text-indigo-600">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-3m0-4v-4m0 7h1m-1 4h1"></path></svg>
                    </div>
                </div>
                <div class="md:col-span-2 space-y-4">
                    <p class="text-lg font-medium text-gray-800">
                        Jaminan tertulis yang dikeluarkan oleh bank untuk menjamin pemenuhan kewajiban finansial nasabah kepada pihak penerima jaminan (Obligee).
                    </p>
                    <ul class="list-disc list-inside text-gray-600 ml-4 space-y-2">
                        <li>Fungsi: Menggantikan uang tunai atau aset sebagai jaminan.</li>
                        <li>Risiko: Bank menanggung risiko jika nasabah gagal bayar.</li>
                        <li>Kelemahan: Sering memerlukan dana *collateral* yang besar di bank.</li>
                    </ul>
                </div>
            </div>

            {{-- 2. SURETY BOND --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start border-b pb-12">
                <div class="md:col-span-1 text-center md:text-left">
                    <h2 class="text-3xl font-extrabold text-indigo-900 mb-2">Surety Bond</h2>
                    <div class="inline-flex p-3 bg-indigo-100 rounded-lg text-indigo-600">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                </div>
                <div class="md:col-span-2 space-y-4">
                    <p class="text-lg font-medium text-gray-800">
                        Jaminan yang dikeluarkan oleh perusahaan penjaminan (seperti PT SJU) untuk menjamin pemenuhan kewajiban non-finansial dalam kontrak proyek.
                    </p>
                    <ul class="list-disc list-inside text-gray-600 ml-4 space-y-2">
                        <li>Fungsi: Menjamin pemenang tender, pelaksanaan proyek, dan pemeliharaan.</li>
                        <li>Risiko: Perusahaan penjamin menanggung risiko performa kontraktor.</li>
                        <li>Kelebihan: Proses cepat, dan biaya lebih ringan dibandingkan Bank Garansi.</li>
                    </ul>
                </div>
            </div>

            {{-- 3. GENERAL INSURANCE --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start border-b pb-12">
                <div class="md:col-span-1 text-center md:text-left">
                    <h2 class="text-3xl font-extrabold text-indigo-900 mb-2">General Insurance</h2>
                    <div class="inline-flex p-3 bg-indigo-100 rounded-lg text-indigo-600">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                </div>
                <div class="md:col-span-2 space-y-4">
                    <p class="text-lg font-medium text-gray-800">
                        Asuransi yang memberikan manfaat ganti rugi atas kerusakan, kehilangan, atau kerugian pada aset fisik (kecuali asuransi jiwa).
                    </p>
                    <ul class="list-disc list-inside text-gray-600 ml-4 space-y-2">
                        <li>Fungsi: Melindungi aset kantor, kendaraan, dan alat berat proyek dari bencana atau kecelakaan.</li>
                        <li>Relevansi: Penting untuk mengamankan aset yang digunakan dalam pelaksanaan kontrak.</li>
                    </ul>
                </div>
            </div>
            
            {{-- 4. CUSTOMS BOND --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start">
                <div class="md:col-span-1 text-center md:text-left">
                    <h2 class="text-3xl font-extrabold text-indigo-900 mb-2">Customs Bond</h2>
                    <div class="inline-flex p-3 bg-indigo-100 rounded-lg text-indigo-600">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m4 4v10m8-10v10m-8-4h.01M12 12h.01"></path></svg>
                    </div>
                </div>
                <div class="md:col-span-2 space-y-4">
                    <p class="text-lg font-medium text-gray-800">
                        Jaminan kepada otoritas pabean (Bea Cukai) untuk memastikan bahwa bea masuk dan pajak akan dibayar oleh importir/eksportir.
                    </p>
                    <ul class="list-disc list-inside text-gray-600 ml-4 space-y-2">
                        <li>Fungsi: Mempercepat proses pengeluaran barang impor tanpa harus membayar pajak di muka.</li>
                        <li>Relevansi: Krusial bagi perusahaan yang terlibat dalam proyek impor alat berat atau material.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>