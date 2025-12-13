{{-- resources/views/pre-register.blade.php --}}

<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-xl">
                
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-extrabold text-indigo-900 mb-2">
                        Daftar dan Konsultasi
                    </h2>
                    <p class="text-gray-600">
                        Isi detail Anda, dan kami akan membantu memilih jaminan yang tepat.
                    </p>
                </div>

                <form method="POST" action="{{ route('lead.store') }}"> 
                    @csrf
                    
                    {{-- Nama Lengkap --}}
                    <div class="mb-4">
                        <label for="name" class="block font-medium text-sm text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required value="{{ old('name') }}">
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="block font-medium text-sm text-gray-700">Email Utama</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required value="{{ old('email') }}">
                    </div>

                    {{-- Pemilihan Layanan --}}
                    <div class="mb-6">
                        <label for="service" class="block font-medium text-sm text-gray-700">Jenis Jaminan yang Diperlukan</label>
                        <select name="service" id="service" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value=""> Pilih Jenis Layanan </option>
                            <option value="Surety Bond">Surety Bond (Jaminan Kontrak)</option>
                            <option value="Bank Garansi">Bank Garansi (Jaminan Bank)</option>
                            <option value="General Insurance">General Insurance (Asuransi Umum)</option>
                            <option value="Customs Bond">Customs Bond (Jaminan Pabean)</option>
                        </select>
                    </div>

                    <p class="text-xs text-gray-500 mb-4 text-center">
                        Setelah mengisi, Anda akan diarahkan ke halaman pendaftaran akun.
                    </p>

                    {{-- TOMBOL SUBMIT (Wajib type="submit") --}}
                    <button type="submit" class="w-full px-4 py-3 bg-indigo-800 text-white font-bold rounded-lg hover:bg-indigo-900 transition">
                        Lanjut Daftar Akun
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>