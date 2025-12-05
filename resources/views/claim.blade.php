<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Claim - Savannah Jaya</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">

    @include('layouts.navigation')

    {{-- HEADER PAGE --}}
    <div class="bg-indigo-900 pt-32 pb-16 text-white text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold mb-3">
                Formulir Pengajuan Claim
            </h1>
            <p class="text-xl text-indigo-200">
                Mohon isi data insiden dan lampirkan semua dokumen yang diperlukan dengan lengkap.
            </p>
        </div>
    </div>

    {{-- FORM CONTENT --}}
    <div class="bg-gray-50 py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-6 md:p-10 rounded-xl shadow-2xl border border-gray-200">

                {{-- TAMPILAN ERROR VALIDASI GLOBAL --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                        <strong class="font-bold">Pengajuan Gagal!</strong>
                        <span class="block sm:inline"> Mohon periksa kembali input Anda, terutama pada bagian file.</span>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- AKHIR TAMPILAN ERROR GLOBAL --}}

                {{-- WAJIB: enctype untuk upload file --}}
                <form method="POST" action="{{ route('claim.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- SECTION 1: INFORMASI DASAR --}}
                    <h3 class="text-xl font-bold text-indigo-700 border-b pb-2 mb-4">1. Informasi Dasar</h3>

                    <div>
                        <label for="policy_number" class="block font-medium text-sm text-gray-700 mb-1">Nomor Polis/Kontrak</label>
                        <input id="policy_number" type="text" name="policy_number" value="{{ old('policy_number') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Contoh: SB-PTABC-2025" />
                        @error('policy_number')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="claim_date" class="block font-medium text-sm text-gray-700 mb-1">Tanggal Kejadian</label>
                        <input id="claim_date" type="date" name="claim_date" value="{{ old('claim_date') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition" />
                        @error('claim_date')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- SECTION 2: DETAIL KEJADIAN --}}
                    <h3 class="text-xl font-bold text-indigo-700 border-b pb-2 pt-6 mb-4">2. Detail Insiden</h3>

                    <div>
                        <label for="location" class="block font-medium text-sm text-gray-700 mb-1">Lokasi Kejadian</label>
                        <input id="location" type="text" name="location" value="{{ old('location') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Alamat lengkap lokasi kerugian" />
                        @error('location')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block font-medium text-sm text-gray-700 mb-1">Kronologi Singkat</label>
                        <textarea id="description" name="description" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Jelaskan secara singkat bagaimana insiden terjadi...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- SECTION 3: UPLOAD DOKUMEN --}}
                    <h3 class="text-xl font-bold text-indigo-700 border-b pb-2 pt-6 mb-4">3. Lampiran Dokumen Wajib</h3>
                    <p class="text-sm text-gray-600 mb-4">Lampirkan file PDF atau JPG/PNG (Max. 5MB per file).</p>

                    <div class="space-y-4">
                        <div>
                            <label for="document_contract" class="block font-medium text-sm text-gray-700 mb-1">Bukti Kontrak/Dokumen Jaminan</label>

                            <div class="flex items-center space-x-3">
                                <input id="document_contract" type="file" name="document_contract" required class="hidden" onchange="updateFileName(this, 'contract-file-name')" />
                                <label for="document_contract" class="cursor-pointer px-4 py-2 bg-indigo-600 text-white rounded-full shadow-sm hover:bg-indigo-700 transition duration-150 text-sm font-medium">
                                Pilih Dokumen
                                </label>
                                <span id="contract-file-name" class="text-sm text-gray-500 truncate">{{ old('document_contract') ? 'File berhasil dipilih' : 'Belum ada file dipilih' }}</span>
                            </div>
                            @error('document_contract')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="document_loss" class="block font-medium text-sm text-gray-700 mb-1">Bukti Kerugian (Invoice/Foto Kerusakan)</label>

                            <div class="flex items-center space-x-3">
                                <input id="document_loss" type="file" name="document_loss" required class="hidden" onchange="updateFileName(this, 'loss-file-name')" />
                                <label for="document_loss" class="cursor-pointer px-4 py-2 bg-indigo-600 text-white rounded-full shadow-sm hover:bg-indigo-700 transition duration-150 text-sm font-medium">
                                Pilih File
                                </label>
                                <span id="loss-file-name" class="text-sm text-gray-500 truncate">{{ old('document_loss') ? 'File berhasil dipilih' : 'Belum ada file dipilih' }}</span>
                            </div>
                            @error('document_loss')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="pt-6">
                        <button type="submit" class="w-full py-3 bg-indigo-600 border border-transparent rounded-lg font-semibold text-white tracking-wide hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Ajukan Claim Sekarang
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
    // Fungsi ini dipanggil saat file dipilih pada input tersembunyi
    function updateFileName(input, targetId) {
        // Cek apakah ada file yang dipilih (input.files[0])
        const fileName = input.files[0] ? input.files[0].name : 'Belum ada file dipilih';

        // Memperbarui teks di elemen <span> yang menunjukkan nama file
        document.getElementById(targetId).textContent = fileName;
    }
    </script>
</body>
</html>