<?php

namespace App\Http\Controllers;

use App\Models\Claim; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\RedirectResponse; 
use Illuminate\Support\Facades\Storage; // Wajib di-import

class ClaimController extends Controller
{
    /**
     * Tampilkan formulir pengajuan klaim.
     */
    public function create()
    {
        // Memanggil view resources/views/claim.blade.php
        return view('claim'); 
    }
    
    /**
     * Proses pengiriman data formulir klaim.
     */
    public function store(Request $request): RedirectResponse // Wajib tambahkan tipe kembalian
    {
        // 1. VALIDASI DATA
        $validated = $request->validate([
            'policy_number' => 'required|string|max:255',
            'claim_date' => 'required|date',
            'location' => 'required|string',
            'description' => 'required|string',
            
            // Validasi File: Wajib ada, harus file, format PDF/JPG/PNG, max 5MB
            // Kita akan menyimpan dua jenis dokumen
            'document_contract' => 'required|file|mimes:pdf,jpg,png|max:5000', 
            'document_loss' => 'required|file|mimes:pdf,jpg,png|max:5000',
        ]);

        // 2. UPLOAD FILE KE STORAGE
        // Pastikan Anda sudah menjalankan php artisan storage:link
        $contractPath = $request->file('document_contract')->store('claim_documents/contracts', 'public');
        $lossPath = $request->file('document_loss')->store('claim_documents/losses', 'public');

        // 3. SIMPAN DATA KLAIM KE DATABASE
        Claim::create([
            'user_id' => Auth::id(), 
            'policy_number' => $request->policy_number,
            'claim_date' => $request->claim_date,
            'location' => $request->location,
            'description' => $request->description,
            'document_contract_path' => $contractPath, // Menyimpan jalur filenya
            'document_loss_path' => $lossPath,
            'status' => 'pending', // Status awal
        ]);

        // 4. REDIRECT DAN PESAN SUKSES
        // Mengarahkan ke halaman sukses
        return redirect()->route('claim.success')
                         ->with('success', 'Pengajuan Klaim berhasil diajukan dan akan segera diproses.');
    }
    
    // Method show, index, edit, update, destroy di sini
    // Dibiarkan kosong karena Admin menggunakan Admin\ClaimController
}