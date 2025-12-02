<?php

namespace App\Http\Controllers;

use App\Models\Claim; // PENTING: Panggil Model Claim
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // PENTING: Untuk mengetahui user yang sedang login

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
    public function store(Request $request)
    {
        // 1. VALIDASI DATA
        $request->validate([
            'policy_number' => 'required|string|max:255',
            'claim_date' => 'required|date',
            'location' => 'required|string',
            'description' => 'required|string',
            // Validasi File: Wajib ada, harus file, format PDF/JPG/PNG, max 5MB
            'document_contract' => 'required|file|mimes:pdf,jpg,png|max:5000', 
            'document_loss' => 'required|file|mimes:pdf,jpg,png|max:5000',
        ]);

        // 2. UPLOAD FILE KE STORAGE
        // File akan disimpan di folder storage/app/public/claim_documents/...
        $contractPath = $request->file('document_contract')->store('claim_documents/contracts', 'public');
        $lossPath = $request->file('document_loss')->store('claim_documents/losses', 'public');

        // 3. SIMPAN DATA KLAIM KE DATABASE
        Claim::create([
            'user_id' => Auth::id(), // ID user yang sedang login otomatis
            'policy_number' => $request->policy_number,
            'claim_date' => $request->claim_date,
            'location' => $request->location,
            'description' => $request->description,
            'document_contract_path' => $contractPath, // Menyimpan jalur filenya
            'document_loss_path' => $lossPath,
        ]);

        // 4. REDIRECT DAN PESAN SUKSES
        return view('claim-success');
    }
}