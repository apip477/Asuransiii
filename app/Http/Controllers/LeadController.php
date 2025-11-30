<?php
// app/Http/Controllers/LeadController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User; // <-- WAJIB: Import Model User

class LeadController extends Controller
{
    // ... method create() di atas ini ...

    /**
     * Menyimpan data lead sementara dan mengarahkan ke halaman pendaftaran/login.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'required|string|max:255',
        ]);
        
        // 2. LOGIKA SORTING PENTING: CEK APAKAH EMAIL SUDAH ADA
        if (User::where('email', $validated['email'])->exists()) {
            // Jika email sudah terdaftar, arahkan ke Login dengan pesan
            return redirect()->route('login')->with('info', 'Anda sudah memiliki akun. Silakan login untuk melanjutkan pengajuan Anda.');
        }

        // 3. Jika email BARU, lanjutkan ke halaman pendaftaran (Register) dengan data terisi
        return redirect()->route('register')->withInput([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);
    }
}