<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work; // Wajib di-import: Model untuk menyimpan data
use Illuminate\Support\Facades\Auth; // Wajib di-import: Untuk mendapatkan ID user yang login
use Illuminate\Http\RedirectResponse; 
use Illuminate\Support\Facades\Storage; // Wajib di-import: Untuk file storage

class SubmissionController extends Controller
{
    /**
     * Menampilkan formulir pengajuan jaminan.
     */
    public function create()
    {
        return view('user.submission.create'); 
    }

    /**
     * Menyimpan data pengajuan jaminan dan dokumen ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi Data dan File
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            // File: wajib ada, format PDF/ZIP/JPG/PNG, max 5MB (5120 KB)
            'file_path' => 'required|file|mimes:pdf,zip,jpg,png|max:5120', 
        ]);

        // 2. Simpan File ke storage/app/public/works/
        // Menggunakan disk 'public' dan folder 'works'
        $filePath = $request->file('file_path')->store('works', 'public'); 

        // 3. Simpan Data ke Database (Tabel 'works')
        Work::create([
            'user_id' => Auth::id(), // Otomatis ambil ID user yang sedang login
            'title' => $validated['title'],
            'description' => $validated['description'],
            'file_path' => $filePath, // Simpan path file
            'status' => 'pending', // Status awal: pending
        ]);

        // 4. Redirect kembali ke dashboard user dengan pesan sukses
        return redirect()->route('dashboard')
                         ->with('success', 'Pengajuan jaminan Anda berhasil dikirim dan menunggu verifikasi Admin.');
    }
}